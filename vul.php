<?php
// vulnerable_login.php
// WARNING: This code is highly insecure and for educational testing purposes only.

// 1. **Vulnerable Code:** Retrieves user input directly from a POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Assume $mysqli is a valid connection to a database.
// This is the VULNERABLE part: The user input is concatenated directly into the SQL query string.

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'"; 
// Vulnerability: An attacker can change the logic of the query using special characters.

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "Login successful! Welcome, $username.";
    // Grant access...
} else {
    echo "Invalid credentials.";
}

// ... rest of the code
?>