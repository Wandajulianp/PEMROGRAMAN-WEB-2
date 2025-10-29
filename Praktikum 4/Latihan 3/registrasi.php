<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Registrasi ROG Style</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap');

    body {
        font-family: 'Orbitron', sans-serif;
        background: radial-gradient(circle at center, #0d0d0d 0%, #000 100%);
        color: #fff;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        background: rgba(20, 20, 20, 0.9);
        border: 2px solid #ff0033;
        border-radius: 15px;
        padding: 40px;
        width: 400px;
        box-shadow: 0 0 20px #ff0033;
        animation: glow 2s infinite alternate;
    }

    @keyframes glow {
        from { box-shadow: 0 0 15px #ff0033; }
        to { box-shadow: 0 0 30px #ff0033; }
    }

    h2 {
        text-align: center;
        color: #ff0033;
        margin-bottom: 25px;
        font-size: 1.6em;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 10px 0 20px 0;
        border: none;
        border-radius: 8px;
        background: #1a1a1a;
        color: #fff;
        font-size: 14px;
        outline: none;
        box-shadow: inset 0 0 8px #ff0033;
        transition: 0.3s;
    }

    input:focus {
        box-shadow: 0 0 12px #ff0033;
    }

    .btn {
        width: 100%;
        padding: 10px;
        background: linear-gradient(90deg, #ff0033, #ff3300);
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn:hover {
        background: linear-gradient(90deg, #ff3300, #ff0033);
        box-shadow: 0 0 20px #ff0033;
    }

    .output {
        background: rgba(255, 255, 255, 0.05);
        margin-top: 20px;
        border-radius: 8px;
        padding: 15px;
        border: 1px solid #ff0033;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        color: white;
    }
    th, td {
        padding: 8px;
        border: 1px solid #ff0033;
        text-align: left;
    }
    th {
        background-color: #ff0033;
    }

    a {
        color: #ff0033;
        text-decoration: none;
        font-weight: bold;
    }

</style>
</head>
<body>

<div class="container">
    <h2>FORM REGISTRASI ROG</h2>
    <form method="POST" action="">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="confirm_password" required>

        <button type="submit" name="submit" class="btn">Daftar</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm_password'];

        if ($password !== $confirm) {
            echo "<div class='output'><p style='color:red;'>⚠️ Password tidak sama!</p></div>";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$hashed')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='output'>
                        <h4 style='color:#ff0033;'>✅ Data Berhasil Disimpan</h4>
                        <table>
                            <tr><th>Field</th><th>Value</th></tr>
                            <tr><td>Username</td><td>$username</td></tr>
                            <tr><td>Email</td><td>$email</td></tr>
                            <tr><td>Password</td><td>(Terenkripsi)</td></tr>
                        </table>
                        <br>
                        <a href='lihat_user.php'>Lihat Semua Pengguna</a>
                      </div>";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
    ?>
</div>

</body>
</html>
