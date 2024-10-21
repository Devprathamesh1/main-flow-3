<?php
// Include database connection
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check user credentials
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            echo "Login successful!";
            // Redirect to dashboard or wherever needed
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
    
    mysqli_close($conn);
}
?>
