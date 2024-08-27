<?php 
session_start();
if(! ($_SESSION['loggedin'])){
	header("location:/login.php");
	exit();
}

	include("config.php");
	$u_id = $_SESSION['u_id'];
	$RUN = mysqli_query($con,"SELECT * FROM user_details WHERE u_id='$u_id'");
	$row = mysqli_fetch_assoc($RUN);
	
?>
<html>
	<head>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		<script>
			function openNav() {
  			document.getElementById("mySidenav").style.width = "250px";

			}

			function closeNav() {
  			document.getElementById("mySidenav").style.width = "0";
  			document.getElementById("containers").style.marginLeft= "0";
  			document.body.style.backgroundColor = "white";
			}
		</script>
		
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div id="sidenavside" style="margin-top:20px">
			<div class="account-profile" onclick="window.location.href = 'profile.php';">
				<div class="account-content">
				<div class="content-left">
					<div class="left-avatar">
						<img src="images/avatar.png" width=40px height=40px style="padding-right:8px">
					</div>
					<div class="mail">
					<span style="font-size: 12px;padding-bottom: 2px;"><?php echo $row['mail_id']; ?></span><br>
					<span style="font-size: 10px;">Profile</span>
					</div>
				</div>
				<div class="content-right">
					<img src="images/right-arrow.png" width=30px height=30px style="vertical-align: 60px;">
				</div>
				</div>
			</div>
			<div class="bottom">
  			<a href="cv.html">Create CV</a>
  			<a href="privacy.html">Privacy Policy</a>
			<a href="help.php">Help Center</a>
			<a href="logout.php">LOG OUT</a>
  			</div>
  		</div>
		</div>
		<div class="container" id="containers">
			<div class="logo-top">
				<div id="logo">
					<img style="padding-top:10px" src="images/logo.jpg" width=30px height=30px>
					<b style="vertical-align: 5px;">ZipJobs</b>
				<div id="contact-us">
					<a href="https://www.youtube.com/"><img src="images/youtube.png" width=30px height=30px></a>
					<a href="https://www.facebook.com/"><img src="images/facebook.png" width=30px height=30px></a>
					<a href="https://www.instagram.com/"><img src="images/instagram.png" width=30px height=30px></a>
					<a href="https://www.twitter.com/"><img src="images/twitter.png" width=30px height=30px></a>
				</div>
				</div>
				</div>
			</div>
			<div class="navbar1">
				<div id="menu">
					<div id="menu-icon">
						<img src="images/option.png" onclick="openNav()" width=40px height=40px>
					</div>
					<div id="menu-options">
						<a href="index.php">HOME</a>
						<a href="explore.php">EXPLORE</a>
						<a href="myjobs.php">RECENT SEARCHES</a>
						<a href="about.html">ABOUT</a>
					</div>
				</div>
			</div>
			<div class="search-bar">
				<div class="bar">
					<h2>Find A Job ! </h2>
					<form action=search.php method=GET> 
					<input name="search-text" placeholder="Search based on Company Name">
					<select name="search-sector">
						<option name="data science">Data Science</option>
						<option name="marketing">Marketing</option>
						<option name="software-developer">Software Developer</option>
						<option name="information-security-analyst">Information Technology Analyst</option>
					</select> 
					<button type="submit">Find</button>
				</form>
				</div>
			</div>
			<div class="top-companies">
				<div class="top-companies-head">
					Top Companies
				</div>
				<div class="top-companies-list">
					<div class="top-company" id="top1">
						<div class="company-logo">
							<img src="images/company/company-light.png" width=40px height="40px">
						</div>
						<div class="review">
							<div class="name">Light & Wonder
								</div>
							<div class="star"><img src="images/star.png" width=25px height=25px><span style="display:inline-block;">4.0</span><br> 176K+ Reviews
								</div>
						</div><br>
						<div class="company-motto">
							Leading Cross-Platform Global Games Company.
						</div>
						<div class="view-job-button">
							<button type="button"><a style="text-decoration: none;color:white;" href="company-light&wonder.php">View Job</a></button>
						</div>
					</div>
					<div class="top-company" id="top2">
						<div class="company-logo">
							<img src="images/company/company-datamatics.png" width=40px height="40px">
						</div>
						<div class="review">
							<div class="name">Datamatics
								</div>
							<div class="star"><img src="images/star.png" width=25px height=25px><span style="display:inline-block;">3.7</span><br> 1.4K+ Reviews
								</div>
						</div><br>
						<div class="company-motto">
							Global Digital Solutions and Technologies Company.
						</div>
						<div class="view-job-button">
							<button type="button"><a style="text-decoration: none;color:white;" href="company-datamatics.php">View Job</a></button>
						</div>
					</div>
					<div class="top-company" id="top3">
						<div class="company-logo">
							<img src="images/company/company-persistent.png" width=40px height="40px">
						</div>
						<div class="review">
							<div class="name">Persistent
								</div>
							<div class="star"><img src="images/star.png" width=25px height=25px><span style="display:inline-block;">4.0</span><br> 2.1K+ Reviews
								</div>
						</div><br>
						<div class="company-motto">
							Trusted Global Solutions Company.
						</div>
						<div class="view-job-button">
							<button type="button"><a style="text-decoration: none;color:white;" href="company-persistent.php">View Job</a></button>
						</div>
					</div>
					<div class="top-company" id="top4">
						<div class="company-logo">
							<img src="images/company/company-jio.png" width=40px height="40px">
						</div>
						<div class="review">
							<div class="name">Jio
								</div>
							<div class="star"><img src="images/star.png" width=25px height=25px><span style="display:inline-block;">4.0</span><br> 16.8K+ Reviews
								</div>
						</div><br>
						<div class="company-motto">
							India's Largest 4G Provider Company.
						</div>
						<div class="view-job-button">
							<button type="button"><a style="text-decoration: none;color:white;" href="company-jio.php">View Job</a></button>
						</div>
					</div>
					<div class="top-company" id="top5">
						<div class="company-logo">
							<img src="images/company/company-reliance.png" width=40px height="40px">
						</div>
						<div class="review">
							<div class="name">Reliance Industries
								</div>
							<div class="star"><img src="images/star.png" width=25px height=25px><span style="display:inline-block;">4.0</span><br> 11K+ Reviews
								</div>
						</div><br>
						<div class="company-motto">
							Indian Multinational Conglomerate Company.
						</div>
						<div class="view-job-button">
							<button type="button"><a style="text-decoration: none;color:white;" href="company-reliance_industries.php">View Job</a></button>
						</div>
					</div>
				</div>
			</div>
			<div class="copyrights">
				<div class="content">
					&#169; 2023 ZipJobs All Rights Reserved.
				</div>
			</div>
		</div>
	</body>
</html>