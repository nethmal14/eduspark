<?php
// update_handler.php
require_once 'includes/config.php';

// JSON Response header
header('Content-Type: application/json');

// Session security check (matching admin.php Protection style)
// if (!isset($_SESSION['is_admin'])) {
//     echo json_encode(['success' => false, 'log' => ['[ERROR] Unauthorized access. Admin privileges required.']]);
//     exit;
// }

$action = $_GET['action'] ?? 'check';
$log = [];

// Helper function to recursively copy files
function recurse_copy($src, $dst, &$log, $baseDir) {
    $dir = opendir($src);
    if (!is_dir($dst)) {
        if (!mkdir($dst, 0755, true)) {
            $log[] = "[ERROR] Failed to create directory: " . str_replace($baseDir, '', $dst);
            return;
        }
    }
    
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                recurse_copy($src . '/' . $file, $dst . '/' . $file, $log, $baseDir);
            } else {
                $destFile = $dst . '/' . $file;
                $relativeDest = str_replace($baseDir . '/', '', $destFile);
                
                // Protection check for local config file
                if ($file === 'config.php' && basename(dirname($destFile)) === 'includes') {
                    $log[] = "[INFO] Preserved local configuration file: " . $relativeDest;
                    continue;
                }
                
                if (copy($src . '/' . $file, $destFile)) {
                    $log[] = "[SUCCESS] Overwrote/Added file: " . $relativeDest;
                } else {
                    $log[] = "[ERROR] Failed to write file: " . $relativeDest;
                }
            }
        }
    }
    closedir($dir);
}

// Helper function to recursively delete a directory
function delete_directory($dir) {
    if (!file_exists($dir)) {
        return true;
    }
    if (!is_dir($dir)) {
        return unlink($dir);
    }
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (!delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }
    return rmdir($dir);
}

$baseDir = __DIR__;

