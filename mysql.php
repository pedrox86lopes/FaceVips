<?php
// Mysql settings
//Lembre-se da pasta images com as fotos...
$user   = "USER";
$password = "PASS";
$database = "images";
$host   = "localhost";
mysql_connect($host,$user,$password);
mysql_select_db($database) or die( "Nao pode conectar!");
?>
