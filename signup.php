<?php
// Include database connection
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security
    $email = $_POST['email'];
    
    // Insert user data into database
    $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    
    if (mysqli_query($conn, $query)) {
        echo "Signup successful!";
        // Redirect to login page or wherever needed
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
