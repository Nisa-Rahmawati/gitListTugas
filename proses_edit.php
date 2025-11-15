<?php
include 'config.php';

if ($_POST) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $course = $_POST['course'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    if (empty($title) || empty($course)) { die("Judul dan Mata Kuliah wajib diisi!"); }

    $stmt = $mysqli->prepare("UPDATE tasks SET title=?, course=?, description=?, deadline=?, status=?, priority=? WHERE id=?");
    $stmt->bind_param("ssssssi",$title,$course,$description,$deadline,$status,$priority,$id);

    if($stmt->execute()) {
        echo "<script>alert('Tugas berhasil diupdate!');window.location.href='index.php';</script>";
    } else { echo "Error: ".$stmt->error; }

    $stmt->close();
    $mysqli->close();
}
?>
