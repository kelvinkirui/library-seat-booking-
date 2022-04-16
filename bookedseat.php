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
	  <div class='header' style="margin-top: -40px;height: 150px;background-image: linear-gradient(red,yellow);font-weight: bolder">
        <h2><center>Library Seat <img src="logo.jpg" style="width: 100px;height: 100px"> Booking System</center></h2>
       <h3 style="margin-top: -55px;background-color: grey;"><img src="avatar.jpg" style="width: 50px;height: 50px;border: 3px solid transparent; border-radius: 50px"> Status:<?php echo $_SESSION['Username'];  ?> is Active</div></h3>
        <div id="nav">
          <ul style="list-style: none;">
            <li><a class="btn btn-lg btn-success" href="logout.php" role="button">Log out</a> &nbsp <a class="btn btn-lg btn-success" href="index.php" role="button">Home</a></li>
          </ul>
        
      </div>
<table class="table table-hover" style="background-image: linear-gradient(orange,yellow);  ">
	<thead style="color:white;font-size: 20px"><tr>
		<th scope="col">Seat #</th>
<th scope="col">Status</th>
<th scope="col">Occupant</th>
<th scope="col">Cancel</th>
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
		<td><?php echo  $row['Status']; ?></td>
		<td><?php echo  $row['Occupant']; ?></td>
		<form action="" method="POST">
		<input type="text" name="id" value=<?php echo $row['SeatId'] ?> hidden>
		<td><button name="cancel" onclick="window.confirm('Do you want to Cancel this booked seat?')" type='submit'><img src="cancel.png" width="60" height="60"></button></td>
		<td><a class="btn btn-lg btn-success" href="receipt.php" name="print" onclick="window.confirm('Do you want to print this receipt?')" type='submit'><img src="printer.png" width="50" height="50"></button></td>
	</form>
	</tr>
<?php
}
if(isset($_POST['cancel']))
{
	$id=$_POST['id'];
	$sql1="update seats set Status='Not Occupied', Occupant='' where SeatId='$id'";
	$query1=mysqli_query($conn,$sql1);
	if($query1)
	{
		echo "Successfully cancelled";
		header("location:bookedseat.php");
	}
}
?>
	
</tbody>
</table>
    </body>
	
</html>
												
											
																																																																																	  	