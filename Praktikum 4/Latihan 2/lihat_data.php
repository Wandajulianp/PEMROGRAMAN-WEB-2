<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Tersimpan</title>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f8f9ff;
        padding: 40px;
    }
    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #0066ff;
        color: white;
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }
    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        text-decoration: none;
        background: #0066ff;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        width: 200px;
        margin-left: auto;
        margin-right: auto;
    }
    a:hover {
        background: #004ecc;
    }
</style>
</head>
<body>
<h2>Data Inputan Form Validation</h2>
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Website</th>
        <th>Komentar</th>
        <th>Gender</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM form_input");
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$no</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['website']}</td>
                <td>{$row['comment']}</td>
                <td>{$row['gender']}</td>
              </tr>";
        $no++;
    }
    ?>
</table>
<a href="form_validation.php">Kembali ke Form</a>
</body>
</html>
