<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data User ROG</title>
<style>
    body {
        font-family: 'Orbitron', sans-serif;
        background: #000;
        color: #fff;
        padding: 40px;
        text-align: center;
    }
    h2 {
        color: #ff0033;
        margin-bottom: 30px;
    }
    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        color: #fff;
        box-shadow: 0 0 15px #ff0033;
    }
    th, td {
        border: 1px solid #ff0033;
        padding: 10px;
    }
    th {
        background: #ff0033;
    }
    a {
        display: inline-block;
        margin-top: 20px;
        background: #ff0033;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        transition: 0.3s;
    }
    a:hover {
        background: #ff3300;
        box-shadow: 0 0 15px #ff0033;
    }
</style>
</head>
<body>

<h2>DAFTAR USER TERDAFTAR</h2>

<table>
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Email</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM users");
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$no</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
              </tr>";
        $no++;
    }
    ?>
</table>

<a href="registrasi_rog.php">Kembali ke Form</a>

</body>
</html>
