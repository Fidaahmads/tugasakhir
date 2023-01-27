<?php

require_once('getdata.php');
include 'koneksi.php';
//$id = $_POST['id'];
$ambil_data = mysqli_query($koneksi, "SELECT `data_buku`.* ,daftar_genre.id_genre , data_genre.Genre FROM data_buku JOIN daftar_genre on daftar_genre.id_buku=data_buku.no JOIN data_genre on data_genre.id=daftar_genre.id_genre where data_buku.no='$no';"); 

$data = mysqli_fetch_assoc($ambil_data);
$no = $data['no'];
$nomor = $data['Nomor'];
$judul = $data['Judul'];
$pengarang = $data['Pengarang'];
$idgenre = $data['id_genre'];
$gambar = $data['Gambar'];
$rak = $data['Rak'];


if ($_POST['aksi'] == 'ubah') {
?>

<form id="form" action="editdata.php" method="post" enctype="multipart/form-data">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"></label>
  <input type="hidden" name="id" class="form-control" 
  id="id" placeholder="id" value="<?php echo $no;?>">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nomor</label>
  <input type="text" name="Nomor" class="form-control" 
  id="Nomor" placeholder="Nomor" value="<?php echo $nomor;?>">Masukkan Nomor Seri
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Judul</label>
  <input type="text" name="Judul" class="form-control" 
  id="Judul" value="<?php echo $judul;?>" placeholder="Judul">Masukkan Judul Buku
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Pengarang</label>
  <input type="text" name="Pengarang" class="form-control" 
  id="Pengarang" placeholder="Pengarang" value="<?php echo $pengarang;?>">Masukkan Nama Pengarang
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Pilih Genre</label>
  <select name="Genre" class="form-select">
    <option>Pilih Genre</option>
    <?php
    //ambil database genre
    while ($genre = mysqli_fetch_assoc($ambil_data_genre)) {
      
      $selected = ($genre['id'] == $idgenre) ? 'selected' :
      '';
      echo "<option value='{$genre['id']}' $selected>".$genre
        ['Genre']."</option>";
    }
    ?>
  </select> 
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">Gambar</label>
  <input class="form-control" name="Gambar" type="file" 
  id="Gambar" value="<?php echo $gambar;?>">Upload Gambar Sampul
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">Rak</label>
  <input class="form-control" name="Rak" type="text" 
  id="Rak" value="<?php echo $rak;?>">Upload Gambar Sampul
</div>

<div class="col-12">
    <button class="btn btn-primary" type="submit">Ubah Data</button>
  </div>

</form>

<?php } else { ?>    
<p> Yakin Menghapus?</P>

<form action = "hapusdata.php" method = "post">
    <input type="hidden" name="id" value="<?= $no;?>">
    <input type="submit" value="hapus" class="btn btn-danger">
</form>
<?php } ?>
