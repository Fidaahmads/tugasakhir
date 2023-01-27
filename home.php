<?php

require_once('koneksi.php');
//if (isset($_GET['pencarian'])){
//}

//else {

// panggil data

// $ambil_data = mysqli_query($koneksi, "select data_buku.*,daftar_genre.id,data_genre.genre from data_buku join daftar_genre on daftar_genre.id_buku=data_buku.id join data_genre on data_genre.id=daftar_genre.id_genre;");
//}

$cari=@$_GET['cari'];
$car=@$_GET['car'];
  if (isset($car)) {
	$sql="SELECT `data_buku`.* ,daftar_genre.id,data_genre.genre FROM data_buku JOIN daftar_genre on daftar_genre.id_buku=data_buku.no JOIN data_genre on data_genre.id=daftar_genre.id_genre WHERE Judul LIKE'%$cari%' OR Pengarang LIKE'%$cari%' OR Genre LIKE'%$cari%' ";
  } else {
	$sql=" SELECT `data_buku`.* ,daftar_genre.id , data_genre.Genre FROM data_buku JOIN daftar_genre on daftar_genre.id_buku=data_buku.no JOIN data_genre on data_genre.id=daftar_genre.id_genre ";
  }

  

  $hasil=$koneksi->query($sql);
  $id=1;

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Efde Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
		
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">


<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="tableacces/css/style.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css"> 
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

     

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
		        	<li class="nav-item active"><a href="home.php" class="nav-link">Data Buku</a></li>
		        	<li class="nav-item"><a href="index.php" class="nav-link">Input Buku</a></li>
		          <li class="nav-item"><a href="keluar.php" class="nav-link">Log Out</a></li>
		        </ul>
		      </div>
		    </div>
		  </nav>
    <!-- END nav -->
  </div>
	</section>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-striped">
						  <thead>
						    <tr>
						      <th>#</th>
						      <th>Nomor</th>
						      <th>Judul</th>
						      <th>Pengarang</th>
						      <th>Genre</th>
						      <th>Gambar</th>
							  <th>Rak</th>
							  <th>Aksi</th>
						    </tr>
						  </thead>
						  <tbody>
						  <?php $id = 1;
            while ($data = mysqli_fetch_assoc($hasil)) {
              //foto
              if ($data['Gambar'] == "") {
                $gambar = "Picture2.jpg";
              } else {
                $gambar = $data['Gambar'];
              } ?>
              <tr>
                <th scope='row'><?= $id++; ?></th>
                <td><?= $data['Nomor'] ?></td>
                <td><?php echo $data['Judul'] ?></td>
                <td><?= $data['Pengarang'] ?></td>
                <td><?= $data['Genre'] ?></td>
                <td><img class="img-thumbnail" width="100" src="assets/<?= $gambar ?>" /></td>
                <td><?= $data['Rak'] ?></td>
                <td>
                  <button class="btn btn-warning" data-bs-toggle="modal" 
                  data-bs-target="#exampleModal" 
                  data-bs-id="<?= $data['no'] ?>" data-bs-aksi="ubah">Ubah</button>
                  <button class="btn btn-danger" data-bs-toggle="modal" 
                  data-bs-target="#exampleModal" 
                  data-bs-id="<?= $data['no'] ?>" data-bs-aksi="hapus">Hapus</button>
                </td>
              </tr>
            <?php } ?>

						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

  <script src="tableassets/js/jquery.min.js"></script>
  <script src="tableassets/js/popper.js"></script>
  <script src="tableassets/js/bootstrap.min.js"></script>
  <script src="tableassets/js/main.js"></script>
   
  <!-- Modal -->
<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h1 class='modal-title fs-5' id='exampleModalLabel'>Ubah Data Buku</h1>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
            </div>
          </div>
        </div>
      </div>
  
  <script>

        $(document).ready(function() {
          //alert('Yo Gays');
          const Modal = document.getElementById('exampleModal')
          Modal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const id = button.getAttribute('data-bs-id');
            const aksi = button.getAttribute('data-bs-aksi');
            //console.log(id;)
            $.post('form.php', {
                id , aksi}, function(a) {
                console.log(a);
              })
              .done(function(x) {
                $('.modal-body').html(x);
              })
              .fail(function() {
                alert("tolol");
              })
              .always(function() {
                //alert("finished");
              })

          })
          //proses update
          $('#form').submit(function(a){
            a.preventDefault();
            const data_form = this.serialize();
            console.log(data_form);
          })
        });

      </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  
  <script>
$(document).ready( function () {
        $('table').DataTable();
        } );
  </script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
	</body>
</html>

