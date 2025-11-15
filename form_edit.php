<?php
include 'config.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Query untuk mengambil data berdasarkan ID
$stmt = $mysqli->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Jika data tidak ditemukan, hentikan eksekusi
if (!$data) {
    die("Data tugas tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas Kuliah</title>
    <link rel="stylesheet" href="style.css">
    <!-- Link Font Awesome untuk simbol -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-edit"></i> Edit Tugas Kuliah</h2>

        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <label for="title"><i class="fas fa-tasks"></i> Judul Tugas:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($data['title']); ?>" required>

            <label for="course"><i class="fas fa-book"></i> Mata Kuliah:</label>
            <input type="text" id="course" name="course" value="<?= htmlspecialchars($data['course']); ?>" required>

            <label for="description"><i class="fas fa-align-left"></i> Deskripsi:</label>
            <textarea id="description" name="description" rows="4"><?= htmlspecialchars($data['description']); ?></textarea>

            <label for="deadline"><i class="fas fa-calendar-alt"></i> Deadline:</label>
            <input type="date" id="deadline" name="deadline" value="<?= $data['deadline']; ?>">

            <label for="status"><i class="fas fa-info-circle"></i> Status:</label>
            <select id="status" name="status">
                <option value="Belum Dikerjakan" <?= $data['status']=='Belum Dikerjakan'?'selected':''; ?>>Belum Dikerjakan</option>
                <option value="Selesai" <?= $data['status']=='Selesai'?'selected':''; ?>>Selesai</option>
            </select>

            <label for="priority"><i class="fas fa-exclamation-circle"></i> Prioritas:</label>
            <select id="priority" name="priority">
                <option value="Rendah" <?= $data['priority']=='Rendah'?'selected':''; ?>>Rendah</option>
                <option value="Sedang" <?= $data['priority']=='Sedang'?'selected':''; ?>>Sedang</option>
                <option value="Tinggi" <?= $data['priority']=='Tinggi'?'selected':''; ?>>Tinggi</option>
            </select>

            <button type="submit"><i class="fas fa-save"></i> Update Tugas</button>
            <a href="index.php" class="cancel-btn"><i class="fas fa-times"></i> Batal</a>
        </form>
    </div>
</body>
</html>
