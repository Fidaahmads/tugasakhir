<?php

include_once('koneksi.php');


// echo var_dump($_POST);

// Kolom Data Tabel

$no = $_POST['id'];
$ambil_data = mysqli_query($koneksi, "SELECT `data_buku`.* ,daftar_genre.id_genre , data_genre.Genre FROM data_buku JOIN daftar_genre on daftar_genre.id_buku=data_buku.no JOIN data_genre on data_genre.id=daftar_genre.id_genre where `no`='$no';"); 

$data = mysqli_fetch_assoc($ambil_data);
//var_dump($data);die;

$ambil_data_genre = mysqli_query($koneksi, "select * from `data_genre` "); 

?>