<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Utama</title>

<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* HERO SECTION */
.hero {
    height: 100vh;
    background: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085') no-repeat center center/cover;
    position: relative;
    color: white;
}

/* overlay gelap */
.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.3);
}

/* isi hero */
.hero-content {
    position: relative;
    z-index: 1;
}

/* tombol */
.btn-custom {
    background: linear-gradient(45deg, #f6416c, #fff6b7);
    border: none;
    color: white;
    padding: 12px 30px;
    border-radius: 50px;
    font-weight: bold;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.btn-custom:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    background: linear-gradient(45deg, #fff6b7, #f6416c);
}

.btn-custom:active {
    transform: scale(0.95);
}
</style>

</head>
<body>


<!-- HERO -->
<section class="hero d-flex align-items-center text-center">
  <div class="container hero-content">
    <h1 class="display-4 fw-bold">Halo, user 👋🏻</h1>
    <p class="lead mt-3">
      Bangun aplikasi sederhana dengan sistem login, register, dan dashboard modern.
    </p>

    <a href="register.php" class="btn btn-custom btn-lg mt-4">Register</a>
  </div>
</section>

</body>
</html>
