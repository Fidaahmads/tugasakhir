<?php

session_start();
session_destroy();

setcookie("login",null,time()-60);

header("Location: login.php");

?>

