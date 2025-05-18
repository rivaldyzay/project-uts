<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
?>
<h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
<a href="logout.php">Logout</a>