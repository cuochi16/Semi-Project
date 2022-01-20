<?php 
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	

	<?php
	include('connect.php');

	$SongID =  $_GET['SongID'];

	echo $_SESSION['UserName'];
	if (isset($_SESSION['UserName']) != null){
		$UserName = $_SESSION['UserName'];
		$sql="select * from cart where SongID = $SongID AND UserName='$UserName'";
		$result = mysqli_query($connect, $sql);
		$check_song = mysqli_num_rows($result);
		if ($check_song > 0) {
			echo "<script>alert('Song already in the cart')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
		else {
			$sql = "insert into cart values ('','$UserName','$SongID') ";
			$result = mysqli_query($connect, $sql);	
			if ($result) {
				echo "<script>alert('Song added to the cart successfully!')</script>";
				echo "<script>window.open('index.php','_self')</script>";
			}
			else {
				echo "<script>alert('Error')</script>";
				echo "<script>window.open('index.php','_self')</script>";
			}
		}
	}
	else {
		echo "<script>alert('You need to be logged in to perform this action')</script>";
		echo "<script>window.open('login.php','_self')</script>";
	}

	?>


</body>
</html>