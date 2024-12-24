
<?php
session_start();
// Establish connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    


    // Fetch the user from the database
    $query = "SELECT * FROM user WHERE `Email` = '$email'";
    $result = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if($num_rows > 0)
    {
        if($row['Pass'] == $password)
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $row['Email'];
            $_SESSION['name'] = $row['Name'];
            $_SESSION['user_id'] = $row['Id'];
            $_SESSION['role'] = $row['Role'];

            header("Location: ./index.php");
        }
        else{
            echo "Invalid Email or Password";
        }
    }
    else{
        echo "User not found";
    }


    // while($row = mysqli_fetch_assoc($result)){
    //     if($row['Email'] == $email)
    //     {
    //         if($row['Pass'] == $password)
    //         {
    //             header("Location: ./index.php");
    //         }
    //         else{
    //             echo "Invalid Email or Password";
    //         }
    //     }
    //     else{
    //         echo "User not found";
    //     }
    // }
}
?>
