<?php
// Establish connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "connection done";
}
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    
    // Encrypt the password using bcrypt
    // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
        // Insert the user into the database
        $query = "INSERT INTO query (`Name`, Email, `Subject`, `Message`) VALUES ('$name', '$email', '$subject', '$message')";
        
        if (mysqli_query($con, $query)) {
            echo "Query Sent!";
            header("Location: ./index.php");  // Redirect to login page after registration
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    
}
else{
    echo "not submitted";
}
?>
