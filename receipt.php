<!DOCTYPE html>
<html>
<?php 
session_start();
?>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	  <style type="text/css">
      body{
        background: url('background.JPG');
        background-repeat: no-repeat;
        background-size: cover;
      }
 tr td{
 	height: 50px;
 }
    </style>
}
</head>
<body>
<center>

<table class="table table-hover" style="background-image: linear-gradient(orange,yellow); width:50%;height:300px ">
	
	<thead style="color:white;font-size: 20px">
	<tr><td><a class="btn btn-lg btn-success" href="index.php" role="button">Home</a></td></tr>
		<tr><th></th><th>Library Seat<img src="logo.jpg" width="50" height="50" style="border:3px solid transparent; border-radius:50px">Booking System</th></tr>
		<tr>
		<th scope="col">Seat #</th>
<th scope="col">Occupant</th>
<th scope="col">Start Time</th>
<th scope="col">End Time</th>
	</tr>
</thead>
<tbody>
<?php 
$user=$_SESSION['Username'];

$conn=mysqli_connect('localhost','root','','seatbook');
$sql="select * from seats where Occupant='$user'";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($query))
{
?>
	<tr>
		

		<td><?php echo $row['SeatId']; ?></td>
		<td><?php echo  $row['Occupant']; ?></td>
		<td><?php echo  $row['startTime']; ?></td>
		<td><?php echo  $row['Date']; ?></td>
	</tr>
	<tr></tr>
	<form action="" method="POST">
	<td></td><td></td><td><td></td><td><button class="btn btn-lg btn-success" href="receipt.php" name="print" onclick="window.print()" ><img src="printer.png" width="30" height="30"></button><button type='submit' class="btn btn-lg btn-success" name="send">Verify</button></td></form>
	</tr>
	</tbody>
</table>
<?php
if(isset($_POST['send']))
{
$to_email=$_SESSION['Username'];
$subject="Seat Booking System";
$body="Hi You have successfully booked seat #".$row['SeatId']." from:".$row['startTime']." To:".$row['Date']."  Thankyou.";
$headers="From: SeatBooking System";
if(mail($to_email,$subject,$body,$headers))
{
	echo "<div style='background-color:green;color:black'><h3>".$_SESSION['Username']." &#9745 Email sent. Check Your email for booking verification</h3></div>";
}
else{
	echo "Please repeat the process. There was an error";
}
	}
}
	?>

</center>
    </body>
	
</html>
												
											
																																																																																	   	