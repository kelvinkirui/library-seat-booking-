<?php
require_once ('config.php'); // For storing username and password.

session_start();
?>

<!-- HTML code for Bootstrap framework and form design -->

<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
      body{
        background: url('background.JPG');
        background-repeat: no-repeat;
        background-size: cover;
      }

    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Sign in</title>
</head>
<body>
        <div class='header' style="margin-top: -60px;height: 150px;background-image: linear-gradient(red,yellow);font-weight: bolder">
        <h2><center>Library Seat <img src="logo.jpg" style="width: 100px;height: 100px"> Booking System</center></h2>
        <div id="nav">
          
          </ul>
        
      </div>
<div class="container" style="background-image: linear-gradient(red,yellow); margin-top: 10em;width: 100%">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input name="Username" type="email" id="inputUsername" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="Password" type="password" maxlength="6" minlength="6" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" style='background-image: linear-gradient(red,yellow);' value="Login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<a style='background-image: linear-gradient(blue,yellow);' class="btn btn-lg btn-primary btn-block" href="Registration.php">Register here</a>
        <?php

        /* Check if login form has been submitted */
        if(isset($_POST['Submit'])){

            // Rudimentary hash check
            $result = password_verify($_POST['Password'], $Password);
            $conn=mysqli_connect('localhost','root','','seatbook');
$username=$_POST['Username'];
$password=$_POST['Password'];
$sql="select * from login where username='$username' and password='$password'";
$query=mysqli_query($conn,$sql);
$count=mysqli_num_rows($query);
$row1=mysqli_fetch_assoc($query);
$level=$row1['Level'];
            /* Check if form's username and password matches */
            if($count==1) {

                /* Success: Set session variables and redirect to protected page */
                $_SESSION['Username'] = $username;

                $_SESSION['Active'] = true;
                if($level==0)
                {
                header("location:index.php");
                exit;
}
else if($level==1)
{
    header("location:admin.php");
                exit;
}
            } else {
                ?>
                <!-- Show an error alert -->
                &nbsp;
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> Incorrect information.
                </div>
                <?php
            }
        }
        ?>

    </form>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
