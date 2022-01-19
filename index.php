<?php 
	session_start(); 
?>
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
							<li class="select">
								<a href="index.php"><i class="fas fa-home"></i> Home</a>
							</li>
							<li>
								<a href="product.php"><i class="fas fa-compact-disc"></i> Song</a>
							</li>
							<li>
								<a href=""><i class="fas fa-music"></i> Artist</a>
							</li>
							<li>
								<a href="cart.php"><i class="fas fa-cart-plus"></i> Cart</a>
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
									<?php
										include('connect.php');
										if(isset($_SESSION['FullName'])){
											$h = $_SESSION['FullName'];
										
									?>
									<label><?php echo $h; ?></label>
									<?php } ?>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="#">Information</a></li>
									<li><a class="dropdown-item" href="signin.php">Change account</a></li>
									<li><a class="dropdown-item" href="#">Log out</a></li>
								</ul>
						</div>
					</header>
					<div class="row">
						<main>
							<center>
								<div class="slide_banner">
									<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
											<div class="carousel-indicators">
												<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
												<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
												<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
											</div>
											<div class="carousel-inner">
												<div class="carousel-item active">
												<img src="image/banner1.jpg" class="d-block w-100" alt="...">
												</div>
												<div class="carousel-item">
												<img src="image/banner2.jpg" class="d-block w-100" alt="...">
												</div>
												<div class="carousel-item">
												<img src="image/banner3.jpg" class="d-block w-100" alt="...">
												</div>
											</div>
											<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
												<span class="carousel-control-prev-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Previous</span>
											</button>
											<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
												<span class="carousel-control-next-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Next</span>
											</button>
									</div>	
								</div>
							</center>
						</main>
						<?php
                                    include('connect.php');
                                    $sql = "Select * from `song`";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_array($result))
                                    {
										$SongID = $row['SongID'];
                                        $SongName = $row['SongName'];
                                        $Price = $row['Price'];
                                        $SongImage = $row['SongImage'];
                                        $SongAudio = $row['SongAudio'];
										$SongLyric = $row['SongLyric'];
                                        $SongDescription = $row['SongDescription']; 
                                        $GenreName = $row['GenreName']; 
                                        $ArtistName = $row['ArtistName']; 
									
                                ?>
						<div class="col-xxl-3">
							<a href="detailsong.php?SongID=<?php echo"$SongID" ?>">
								<div class="card" style="width: 100%; margin-top:15px">
									<img src="<?php echo "$SongImage" ?>" class="card-img-top">
									<div class="card-body">
										<h5 class="card-title"><?php echo "$SongName" ?></h5>
										<p class="card-text">$<?php echo "$Price" ?></p>
										<span><a  class="cartdetail" href="add_cart.php?SongID=<?php echo"$SongID" ?>">
										<img style="width:10%; float:left; padding:0 0 5px 0" src="image/cart.png" alt="">
										</a></span>
										<audio src="<?php echo "$SongAudio" ?>" controls controlsList="nodownload" ontimeupdate="MyAudio(this)"></audio>
									</div>
								</div>
							</a>
						</div>
						<?php } ?>
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