<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$q = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($q);

if ($data) {
    // simpan ke session
    $_SESSION['username'] = $data['username'];
    $_SESSION['gender']   = $data['gender'];

    header("Location: home.php");
} else {
    echo "Login gagal! <a href='login.php'>Coba lagi</a>";
}
?>
