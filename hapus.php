<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $mysqli->prepare("SELECT title FROM tasks WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if(!$data){ die("Data tugas tidak ditemukan!"); }

    $stmt = $mysqli->prepare("DELETE FROM tasks WHERE id=?");
    $stmt->bind_param("i",$id);

    if($stmt->execute()) {
        echo "<script>alert('Tugas \"".htmlspecialchars($data['title'])."\" berhasil dihapus!');window.location.href='index.php';</script>";
    } else { echo "Error: ".$stmt->error; }

    $stmt->close();
    $mysqli->close();
} else {
    header("Location: index.php"); exit();
}
?>
