<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the SQLite database
    $db = new SQLite3('users.db'); // Adjust this path if necessary
    
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert the user into the database
    $stmt = $db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $stmt->bindValue(':password', $hashed_password, SQLITE3_TEXT);
    
    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: Could not register the user.";
    }
}
?>
