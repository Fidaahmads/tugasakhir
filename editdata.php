<?php
include_once('koneksi.php');

//echo var_dump($_POST);
// Kolom data di table
$nomor = $_POST['Nomor'];
$judul = $_POST['Judul'];
$pengarang = $_POST['Pengarang'];
$gambar = $_FILES['Gambar'] ['name'];
$rak = $_POST['Rak']; 

$no = $_POST['id'];
$id_genre = $_POST['Genre'];

// echo "Selamat $nama , alamat anda $alamat , berjenis kelamin $jk No HP $nohp , dengan email $email <br>";

// echo '<img src="assets/'.$foto.'" class="card-img-top" alt="...">';

$query = "UPDATE data_buku set `Nomor` = '$nomor', `Judul` = '$judul', 
`Pengarang` = '$pengarang',`Gambar` = '$gambar',`Rak` = '$rak' where `no` = '$no'  ";

$update_data = mysqli_query($koneksi, $query);

if ($update_data) {
    echo "<p>Data berhasil masuk</p>";
}else{
    echo "<p>Data gagal masuk</p>";
}


$cek_data_genre = mysqli_query($koneksi,"select * from daftar_genre where `id_buku` = '$no'");
// update daftar kelas
if (mysqli_fetch_assoc($cek_data_genre)) {
    $query = mysqli_query($koneksi,"UPDATE daftar_genre set `id_genre` = '$id_genre' where `id_buku` = '$no'  ");

} else {
    $query = mysqli_query($koneksi,"insert daftar_genre values ( null,'$no','$id_genre') ");
}

echo "<br>";

// echo var_dump($_FILES);

// $nama = $_FILES["foto"]["name"];

move_uploaded_file($_FILES["Gambar"]["tmp_name"], 'assets/'.$gambar);
echo "<meta http-equiv=refresh content=1;URL='home.php'>";