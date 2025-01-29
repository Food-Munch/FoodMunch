<?php
// Connect to the SQLite database
$db = new SQLite3('users.db'); // Adjust this path if necessary

// Query to select all users from the database
$query = "SELECT id, username, password FROM users"; // We exclude the hashed password for display
$results = $db->query($query);

// Check if the query returned any results
if ($results) {
    echo "<h1>Registered Users</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password (hashed)</th>
            </tr>";
    
    // Loop through the results and display each row
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['username']) . "</td>
                <td>" . htmlspecialchars($row['password']) . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No users found.";
}

$db->close(); // Close the database connection
?>
