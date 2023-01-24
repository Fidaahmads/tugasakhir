<?php

require_once('getdata.php');

$id = $data['id'];
$nomor = $data['Nomor'];
$judul = $data['Judul'];
$pengarang = $data['Pengarang'];
$idgenre = $data['id_Genre'];
$gambar = $data['Gambar'];
$rak = $data['Rak'];


if ($_POST['aksi'] == 'ubah') {
?>

<form id="form" action="editdata.php" method="post" enctype="multipart/form-data">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"></label>
  <input type="hidden" name="id" class="form-control" 
  id="id" placeholder="id" value="<?php echo $id;?>">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nomor</label>
  <input type="text" name="nama" class="form-control" 
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
  <select name="kelas" class="form-select">
    <option>Pilih Kelas</option>
    <?php
    //ambil database kelas
    while ($kelas = mysqli_fetch_assoc($ambil_data_kelas)) {
      
      $selected = ($kelas['id'] == $idkelas) ? 'selected' :
      '';
      echo "<option value='{$kelas['id']}' $selected>".$kelas
        ['Kelas']."</option>";
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
  <label for="exampleFormControlInput1" class="form-label">Pilih Rak</label>
  <select name="Rak" class="form-select">
    <option>Pilih Rak</option>
    <?php
    //ambil database kelas
    while ($kelas = mysqli_fetch_assoc($ambil_data_kelas)) {
      
      $selected = ($kelas['id'] == $idkelas) ? 'selected' :
      '';
      echo "<option value='{$kelas['id']}' $selected>".$kelas
        ['Kelas']."</option>";
    }
    ?>
  </select> 
</div>

<div class="col-12">
    <button class="btn btn-primary" type="submit">Ubah Data</button>
  </div>

</form>

<?php } else { ?>    
<p> Yakin Menghapus?</P>

<form action = "hapusdata.php" method = "post">
    <input type="hidden" name="id" value="<?= $id;?>">
    <input type="submit" value="hapus" class="btn btn-danger">
</form>
<?php } ?>
