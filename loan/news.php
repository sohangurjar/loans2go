<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "sohan");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOANS2GO | Loans HTML Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="loans HTML Template">
	<meta name="keywords" content="loans, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
 
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	
<?php include 'navbar.php' ?>

	<!-- Page top Section end -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/3.jpg">
		<div class="container">
			<h2>News</h2>
			<nav class="site-breadcrumb">
				<a class="sb-item" href="#">Home</a>
				<span class="sb-item active">News</span>
			</nav>
		</div>
	</section>
	<!-- Page top Section end -->

	<!-- Blog Section end -->
	<section class="blog-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<?php $sql = "SELECT * FROM news";
$result = mysqli_query($con, $sql); 
					   while($row = mysqli_fetch_assoc($result)) {
						$timestamp = $row['Time'];
						$date = new DateTime($timestamp);
						$formattedDate = $date->format('M d, Y');
					?>
					<div class="blog-post">
						<img src=".././admin/myadmin/thumbnail/<?php echo $row['Image'] ?>" alt="">
						<div class="blog-date"><?php echo $formattedDate; ?></div>
						<h2 class="blog-title"><?php echo $row['Title']; ?></h2>
						<a href="./article.php?id=<?php echo $row['Id']; ?>" class="readmore">Read More <img src="img/arrow.png" alt=""></a>
					</div>
					<?php } ?>
				</div>
				<div class="col-lg-4 col-md-6 sidebar" style="position: relative;">
					<!-- <div class="sb-widget">
						<form class="search-form">
							<input type="text" placeholder="">
							<button><img src="img/search-icon.png" alt=""></button>
						</form>
					</div>
					<div class="sb-widget">
						<h2 class="sb-title">Categories</h2>
						<ul>
							<li><a href="#">Loans</a></li>
							<li><a href="#">Credit Cards</a></li>
							<li><a href="#">Quick Loans</a></li>
							<li><a href="#">Uncategorized</a></li>
						</ul>
					</div>
					<div class="sb-widget">
						<h2 class="sb-title">Categories</h2>
						<ul>
							<li><a href="#">April 2019</a></li>
							<li><a href="#">March 2019</a></li>
							<li><a href="#">February 2019</a></li>
							<li><a href="#">January 2019</a></li>
							<li><a href="#">December 2018</a></li>
						</ul>
					</div>
					<div class="sb-widget">
						<h2 class="sb-title">Categories</h2>
						<div class="tags">
							<a href="#">tips & triks</a>
							<a href="#">quick loans</a>
							<a href="#">tips</a>
							<a href="#">car loan</a>
							<a href="#">wedding loan</a>
							<a href="#">holliday loans</a>
							<a href="#">credit & loans</a>
						</div>
					</div>
					<div class="sb-widget">
						<a href="#" class="add">
							<img src="img/add.jpg" alt="">
						</a>
					</div> -->
                    <div style="height: 100vh; position: sticky; top: 0; background-color: white;">

					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Blog Section end -->

	<!-- Score Section end -->
	<section class="score-section text-white set-bg" data-setbg="img/score-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-8">
					<h2>Calculate my Score</h2>
					<h4>Check your credit reports as often as you want, it won't affect your scores.</h4>
					<a href="#" class="site-btn sb-big">show my score</a>
				</div>
			</div>
			<img src="img/hand.png" alt="" class="hand-img">
		</div>
	</section>
	<!-- Score Section end -->

	<?php include 'footer.php' ?>
	
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	

	</body>
</html>
