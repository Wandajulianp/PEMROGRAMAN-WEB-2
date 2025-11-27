<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']); // enkripsi
$gender   = $_POST['gender'];

$query = "INSERT INTO login VALUES('$username', '$password', '$gender')";
$save = mysqli_query($koneksi, $query);

if ($save) {
    echo "Pendaftaran berhasil! <a href='login.php'>Login sekarang</a>";
} else {
    echo "Pendaftaran gagal: " . mysqli_error($koneksi);
}
?>
