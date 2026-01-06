<?php
session_start();
include 'koneksi.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

function kirimEmail($email, $nama, $passwordAsli) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'juliangans15@gmail.com';
        $mail->Password   = 'nlweawmadubxxamd'; // app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('juliangans15@gmail.com', 'Tiket Bus Online');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Registrasi Berhasil';
        $mail->Body = "
            <h3>Halo $nama 👋</h3>
            <p>Akun Anda <b>berhasil terdaftar</b> di sistem Tiket Bus Online.</p>
            <p><b>Email:</b> $email</p>
            <p><b>Password:</b> $passwordAsli</p>
            <p>Silakan login menggunakan email dan password yang Anda daftarkan.</p>
            <br>
            <small>Jangan bagikan data akun Anda kepada siapa pun.</small>
        ";

        $mail->send();
    } catch (Exception $e) {
        // optional: log error
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama       = $_POST['nama'];
    $email      = $_POST['email'];
    $passwordAsli = $_POST['password'];
    $password   = password_hash($passwordAsli, PASSWORD_DEFAULT);
    $no_hp      = $_POST['no_hp'];
    $alamat     = $_POST['alamat'];

    $cek_email = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah digunakan!'); window.location='register.php';</script>";
    } else {
        $sql = "INSERT INTO users (nama, email, password, no_hp, alamat)
                VALUES ('$nama','$email','$password','$no_hp','$alamat')";

        if (mysqli_query($koneksi, $sql)) {
            kirimEmail($email, $nama, $passwordAsli); // ✅ PANGGIL EMAIL
            echo "<script>alert('Registrasi berhasil! Silakan cek email.'); window.location='login.php';</script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Penumpang - Tiket Bus</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 380px;
            margin: 80px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
        p {
            text-align: center;
            margin-top: 15px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            color: white;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrasi Penumpang</h2>
        <form method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="no_hp" placeholder="Nomor HP" required>
            <textarea name="alamat" placeholder="Alamat Lengkap" required></textarea>
            <button type="submit">Daftar</button>
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </form>
    </div>

    <footer>
        © 2025 Tiket Bus Indonesia | Ikuti kami di 
        <a href="#">Facebook</a> • <a href="#">Instagram</a> • <a href="#">Twitter</a>
    </footer>
</body>
</html>
