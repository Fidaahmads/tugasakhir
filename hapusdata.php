<?php
include_once('koneksi.php');

// echo var_dump($_POST);
// Kolom data di table

$no = $_POST['id'];

// echo "Selamat $nama , alamat anda $alamat , berjenis kelamin $jk No HP $nohp , dengan email $email <br>";

// echo '<img src="assets/'.$foto.'" class="card-img-top" alt="...">';

$query = "select `Gambar` from `data_buku` join daftar_genre on daftar_genre.id_buku=data_buku.no join data_genre on data_genre.id=daftar_genre.id_genre where data_buku.`no` = '$no'  ";
$data_gambar = mysqli_query($koneksi, $query);
$gambar = mysqli_fetch_assoc($data_gambar);

// Hapus data di acces
if (($gambar['Gambar'] != "")) {
    # code...
unlink("assets/" . $gambar['Gambar']);
}

// Hapus data;

$hapus_data = mysqli_query($koneksi, "DELETE from `data_buku` where data_buku.`no` = '$no' ");

if ($hapus_data) {
    echo "<p>Data berhasil dihapus</p>";
}else{
    echo "<p>Data gagal dihapus</p>";
}

echo "<br>";

header("Location: home.php");
