<?php 
session_start();
        include("config.php");
        if(isset($_POST['submit'])){
        $mail = mysqli_real_escape_string($con,$_POST['mail_id']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $result = mysqli_query($con,"SELECT * from user_details where mail_id='$mail' and pass_id='$password'") or die("Select error");
        $row = mysqli_fetch_assoc($result);
        if(is_array($row) && !empty($row)){
                        $_SESSION['valid']= $row['mail_id'];
                        $_SESSION['username']= $row['name'];
                        $_SESSION['u_id']= $row['u_id'];
        }
        else{
           echo  "<script>
                    alert('Wrong mail id or password');
                </script>";
                echo "<script>alert('Redirecting To Login Page...');</script>";
                }
                    if(isset($_SESSION['u_id'])){
                        echo "<script>alert('Redirecting To Index Page...');</script>";
                        header("location:/index.php");
                        $_SESSION['loggedin'] = TRUE;      
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="login.css">
    <title>Login  Form</title>  
</head>
<body>
    <center>
     <div class="class1">ZipJobs<IMG SRC="images/logo.jpg"></div> </center>
     <div class><hr></div>
     <div class="container">
        <div class="forms">
        <div class="form login">
        <span class="title">Login</span>
        <form action="" method="POST" autocomplete="off">
        <div class="input-field">
                        <input type="text" name="mail_id" id="mail" placeholder="Enter your Mail Id" required>
                        <i class="uil uil-check-circle"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" id="password"placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <!--<div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                         <a href="#" class="text">Forgot password?</a>
                    </div>
                    -->
                    <div class="input-field button">
                      <center>
                        <button type="submit" name="submit" style="padding:10px;background-color: white;text-decoration: none;color:black;">Submit</button>
                    </div></center>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="register.php" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div></div></div></div>
</body>
</html>
