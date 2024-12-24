<?php
session_start();
// Establish connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// Retrieve the current logged-in user ID from the session
// print_r($_SESSION);
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
} else {
    die("User ID is not set in the session."); // Handle case when user ID is not set
}



$sql = "SELECT * FROM user WHERE Id='$id'";
$result = mysqli_query($con,$sql);
if ($result) {
    $row1 = mysqli_fetch_assoc($result);
} else {
    die("Query failed: " . mysqli_error($con)); // Handle query error
}

// Check if user data was retrieved
if (!$row1) {
    die("No user found with the provided ID.");
}



if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];  // Temporary file path
        $target_file = "./uploads/" . $image;  // Full path for saving

        if (move_uploaded_file($tmp_name, $target_file)) {
            // Insert the file name into the database
            $query = "UPDATE user SET `Name`='$name', Email='$email', Phone='$phone', `Role`='$role', `image`='$image' WHERE `Id`='$id'";
            
        } else {
            echo "Failed to upload file.";
        }
    } else{
        $query = "UPDATE user SET `Name`='$name', Email='$email', Phone='$phone', `Role`='$role' WHERE `Id`='$id'";
    }

    // Encrypt the password using bcrypt
    // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the email already exists
    // $check_email = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
    
    if (mysqli_query($con, $query)) {
        header("Location: ./user_profile.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }


    // if (mysqli_num_rows($check_email) > 0) {
    //     echo "Email already exists. Please try another one.";
    // } else {
    //     // Insert the user into the database
    //     $query = "INSERT INTO user (`name`, email, phone, pass) VALUES ('$username', '$email', '$phone', '$password')";

    //     if (mysqli_query($con, $query)) {
    //         echo "Registration successful!";
    //         header("Location: login.html");  // Redirect to login page after registration
    //         exit();
    //     } else {
    //         echo "Error: " . mysqli_error($con);
    //     }
    // }
} else {
    echo "not submitted";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <?php include 'sidebar.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <?php include 'navbar.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- <div class="page-header">
                        <h3 class="page-title"> Basic Tables </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                            </ol>
                        </nav>
                    </div> -->
                    <div class="row">


                        <!-- Main panel -->
                        <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <!-- Profile Image -->
        <?php if(!$row1['Image']){
            $src = "https://via.placeholder.com/100";
        } else{
            $src = "./uploads/" . $row1['Image'];   
        }?>
        <img src="<?php echo $src; ?>" alt="User Image" class="rounded-circle mb-3 text-center" width="120" height="120" style="margin-left: 50%; transform: translateX(-50%);">
        
        <!-- User Information -->
        <h4 class="card-title text-center" style="margin-bottom: 2px;"><?php echo $row1["Name"]; ?></h4>
        <p class="text-muted text-center">Admin</p>
        <form action="#" method="post" enctype="multipart/form-data">
        <ul class="list-group list-group-flush">
          <li class="list-group-item bg-dark text-light">
            <strong>Name:</strong> <input type="text" name="name" value="<?php echo $row1["Name"]; ?>" />
          </li>
          <li class="list-group-item bg-dark text-light">
            <strong>Email:</strong> <input type="email" name="email" value="<?php echo $row1["Email"]; ?>" />
          </li>
          <li class="list-group-item bg-dark text-light">
            <strong>Phone:</strong> <input type="text" name="phone" value="<?php echo $row1["Phone"]; ?>" />
          </li>
          <li class="list-group-item bg-dark text-light">
            <strong>Profile Image:</strong> <input type="file" name="image" />
          </li>
          <li class="list-group-item bg-dark text-light">
            <strong>Role:</strong> <?php echo $row1["Role"]; ?>
            <select class="form-control form-control-lg" id="role" name="role">
                <option>Admin</option>
                <option>User</option>
            </select>
          </li>
          <li class="list-group-item bg-dark text-light">
          <button name="update" class="btn btn-primary btn-fw">Update</button>
          </li>
        </ul>
</form>
      </div>
    </div>
</div>







                        <!-- partial -->
                    </div>
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                                loans2go.com 2024</span>
                        </div>
                    </footer>
                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>