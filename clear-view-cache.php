<?php
$storage_path = __DIR__ . '/storage';
$framework_path = $storage_path . '/framework';
$views_path = $framework_path . '/views';

echo "=== Laravel Cache Clear Script ===\n";
echo "Script started at: " . date('Y-m-d H:i:s') . "\n\n";

echo "1. Current Directory: " . __DIR__ . "\n";
echo "2. Storage Path: " . $storage_path . "\n";
echo "3. Framework Path: " . $framework_path . "\n";
echo "4. Views Path: " . $views_path . "\n";

// Check if views directory exists
if (!is_dir($views_path)) {
    echo "❌ Views cache directory not found at: " . $views_path . "\n";
    exit(1);
}

// Check permissions
if (!is_writable($views_path)) {
    echo "❌ Views directory is not writable: " . $views_path . "\n";
    echo "   Current permissions: " . substr(sprintf('%o', fileperms($views_path)), -4) . "\n";
}

// List all cached view files
$view_files = glob($views_path . '/*.php');
echo "\n5. Found " . count($view_files) . " cached view files\n";

// Clear the cache
$deleted = 0;
foreach ($view_files as $file) {
    if (is_file($file)) {
        $filename = basename($file);
        if (@unlink($file)) {
            echo "✅ Deleted: " . $filename . "\n";
            $deleted++;
        } else {
            echo "❌ Failed to delete: " . $filename . " (Permission denied)\n";
            echo "   File path: " . $file . "\n";
        }
    }
}

// Check if we deleted anything
if ($deleted > 0) {
    echo "\n✅ Success! Deleted " . $deleted . " cached view file(s)\n";
    
    // Check if storage/framework/views directory is now empty
    $remaining_files = glob($views_path . '/*.php');
    if (empty($remaining_files)) {
        echo "✅ Views cache directory is now empty\n";
    } else {
        echo "⚠️ Warning: " . count($remaining_files) . " file(s) remain in the views cache\n";
    }
} else {
    echo "\n⚠️ No view files were deleted (either no files or permissions issue)\n";
    echo "   Check if the views directory has the correct permissions\n";
}

// Try to create a test file to check if we can write to the directory
$test_file = $views_path . '/test-permission.txt';
if (@file_put_contents($test_file, "Permission test file - " . date('Y-m-d H:i:s'))) {
    echo "✅ Write permission test successful: " . basename($test_file) . "\n";
    @unlink($test_file);
} else {
    echo "❌ Write permission test failed: " . $test_file . "\n";
}

echo "\n\n=== System Information ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "OS: " . PHP_OS . "\n";
echo "User: " . get_current_user() . "\n";
echo "Current Directory Permissions: " . substr(sprintf('%o', fileperms(__DIR__)), -4) . "\n";
echo "Storage Permissions: " . substr(sprintf('%o', fileperms($storage_path)), -4) . "\n";
echo "Views Permissions: " . substr(sprintf('%o', fileperms($views_path)), -4) . "\n";
?>