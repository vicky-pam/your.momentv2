<?php
require_once dirname(__FILE__) . '/../../koneksi.php';

// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek koneksi database
if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : die('ID tidak ditemukan.');

// Query untuk menghapus data berdasarkan ID
$sql = "DELETE FROM paket WHERE id = ?";
$stmt = mysqli_prepare($db, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "Data berhasil dihapus.";
        header("Location: ../dashboard/dashboard.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($db);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Gagal mempersiapkan statement: " . mysqli_error($db);
}

mysqli_close($db);
?>
