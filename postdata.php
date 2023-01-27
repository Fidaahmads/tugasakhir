<?php

include_once('koneksi.php');


// echo var_dump($_POST);

// Kolom Data Tabel

$nomor = $_POST['Nomor'];
$judul = $_POST['Judul'];
$pengarang = $_POST['Pengarang'];
$gambar = $_FILES['Gambar']['name'];
$rak = $_POST['Rak'];
$id_genre = $_POST ['Genre']; 


$insert_data = mysqli_query($koneksi, "INSERT into data_buku 
(`Nomor`,`Judul`,`Pengarang`,`Gambar`,`Rak`) 
values ('$nomor','$judul','$pengarang','$gambar','$rak') ");

$id = $koneksi->insert_id;


 mysqli_query($koneksi,"INSERT into daftar_genre (`id_genre`,`id_buku`) values ('$id_genre','$id')");

//echo "Selamat $Nomor , alamat anda $alamat , berjenis kelamin $sex , dengan email $email";

//echo '<img src="assets/'.$foto.'" class="card-img-to[" alt="...."';

echo '<br>';

// echo var_dump($_FILES);

move_uploaded_file($_FILES["Gambar"]["tmp_name"],'assets/'.$gambar);
echo "<meta http-equiv=refresh content=1;URL='index.php'>";