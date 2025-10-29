<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Validasi Modern</title>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f2f6ff;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        padding: 40px;
    }
    .container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        padding: 30px 40px;
        width: 400px;
    }
    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }
    input[type="text"], input[type="email"], textarea {
        width: 100%;
        padding: 10px;
        margin: 8px 0 16px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
    }
    textarea {
        resize: none;
        height: 80px;
    }
    label {
        font-weight: 600;
        color: #444;
    }
    .gender-group {
        margin-bottom: 20px;
    }
    .btn {
        background-color: #0066ff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        font-weight: bold;
        font-size: 15px;
        transition: 0.3s;
    }
    .btn:hover {
        background-color: #004ecc;
    }
    .output {
        margin-top: 30px;
        padding: 20px;
        background: #eef3ff;
        border-radius: 10px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #0066ff;
        color: white;
    }
</style>
</head>
<body>
<div class="container">
    <h2>PHP Form Validation (Modern)</h2>
    <form method="POST" action="">
        <label>Nama:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Website:</label>
        <input type="text" name="website">

        <label>Komentar:</label>
        <textarea name="comment"></textarea>

        <div class="gender-group">
            <label>Gender:</label><br>
            <input type="radio" name="gender" value="Female" required> Female
            <input type="radio" name="gender" value="Male" required> Male
            <input type="radio" name="gender" value="Other" required> Other
        </div>

        <button type="submit" name="submit" class="btn">Kirim</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $comment = $_POST['comment'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO form_input (name, email, website, comment, gender)
                VALUES ('$name', '$email', '$website', '$comment', '$gender')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='output'><h4>Data berhasil disimpan!</h4>
            <table>
                <tr><th>Field</th><th>Value</th></tr>
                <tr><td>Nama</td><td>$name</td></tr>
                <tr><td>Email</td><td>$email</td></tr>
                <tr><td>Website</td><td>$website</td></tr>
                <tr><td>Komentar</td><td>$comment</td></tr>
                <tr><td>Gender</td><td>$gender</td></tr>
            </table>
            </div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <br>
    <a href="lihat_data.php" style="text-decoration:none;">
        <button class="btn" type="button" style="background:#00cc66;">Lihat Data Tersimpan</button>
    </a>
</div>
</body>
</html>
