<?php
include 'config.php';
$search = isset($_GET['search']) ? $_GET['search'] : '';

if(!empty($search)) {
    $stmt = $mysqli->prepare("SELECT * FROM tasks WHERE title LIKE ? OR course LIKE ? ORDER BY deadline ASC");
    $param = "%".$search."%";
    $stmt->bind_param("ss",$param,$param);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $mysqli->query("SELECT * FROM tasks ORDER BY deadline ASC");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tugas Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>📘 Daftar Tugas Kuliah</h2>

<a href="form_tambah.php" class="btn-add">➕ Tambah Tugas</a>


<form method="GET">
    <input type="text" name="search" placeholder="Cari judul atau mata kuliah..." value="<?= htmlspecialchars($search); ?>">
    <button type="submit">🔍 Cari</button>
    <a href="index.php" class="btn-reset">Reset</a>
</form><br>

<table border="1">
<thead>
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Mata Kuliah</th>
    <th>Deskripsi</th>
    <th>Deadline</th>
    <th>Status</th>
    <th>Prioritas</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
if($result->num_rows>0){
    $no=1;
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".htmlspecialchars($row['title'])."</td>";
        echo "<td>".htmlspecialchars($row['course'])."</td>";
        echo "<td>".htmlspecialchars($row['description'])."</td>";
        echo "<td>".$row['deadline']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td>".$row['priority']."</td>";
        echo "<td>
                <a href='form_edit.php?id=" . $row['id'] . "' class='btn btn-edit'>✏️ Edit</a>
                <a href='hapus.php?id=" . $row['id'] . "' class='btn-delete' onclick='return confirm(\"Yakin hapus tugas ini?\")'>🗑️ Hapus</a>

            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Tidak ada tugas</td></tr>";
}
$mysqli->close();
?>
</tbody>
</table>
</body>
</html>
