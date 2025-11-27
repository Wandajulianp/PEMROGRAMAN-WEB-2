<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
<p>Gender: <?php echo $_SESSION['gender']; ?></p>

<br>
<a href="logout.php">Logout</a>
