<?php
// Establish connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "connection done";
}
$id = $_GET["id"];
if (isset($_POST['submit'])) {
    $interest = mysqli_real_escape_string($con, $_POST['interest']);
    $loantype = mysqli_real_escape_string($con, $_POST['loantype']);

    // Encrypt the password using bcrypt
    // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the email already exists
    // $check_email = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
    $query = "UPDATE loans SET `type`='$loantype', interest='$interest' WHERE `Loan Id`='$id'";
    if (mysqli_query($con, $query)) {
        echo "Loan Added!";
        header("Location: ./loans.php");
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
                                    <h4 class="card-title">Application Form</h4>
                                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                                    <form action="#" method="post" class="forms-sample">
                                        <div class="form-group row">
                                            <label for="loantype">Loan Type</label>
                                            <select class="form-control form-control-lg" id="loantype" name="loantype">
                                                <option>Home</option>
                                                <option>Car</option>
                                                <option>Personal</option>
                                                <option>Business</option>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="interest" class="col-sm-3 col-form-label">Interest Rate</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="interest" name="interest"
                                                    placeholder="Interest Rate">
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                                        <a href="loans.php" class="btn btn-dark">Cancel</a>
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