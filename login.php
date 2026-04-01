<?php session_start(); include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>

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

/* CARD */
.box {
    width: 360px;
    padding: 35px;
    border-radius: 15px;
    background: #ffffff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    text-align: center;
}

.box h2 {
    margin-bottom: 20px;
    color: #333;
}

/* INPUT */
.input-group {
    position: relative;
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
    border-color: #7F00FF;
}

/* PASSWORD TOGGLE */
.toggle {
    position: absolute;
    right: 10px;
    top: 18px;
    cursor: pointer;
    font-size: 12px;
}

/* BUTTON */
button {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    border: none;
    border-radius: 8px;
    background: black;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #BDBEBE;
}

/* ERROR */
.error {
    margin-top: 10px;
    color: red;
}

/* LINK */
.link {
    margin-top: 15px;
    font-size: 14px;
}

.link a {
    color: #7F00FF;
    text-decoration: none;
}

.link a:hover {
    text-decoration: underline;
}
</style>

</head>
<body>

<div class="box">
    <h2>Login</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>

        <div class="input-group">
            <input type="password" id="password" name="password" placeholder="Password" required>
            <span class="toggle" onclick="togglePassword()"></span>
        </div>

        <button name="login">Masuk</button>
    </form>

    <?php
    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $data = $koneksi->query("SELECT * FROM users WHERE username='$user'");
        $d = $data->fetch_assoc();

        if($d && password_verify($pass,$d['password'])){
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
        } else {
            echo "<p class='error'>Username atau password salah</p>";
        }
    }
    ?>

    <div class="link">
        Belum punya akun? <a href="register.php">Register</a>
    </div>
</div>

<script>
function togglePassword() {
    var pass = document.getElementById("password");
    pass.type = (pass.type === "password") ? "text" : "password";
}
</script>

</body>
</html>