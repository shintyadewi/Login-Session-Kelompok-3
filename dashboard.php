<?php 
session_start(); 
include 'koneksi.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

// ambil data user berdasarkan session
$data = $koneksi->query("SELECT * FROM users WHERE username='".$_SESSION['user']."'");
$user = $data->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    display: flex;
    background: #f4f6f9;
}

/* MAIN */
.main {
    flex: 1;
}

/* HEADER */
.header {
    background: white;
    padding: 15px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.header .user {
    font-weight: bold;
}

/* CONTENT */
.content {
    padding: 20px;
}

/* CARD */
.card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.card-box {
    flex: 1;
    min-width: 200px;
    background: linear-gradient(135deg, #2196F3, #64B5F6);
    color: white;
    padding: 20px;
    border-radius: 12px;
}

.logout {
    color: red;
    text-decoration: none;
}
</style>

</head>
<body>

<!-- SIDEBAR -->


<!-- MAIN -->
<div class="main">

    <!-- HEADER -->
    <div class="header">
        <div>Dashboard</div>
        <div class="user">
            <?php echo $user['username']; ?> | 
            <a href="index.php" class="logout">Logout</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="card">
            <h2>Selamat Datang 👋</h2>
            <p>Halo <b><?php echo $user['username']; ?></b>, selamat datang di dashboard!</p>
        </div>

       

    </div>
</div>

</body>
</html>