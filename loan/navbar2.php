<?php
	session_start();
?>

<!-- Page Preloder -->
<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header Section -->
	<header class="header-section p-3" style="display:flex; justify-content:space-between;">
		<a href="index.html" class="site-logo">
			<img src="img/logo.png" alt="">
		</a>
		<div class="header-nav" style=" display:flex; align-items:center;">
			<ul class="main-menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="about-us.php">About Us</a></li>
				<li><a href="loans.php">Loans</a></li>
				<li><a href="news.php">News</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
			<div class="header-right" style="margin-right: 50px;">
				<!-- <a href="./admin_login.php" class="hr-btn login ">Admin</a> -->
				 <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) { ?>
					<a href="./login.html" class="hr-btn login ">Log In</a>
					<a href="./signup.html" class="hr-btn signup ">Sign Up</a>
				<?php }else{ if($_SESSION['role'] == 'User') {?>
					<a href="./user_profile.php">
						<div class="user" style="height: 50px; width:50px; background-color: crimson; cursor: pointer; border-radius: 100%; overflow: hidden; ">
							<img src="https://via.placeholder.com/100" alt="Profile Image">
						</div>
					</a>
				<?php }else{ ?>
					<a href="./logout.php" class="hr-btn login ">Log Out</a>
					<a href=".././admin/myadmin/index.php" class="hr-btn signup ">Admin Dashboard</a>
				<?php } ?>

				<?php } ?>
			</div>
		</div>
	</header>
	<!-- Header Section end -->