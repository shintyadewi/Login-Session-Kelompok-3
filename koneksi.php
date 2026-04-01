<?php
$koneksi = new mysqli("localhost", "root", "", "login");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>