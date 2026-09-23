<?php
include '../config.php'; 
include '../includes/auth.php'; 

if ($user_role != 'Admin Pusat') {
    die("Akses dilarang.");
}

$required = ['title', 'content', 'target_role'];
foreach ($required as $f) {
    if (empty($_POST[$f])) {
        die('Field ' . $f . ' wajib diisi.');
    }
}

$title = mysqli_real_escape_string($koneksi, $_POST['title']);
$content = mysqli_real_escape_string($koneksi, $_POST['content']);
$target_role = mysqli_real_escape_string($koneksi, $_POST['target_role']);

$created_by = $_SESSION['user_id']; 

$sql = "INSERT INTO announcements (title, content, target_role, created_by, created_at)
        VALUES (?, ?, ?, ?, NOW())";

$stmt = mysqli_prepare($koneksi, $sql);

mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $target_role, $created_by);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Pengumuman berhasil dipublikasikan!'); window.location='" . BASE_URL . "modules/info/list.php';</script>";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>