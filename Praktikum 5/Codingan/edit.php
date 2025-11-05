<?php
include 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit();
}

$nim = $koneksi->real_escape_string($_GET['nim']);
$sql_edit = "SELECT nim, nama, jurusan, alamat FROM mahasiswa WHERE nim='$nim'";
$result_edit = $koneksi->query($sql_edit);

if ($result_edit->num_rows == 0) {
    echo "Data mahasiswa tidak ditemukan.";
    exit();
}
$data_edit = $result_edit->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>

    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --light-bg: #f8f9fa;
            --dark-text: #343a40;
            --warning-color: #ffc107;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: var(--primary-color);
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        hr {
            border: none;
            border-top: 1px solid #dee2e6;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px 0;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 5px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        .nim-display {
            font-weight: bold;
            color: var(--dark-text);
            display: block;
            padding: 10px 0;
        }

        .btn-back {
            display: inline-block;
            padding: 8px 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            background-color: var(--secondary-color);
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }

        input[type="submit"] {
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Mahasiswa: <span style="color: var(--warning-color);"><?php echo htmlspecialchars($data_edit['nama']); ?></span></h1>
        
        <a href="administrasi.php" class="btn-back">Kembali ke Data Mahasiswa</a>
        
        <hr>
        
        <form method="POST" action="proses_edit.php">
            <table>
                <tr>
                    <td>NIM</td>
                    <td>
                        <span class="nim-display"><?php echo htmlspecialchars($data_edit['nim']); ?></span>
                        <input type="hidden" name="nim" value="<?php echo htmlspecialchars($data_edit['nim']); ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?php echo htmlspecialchars($data_edit['nama']); ?>" required></td>
                </tr>
                <tr>
                    <td>Jurusan/Prodi</td>
                    <td><input type="text" name="jurusan" value="<?php echo htmlspecialchars($data_edit['jurusan']); ?>" required></td>
                    </tr>
                <tr>
                    <td>Alamat</td>
                    <td><textarea name="alamat" required><?php echo htmlspecialchars($data_edit['alamat']); ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN PERUBAHAN"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
