<?php 
session_start();

  if (isset($_COOKIE['login'])) {
     if ($_COOKIE['login']='berhasil') {
      @$_SESSION['status']="sukses";
      @$_SESSION['user']=$_COOKIE['user'];
    };
     };
       
     
  

if(@$_SESSION['status']!="sukses"){
  header("Location:login.php?pesan=belum");
}

include 'koneksi.php';
$ambil_data_genre = mysqli_query($koneksi, "select * from `data_genre` "); 
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Efde Library</title>
    
	<meta charset="utf-8">
    
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	

	</head>
	<body>


	<section class="ftco-section">
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
		    <div class="container">
		    	<a class="navbar-brand" href="home.php">Efde Library</a>
		    	<div class="social-media order-lg-last">
		    		<p class="mb-0 d-flex">
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
		    		</p>
	        </div>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="fa fa-bars"></span> Menu
		      </button>
		      <div class="collapse navbar-collapse" id="ftco-nav">
		        <ul class="navbar-nav ml-auto mr-md-3">
		        	<li class="nav-item"><a href="login.php" class="nav-link">Home</a></li>
		        	<li class="nav-item"><a href="home.php" class="nav-link">Data Buku</a></li>
		        	<li class="nav-item active"><a href="index.php" class="nav-link">Input Buku</a></li>
		          <li class="nav-item button"><a href="keluar.php" class="nav-link">Log Out</a></li>
		        </ul>
		      </div>
		    </div>
		  </nav>
    <!-- END nav -->
  </div>

	</section>

	
<div class="container mt-5">
  
  <form action="postdata.php" method="post" enctype="multipart/form-data">
  
  <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Nomor</label>
	<input type="text" name="Nomor" class="form-control" id="Nomor" placeholder="Nomor">
  </div>
  
  <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Judul</label>
	<input type="text" name="Judul" class="form-control" id="Judul" placeholder="Judul">
  </div>
  
  <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Pengarang</label>
	<input type="text" name="Pengarang" class="form-control" id="Pengarang" placeholder="Pengarang">
  </div>
  
  <div class="mb-3">
			  <label for="Genre" class="form-label">Pilih Genre</label>
			  <select name="Genre" class="form-control" id="Genre">
  
				  <?php
				  while ($datagenre = mysqli_fetch_assoc($ambil_data_genre)) {
					  $selected = ($datagenre['id'] == $id_genre) ? 'selected' : '' ;
					  echo "<option value='{$datagenre['id']}' $selected>{$datagenre['Genre']}</option>";
				  }
				  ?>
			  </select>
  </div>
  
  <div class="mb-3">
	<label for="formFile" class="form-label">Gambar</label>
	<input class="form-control" name="Gambar" type="file" id="Gambar">
  </div>
  
  <div class="mb-3">
	<label for="exampleFormControlInput1" class="form-label">Rak</label>
	<input type="text" name="Rak" class="form-control" id="Rak" placeholder="Rak">
  </div>
  
  <div class="col-12">
	  <button class="btn btn-primary" type="submit">Submit</button>
	</div>
  
  </form>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

