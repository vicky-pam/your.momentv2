<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your.Moments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="mystyle.css">
  </head>
  <body class="bg-dark ">
    <!-- <nav start -->
    <nav class="navbar navbar-expand-sm  navbar-dark bg-dark text-light sticky-top">
        <div class="container-fluid  " style="background: fixed; background-color: rgb(139, 120, 13);">
          <a class="navbar-brand " >Your.moments</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav  me-auto mb-2 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link active" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="web/Package">Package</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Tour
                </a>
                <ul class="dropdown-menu " style="background-color: rgb(139, 120, 13);">
                  <li><a class="dropdown-item" href="web/tour/bali/">Bali</a></li>
                  <li><a class="dropdown-item" href="web/tour/komodo/">Pulau Komodo</a></li>
                  <li><a class="dropdown-item" href="web/tour/lombok/">Pulau lombok</a></li>
                  <li><a class="dropdown-item" href="web/tour/raja ampat/">Raja Ampat</a></li>
                  <li><a class="dropdown-item" href="web/tour/toba/">Danau Toba</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="web/contact/">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="web/about/">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="web/dashboard/">Dashboard</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
          </div>
        </div>
    </nav>
    <!-- <nav end -->
    <!-- <layout start -->
    <div class="container text-light bg-dark" style="height: 100vh;">
        <!-- <carosel start -->
            <div id="carouselExamplelight" class="carousel carousel-light ">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExamplelight" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExamplelight" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExamplelight" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExamplelight" data-bs-slide-to="3" aria-label="Slide 4"></button>
                  <button type="button" data-bs-target="#carouselExamplelight" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <img src="images/bali.jpg" class="d-block w-100" alt="BALI"style="height: 500px;">
                    <div class="carousel-caption text-light text-shadow" >
                      <h5>🔥🔥🔥🔥 Tour BALI 🔥🔥🔥🔥</h5>
                      <p>Nikmati keindahan pulau Dewata dengan pantai berpasir putih, budaya yang kaya, dan pemandangan alam yang memukau.</p>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="images/komodo.jpg" class="d-block w-100" alt="PULAU KOMODO" style="height: 500px;">
                    <div class="carousel-caption text-light text-shadow" 
                      <h5>🔥🔥🔥🔥 Tour PULAU KOMODO 🔥🔥🔥🔥</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="images/lombok.jpg" class="d-block w-100" alt="PULAU LOMBOK"style="height: 500px;">
                    <div class="carousel-caption text-light text-shadow " >
                      <h5>🔥🔥🔥🔥 Tour LOMBOK 🔥🔥🔥🔥</h5>
                      <p>Petualangan di habitat alami Komodo, reptil purba terbesar di dunia, serta keindahan pantai dan kehidupan laut yang luar biasa.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="images/rajaampat.jpg" class="d-block w-100" alt="RAJA AMPAT"style="height: 500px;">
                    <div class="carousel-caption text-light text-shadow " 
                      <h5>🔥🔥🔥🔥 Tour RAJA AMPAT 🔥🔥🔥🔥</h5>
                      <p>Jelajahi surga bawah laut dengan keanekaragaman hayati yang luar biasa, karang yang indah, dan air laut yang jernih.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="images/toba.jpg" class="d-block w-100" alt="DANAU TOBA"style="height: 500px;">
                    <div class="carousel-caption text-light text-shadow ">
                      <h5>🔥🔥🔥🔥 Tour DANAU TOBA 🔥🔥🔥🔥</h5> 
                      <p>Temukan pesona danau vulkanik terbesar di dunia, dengan pulau Samosir yang eksotis di tengahnya dan pemandangan pegunungan yang menakjubkan.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExamplelight" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next " type="submit" data-bs-target="#carouselExamplelight" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          <!-- <carosel end -->
        
          <div class="row mt-4 bg-dark text-light">
            <div class="col-sm-6 text-center my-auto">
                <h1><a class="btn btn-primary bg-dark border-light text-center" type="submit" href="web/contact/" role="button">CONTACT US</a></h1>
                <h2 class="text-center">🔥 Your Moments 🔥</h2>
                <p class="text-center">Discover the World with Your Moments</p>
            </div>
            <div class="col-sm-6">
                <div class="ratio ratio-16x9">
                    <iframe class="fit-content-center" src="https://www.youtube.com/embed/KqgetFfUvxM?si=kPO5TtTnZc6q6jnt" title="YouTube video player" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        
            
            <!-- <card start -->
            <div class="card text-center mt-2 border-light bg-dark">
              <div class="card-header bg-dark text-light">
                Tour BALI
              </div>
              <div class="card-body bg-dark text-light"">
                <h5 class="card-title">BALI</h5>
                <p class="card-text">Nikmati keindahan pulau Dewata dengan pantai berpasir putih, budaya yang kaya, dan pemandangan alam yang memukau.</p>
                <a class="btn btn-primary bg-dark border-light" type="submit" href="web/Package/" role="button">See Details</a>
              </div>
            </div>
            <div class="card text-center mt-2 bg-dark border-light">
              <div class="card-header bg-dark text-light">
                Tour RAJA AMPAT
              </div>
              <div class="card-body bg-dark text-light ">
                <h5 class="card-title">RAJA AMPAT</h5>
                <p class="card-text">Jelajahi surga bawah laut dengan keanekaragaman hayati yang luar biasa, karang yang indah, dan air laut yang jernih.</p>
                <a class="btn btn-primary bg-dark border-light " type="submit" href="web/Package/" role="button" >See Details</a>
              </div>
            </div>
            
            <div class="card text-center mt-2 bg-dark border-light">
              <div class="card-header bg-dark text-light">
                Tour PULAU KOMODO
              </div>
              <div class="card-body bg-dark text-light"">
                <h5 class="card-title">PULAU KOMODO</h5>
                <p class="card-text">Petualangan di habitat alami Komodo, reptil purba terbesar di dunia, serta keindahan pantai dan kehidupan laut yang luar biasa.</p>
                <a class="btn btn-primary bg-dark border-light" type="submit" href="web/Package/" role="button">See Details</a>
              </div>
            </div>
            <a class="btn btn-primary bg-dark border-light " type="submit" href="web/Package/" role="button">Read More</a>

      </div>
        <!-- footer start -->
        <figure class="text-center bg-dark" style="width: fit-content-center;">
          <blockquote class="blockquote  " >
            <img class="mt" src="images/logo.png"  />
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
    </div>
    <!-- <layout end -->
      
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>