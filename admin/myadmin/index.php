<?php
// Establish connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user WHERE `role` = 'User'";
$result = mysqli_query($con, $sql);


$num_rows = mysqli_num_rows($result);
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
                    <div class="page-header">
                        <h3 class="page-title">Dashboard</h3>
                        
                    </div>
                    <div class="row">
                    <!-- Main panel -->
                    <div class="row col-lg-12 grid-margin stretch-card m-auto">
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-9">
                                  <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?php echo $num_rows; ?></h3>
                                  </div>
                                </div>
                                <div class="col-3">
                                  <div class="icon icon-box-success ">
                                    <span class="mdi mdi-account icon-item"></span>
                                  </div>
                                </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Users</h6>
                            </div>
                          </div>
                        </div>
<?php
$sql = "SELECT * FROM applications";
$result = mysqli_query($con, $sql);
?>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-9">
                                  <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?php echo $result->num_rows; ?></h3>
                                  </div>
                                </div>
                                <div class="col-3">
                                  <div class="icon icon-box-success">
                                    <span class="mdi mdi-application icon-item"></span>
                                  </div>
                                </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Applications</h6>
                            </div>
                          </div>
                        </div>
                        <?php
$sql = "SELECT * FROM loans";
$result = mysqli_query($con, $sql);
?>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-9">
                                  <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?php echo $result->num_rows; ?></h3>
                                  </div>
                                </div>
                                <div class="col-3">
                                  <div class="icon icon-box-success">
                                    <span class="mdi mdi-briefcase icon-item"></span>
                                  </div>
                                </div>
                              </div>
                              <h6 class="text-muted font-weight-normal">Loans</h6>
                            </div>
                          </div>
                        </div>
                      </div>

                        




                       
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            loans2go.com 2024</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
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

