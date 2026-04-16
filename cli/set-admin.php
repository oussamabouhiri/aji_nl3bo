<?php
/**
 * CLI Script to set an admin user
 * Usage: php set-admin.php <name> <email> <password>
 * 
 * Example: php set-admin.php "Admin User" "admin@example.com" "secretpassword"
 */

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\UserModel;

if (php_sapi_name() !== 'cli') {
    die("This script can only be run from command line.\n");
}

if ($argc < 4) {
    echo "Usage: php set-admin.php <name> <email> <password>\n";
    echo "Example: php set-admin.php \"Admin User\" \"admin@example.com\" \"secretpassword\"\n";
    exit(1);
}

$name = $argv[1];
$email = $argv[2];
$password = $argv[3];

echo "Setting up admin user...\n";
echo "Name: $name\n";
echo "Email: $email\n";

$userModel = new UserModel();
$result = $userModel->setAdmin($name, $email, $password);

if ($result) {
    echo "Success! Admin user created/updated with ID: $result\n";
} else {
    echo "Failed to create admin user. Check error logs.\n";
    exit(1);
}
