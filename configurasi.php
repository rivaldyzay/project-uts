<?php
session_start();
include 'config.php';
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['ganti'])) {
    $newpass = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
    $username = $_SESSION['username'];
    $q = mysqli_query($conn, "UPDATE users SET password='$newpass' WHERE username='$username'");
    if ($q) {
        echo "Password berhasil diganti!";
    }
}
?>
<form method="post">
    Password Baru: <input type="password" name="newpass" required><br>
    <button type="submit" name="ganti">Ganti Password</button>
</form>