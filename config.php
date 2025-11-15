<?php
// config.php - File untuk menyambungkan ke database To-Do List Tugas Kuliah

$servername = "localhost";     // Server database
$username = "root";            // Username database (default XAMPP)
$password = "";                // Password database (kosong di XAMPP)
$dbname = "list_tugas";         // Nama database To-Do List
$port = 3307;                  // Port MySQL default XAMPP biasanya 3306

// Membuat koneksi ke database MySQL
$mysqli = new mysqli($servername, $username, $password, $dbname, $port);

// Cek apakah koneksi berhasil
if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}

// Set charset ke UTF-8 agar mendukung karakter Indonesia
$mysqli->set_charset("utf8");

echo "Koneksi ke database LIst Tugas berhasil!";
?>
