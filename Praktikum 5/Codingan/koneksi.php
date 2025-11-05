<?php

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "administrasi_data";


$koneksi = new mysqli($host, $user, $pass, $db_name);

if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

session_start();
?>
