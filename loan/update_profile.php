<?php 
    session_start();
    // Establish connection
    $con = mysqli_connect("localhost", "root", "", "sohan");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the current logged-in user ID from the session
    $user_id = $_SESSION['user_id'];


    $sql = "SELECT * FROM user WHERE Id='$user_id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) {
        // Get the updated values from the form
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        
        // Retrieve the current logged-in user ID from the session
        $user_id = $_SESSION['user_id'];
        
        // Update the user's details in the database
        $update_query = "UPDATE user SET `Name`='$name', Email='$email', Phone='$phone' WHERE Id='$user_id'";
        
        if (mysqli_query($con, $update_query)) {
            // If the update is successful, redirect to the profile page with a success message
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit;
        } else {
            // If the update fails, display an error message
            echo "Error updating profile: " . mysqli_error($con);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            background-color: #000000;
            border-radius: 10px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 30vw;
        }

        .profile-header {
            background-color: #191C24;
            padding: 20px;
            text-align: center;
            color: white;
        }

        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid white;
            margin-bottom: 10px;
        }

        .profile-header h2 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .profile-header p {
            font-size: 14px;
            color: white;
        }

        .profile-details {
            padding: 20px;
        }

        .profile-details h3 {
            margin-bottom: 15px;
            font-size: 18px;
            color: white;
            border-bottom: 2px solid #f4f7fc;
            padding-bottom: 10px;
        }

        .profile-form .form-group {
            margin-bottom: 15px;
        }

        .profile-form label {
            font-size: 14px;
            color: white;
            margin-bottom: 5px;
            display: block;
        }

        .profile-form input[type="text"],
        .profile-form input[type="email"],
        .profile-form input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            background-color: #191C24;
            color: white;
        }

         .btn {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .home{
            background: blueviolet;
            text-decoration: none;
            /* width: 30%; */
            display: inline-block;
            padding: 10px;
            text-align: center;
            color: white;
            margin-top: 10px;
            border-radius: 5px;
        }

        .profile-form button:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>
    <div class="profile-container">
        <!-- Profile Header with Image -->
        <div class="profile-header">
            <img src="https://via.placeholder.com/100" alt="Profile Image">
            <h2><?php echo $row["Name"]; ?></h2>
            <p><?php echo $row["Email"]; ?></p>
        </div>

        <!-- Profile Details Section with Form -->
        <div class="profile-details">
            <h3>Update Profile</h3>
            <form action="#" method="POST" class="profile-form">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $row["Name"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row["Email"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo $row["Phone"]; ?>" required>
                </div>
                <button type="submit" class="btn" name="submit">Save Changes</button>
            </form>
        </div>
    </div>

</body>

</html>
