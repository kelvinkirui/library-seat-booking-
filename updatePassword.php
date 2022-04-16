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
          <ul style="list-style: none;">
            <li><a class="btn btn-lg btn-success" href="index.php" role="button">Home</a></li>
          </ul>
        
      </div>
        
      </div>
<div class="container" style="background-image: linear-gradient(red,yellow); margin-top: 10em;width: 100%">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Password Reset</h2>
        <label for="inputUsername" class="sr-only">Current Password</label>
        <input name="currentPassword" type="password" id="inputUsername" class="form-control" placeholder="Current Password" id="currentPassword" maxlength="6" minlength="6"  required autofocus><br/>
        <label for="inputPassword" class="sr-only">Password</label>
    
        <input name="Password" id="password" maxlength="6" minlength="6" type="password" id="inputPassword" class="form-control" placeholder="New Password" required>
        <input name="confirmPassword" id="confirmNewPassword" maxlength="6" minlength="6"  type="password" id="inputPassword" class="form-control" placeholder="Confirm New Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" style='background-image: linear-gradient(red,yellow);' value="Login" class="btn btn-lg btn-primary btn-block" type="submit">Update Password</button>
        <?php

        /* Check if login form has been submitted */
        if(isset($_POST['Submit'])){
            $result = password_verify($_POST['Password'], $Password);
            $conn=mysqli_connect('localhost','root','','seatbook');
$currentPassword=$_POST['currentPassword'];
$password=$_POST['Password'];
$user=$_SESSION['Username'];
$sql="select Password from login where Username='$user'";
$query=mysqli_query($conn,$sql);
            /* Check if form's username and password matches */
            $row=mysqli_fetch_assoc($query);
            if($currentPassword==$row['Password'])
            {
                $sql1="update login set Password='$password' where username='$user'";
                $query1=mysqli_query($conn,$sql1);
                if($query1)
                {

                ?>
                <!-- Show an error alert -->
                &nbsp;
                <div class="alert alert-danger alert-dismissible" role="alert" style="background-color: green;color:black;font-weight: bolder">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> Password Successfully Updated. Use your new password in the next login
                </div>
                <?php
            } else if($currentPassword==$row['Password']){
                ?>
             
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> Unsuccessful!! try again
                </div>
                <?php
            }
        }
    }
        ?>

    </form>
</div>
<script>
function validate()
{
    var currentPassword=document.getElementById(currentPassword);
    var newPassword=document.getElementById(password);
    var confirmNewPassword=document.getElementById(confirmNewPassword);
    if(currentPassword=="" && newPassword=="" && confirmNewPassword=="")
    {
        window.alert('Fill all the fields!!');
    }
}



</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
