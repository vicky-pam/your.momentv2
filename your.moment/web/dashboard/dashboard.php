<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/your.moment/mystyle.css">
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-sm  navbar-dark bg-dark text-light sticky-top">
        <div class="container-fluid  " style="background: fixed; background-color: rgb(139, 120, 13);">
          <a class="navbar-brand " >Your.moments</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav  me-auto mb-2 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link" href="/your.moment/home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/your.moment/web/Package">Package</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="/your.moment/web/contact/">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/your.moment/web/about/">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/your.moment/web/dashboard/dashboard.php">Dashboard</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
          </div>
        </div>
    </nav>
    
</body>
</html>

<?php
// Gunakan dirname() untuk mendapatkan path yang benar
require_once dirname(__FILE__) . ('/../../koneksi.php');

// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek koneksi database
if (!$db) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk menampilkan data
$sql = "SELECT * FROM paket ORDER BY id DESC";
$stmt = mysqli_prepare($db, $sql);
if ($stmt) {
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='table-responsive'>";
            echo "<table class='table table-dark table-striped table-bordered'>";
            echo "<thead><tr><th>No</th><th>Nama</th><th>Nomer Hp</th><th>Email</th><th>Destination</th><th>Paket</th><th>Person</th><th>Departure</th><th>Total Cost</th><th>Action</th></tr></thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                $formatted_date = date('d/m/Y', strtotime($row['departure']));
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nohp']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['destination']) . "</td>";
                echo "<td>" . htmlspecialchars($row['tour_package']) . "</td>";
                echo "<td>" . htmlspecialchars($row['number_of_person']) . "</td>";
                echo "<td>" . $formatted_date . "</td>";
                echo "<td>$" . htmlspecialchars($row['total']) . "</td>";
                echo "<td><a href='/your.moment/web/form/edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>
                          <a href='javascript:void(0);' onclick='confirmDelete(" . $row['id'] . ")' class='btn btn-danger'>Delete</a>
                      </td>";
              }
              echo "</tbody></table>";
              echo "</div>";
            } else {
              echo "Tidak ada data.";
            }
          } else {
            echo "Error getting result: " . mysqli_error($db);
          }
          mysqli_stmt_close($stmt);
        } else {
          echo "Error preparing statement: " . mysqli_error($db);
        }
        
        mysqli_close($db); // Menutup koneksi database
        ?>
  <!-- footer start -->
  <div class="container text-light bg-dark" style="height: 100vh;">
  <figure class="text-center bg-dark" style="width: fit-content-center;">
      <blockquote class="blockquote">
        <img class="mt" src="/your.moment/images/logo.png" />
      </blockquote>
      <figcaption class="blockquote-footer ">
        Discover the World with <cite title="Source Title">Your.moments</cite>
      </figcaption>
    </figure>
    <div class="row bg-dark ">
      <div class="col-sm-4 mt-4">
        <h3>Credit</h3>
        <p>Website designed and developed by Your.Moments Team</p>
      </div>
      <div class="col">
        <h3>Follow us on:</h3>
        <p>
          Instagram | Facebook | Youtube</p>
      </div>
      <div class="col">
        <p>Peter Tour © 2024</p>
      </div>
  </div>
  <!-- footer end -->
  <script>
    function confirmDelete(id) {
      if (confirm("Are you sure you want to delete this record?")) {
          window.location. href= '/your.moment/web/form/prosesDelete.php?id=' + id;
          }
      }
  </script>
