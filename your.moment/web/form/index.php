<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/your.moment/mystyle.css">
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark text-light sticky-top">
        <div class="container-fluid" style="background-color: rgb(139, 120, 13);">
            <a class="navbar-brand" href="/">Your.moments</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/your.moment/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/your.moment/web/Package">Package</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tour</a>
                        <ul class="dropdown-menu" style="background-color: rgb(139, 120, 13);">
                            <li><a class="dropdown-item" href="/your.moment/web/tour/bali/">Bali</a></li>
                            <li><a class="dropdown-item" href="/your.moment/web/tour/komodo/">Pulau Komodo</a></li>
                            <li><a class="dropdown-item" href="/your.moment/web/tour/lombok/">Pulau Lombok</a></li>
                            <li><a class="dropdown-item" href="/your.moment/web/tour/raja ampat/">Raja Ampat</a></li>
                            <li><a class="dropdown-item" href="/your.moment/web/tour/toba/">Danau Toba</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/your.moment/web/contact/">Contact</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="/your.moment/web/about/">About Us</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="/your.moment/web/dashboard/">Dashboard</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <p class="text-light text-center " style="font-size: 30px"> <b>FORM ORDER </b></p>
    <form action="prosesOrder.php" method="POST" class="container mt-4">
        <fieldset>
            <p>
                <label class="text-light" for="nama">Name: </label>
                <input type="text" name="nama"  class="form-control" required />
            </p>
            <p>
                <label class="text-light" for="nohp">Phone Number: </label>
                <input type="text" name="nohp"  class="form-control" required />
            </p>
            <p>
                <label class="text-light" for="email">Email: </label>
                <input type="email" name="email"  class="form-control" required />
            </p>
            <p>
                <label class="text-light" for="destination">Destination: </label>
                <select name="destination" class="form-select" required id="destination">
                    <option value="Bali">Bali</option>
                    <option value="Lombok Island">Lombok Island</option>
                    <option value="Komodo Island">Komodo Island</option>
                    <option value="Raja Ampat">Raja Ampat</option>
                    <option value="Lake Toba">Lake Toba</option>
                </select>
            </p>
            <p>
                <label class="text-light" for="tour_package">Tour Package: </label>
                <select name="tour_package" class="form-select" required id="tour_package">
                    <option value="REGULER">REGULER</option>
                    <option value="PREMIUM">PREMIUM</option>
                </select>
            </p>
            <p>
                <label class="text-light" for="number_of_person">Number of People: </label>
                <input type="number" name="number_of_person"  class="form-control" required id="number_of_person" />
            </p>
            <p>
                <label class="text-light" for="departure">Departure Date: </label>
                <input type="date" name="departure" class="form-control" required />
            </p>
            <p>
                <button type="button" class="btn btn-primary mb-3" onclick="calculateTotal()">Calculate Total</button>
                <br>
                <label class="text-light" for="total">Total Cost: </label>
                <input type="text" name="total" placeholder="Total Cost" class="form-control" required id="total" readonly onfocus="this.blur();"/>
            </p>
            <p>
                <input  type="submit"  value="Order" name="submit" class="btn btn-primary" >
            </p>
        </fieldset>
    </form>

    <script>
        function calculateTotal() {
            var destination = document.getElementById("destination").value;
            var tourPackage = document.getElementById("tour_package").value;
            var numberOfPerson = document.getElementById("number_of_person").value;
            var total = 0;

            if (tourPackage == "REGULER") {
                if (destination == "Bali") {
                    total = numberOfPerson * 950;
                } else if (destination == "Lombok Island") {
                    total = numberOfPerson * 950;
                } else if (destination == "Komodo Island") {
                    total = numberOfPerson * 1000;
                } else if (destination == "Raja Ampat") {
                    total = numberOfPerson * 1000;
                } else if (destination == "Lake Toba") {
                    total = numberOfPerson * 920;
                }
            } else if (tourPackage == "PREMIUM") {
                if (destination == "Bali") {
                    total = numberOfPerson * 1100;
                } else if (destination == "Lombok Island") {
                    total = numberOfPerson * 1300;
                } else if (destination == "Komodo Island") {
                    total = numberOfPerson * 1400;
                } else if (destination == "Raja Ampat") {
                    total = numberOfPerson * 1500;
                } else if (destination == "Lake Toba") {
                    total = numberOfPerson * 1600;
                }
            }

            document.getElementById("total").value = "$" + total;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>