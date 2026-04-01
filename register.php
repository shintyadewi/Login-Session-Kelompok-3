<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    height: 100vh;
    background: linear-gradient(135deg, #C07F45, #F8B976);
    display: flex;
    justify-content: center;
    align-items: center;
}

.box {
    width: 360px;
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    text-align: center;
}

.box h2 {
    margin-bottom: 20px;
    color: #333;
}

input {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.3s;
}

input:focus {
    border-color: #4CAF50;
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    border: none;
    border-radius: 8px;
    background: black;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #BDBEBE;
}

.success {
    color: green;
    margin-top: 10px;
}

.error {
    color: red;
    margin-top: 10px;
}

.link {
    margin-top: 15px;
    font-size: 14px;
}

.link a {
    color: #4CAF50;
    text-decoration: none;
}

.link a:hover {
    text-decoration: underline;
}
</style>

</head>
<body>

<div class="box">
    <h2>Register</h2>

    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="register">Daftar</button>
    </form>

    <?php
    if(isset($_POST['register'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // cek username sudah ada
        $cek = $koneksi->query("SELECT * FROM users WHERE username='$username'");

        if($cek->num_rows > 0){
            echo "<p class='error'>Username sudah digunakan!</p>";
        } else {
            $koneksi->query("INSERT INTO users(nama, username, password) 
                             VALUES('$nama','$username','$password')");
            echo "<p class='success'>Registrasi berhasil!</p>";
        }
    }
    ?>

    <div class="link">
        Sudah punya akun? <a href="login.php">Login</a>
    </div>
</div>

</body>
</html>