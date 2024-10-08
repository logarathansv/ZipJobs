<?php 
session_start();
if(! ($_SESSION['loggedin'])){
	header("location:/login.php");
	exit();
}

	include("config.php");
	$u_id = $_SESSION['u_id'];
?>
<html>
	<head>
		<link rel="stylesheet" href="css/top-navbar-template.css">
<style>
    /* CSS styles go here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    nav {
      background-color: #f2f2f2;
      padding: 10px;
    }

    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      display: inline-block;
      margin-right: 10px;
    }

    nav ul li a {
      color: #333;
      text-decoration: none;
      padding: 5px;
    }

    section {
      padding: 20px;
    }

    h1 {
      font-size: 28px;
      color: #333;
      margin-bottom: 10px;
    }

    h2 {
      font-size: 20px;
      color: #333;
      margin-bottom: 10px;
    }

    p {
      line-height: 1.5;
      color: #666;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
	input[type="email"],
    textarea {
      width: 30%;
      padding: 5px;
      margin-bottom: 10px;
    }

    textarea {
      height: 100px;
    }

    input[type="submit"] {
      background-color: #333;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #555;
    }

    select{
		width: 30%;

    }
	.copyrights{
		height:50px;
		background-color: #AFDCEC;
	}
	.copyrights .content{
		color:black;
		text-align: center;
		font-size: 20px;
		padding:10px;
	}			
  </style>
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
		<header>
			<h1>Help Center</h1>
		  </header>
		
          
		  <section style="text-align:center">
			<h1>Submit a Query</h1>
			<form action="#" method="POST" autocomplete=off>
			  <label for="name">Job Name:</label>
			  <input type="text" id="name" name="name" required> <br>
		
			  <label for="email">Email:</label>
			  <input type="email" id="email" name="email" required> <br>
		
			  <label for="job">Job:</label>
			  <select id="job" name="job" required>
				<option value="">Select a job sector</option>
				<option value="data scientist">Data Scientist</option>
				<option value="information technology analyst">Information Technology Analyst</option>
				<option value="marketing">Marketing</option>
				<option value="software_developer">Software Developer</option>
			  </select> <br> <br>
		
			  <label for="query">Query:</label>
			  <textarea id="query" name="query" required></textarea> 
		
			  <br>
		
			  <input type=submit name=submit value="Submit Query" style="border-radius: 12px; background-color:#AFDCEC; ">
			  <?php
			  if(isset($_POST['submit'])){
			  $job = $_POST['name'];
			  $job_sector = $_POST['job'];
			  $query = $_POST['query'];
			  $email = $_POST['email'];
			  $run = mysqli_query($con,"INSERT INTO query_help(u_id,job_name,job_sector,email,help) VALUES('$u_id','$job','$job_sector','$email','$query')") ;
			  echo "<script>alert('Submitted Successfully !')</script>";}
			  ?>
			</form>
			<?php
			if(isset($_POST['submit'])){
			echo "<script>alert('Submitted Successfully !')</script>";}
			?>
		  </section>
		
		<div class="copyrights">
			<div class="content">
				&#169; 2023 ZipJobs All Rights Reserved.
			</div>
		</div>
	</body>
</html>