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
            <li><a class="btn btn-lg btn-success" href="bookedseat.php" role="button">Check booked Seats</a>&nbsp <a class="btn btn-lg btn-success" href="logout.php" role="button">Log out</a>&nbsp <a class="btn btn-lg btn-success" href="updatePassword.php" role="button">Change password</a></li>
          </ul>
        
      </div>
      <div id="timer">
        <!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
p {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
</style>
</head>
<body>

<p id="demo" style="background-image: linear-gradient(orange,yellow);  "></p>
</script>

      </div>
<?php 
$conn=mysqli_connect('localhost','root','','seatbook');
$user=$_SESSION['Username'];
$sql4="select * from seats where occupant='$user'";
$query4=mysqli_query($conn,$sql4);
?>
<div class="" style="display:grid;grid-template-columns:repeat(6, 1fr);gap:10px;grid-auto-rows: minmax(100px,auto)">
  <?php
  $confirm='Submit';
  $count1=mysqli_num_rows($query4);
  if($count1>0)
{
while ($row4=mysqli_fetch_assoc($query4)) {
       
$date=$row4['Date'];
     ?>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $date; ?>").getTime();
</script>
<?php }
}
else{
?>
<script type="text/javascript">
var countDownDate = new Date('Jan 28, 2022 15:37:25').getTime();
</script>
<?php
}
 ?>

<script type="text/javascript">
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML ="<h3>Remaining time:<img src='clock.png' style='width:70px;height:70px'>"+hours + "h "
  + minutes + "m " + seconds + "s</h3> ";
    
  // If the count down is over, write some text
  if(seconds == 0) 
  {
     document.getElementById("demo").innerHTML = "Time Expired <form method='POST' action='#'><input id='reset' type='submit' value='reset' name='reset' hidden></form> ";
    document.getElementById("reset").click(); 
  }
  else if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Time Expired";
  }
}, 1000);
</script>

      </div>
<?php
if(isset($_POST['reset'])) 
{     $conn10=mysqli_connect('localhost','root','','seatbook');
     $user3=$_SESSION['Username'];
    $sql10="update seats set Occupant='',Status='Not Occupied' where Occupant='$user3'";
$query10=mysqli_query($conn10,$sql10);
if($query10)
{
  echo "Successfully cancelled";
}
else{
  echo "There was an error in cancelling";
}
}
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
          <form action='' method='POST' onsubmit='return validate()'>
          <li>Seat ".$row['SeatId']."</li><input type='text' name='Id' value='".$row['SeatId']."' hidden>
             <li>Status:".$row['Status']."</li><input type='text' name='occupant' value='".$_SESSION['Username']."' hidden>
             <input type='text' name='status' value='".$row['Status']."' hidden>";
             ?>
            Leave:<input type="time" step="12" min="08:00" max="20:00" id="input_starttime" class="form-control timepicker" placeholder="Time to leave" name="time" value="00:00:00" style="background-color: grey;">
       <?php
       if($row['Status']!='occupied')
       {?>
                <li><button onclick="window.confirm('Are you sure you want to book?')" name="book" type="submit" class='btn btn-lg btn-success' id="book" style='height:40px'>Book</button></li>
          </ul></form>
       <?php
        }
        else{

        }
?>
      </div>
    
      <?php
 }
 if(isset($_POST['book']))
 {
  $day=date("l");
  if($day=="Saturday"||$day=="Sunday")
  {
   echo "<script>alert('library dont operate on weekends. We are sorry!!')</script>"; 
  }
  else{
  $status=$_POST['status'];
if($status=='occupied')
{
echo "<script>alert('Already booked. Check another one')</script>";

}
else
{
  $user=$_SESSION['Username'];
  $check="select occupant from seats where occupant='$user'";
  $checkQuery=mysqli_query($conn,$check);
  $count=mysqli_num_rows($checkQuery);
  if($count>0)
  {
echo "<script>alert('You can book one seat only.')</script>";
  }
  else{
$seatId=$_POST['Id'];
$occupant=$_POST['occupant'];
$time=$_POST['time'];
$date=date("Y-m-d");
$startTime=date('Y-m-d h:i:s');
$dateTime1=$date." ".$time;
$sql1="update seats set Occupant='$occupant',Status='occupied',Date='$dateTime1',startTime=NOW() where SeatId='$seatId'";
$query=mysqli_query($conn,$sql1);
if($query)
{
  echo "Successfully booked";
}
else{
  echo "error!!";
}
}
}

 }
}
 ?> 
 <script type="text/javascript">
   function validate()
   {
    var time=document.getElementById("time").value;
    if(time=='20:00')
    {
      alert("it is 8 pm");
      return false;
    }

   }
 </script>
</div>
      <footer class="footer">
        <center><h4 style="color:blue">&copy; Library Seat Book System 2022</h4></center>
      </footer>

    </div>

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
