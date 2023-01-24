<html>
    <body>
<?php
echo "<h1>Hello Doumou!</h1>";

// nama siswa

$nama1 = "Fati";
$nama2 = "Fadi";
$nama3 = "Fawi";
$nama4 = "Fayi";

//echo $nama2

$data_siswa = array('Fati','Fadi','Fawi','Fayi');

echo $data_siswa[3];

for ($i=0; , count(data_siswa); $i++) {
    echo $data_siswa[$i]. "<br>";
}
function ucapan ()
{
    echo "selamat sore $nama<br>";

ucapan("Fati");
ucapan("Fati");
ucapan("Fawi");
ucapan("Fayi");
}

// Buat Form

<form action=""method="get">
    <label for="nama">Nama</label>
    <input type="text" name="nama">

    </body>
</html>