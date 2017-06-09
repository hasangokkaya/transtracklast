<?php
$db_username = 'root';
$db_password = '';
$db_name = 'transtrack';
$db_host = 'localhost';
//mysqli
$con = mysqli_connect($db_host, $db_username, $db_password, $db_name); 
if (!$con) {
    die("Baglanti Basarisiz: " . mysqli_connect_error());
}
?>