<?php
// Create SQLite database and users table
$db = new PDO('sqlite:users.db');  // Create database if it doesn't exist

// Create users table if it doesn't already exist
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    email TEXT NOT NULL
)");

echo "Database and users table created successfully!";
?>