switch ($action) {
    case 'check':
        $log[] = "[SYSTEM] Starting pre-update system environment diagnosis...";
        
        // 1. Check directory permissions
        if (is_writable($baseDir)) {
            $log[] = "[OK] Workspace directory is writable: " . $baseDir;
        } else {
            $log[] = "[WARNING] Workspace is not writable. File updates might fail.";
        }
        
        // 2. Check Git installation
        $gitVersion = null;
        @exec('git --version', $output, $returnVar);
        if ($returnVar === 0 && !empty($output)) {
            $gitVersion = $output[0];
            $log[] = "[OK] Git Command Line Tool detected: " . $gitVersion;
        } else {
            $log[] = "[INFO] Git Command Line Tool is not available in system PATH.";
        }
        
        // 3. Check ZipArchive extension
        if (class_exists('ZipArchive')) {
            $log[] = "[OK] PHP ZipArchive extension is loaded.";
        } else {
            $log[] = "[WARNING] PHP ZipArchive extension is missing. Fallback Zip update method will not work.";
        }
        
        // 4. Check if Git is initialized locally
        $isGitInitialized = is_dir($baseDir . '/.git');
        if ($isGitInitialized) {
            $log[] = "[INFO] Local folder is already initialized as a Git repository.";
        } else {
            $log[] = "[INFO] Local folder is not initialized as a Git repository yet.";
        }
        
        echo json_encode([
            'success' => true,
            'git_available' => ($gitVersion !== null),
            'zip_available' => class_exists('ZipArchive'),
            'git_initialized' => $isGitInitialized,
            'log' => $log
        ]);
        break;

    case 'update_git':
        $log[] = "[GIT] Initiating Git-based update...";
        
        // Check if Git is available
        @exec('git --version', $output, $returnVar);
        if ($returnVar !== 0) {
            $log[] = "[ERROR] Git command-line client is not installed or available on this system.";
            echo json_encode(['success' => false, 'log' => $log]);
            exit;
        }
        
        // Initialize Git repo if it doesn't exist
        if (!is_dir($baseDir . '/.git')) {
            $log[] = "[GIT] Initializing new local Git repository...";
            exec('git init 2>&1', $cmdOut, $ret);
            $log = array_merge($log, array_map(fn($l) => "[GIT OUT] " . $l, $cmdOut));
            
            if ($ret !== 0) {
                $log[] = "[ERROR] Failed to initialize local Git repository.";
                echo json_encode(['success' => false, 'log' => $log]);
                exit;
            }
        }
        
        // Check/configure remote
        unset($cmdOut);
        exec('git remote -v', $cmdOut, $ret);
        $hasOrigin = false;
        if ($ret === 0) {
            foreach ($cmdOut as $line) {
                if (strpos($line, 'origin') !== false) {
                    $hasOrigin = true;
                    break;
                }
            }
        }
        
        $repoUrl = GITHUB_REPO_URL;
        if (!$hasOrigin) {
            $log[] = "[GIT] Setting remote 'origin' to: " . $repoUrl;
            unset($cmdOut);
            exec("git remote add origin " . escapeshellarg($repoUrl) . " 2>&1", $cmdOut, $ret);
            if ($ret !== 0) {
                $log[] = "[ERROR] Failed to add remote origin.";
                $log = array_merge($log, array_map(fn($l) => "[GIT ERR] " . $l, $cmdOut));
                echo json_encode(['success' => false, 'log' => $log]);
                exit;
            }
        } else {
            $log[] = "[GIT] Remote 'origin' is already set. Updating remote URL to: " . $repoUrl;
            unset($cmdOut);
            exec("git remote set-url origin " . escapeshellarg($repoUrl) . " 2>&1", $cmdOut, $ret);
        }
        
        // Fetch and hard reset to override all local files with GitHub version
        $log[] = "[GIT] Fetching all updates from remote origin...";
        unset($cmdOut);
        exec("git fetch --all 2>&1", $cmdOut, $ret);
        $log = array_merge($log, array_map(fn($l) => "[GIT OUT] " . $l, $cmdOut));
        
        if ($ret !== 0) {
            $log[] = "[ERROR] Failed to fetch from remote repository.";
            echo json_encode(['success' => false, 'log' => $log]);
            exit;
        }
        
        // Determine branch name (checks if main or master)
        $branch = 'main';
        unset($cmdOut);
        exec("git branch -r 2>&1", $cmdOut, $ret);
        $branches = implode("\n", $cmdOut);
        if (strpos($branches, 'origin/master') !== false && strpos($branches, 'origin/main') === false) {
            $branch = 'master';
        }
        
        $log[] = "[GIT] Hard resetting local branch to match origin/" . $branch . "...";
        unset($cmdOut);
        exec("git reset --hard origin/" . $branch . " 2>&1", $cmdOut, $ret);
        $log = array_merge($log, array_map(fn($l) => "[GIT OUT] " . $l, $cmdOut));
        
        if ($ret === 0) {
            $log[] = "[SUCCESS] Site successfully updated via Git on branch '" . $branch . "'!";
            echo json_encode(['success' => true, 'log' => $log]);
        } else {
            $log[] = "[ERROR] Git reset --hard failed.";
            echo json_encode(['success' => false, 'log' => $log]);
        }
        break;

    case 'update_zip':
        $log[] = "[ZIP] Initiating Zipball-based update...";
        
        if (!class_exists('ZipArchive')) {
            $log[] = "[ERROR] PHP ZipArchive extension is not enabled. Cannot extract updates.";
            echo json_encode(['success' => false, 'log' => $log]);
            exit;
        }
        
        $zipUrl = GITHUB_ZIP_URL;
        $tempZip = $baseDir . '/temp_update_' . time() . '.zip';
        $tempExtractDir = $baseDir . '/temp_extract_' . time();
        
        $log[] = "[ZIP] Downloading repository zipball from GitHub: " . $zipUrl;
        
        // Setup secure stream context with User-Agent (GitHub requires it!)
        $options = [
            'http' => [
                'method' => 'GET',
                'header' => "User-Agent: EduSpark-Updater/1.0\r\n"
            ],
            'ssl' => [
                'verify_peer' => false, // Bypass local SSL certificate validation issues
                'verify_peer_name' => false,
            ]
        ];
        $context = stream_context_create($options);
        
        $zipData = @file_get_contents($zipUrl, false, $context);
        if ($zipData === false) {
            // Try downloading with a fallback branch url (master)
            $zipUrl = str_replace('/main.zip', '/master.zip', $zipUrl);
            $log[] = "[ZIP] Failed to download main branch. Retrying with master branch URL: " . $zipUrl;
            $zipData = @file_get_contents($zipUrl, false, $context);
        }
        
        if ($zipData === false) {
            $log[] = "[ERROR] Could not download Zip file from GitHub. Check internet connection and make sure repository is public.";
            echo json_encode(['success' => false, 'log' => $log]);
            exit;
        }
        
        if (file_put_contents($tempZip, $zipData) === false) {
            $log[] = "[ERROR] Could not save temporary zipball file onto disk. Verify folder write permissions.";
            echo json_encode(['success' => false, 'log' => $log]);
            exit;
        }
        
        $log[] = "[ZIP] Temporary zipball saved successfully (" . number_format(strlen($zipData) / 1024, 1) . " KB). Extracting...";
        
        $zip = new ZipArchive;
        if ($zip->open($tempZip) === TRUE) {
            if (!mkdir($tempExtractDir, 0755, true)) {
                $log[] = "[ERROR] Could not create temporary folder to extract files.";
                @unlink($tempZip);
                echo json_encode(['success' => false, 'log' => $log]);
                exit;
            }
            
            $zip->extractTo($tempExtractDir);
            $zip->close();
            $log[] = "[ZIP] Extraction complete. Finding root files...";
            
            // GitHub zipballs contain a single root folder named like: <repo-name>-<branch>
            $subdirs = array_filter(glob($tempExtractDir . '/*'), 'is_dir');
            if (empty($subdirs)) {
                $log[] = "[ERROR] Extracted zipball structure is invalid or empty.";
                delete_directory($tempExtractDir);
                @unlink($tempZip);
                echo json_encode(['success' => false, 'log' => $log]);
                exit;
            }
            
            $extractedSourceDir = reset($subdirs);
            $log[] = "[ZIP] Copying and overwriting workspace files from: " . basename($extractedSourceDir);
            
            // Perform recursive copy
            recurse_copy($extractedSourceDir, $baseDir, $log, $baseDir);
            
            // Clean up temporary files
            $log[] = "[ZIP] Cleaning up temporary update directories and archives...";
            delete_directory($tempExtractDir);
            @unlink($tempZip);
            
            $log[] = "[SUCCESS] Site successfully updated via GitHub Zipball!";
            echo json_encode(['success' => true, 'log' => $log]);
        } else {
            $log[] = "[ERROR] Could not open/extract the downloaded Zip file.";
            @unlink($tempZip);
            echo json_encode(['success' => false, 'log' => $log]);
        }
        break;

    default:
        echo json_encode(['success' => false, 'log' => ['[ERROR] Invalid action requested.']]);
        break;
}
