<?php
// logout.php
include 'koneksi.php'; // session_start() ada di koneksi.php

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login
header("location:login.php?pesan=anda_telah_logout");
exit();
?>
