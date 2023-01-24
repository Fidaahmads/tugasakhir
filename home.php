  <?php

  require_once('koneksi.php');

  //if (isset($_GET['pencarian'])){
//}

  //else {

  // panggil data

 // $ambil_data = mysqli_query($koneksi, "select tabelan.*,daftar_kelas.id,data_kelas.kelas from tabelan join daftar_kelas on daftar_kelas.no_siswa=tabelan.no join data_kelas on data_kelas.id=daftar_kelas.id_kelas;");
  //}

  $cari=@$_GET['cari'];
  $car=@$_GET['car'];
    if (isset($car)) {
      $sql="SELECT `tabelan`.* ,daftar_kelas.id,data_kelas.kelas FROM tabelan JOIN daftar_kelas on daftar_kelas.no_siswa=tabelan.no JOIN data_kelas on data_kelas.id=daftar_kelas.id_kelas WHERE nama LIKE'%$cari%' OR alamat LIKE'%$cari%' OR Kelas LIKE'%$cari%' ";
    } else {
      $sql=" SELECT `tabelan`.* ,daftar_kelas.id , data_kelas.kelas FROM tabelan JOIN daftar_kelas on daftar_kelas.no_siswa=tabelan.no JOIN data_kelas on data_kelas.id=daftar_kelas.id_kelas ";
    }
  
    
  
    $hasil=$koneksi->query($sql);
    $no=1;
  
  ?>
  <DOCTYPE! html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Perpustakaan</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">   	
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">  
</head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Perpustakaan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Daftar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
    </ul>
    <form class="form-inline" action="" method="get" role="search">
    <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  </div>
</nav>
      
      <div class="container m-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="row">#</th>
              <th scope="col">Nomor</th>
              <th scope="col">Judul</th>
              <th scope="col">Pengarang</th>
              <th scope="col">Genre</th>
              <th scope="col">Gambar</th>
              <th scope="col">Rak</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
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
                  <button class="btn btn-info" data-bs-toggle="modal" 
                  data-bs-target="#exampleModal" 
                  data-bs-id="<?= $data['id'] ?>" data-bs-aksi="ubah">Ubah</button>
                  <button class="btn btn-info" data-bs-toggle="modal" 
                  data-bs-target="#exampleModal" 
                  data-bs-id="<?= $data['id'] ?>" data-bs-aksi="hapus">Hapus</button>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
  </ul>
</nav>

      <!-- Modal -->
      <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
            </div>
          </div>
        </div>
                
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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
                id , aksi
              }, function(a) {
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

        $(document).ready( function () {
        $('table').DataTable();
        } );
      </script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    </body>

    </html>