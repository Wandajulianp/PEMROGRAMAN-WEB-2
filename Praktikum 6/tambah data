<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Data Pendaftar</title>
<style>
    body {
        font-family: "Poppins", sans-serif;
        background: #f3f3f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
    }

    .container {
        background: white;
        width: 450px;
        padding: 30px;
        margin-top: 40px;
        border-radius: 15px;
        box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 26px;
        font-weight: 600;
    }

    label {
        font-weight: 500;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    textarea,
    select,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 15px;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #4c63ff;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background: #3546d6;
    }

    #preview {
        display: none;
        width: 140px;
        border-radius: 10px;
        border: 2px solid #ddd;
        margin-top: 10px;
    }
</style>
</head>
<body>

<div class="container">
<h2>Tambah Data Pendaftar</h2>

<form action="proses_pendaftaran.php" method="POST" enctype="multipart/form-data">

<label>Nama Lengkap:</label>
<input type="text" name="nama_lengkap" required>

<label>Email:</label>
<input type="email" name="email" required>

<label>Tanggal Lahir:</label>
<input type="date" name="tanggal_lahir" required>

<label>Alamat:</label>
<textarea name="alamat" rows="3" required></textarea>

<label>Program Dipilih:</label>
<select name="program_dipilih" required>
    <option disabled selected>-- Pilih Program --</option>
    <option value="IPA">IPA</option>
    <option value="IPS">IPS</option>
    <option value="Bahasa">Bahasa</option>
</select>

<label>Upload Foto:</label>
<input type="file" name="foto" id="foto" accept="image/*" required>

<img id="preview" alt="Preview Foto">

<button type="submit">Simpan Data</button>

<br><br>
<a href="tampil_foto.php">
<button type="button" style="background:#333;">Kembali</button>
</a>

</form>
</div>

<script>
const fotoInput = document.getElementById('foto');
const preview = document.getElementById('preview');

fotoInput.addEventListener('change', function(){
    const file = this.files[0];
    if(file){
        preview.style.display = "block";
        preview.src = URL.createObjectURL(file);
    }
});
</script>

</body>
</html>
