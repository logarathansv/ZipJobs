<?php 
session_start();
if(! ($_SESSION['loggedin'])){
	header("location:/login.php");
	exit();
}
?>
<html>
	<?php
		include("config.php");
		$u_id = $_SESSION['u_id'];
		$query = "SELECT * FROM user_details WHERE u_id='$u_id'";
		$RUN = mysqli_query($con,$query);
		$row = mysqli_fetch_array($RUN);

	?>
	<?php
	include ("config.php");
				if(isset($_POST['submit'])){
					$name = $_POST['name'];
					$mobile = $_POST['mobile'];
					$age= $_POST['age'];
					$add= $_POST['address'];
					$dob= $_POST['dob'];
					$link= $_POST['social-media'];
					$job= $_POST['job'];
					$about= $_POST['about-yourself'];
					$query = "UPDATE `user_details` SET `name`='$name',`mobile`='$mobile',`age`='$age',`address`='$add',`social-link`='$link',`dob`='$dob',`job-prefer`='$job',`about`='$about' WHERE u_id='$u_id'" or die(mysqli_error($con));
					$run= mysqli_query($con,$query);
					$targetDir = "uploads/cv/";
					$filename = basename($_FILES["resume"]["name"]);
					$targetFilePath = $targetDir . $filename;
					if(move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFilePath)){
					$query = "UPDATE `user_details` SET `cv_link`='$targetFilePath' WHERE u_id='$u_id'";
					$query_run = mysqli_query($con,$query);
				}
					if(isset($query_run))
					{
						echo '<script type="text/javascript"> alert("CV Profile Uploaded")</script>';
					} 
					else{

						echo '<script type="text/javascript"> alert("CV Profile Not Uploaded")</script>';

					}
					}
				
			?>
	<head>
		<link rel="stylesheet" href="css/top-navbar-template.css">
		<link rel="stylesheet" href="css/profile.css">
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
  			<a href="services.html">Company Services</a>
  			<a href="guide.html">Salary Guide</a>
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
			
			<header>
    <h1>Job Application Profile</h1>
  </header>
  <div class="container_">
    <img class="profile-image" src="images/avatar.png" alt="Profile Picture">
    <div class="profile-info">
      <h1><?php 
      $query = "SELECT * From user_details where u_id='$u_id'" ;
      $query_run = mysqli_query($con,$query);
      while($row=mysqli_fetch_array($query_run)){
      echo $row['name'];

      ?></h1>
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="number" id="phone" name="mobile" value="<?php echo $row['mobile']; ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" id="email" name="email" value="<?php echo $row['mail_id']; ?>" disabled>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required>
        </div>
        <div class="form-group">
          <label for="age">Age:</label>
          <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>" required>
        </div>
        <div class="form-group">
          <label for="job">Job Preferred:</label>
          <input type="text" id="job" name="job" value="<?php echo $row['job-prefer']; ?>" required>
        </div>
        <div class="form-group">
          <label for="social-media">Other Social Media Links:</label>
          <input type="text" id="social-media" name="social-media" value="<?php echo $row['social-link'];?>" required>
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth:</label>
          <input type="date" id="dob" name="dob" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo $row['dob']; ?>" required>
        </div>
        <div class="form-group">
          <label for="cover-letter">About Yourself:</label>
          <textarea id="about-yourself" name="about-yourself" rows="4" required><?php echo $row["about"]; }?></textarea>
        </div>
        <div class="form-group">
          <label for="resume">Upload Resume:</label>
          <input type="file" id="resume" name="resume" accept=".pdf,.cvv,.xml" required>
          <label for='resume'></label>
          <?php
      		$query = "SELECT * From user_details where u_id='$u_id'" ;
      		$query_run = mysqli_query($con,$query);
      		$row=mysqli_fetch_array($query_run);
       		echo basename($row["cv_link"]) . " was uploaded";
					?>
        </div>
     		<input type="button" onclick="document.location.href='<?php echo $row["cv_link"] ;?>';" value="View">
        <button type="submit" name="submit" class="submit-button">Update</button>
        
      </form>
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