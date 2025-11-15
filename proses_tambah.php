<?php
include 'config.php';

if ($_POST) {
    $title = $_POST['title'];
    $course = $_POST['course'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    if (empty($title) || empty($course)) { die("Judul dan Mata Kuliah wajib diisi!"); }

    $stmt = $mysqli->prepare("INSERT INTO tasks (title, course, description, deadline, status, priority) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$title,$course,$description,$deadline,$status,$priority);
    
    if($stmt->execute()) {
        echo "<script>alert('Tugas berhasil ditambahkan!');window.location.href='index.php';</script>";
    } else { echo "Error: ".$stmt->error; }

    $stmt->close();
    $mysqli->close();
}
?>
