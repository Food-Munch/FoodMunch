<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the SQLite database
    $db = new SQLite3('users.db'); // Adjust this path if necessary
    
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Query the database for the user
    $stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    
    $user = $result->fetchArray(SQLITE3_ASSOC);
    
    if ($user && password_verify($password, $user['password'])) {
        // Correct password
        $_SESSION['username'] = $user['username']; // Store username in session
        header('Location: dashboard.php'); // Redirect to a protected page (e.g., dashboard)
    } else {
        // Incorrect login
        echo "<p>Invalid username or password</p>";
    }
}
?>
