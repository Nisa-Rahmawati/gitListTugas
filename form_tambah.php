<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Tambah Tugas</h3>
    <form action="proses_tambah.php" method="POST">
        <label>Judul Tugas:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Mata Kuliah:</label><br>
        <input type="text" name="course" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="description" rows="4"></textarea><br><br>

        <label>Deadline:</label><br>
        <input type="date" name="deadline"><br><br>

        <label>Status:</label><br>
        <select name="status">
            <option>Belum Dikerjakan</option>
            <option>Selesai</option>
        </select><br><br>

        <label>Prioritas:</label><br>
        <select name="priority">
            <option>Rendah</option>
            <option selected>Sedang</option>
            <option>Tinggi</option>
        </select><br><br>

        <button type="submit">Tambah Tugas</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
