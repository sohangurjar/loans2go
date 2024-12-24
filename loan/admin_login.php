
<?php
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
    $query = "SELECT * FROM `admin`";
    $result = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($result)){
        if($row['Email'] == $email)
        {
            if($row['Password'] == $password)
            {
                header("Location: ../admin/myadmin/index.php");
            }
            else{
                echo "Invalid Email or Password";
            }
        }
        else{
            echo "User not found";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
     <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background: linear-gradient(135deg, #74ebd5, #ACB6E5);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-container {
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

.input-group {
    margin-bottom: 20px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #666;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

input:focus {
    border-color: #74ebd5;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.login-btn {
    width: 100%;
    padding: 10px;
    background-color: #74ebd5;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    color: white;
    cursor: pointer;
}

.login-btn:hover {
    background-color: #5ac4c2;
}

#error-message {
    color: red;
    margin-top: 10px;
}

     </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="#" method="post" id="loginForm">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-btn" name="submit">Login</button>
        </form>
        <div id="error-message"></div>
    </div>

    <script src="script.js"></script>
</body>
</html>
