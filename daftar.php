<?php
include 'config.php';

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek username unik
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "Username sudah terdaftar!";
    } else {
        $q = mysqli_query($conn, "INSERT INTO users (username,password) VALUES ('$username','$password')");
        if ($q) {
            echo "Daftar berhasil. Silakan <a href='login.php'>Login</a>";
        } else {
            echo "Gagal daftar!";
        }
    }
}
?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit" name="daftar">Daftar</button>
</form>