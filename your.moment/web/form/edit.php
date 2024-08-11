<?php
require_once dirname(__FILE__) . '/../../koneksi.php';

// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek koneksi database
if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi untuk membersihkan input
function clean_input($data) {
    global $db;
    return mysqli_real_escape_string($db, trim($data));
}

// Proses form jika method POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = clean_input($_POST['id']);
    $nama = clean_input($_POST['nama']);
    $nohp = clean_input($_POST['nohp']);
    $email = clean_input($_POST['email']);
    $destination = clean_input($_POST['destination']);
    $tour_package = clean_input($_POST['tour_package']);
    $number_of_person = (int)$_POST['number_of_person'];
    $departure = clean_input($_POST['departure']);
    $total = (float)$_POST['total'];

    // Validasi format tanggal
    $date_format = 'Y-m-d';
    $d = DateTime::createFromFormat($date_format, $departure);
    if (!$d || $d->format($date_format) !== $departure) {
        die("Format tanggal tidak valid.");
    }

    $sql = "UPDATE paket SET nama = ?, nohp = ?, email = ?, destination = ?, tour_package = ?, number_of_person = ?, departure = ?, total = ? WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssisdi", $nama, $nohp, $email, $destination, $tour_package, $number_of_person, $departure, $total, $id);
        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../dashboard/dashboard.php');
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($db);
    }
} else {
    // Jika bukan POST, tampilkan form edit
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($id <= 0) {
        die('ID tidak valid.');
    }

    $sql = "SELECT * FROM paket WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            die("Data tidak ditemukan.");
        }
        mysqli_stmt_close($stmt);
    } else {
        die("Error preparing statement: " . mysqli_error($db));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/your.moment/mystyle.css">
</head>
<body class="bg-dark">
    <div class="container mt-4">
        <h2 class="text-light text-center mb-4"><b>Edit Data</b></h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label text-light">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label text-light">No HP:</label>
                <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo htmlspecialchars($row['nohp']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-light">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="destination" class="form-label text-light">Destination:</label>
                <select class="form-control" id="destination" name="destination" required>
                    <?php
                    $destinations = ['Bali', 'Danau Toba', 'Pulau Lombok', 'Pulau Komodo', 'Raja Ampat'];
                    foreach ($destinations as $dest) {
                        $selected = ($dest == $row['destination']) ? 'selected' : '';
                        echo "<option value=\"" . htmlspecialchars($dest) . "\" $selected>" . htmlspecialchars($dest) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
              <label for="tour_package" class="form-label text-light">Tour Package:</label>
                <select class="form-control" id="tour_package" name="tour_package" required>
                <option value="REGULER" <?php echo ($row['tour_package'] == 'REGULER') ? 'selected' : ''; ?>>REGULER</option>
                <option value="PREMIUM" <?php echo ($row['tour_package'] == 'PREMIUM') ? 'selected' : ''; ?>>PREMIUM</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="number_of_person" class="form-label text-light">Number of Person:</label>
                <input type="number" class="form-control" id="number_of_person" name="number_of_person" value="<?php echo htmlspecialchars($row['number_of_person']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="departure" class="form-label text-light">Departure:</label>
                <input type="date" class="form-control" id="departure" name="departure" value="<?php echo htmlspecialchars($row['departure']); ?>" required>
            </div>
            <div class="mb-3">
              <label for="total" class="form-label text-light">Total:</label>
                <div class="input-group">
                <span class="input-group-text">$</span>
                  <input type="number"  class="form-control" id="total" name="total" value="<?php echo   htmlspecialchars($row['total']); ?>" readonly required>
                  </div>
            </div>
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <a href="../dashboard/index.php"><button type="submit" class="btn btn-primary">Save Changes</button></a>
            <a href="../dashboard/index.php" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </div>
    
    <script>
      function calculateTotal() {
        var destination = document.getElementById("destination").value;
        var tourPackage = document.getElementById("tour_package").value;
        var numberOfPerson = document.getElementById("number_of_person").value;
        var total = 0;

        if (tourPackage == "REGULER") {
            if (destination == "Bali" || destination == "Pulau Lombok") {
                total = numberOfPerson * 950;
            } else if (destination == "Pulau Komodo" || destination == "Raja Ampat") {
                total = numberOfPerson * 1000;
            } else if (destination == "Danau Toba") {
                total = numberOfPerson * 920;
            }
        } else if (tourPackage == "PREMIUM") {
            if (destination == "Bali") {
                total = numberOfPerson * 1100;
            } else if (destination == "Pulau Lombok") {
                total = numberOfPerson * 1300;
            } else if (destination == "Pulau Komodo") {
                total = numberOfPerson * 1400;
            } else if (destination == "Raja Ampat") {
                total = numberOfPerson * 1500;
            } else if (destination == "Danau Toba") {
                total = numberOfPerson * 1600;
            }
        }

        document.getElementById("total").value = total.toFixed(2);
      }
      </script>

      <script>
      document.getElementById('destination').addEventListener('change', calculateTotal);
      document.getElementById('tour_package').addEventListener('change', calculateTotal);
      document.getElementById('number_of_person').addEventListener('change', calculateTotal);
      </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>