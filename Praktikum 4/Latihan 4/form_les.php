<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $telephone = $_POST['telephone'];
    $place_date_birth = $_POST['place_date_birth'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $school_attended = $_POST['school_attended'];

    $sql = "INSERT INTO pendaftaran_les (full_name, address, postal_code, telephone, place_date_birth, gender, religion, school_attended)
            VALUES ('$full_name', '$address', '$postal_code', '$telephone', '$place_date_birth', '$gender', '$religion', '$school_attended')";

    if ($conn->query($sql)) {
        $success = true;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pendaftaran Les Menyetir</title>
<style>
body {
    font-family: "Google Sans", Arial, sans-serif;
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding-top: 30px;
}
.container {
    background: #fff;
    padding: 25px 35px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    width: 420px;
}
h2 {
    color: #202124;
    font-weight: 500;
    text-align: center;
    margin-bottom: 20px;
}
label {
    font-size: 14px;
    color: #5f6368;
    display: block;
    margin-top: 12px;
}
input[type="text"],
textarea,
select {
    width: 100%;
    padding: 8px 10px;
    margin-top: 5px;
    border: 1px solid #dadce0;
    border-radius: 6px;
    font-size: 14px;
}
input[type="radio"] {
    margin-right: 5px;
}
button {
    background-color: #1a73e8;
    color: white;
    border: none;
    padding: 10px 18px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 500;
    float: right;
    margin-top: 15px;
}
button:hover {
    background-color: #155ab6;
}
.success-box {
    background: #e6f4ea;
    border-left: 5px solid #34a853;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 8px;
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
<div class="container">
    <h2>Formulir Pendaftaran Les Menyetir</h2>

    <?php if (!empty($success)): ?>
        <div class="success-box">
            ✅ Data berhasil disimpan! <a href="lihat_data.php">Lihat Data</a>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Nama Lengkap:</label>
        <input type="text" name="full_name" required>

        <label>Alamat:</label>
        <textarea name="address" required></textarea>

        <label>Kode Pos:</label>
        <input type="text" name="postal_code" required>

        <label>No. Telepon:</label>
        <input type="text" name="telephone" required>

        <label>Tempat/Tanggal Lahir:</label>
        <input type="text" name="place_date_birth" placeholder="Contoh: Tegal, 01 Januari 2000" required>

        <label>Jenis Kelamin:</label>
        <input type="radio" name="gender" value="Laki-laki" required> Laki-laki
        <input type="radio" name="gender" value="Perempuan" required> Perempuan

        <label>Agama:</label>
        <select name="religion" required>
            <option value="">-- Pilih Agama --</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
            <option value="Lainnya">Lainnya</option>
        </select>

        <label>Sekolah Asal:</label>
        <input type="text" name="school_attended">

        <button type="submit">Kirim</button>
    </form>
</div>
</body>
</html>
