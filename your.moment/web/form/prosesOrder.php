<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Menggunakan path absolut untuk koneksi.php
require_once $_SERVER['DOCUMENT_ROOT'] . '/your.moment/koneksi.php';

// Fungsi untuk membersihkan input
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi dan pembersihan input
    $nama = clean_input($_POST['nama'] ?? '');
    $nohp = clean_input($_POST['nohp'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $destination = clean_input($_POST['destination'] ?? '');
    $tour_package = clean_input($_POST['tour_package'] ?? '');
    $number_of_person = filter_var($_POST['number_of_person'] ?? '', FILTER_SANITIZE_NUMBER_INT);
    $departure = clean_input($_POST['departure'] ?? '');
    $total = filter_var(str_replace('$', '', $_POST['total'] ?? ''), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Validasi tambahan
    if (empty($nama) || empty($nohp) || empty($email) || empty($destination) || empty($tour_package) || empty($number_of_person) || empty($departure) || empty($total)) {
        $_SESSION['error'] = "Semua field harus diisi.";
        header("Location: index.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Format email tidak valid.";
        header("Location: index.php");
        exit();
    }

    // Cek koneksi database
    if (!$db) {
        $_SESSION['error'] = "Koneksi database gagal: " . mysqli_connect_error();
        header("Location: index.php");
        exit();
    }

    // Siapkan statement
    $sql = "INSERT INTO `paket` (`nama`, `nohp`, `email`, `destination`, `tour_package`, `number_of_person`, `departure`, `total`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssssisd", $nama, $nohp, $email, $destination, $tour_package, $number_of_person, $departure, $total);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Pemesanan berhasil disimpan!";
            header("Location: ../dashboard/dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Gagal menyimpan pemesanan: " . $stmt->error;
            error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
            header("Location: index.php");
            exit();
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Gagal mempersiapkan statement: " . $db->error;
        error_log("Prepare failed: (" . $db->errno . ") " . $db->error);
        header("Location: index.php");
        exit();
    }

    $db->close();
} else {
    // Jika bukan metode POST, redirect ke halaman form
    header("Location: /your.moment/web/dashboard/dashboard.php");
    exit();
}
?>