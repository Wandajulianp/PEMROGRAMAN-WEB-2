<?php
include 'koneksi.php';

$id      = $_POST['id'];
$nama    = $_POST['nama_lengkap'];
$email   = $_POST['email'];
$tgl     = $_POST['tanggal_lahir'];
$alamat  = $_POST['alamat'];
$program = $_POST['program_dipilih'];

// Ambil foto lama
$data = mysqli_query($koneksi, "SELECT foto FROM pendaftar WHERE id='$id'");
$lama = mysqli_fetch_assoc($data);
$foto_lama = $lama['foto'];


// Cek apakah ganti foto baru
if($_FILES['foto']['name'] != "") {
    $foto_baru = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "uploads/";

    // upload foto baru
    move_uploaded_file($tmp, $folder.$foto_baru);

    // hapus foto lama
    if(file_exists("uploads/".$foto_lama)) {
        unlink("uploads/".$foto_lama);
    }

    $foto_final = $foto_baru;
} else {
    $foto_final = $foto_lama;
}


// Update database
$query = "UPDATE pendaftar SET 
            nama_lengkap='$nama',
            email='$email',
            tanggal_lahir='$tgl',
            alamat='$alamat',
            program_dipilih='$program',
            foto='$foto_final'
          WHERE id='$id'";

if(mysqli_query($koneksi, $query)) {
    echo "<script>
            alert('Data berhasil diupdate!');
            window.location='tampil_foto.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
