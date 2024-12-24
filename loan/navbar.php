<?php
session_start();
// Establish connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_SESSION['loggedin'])) {
    $id = $_SESSION["user_id"];
    $result = mysqli_query($con, "SELECT * FROM user WHERE Id='$id'");
    $row = mysqli_fetch_assoc($result);
    $name = $row["Name"];
    $email = $row["Email"];
    $phone = $row["Phone"];
    $image = $row["Image"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Modal</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        a{
            text-decoration: none;
        }
        .modal-body {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .profile-image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-image-container img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .profile-info-container {
            flex: 2;
            margin-left: 20px;
        }

        .info-label {
            font-weight: bold;
        }

        .info-box {
            background-color: #f8f9fa;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Page Preloader -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section -->
    <header class="header-section p-3" style="display:flex; justify-content:space-between;">
        <a href="index.html" class="site-logo">
            <img src="img/logo.png" alt="">
        </a>
        <div class="header-nav" style="display:flex; align-items:center;">
            <ul class="main-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="loans.php">Loans</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="header-right" style="margin-right: 50px;">
                <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) { ?>
                    <a href="./login.html" class="hr-btn login">Log In</a>
                    <a href="./signup.html" class="hr-btn signup">Sign Up</a>
                <?php } else { 
                    if ($_SESSION['role'] == 'User') { ?>
                        <div style="cursor: pointer;" class="user" data-bs-toggle="modal" data-bs-target="#profileModal">
                            <img src=".././admin/myadmin/uploads/<?php echo $image ?>" alt="Profile Image" style="height: 50px; width:50px; border-radius: 100%; overflow: hidden;">
                        </div>
                    <?php } else { ?>
                        <a href="./logout.php" class="hr-btn login">Log Out</a>
                        <a href=".././admin/myadmin/index.php" class="hr-btn signup">Admin Dashboard</a>
                    <?php } 
                } ?>
            </div>
        </div>
    </header>
    <!-- Header Section end -->

    <!-- User Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Profile Image -->
                    <div class="profile-image-container">
                        <img src=".././admin/myadmin/uploads/<?php echo $image ?>" alt="Profile Image">
                    </div>
                    
                    <!-- User Information -->
                    <div class="profile-info-container">
                        <div class="info-box">
                            <span class="info-label">Name:</span> <?php echo $name ?>
                        </div>
                        <div class="info-box">
                            <span class="info-label">Email:</span> <?php echo $email ?>
                        </div>
                        <div class="info-box">
                            <span class="info-label">Phone:</span> <?php echo $phone ?>
                        </div>
                    </div>
                </div>
                
                <!-- Modal Footer -->
                <div class="modal-footer d-flex justify-content-between">
                <a href="./update_profile.php" class="btn btn-primary">Update</a>
                    <a href="./logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Required JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
