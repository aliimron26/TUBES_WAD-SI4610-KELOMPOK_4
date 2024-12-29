<?php 
$host = "localhost"; // Nama server "localhost"
$username = "root"; // Nama pengguna database
$password = ''; // Kata sandi pengguna database
$db = "telyulook"; // Nama database

// Membuat Koneksi
$conn = mysqli_connect($host, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>