<?php 
session_start();
if(! ($_SESSION['loggedin'])){
	header("location:/login.php");
	exit();
}
include('config.php');
$search = $_GET['search-text'];
$sector = $_GET['search-sector'];
$query = "SELECT * FROM company_details WHERE company_name like '%$search%' AND company_sector like '%$sector%'";
$run = mysqli_query($con,$query);
?>
<html>
	<head>
		<link rel="stylesheet" href="css/top-navbar-template.css">
		<link rel="stylesheet" href="css/search.css">
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
					<span style="font-size: 12px;padding-bottom: 2px;"><?php echo $_SESSION['valid']; ?></span><br>
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
				</div><br><br>
			<div class="search-bar" style="height: 100px;background-color: lightgray;">
				<div class="searchbar-content" style="padding-top: 14px;">
					<div class="bar">
						<form action=search.php method=GET>
						<input name="search-text" placeholder="<?php echo $search;?>">
						<select name="search-sector" style="">
							<option name="data science" <?php if ($sector=="Data Science") {echo "selected='selected'";}?>>Data Science</option>
							<option name="marketing" <?php if ($sector=="Marketing") {echo "selected='selected'";}?>>Marketing</option>
							<option name="software-developer" <?php if ($sector=="Software Developer") {echo "selected='selected'";}?>>Software Developer</option>
							<option name="information-technology-analyst" <?php if ($sector=="Information Technology Analyst") {echo "selected='selected'";}?>>Information Technology Analyst</option>
						</select>
						<button type="submit">Find</button>
					</form>
					</div>
				</div>
			</div>
			<?php 
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
				<?php } ?>
		</div>
	</body>