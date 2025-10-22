<?php
include "koneksi.php";

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

// Simpan data
$sql = "INSERT INTO market (id, username, email, password) VALUES ('0', '$username', '$email', '$password')";


if (mysqli_query(mysql: $conn, query: $sql)) {
    echo "<h3>Data berhasil disimpan!</h3>";
    echo "<a href='tampil_user.php'>Lihat Data</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
