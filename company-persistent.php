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
		<link rel="stylesheet" href="css/companies/company-jio.css">
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
			<div class="company-jio">
				<div class="background">
					<img src="images/cover_company/persistent_back.jpg" height=333px width="1350">
				</div>
				<div class="bottom-content">
					<div class="left-icon">
					<div class="icon-text" style="display: inline-block;">
						<div class="icon">
							<img src="images/company/company-persistent.png" width=80px height=80px>
							<span><img src="images/star.png" width=25px height=25px>
							<span style="vertical-align: 2px;">4.0 &bull; 9K+ Reviews &bull; Digital Engineering | Enterprise Modernization Services</span></span>
						</div>
					</div>
					</div>
					<div class="right-apply-button">
					<div class="button">
						<form method=post>
						<button type="submit" name="submit">Apply Now</button>
					</form>
					<?php 
		if(isset($_POST['submit'])){
			header("location:https://careers.persistent.com/?utm_source=Google&utm_medium=PPC&utm_campaign=Recruitment_Campaign_Paid%20Media_Pan%20India_Brand_Google%20Search_Web_Visit_OCT_22&gclid=Cj0KCQjw2eilBhCCARIsAG0Pf8uvlAgf6CMpEZjyA1MEbVWV0xyEyn_Ebk-Mja9C_rbhlKkdw3R1G84aAmrlEALw_wcB#!/");
			$RUN = mysqli_query($con,"UPDATE company_details SET `applied`='yes', `u_id`='$u_id' WHERE company_jobs='5K'");
		}
		?>
					</div>
					</div>
				</div><br><br><br>
				<div class="scroll-content">
					<div class="info-company">
						<div class="qualification">
							<span style="font-size: 19px;">Qualification : </span><br>
							<span style="font-size: 17px;"><ul>
								<li>Basic Qualifications: Should have a 65% minimum of their education.</li>
								<li>Candidates should be sound in technical knowledge.</li>
								<li>Aspirants must know basic computer knowledge.</li>
								<li>People should have at least two certified courses in Java, Oracle, Html, CSS, etc.</li>
								<li>Passion for working on the project.</li>
								<li>Must be good in communication skills.</li>
								<li>Time management should be there during their project work.</li>
                                <li>Self-learning should be there for the people.</li>
                                <li>Able to do their work as well as their work.</li>
							</ul>
							</span>
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