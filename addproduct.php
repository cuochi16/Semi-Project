<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/f1bcf690c6.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="index">
	<div class="container-fluid content">
		<div class="row">
			<div class="col-xxl-2 col-xl-3 col-md-2 left-layout">
				<div class="content-left">
					<div class="logo">
						<a href="index.php"><img src="image/logo.png" alt=""></a>
					</div>
					<div class="menu">
						<ul>
							<li>
								<a href="index.php"><i class="fas fa-home"></i> Home</a>
							</li>
							<li class="select">
								<a href="product.php"><i class="fas fa-compact-disc"></i> Song</a>
							</li>
							<li>
								<a href=""><i class="fas fa-music"></i> Artist</a>
							</li>
							<li>
								<a href=""><i class="fas fa-heart"></i> Favorite</a>
							</li>
						</ul>
					</div>
					<div class="buy-premium">
						<label>Buy premium to listen and download high quality music</label>
						<button>Buy Premium</button>
					</div>
				</div>
			</div>
			<div class="col-xxl-10 col-xl-9 col-md-10 right-layout">
				<div class="container-fluid">
					<header>
						<div class="row">
							<div class="col-xxl-10">
								<div>									
									<button><i class="fas fa-search"></i></button>
									<input type="text" placeholder="Search">
								</div>
								
							</div>
							<div class="col-xxl-2">
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle avatar" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
									<img src="image/avatar.jpg" alt="">
									<label for="">Quốc Huy</label>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="#">Information</a></li>
									<li><a class="dropdown-item" href="signin.php">Change account</a></li>
									<li><a class="dropdown-item" href="#">Log out</a></li>
								</ul>
						</div>
					</header>
					<div class="row">
					<form action="" method="POST">
																		<div class="form-group">
																			<label for="exampleInputPassword1">Song name</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Song Name" name="SongName">
																		</div>
																		<div class="form-group">
																			<label for="exampleInputPassword1">Price</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Price" name="Price">
																		</div>
																		<div class="form-group">
																			<label for="exampleInputPassword1">Song image</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Song Image" name="SongImage">
																		<div class="form-group">
																			<label for="exampleInputPassword1">Song audio</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Song Audio" name="SongAudio">
																		<div class="form-group">
																			<label for="exampleInputPassword1">Song lyric</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Song Lyric" name="SongLyric">
																		<div class="form-group">
																			<label for="exampleInputPassword1">Song description</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Song Description" name="SongDescription">
																		<div class="form-group">
																			<label for="exampleInputPassword1">Genre name</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Genre Name" name="GenreName">
																		</div>
																		<div class="form-group">
																			<label for="exampleInputPassword1">Artist</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Artist" name="ArtistName">
																		</div>
																		<div class="form-group form-check">
																			<input type="checkbox" class="form-check-input" id="exampleCheck1">
																			<label class="form-check-label" for="exampleCheck1">You agree to <span style="color:green"><u>add a new song</u></span>.</label>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																			<button type="submit" class="btn btn-primary" name="add">Add</button>
																		</div>
																	</form>
																	<?php
																		include 'connect.php';
																		$SongID = $_GET["SongID"];
																		if(isset($_POST['add']))
																		{
																			$SongName = $_POST['SongName'];
																			$Price = $_POST['Price'];
																			$SongImage = $_POST['SongImage'];
																			$SongAudio = $_POST['SongAudio'];
																			$SongLyric = $_POST['SongLyric'];
																			$SongDescription = $_POST['SongDescription'];
																			$GenreName = $_POST['GenreName'];
																			$ArtistName = $_POST['ArtistName'];
																			$sql = "UPDATE `song` SET `SongName`='$SongName',`Price`='$Price',`SongImage`='$SongImage',`SongAudio`='$SongAudio',`SongLyric`='$SongLyric',`SongDescription`='$SongDescription',`GenreName`='$GenreName',`ArtistName`='$ArtistName' WHERE 31";
																			$add = mysqli_query($connect,$sql);
																			if($add){
																					echo " Update Successfully
																					<script>alert('Update successfully');
																					window.open('detailsong.php', '_self');</script>";
																			}
																			else{
																					echo "Error!";
																			}
																		}
																	?>
					</div>
					<footer></footer>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="music-bar">
		</div>
		</div>
	</div>
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>