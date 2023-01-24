<?php

include_once('koneksi.php');


// echo var_dump($_POST);

// Kolom Data Tabel

$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$foto = $_FILES['foto']['name'];


$insert_data = mysqli_query($koneksi, "INSERT into tabelan 
(`nama`,`nohp`,`alamat`,`sex`,`email`,`foto`) 
values ('$nama','$nohp','$alamat','$sex','$email','$foto') ");

//echo "Selamat $nama , alamat anda $alamat , berjenis kelamin $sex , dengan email $email";

//echo '<img src="assets/'.$foto.'" class="card-img-to[" alt="...."';

echo '<br>';

echo var_dump($_FILES);

move_uploaded_file($_FILES["foto"]["tmp_name"],'assets/'.$_FILES['foto']['name']);
echo "<meta http-equiv=refresh content=1;URL='index.php'>";