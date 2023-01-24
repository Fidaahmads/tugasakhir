<?php

include_once('koneksi.php');


// echo var_dump($_POST);

// Kolom Data Tabel

$id = $_POST['id'];
$ambil_data = mysqli_query($koneksi, "SELECT `tabelan`.* ,daftar_kelas.id_kelas , data_kelas.kelas FROM tabelan JOIN daftar_kelas on daftar_kelas.no_siswa=tabelan.no JOIN data_kelas on data_kelas.id=daftar_kelas.id_kelas
where `id` = '$id'"); 

$data = mysqli_fetch_assoc($ambil_data);

$ambil_data_kelas = mysqli_query($koneksi, "select * from `data_kelas` "); 

?>