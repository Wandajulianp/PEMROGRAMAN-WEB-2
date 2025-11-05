<?php
// administrasi.php
include 'koneksi.php';

// Cek Sesi (tetap pada prinsip keamanan)
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrasi Data Mahasiswa</title>
    
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --light-bg: #f8f9fa;
            --dark-text: #343a40;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
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

        .btn {
            display: inline-block;
            padding: 8px 15px;
            margin-right: 5px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
            white-space: nowrap;
        }
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-logout {
            float: right;
            background-color: var(--secondary-color);
            color: white;
            margin-top: -30px;
        }
        .btn-logout:hover {
            background-color: #5a6268;
        }

        
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            text-align: left;
            padding: 12px 15px;
            border: none;
        }
        thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 700;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #e9ecef;
        }
        
        .action-links a {
            color: var(--primary-color);
            text-decoration: none;
            margin: 0 5px;
            font-size: 0.95em;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .action-links a:last-child {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="logout.php" class="btn btn-logout">LOGOUT</a>
        <h2>👋 Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Ini adalah halaman administrasi data mahasiswa. Gunakan menu di bawah untuk mengelola data.</p>
        
        <hr>

        <h3>Data Mahasiswa</h3>

        <p>
            <a href="tambah.php" class="btn btn-primary">Tambah Data Mahasiswa</a>
        </p>

        <?php
        $no = 1;
        $sql_mahasiswa = "SELECT nim, nama, jurusan, alamat FROM mahasiswa ORDER BY nim ASC";
        $query_mahasiswa = $koneksi->query($sql_mahasiswa);
        ?>

        <?php if ($query_mahasiswa->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data_mhs = $query_mahasiswa->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($data_mhs['nim']); ?></td>
                            <td><?php echo htmlspecialchars($data_mhs['nama']); ?></td>
                            <td><?php echo htmlspecialchars($data_mhs['jurusan']); ?></td>
                            <td><?php echo htmlspecialchars($data_mhs['alamat']); ?></td>
                            <td class="action-links">
                                <a href="edit.php?nim=<?php echo $data_mhs['nim']; ?>">Edit</a> |
                                <a href="proses_hapus.php?nim=<?php echo $data_mhs['nim']; ?>"
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada data mahasiswa ditemukan.</p>
        <?php endif; ?>

        <?php
        $koneksi->close();
        ?>
    </div>
</body>
</html>
