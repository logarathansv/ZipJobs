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
					<img src="images/cover_company/datamatics_back(3).jpg" height=333px width="1350">
				</div>
				<div class="bottom-content">
					<div class="left-icon">
					<div class="icon-text" style="display: inline-block;">
						<div class="icon">
							<img src="images/company/company-datamatics.png" width=80px height=80px>
							<span><img src="images/star.png" width=25px height=25px>
							<span style="vertical-align: 2px;">4.0 &bull; 1.4K+ Reviews &bull; Providing Intelligent Solutions for Data Driven Businesses</span></span>
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
			header("location:http://recruitment.datamatics.com/dm_career/client/index.aspx?hsCtaTracking=ca13d376-1c60-40f8-933f-752f5ca7b544%7C783b1975-d529-42e1-9648-b9e17767d2f3");
			$RUN = mysqli_query($con,"UPDATE company_details SET `applied`='yes', `u_id`='$u_id' WHERE company_jobs='90K'");
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
								<li>Basic Qualifications: 2-5 Years of experience in Realtime Analyst or voice operations and Good communication skills.</li>
								<li>B. Tech/M. Techin computer science or related fields.</li>
								<li>Basic understanding of Telephony, good analytical skills.</li>
								<li>Knowledge of IEX tool.</li>
                                <li>Strong experience SMP/E, zOS TSO, IBM Utilities, JCL</li>
								<li>Strong knowledge of MS Office.</li>
								<li>Has some experience of zLinux and Linux.</li>
								<li>Has a good understanding of CICS.</li>								
								<li>At least 5 years’ strong experience of supporting and maintaining an MQ environment.</li>
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