<?php
include_once('koneksi.php');

// echo var_dump($_POST);
// Kolom data di table

$id = $_POST['id'];

// echo "Selamat $nama , alamat anda $alamat , berjenis kelamin $jk No HP $nohp , dengan email $email <br>";

// echo '<img src="assets/'.$foto.'" class="card-img-top" alt="...">';

$query = "select `foto` from `tabelan` join daftar_kelas on daftar_kelas.no_siswa=tabelan.no join data_kelas on data_kelas.id=daftar_kelas.id_kelas where `no` = '$no'  ";
$data_gambar = mysqli_query($koneksi, $query);
$gambar = mysqli_fetch_assoc($data_gambar);

// Hapus data di acces

unlink("assets/" . $gambar['Gambar']);

// Hapus data;

$hapus_data = mysqli_query($koneksi, "DELETE from `tabelan` JOIN daftar_kelas on daftar_kelas.no_siswa=tabelan.no left JOIN data_kelas on data_kelas.id=daftar_kelas.id_kelas 
where `no` = '$no' ");

if ($hapus_data) {
    echo "<p>Data berhasil dihapus</p>";
}else{
    echo "<p>Data gagal dihapus</p>";
}

echo "<br>";

header("Location: home.php");

?>