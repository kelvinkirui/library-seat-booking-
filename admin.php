<?php

  session_start(); /* Starts the session */

  if($_SESSION['Active'] == false){ /* Redirects user to Login.php if not logged in */
    header("location:login.php");
	  exit;
  }
?>

<!-- Show password protected content down here -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <title>Logged in</title>
    <style type="text/css">
      body{
        background: url('background.JPG');
        background-repeat: no-repeat;
        background-size: cover;
      }

    </style>
  </head>
  <body>
      <div class='header' style="margin-top: -40px;height: 150px;background-image: linear-gradient(red,yellow);font-weight: bolder">
        <h2><center>Library Seat <img src="logo.jpg" style="width: 100px;height: 100px"> Booking System</center></h2>
        <h3 style="margin-top: -55px;background-color: grey;"><img src="avatar.jpg" style="width: 50px;height: 50px;border: 3px solid transparent; border-radius: 50px"> Status:<?php echo $_SESSION['Username'];  ?> is Active</h3>
        <div id="nav">
          <ul style="list-style: none;">
            <li><a class="btn btn-lg btn-success" href="AllbookedSeats.php" role="button">Check All booked Seats</a>&nbsp <a class="btn btn-lg btn-success" href="logout.php" role="button">Log out</a>&nbsp <a class="btn btn-lg btn-success" href="updatePassword.php" role="button">Change password</a>&nbsp <a class="btn btn-lg btn-success" href="AddSeats.php" role="button">Add Seats</a></li>
          </ul>
        
      </div>
<?php 
$conn=mysqli_connect('localhost','root','','seatbook');
$sql='select * from seats';
$query=mysqli_query($conn,$sql);
?>
<div class="" style="display:grid;grid-template-columns:repeat(6, 1fr);gap:10px;grid-auto-rows: minmax(100px,auto)">
  <?php
  $confirm='Submit';
while ($row=mysqli_fetch_assoc($query)) {
 echo "<div class='row marketing' style='background-image: linear-gradient(blue,yellow);width: 200px;border:6px solid blue'>
        <ul style='list-style: none'>
          <li><img src='seat.png' style='width: :100px;height: 100px;font-weight: bold'></li>
          <form action='' method='POST'>
          <li>Seat ".$row['SeatId']."</li><input type='text' name='Id' value='".$row['SeatId']."' hidden>
             <li>Status:".$row['Status']."</li><input type='text' name='occupant' value='".$_SESSION['Username']."' hidden>
             <input type='text' name='status' value='".$row['Status']."' hidden>";
             ?>
                  <li><button onclick="window.confirm('Are you sure you want to delete this seat?')" name="book" type="submit" class='btn btn-lg btn-success' style='height:40px'>Delete Seat</button></li>
          </ul></form>

      </div>
      <?php
 }
 if(isset($_POST['book']))
 {
  $status=$_POST['status'];
if($status=='occupied')
{
echo "<script>alert('Cannot delete Already booked. Check another one')</script>";

}

  else{
$seatId=$_POST['Id'];
$occupant=$_POST['occupant'];
echo $seatId;
echo $occupant;
$sql1="delete from seats where SeatId='$seatId'";
$query=mysqli_query($conn,$sql1);
if($query)
{
  header("Refresh:0");
  echo "Successfully deleted";

}
else{
  echo "error!!";
}
}
}


 ?> 
</div>
      <footer class="footer">
        <p>&copy; Library seat booking</p>
      </footer>

    </div>

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
