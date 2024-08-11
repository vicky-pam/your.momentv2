<?php
require_once dirname(__FILE__) . '/../../koneksi.php';

// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek koneksi database
if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan lakukan sanitasi
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $nama = mysqli_real_escape_string($db, $_POST['nama']);
    $nohp = mysqli_real_escape_string($db, $_POST['nohp']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $destination = mysqli_real_escape_string($db, $_POST['destination']);
    $tour_package = mysqli_real_escape_string($db, $_POST['tour_package']);
    $number_of_person = (int)$_POST['number_of_person'];
    $departure = mysqli_real_escape_string($db, $_POST['departure']);
    
    // Asumsikan bahwa total dihitung berdasarkan beberapa aturan
    // Pastikan menghitung ulang total di sisi server
    $total = (float)$_POST['total']; // Sebaiknya dihitung ulang di server, bukan langsung dari POST
    
    // Query untuk mengupdate data
    $sql = "UPDATE paket SET nama = ?, nohp = ?, email = ?, destination = ?, tour_package = ?, number_of_person = ?, departure = ? WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssis", $nama, $nohp, $email, $destination, $tour_package, $number_of_person, $departure, $id);
        if (mysqli_stmt_execute($stmt)) {
            header('Location: /your.moment/web/dashboard/');
            exit();
        } else {
            echo "Gagal mengupdate data: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal mempersiapkan statement: " . mysqli_error($db);
    }
    mysqli_close($db);
} else {
    header('Location: /your.moment/web/dashboard/');
    exit();
}
?>
