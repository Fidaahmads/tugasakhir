<?php
session_start();
include_once('connect.php');
$username=$_POST['username'];
$password=$_POST['password'];


$sql = "SELECT * FROM `login` where username='$username' and password='$password'";
$hasil = $koneksi->query($sql);
$cek = $hasil->num_rows;

if ($cek > 0) {
    if (isset($_POST['remember'])) {
        setcookie('login','berhasil',time()+60);
        setcookie('user',$username,time()+60);
    }
@$_SESSION['user']=$username;
@$_SESSION['status']="sukses";
header("Location: index.php");
}else {
    header("Location: login.php?pesan=gagal");    
}


//echo var_dump($_POST)



?>
