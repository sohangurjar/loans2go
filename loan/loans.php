<?php

// Establish connection
$con = mysqli_connect("localhost", "root", "", "sohan");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOANS2GO | Loans HTML Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="Loans HTML Template">
    <meta name="keywords" content="loans, html, finance">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">

    <!-- Vendor Stylesheets -->
    <link rel="stylesheet" href=".././admin/myadmin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href=".././admin/myadmin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href=".././admin/myadmin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href=".././admin/myadmin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href=".././admin/myadmin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href=".././admin/myadmin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">

    <!-- Custom Layout Styles -->
    <link rel="stylesheet" href=".././admin/myadmin/assets/css/style.css">

    <!-- Project Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <?php include 'navbar.php'; ?>

    <!-- Page Top Section -->
    <section class="page-top-section set-bg" data-setbg="img/page-top-bg/2.jpg">
        <div class="container">
            <h2>Loans</h2>
            <nav class="site-breadcrumb">
                <a class="sb-item" href="#">Home</a>
                <span class="sb-item active">Loans</span>
            </nav>
        </div>
    </section>
    <!-- Page Top Section End -->

    <!-- Loans Section -->
    <section class="loans-section spad">
        <div class="row" style="margin: 0 50px; display: flex; gap: 50px; flex-wrap: wrap;">
            <?php 
            
$sql = "SELECT * FROM loans";
$result = mysqli_query($con, $sql); 
            if (mysqli_num_rows($result) === 0) { ?>
                <p>No records found.</p>
            <?php } else { ?>
                <?php
				
					while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="card" style="width: 30%; padding: 10px; padding-bottom: 30px; background-color: #22242B;">
                        <div class="loantype" style="margin-bottom: 5px;">
                            <h4 style="color: white; opacity: 0.8;"><?php echo $row['type']; ?></h4>
                        </div>
                        <div class="bankname">
                            <h2 style="color: white;"><?php echo $row['bank']; ?></h2>
                        </div>
                        <div class="interest">
                            <p style="color: white; opacity: 0.5;">Interest rate: <?php echo $row['interest']; ?>%</p>
                        </div>
                        <div class="submit">
                        <?php
                            $href = (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
                                ? './login.html'
                                : './loan_form.php?id=' . $row['Loan Id'];
                            ?>
                            <a href="<?php echo $href; ?>" class="btn btn-fw" style="background-color: #F43F00; color: white;">Apply</a>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </section>
    <!-- Loans Section End -->

    <!-- Loans Calculator Section -->
    <section class="loans-calculator-section spad">
        <div class="container">
            <div class="text-center text-white mb-5 pb-3">
                <h2>How much do you want to borrow?</h2>
            </div>
            <div class="loans-calculator">
                <div id="lc-dec" class="lc-control-btn">-</div>
                <div id="lc-inc" class="lc-control-btn ici">+</div>
                <div class="slider-input-warp">
                    <div id="slider-range-max" class="slider">
                        <div class="ui-slider-handle"><span id="loan-value">$1000</span></div>
                    </div>
                </div>
                <div class="calculator-scale">
                    <span></span><span></span><span></span><span></span><span></span>
                </div>
                <div class="lone-values">
                    <div class="lone-value">$1000</div>
                    <div class="lone-value lv-step">$10,000</div>
                </div>
                <div class="ls-result">Weekly payments: <span id="lone-emi">$19</span></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <div class="text-center">
                    <a href="#" class="site-btn mr-0 mr-sm-2 mt-4">Apply right now!</a>
                    <a href="#" class="site-btn sb-dark mt-4">See other loans</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Loans Calculator Section End -->

    <?php include 'footer.php'; ?>

    <!-- JavaScript and JQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
