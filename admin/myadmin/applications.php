<?php
     // Establish database connection
     $con = mysqli_connect("localhost", "root", "", "sohan");

     // Check if the connection was successful
     if(!$con) {
         die("Connection failed: " . mysqli_connect_error());
     }

    $result = mysqli_query($con, "SELECT * FROM applications");
    $num_rows = mysqli_num_rows($result);
    if (isset($_POST['approve'])) {
        $id = $_POST['approve'];
        $query = "UPDATE applications SET `Status` = 'Approved' WHERE `app_id` = '$id'";
        if(mysqli_query($con, $query)){
            header("Location: ./applications.php"); 
            exit();
          } else {
              echo "Error: " . mysqli_error($con);
          }
    }
    if (isset($_POST['deny'])) {
        $id = $_POST['deny'];
        $query = "UPDATE applications SET `Status` = 'Denied' WHERE `app_id`='$id'";
        if(mysqli_query($con, $query)){
            header("Location: ./applications.php"); 
            exit();
          } else {
              echo "Error: " . mysqli_error($con);
          }
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
                    <div class="page-header">
                        <h3 class="page-title"> Application Table </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><?php echo "Number of Applications: " . $num_rows; ?></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">


                    <!-- Main panel -->
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Applications</h4>
                                <!-- <p class="card-description"> Add class <code>.table-hover</code>
                                </p> -->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th>Id</th>
                                                <th>User</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Loan Id</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        // Fetch the next row of a result set as an associative array
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                                            <tr>
                                            <td><?php echo $row['app_id']?></td>
                                                <td><?php echo $row['Name']?></td>
                                                <td><?php echo $row['Email']?></td>
                                                <td><?php echo $row['Phone']?></td>
                                                <td><?php echo $row['Time']?></td>

                                                <td><label class="badge badge-<?php if($row['Status'] == "Approved") { echo "success"; } else{ echo "danger"; } ?>"><?php echo $row['Status']?></label></td>
                                                <td>
                                                    <?php if($row['Status'] == "Pending") { ?>
                                                    <form action="#" method="post">
                                                        <button type="submit" name="approve" value="<?php echo $row["app_id"]; ?>" class="btn btn-success">Approve</button>
                                                        <button type="submit" name="deny" value="<?php echo $row["app_id"]; ?>" class="btn btn-danger">Deny</button>
                                                    </form>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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