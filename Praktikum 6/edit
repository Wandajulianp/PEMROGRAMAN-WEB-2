<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pendaftar</title>
</head>
<body>

<h2>Edit Data</h2>

<form action="proses_edit.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $d['id'] ?>">

<label>Nama Lengkap:</label><br>
<input type="text" name="nama_lengkap" value="<?= $d['nama_lengkap'] ?>" required><br><br>

<label>Email:</label><br>
<input type="email" name="email" value="<?= $d['email'] ?>" required><br><br>

<label>Tanggal Lahir:</label><br>
<input type="date" name="tanggal_lahir" value="<?= $d['tanggal_lahir'] ?>" required><br><br>

<label>Alamat:</label><br>
<textarea name="alamat" required><?= $d['alamat'] ?></textarea><br><br>

<label>Program Dipilih:</label><br>
<select name="program_dipilih" required>
    <option value="IPA" <?= $d['program_dipilih']=='IPA'?'selected':'' ?>>IPA</option>
    <option value="IPS" <?= $d['program_dipilih']=='IPS'?'selected':'' ?>>IPS</option>
    <option value="Bahasa" <?= $d['program_dipilih']=='Bahasa'?'selected':'' ?>>Bahasa</option>
</select>
<br><br>

<label>Foto Saat Ini:</label><br>
<img src="uploads/<?= $d['foto'] ?>" width="120"><br><br>

<label>Ganti Foto (optional):</label><br>
<input type="file" name="foto"><br><br>

<button type="submit">Simpan Perubahan</button>

</form>

</body>
</html>
