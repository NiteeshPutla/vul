<?php
// vulnerable_login.php
// WARNING: This code is highly insecure and for educational testing purposes only.

// 1. **Vulnerable Code:** Retrieves user input directly from a POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Assume $mysqli is a valid connection to a database.
// FIXED: Using prepared statements to prevent SQL injection

$sql = "SELECT * FROM users WHERE username = ? AND password = ?"; 
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Login successful! Welcome, $username.";
    // Grant access...
} else {
    echo "Invalid credentials.";
}

// ... rest of the code
?>