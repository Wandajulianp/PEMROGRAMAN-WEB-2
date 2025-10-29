<?php
include 'koneksi.php';
$result = $conn->query("SELECT * FROM pendaftaran_les ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Pendaftar Les Menyetir</title>
<style>
body {
    font-family: "Google Sans", Arial, sans-serif;
    background-color: #f8f9fa;
    padding: 40px;
}
h2 {
    text-align: center;
    margin-bottom: 20px;
}
table {
    border-collapse: collapse;
    width: 100%;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
th, td {
    padding: 12px 15px;
    border-bottom: 1px solid #e0e0e0;
    text-align: left;
}
th {
    background-color: #1a73e8;
    color: white;
}
tr:hover {
    background-color: #f1f3f4;
}
a {
    display: inline-block;
    margin-top: 20px;
    color: #1a73e8;
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
<h2>Data Pendaftar Les Menyetir</h2>
<table>
    <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>Kode Pos</th>
        <th>Telepon</th>
        <th>Tempat/Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Sekolah Asal</th>
    </tr>
    <?php 
    $no = 1;
    while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['full_name'] ?></td>
        <td><?= $row['address'] ?></td>
        <td><?= $row['postal_code'] ?></td>
        <td><?= $row['telephone'] ?></td>
        <td><?= $row['place_date_birth'] ?></td>
        <td><?= $row['gender'] ?></td>
        <td><?= $row['religion'] ?></td>
        <td><?= $row['school_attended'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<a href="form_les.php">⬅ Kembali ke Form</a>
</body>
</html>
