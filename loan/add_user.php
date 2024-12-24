<?php
session_start();
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
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];  // Temporary file path
    $target_file = ".././admin/myadmin/uploads/" . $image;  // Full path for saving
    
    
    // Check if the email already exists
    $check_email = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
    $check_phone = mysqli_query($con, "SELECT * FROM user WHERE Phone='$phone'");

    if (mysqli_num_rows($check_email) > 0) {
        echo "Email already exists. Please try another one.";
    } else if(mysqli_num_rows($check_phone) > 0){
        echo "<br>Phone Number already exists. Please try another one.";

    } else {
        if (move_uploaded_file($tmp_name, $target_file)) {
            // Insert the file name into the database
            $query = "INSERT INTO user (`name`, email, phone, pass, `image`) VALUES ('$name', '$email', '$phone', '$password', '$image')";
            if (mysqli_query($con, $query)) {
                echo "Registration successful!";
                header("Location: ./login.html"); 
                exit();
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Failed to upload file.";
        }
        // Insert the user into the database
        
        
        
    }
}
else{
    echo "not submitted";
}
?>
