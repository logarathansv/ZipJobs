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
					<img src="images/cover_company/accenture_back(2).jpg" height=333px width="1350">
				</div>
				<div class="bottom-content">
					<div class="left-icon">
					<div class="icon-text" style="display: inline-block;">
						<div class="icon">
							<img src="images/company/company-accenture.png" width=80px height=80px>
							<span><img src="images/star.png" width=25px height=25px>
							<span style="vertical-align: 2px;">4.0 &bull; 1K+ Reviews &bull; Let there be change</span></span>
						</div>
					</div>
					</div>
					<div class="right-apply-button">
					<div class="button">
						<form method=post >
						<button type="submit" name="submit">Apply Now</button>
						</form>
						<?php 
		if(isset($_POST['submit'])){
			header("location:https://www.accenture.com/in-en/careers/jobdetails?id=678527_india_1&title=Data+Privacy+Protection+Client+Data+Protection+Architect&c=car_glb_curateddailycondialogbox_12220771&n=otc_0621");
			$RUN = mysqli_query($con,"UPDATE company_details SET `applied`='yes', `u_id`='$u_id' WHERE company_jobs='28T'");
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
								<li>Basic Qualifications: 8-9 years experience in supporting Infrastructure security management solutions.</li>
								<li>B. Tech/M. Tech in computer science or related fields.</li>
								<li>Handle troubleshooting and diagnosis to find root cause of incident.</li>
								<li>Good understanding of Firewall.</li>
								<li>Understanding of any standard AV solution will be added advantage.</li>
								<li>Flexibility to work in shifts and provide after-work hours and weekend on-call support as and when required.</li>
								<li>Vendor management to support Infrastructure security infrastructure.</li>
								<li>Excellent Hands on experience on implementation, configuration and administration of Endpoint Protection tools.</li>
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