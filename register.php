<?php
            include("config.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];
                $mobileno = $_POST['mobileno'];

            $verify_query =  mysqli_query($con,"select mail_id from user_details Where mail_id='$email'");
            if(mysqli_num_rows($verify_query)!=0){
                echo "<script>
                    alert('You already have an account with this email');
                </script>";
                header("location:login.php");
            }
            else{
                mysqli_query($con,"Insert into user_details(name,mail_id,age,pass_id,mobile) values('$username','$email','$age','$password','$mobileno')") or die("Error occured");
                echo "<script>
                    alert('Registration successfull!');
                </script>";
                header("location:login.php");
            }
            }
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="login.css">
    <title>Registration</title>
  </head>
  <body><center>
     <div class="class1">ZipJobs<IMG SRC="images/logo.jpg"></div> </center>
     <div class><hr></div>
   <div class="container">
        <div class="forms">
         <div class="form login">
                <div class="heading" style="font-family:'Poppins', sans-serif"><b>Registration</b></div>
                <form class="given" action="" method="POST" autocomplete="off">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" name="username" id="username" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" id="email" required>
                        <i class="uil uil-check-circle"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your mobile number" name="mobileno" id="mobileno" required>
                        <i class="uil uil-check-circle"></i>
                    </div>
                    <div class="input-field">
                        <input type="age" class="password" placeholder="Enter Your Age" name="age" id="age" required>
                        <i class="uil uil-check-circle"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create a password" name="password" id="password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>

                    <div class="input-field button">
                        <button type="submit" name="submit" style="padding:5px;background-color: white;text-decoration: none;color:black;margin: auto;display:block;">Submit</button>
                    </div>
                </form>
            
               <h1 id="res"></h1>

                    <div class="login-signup">
                    <span class="text">Already a member?
                    <a href="login.php" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
         </div>
</div></div> 
  </body>
</html>
