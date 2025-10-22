<?php
include "koneksi.php";

$result = mysqli_query(mysql: $conn, query: "SELECT * FROM market");
?>

<h2>Daftar User</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Tanggal Dibuat</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['tanggal_dibuat']; ?></td>
        </tr>
        <body> <a href='form_users.php'>Tambah User</a></body>
    <?php } ?>
</table>
