<?php 
session_start();
if(! ($_SESSION['loggedin'])){
	header("location:/login.php");
	exit();
}
include("config.php");
?>
<html>
	<head>
		<link rel="stylesheet" href="css/top-navbar-template.css">
		<link rel="stylesheet" href="css/explore.css">
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
			<div id="sidenavside" style="margin-top:50px">
  			<a href="services.html">Company Services</a>
  			<a href="guide.html">Salary Guide</a>
  			<a href="cv.html">Create CV</a>
  			<a href="privacy.html">Privacy Policy</a>
			<a href="help.php">Help Center</a>
			<a href="logout.php">LOG OUT</a>
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
			<div class="explore-content">
				<div class="explore-head">
					Explore 
				</div>
				<div class="companies-content">
					<div class="filter-title" style="height:60px;border-radius: 10px;border: 2px solid black;">
						<div class="title" style="padding-top: 10px;">
							<form class="filter-class" method="POST" action="#"> 
								<img src="images/filter.png" width="23px" height="23px">
								<label class="filter-basis" style="font-size: 20px;font-family: sans-serif;padding-right:15px;">FILTER BY SECTOR </label>
								<select name="filter-options" class="filter-options" style="height:38px;
									width: 400px;
									border-radius: 10px;
									background-color: whitesmoke;
									color:purple;
									padding: 4px;
									font-family: 'Verdana';
									font-size: 14px;
									">
									<option hidden selected></option>
									<option name="Software" <?php if(isset($_POST['submit']) && $_POST['filter-options']=="Software Developer"){echo "selected='selected'";}?>>Software Developer</option>
									<option name="Marketing" <?php if(isset($_POST['submit']) && $_POST['filter-options']=="Marketing"){echo "selected='selected'";}?>>Marketing</option>
									<option name="IT" <?php if(isset($_POST['submit']) && $_POST['filter-options']=="Information Technology Analyst"){echo "selected='selected'";}?>>Information Technology Analyst</option>
									<option name="Data" <?php if(isset($_POST['submit']) && $_POST['filter-options']=="Data Science"){echo "selected='selected'";}?>>Data Science</option>
								</select>
								<button type="submit" name="submit" style="color:black;outline: none;padding: 10px;font-size: 15px;border-radius: 10px;
									background-color: whitesmoke;width:60px;height: 38px;border:1px solid black;">Go</button>
							</form>
						</div>
					</div>
					<?php 
					if(isset($_POST['submit'])){
					$sector = $_POST['filter-options'];
					$query = "SELECT * FROM company_details WHERE company_sector='$sector'";
					$run = mysqli_query($con,$query);
					while($row = mysqli_fetch_array($run)){
					$site = $row['company_site'];
					?>
					<div class="companies-list">
						<div class="company-temp" onclick="location.href='<?php echo $site ;?>'">
							<div class="icon-content">
								<div class="icon-left-content">
									<img src="<?php echo $row['company_icon'];?>" style="padding:20px;" width=70px height=70px>
									<div class="side-content">
										<div class="comp-name"><?php echo $row['company_name'];?>
										</div>
										
									</div>
								</div>
								<div class="icon-right-content">
									<div class="company-desc">
										<div class="review">
											<?php echo $row['company_review'];?>
										</div>
										<div class="review">
											Reviews
										</div>
										<div class="salary">
											<?php echo $row['company_salary'];?>
										</div>
										<div class="salary">
											Salaries
										</div>
										<div class="jobs">
											<?php echo $row['company_jobs'];?>
										</div>
										<div class="jobs">
											Jobs
										</div>
									</div>
									
								</div>
							</div><br><br>
							<div class="description">
								<span><?php echo $row['company_desc']; ?></span>
							</div>
						</div>
					</div>
				<?php }} ?>
			<div class="copyrights">
				<div class="content">
					&#169; 2023 ZipJobs All Rights Reserved.
				</div>
			</div>
	</body>
</html>