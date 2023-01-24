<DOCTYPE! html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM COBA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

  <body>
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

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Pepustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Index</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="form.php">Form</a>
        </li>
        <li class="nav-item">
        <li class="nav-item">
          <a class="nav-link" href="keluar.php">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
      
    

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
  <label for="exampleFormControlInput1" class="form-label">Genre</label>
  <input type="text" name="Genre" class="form-control" id="Genre" placeholder="Genre">
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">Gambar</label>
  <input class="form-control" name="Genre" type="file" id="Genre">
</div>

<div class="col-12">
    <button class="btn btn-primary" type="submit">Submit</button>
  </div>

</form>
</div>


</body>
  </html>