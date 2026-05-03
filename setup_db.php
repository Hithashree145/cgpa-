<?php
header('Content-Type: text/plain');
require_once 'config/database.php';

echo "=== CGPA Calculator Database Setup ===\n";

// Use default credentials to connect initially without database name to create it
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "\n");
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql) === TRUE) {
    echo "Database '" . DB_NAME . "' created or already exists.\n";
} else {
    die("Error creating database: " . $conn->error . "\n");
}

$conn->select_db(DB_NAME);

// Read schema.sql
$schemaFile = 'database/schema.sql';
if (!file_exists($schemaFile)) {
    die("Error: schema.sql not found in database directory.\n");
}

$sql = file_get_contents($schemaFile);

// Remove comments and execute multi-queries
$queries = explode(';', $sql);
$successCount = 0;
$errorCount = 0;

foreach ($queries as $query) {
    $query = trim($query);
    if (!empty($query)) {
        if ($conn->query($query) === TRUE) {
            $successCount++;
        } else {
            // Check if it's just a duplicate entry error which is fine for setup
            if ($conn->errno != 1060 && $conn->errno != 1062) { 
                echo "Error executing: " . substr($query, 0, 50) . "... Error: " . $conn->error . "\n";
                $errorCount++;
            } else {
                $successCount++;
            }
        }
    }
}

echo "Setup completed!\n";
echo "Successful queries: $successCount\n";
echo "Errors: $errorCount\n";
echo "You can now login to the application.\n";

$conn->close();
?>
