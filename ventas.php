<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Casas Venta - Proto</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.html" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">Casas</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="ventas-casas.php" class="nav-item nav-link">Casas</a>
                    <a href="ventas-terrenos.php" class="nav-item nav-link">Terrenos</a>
                    <a href="creditos.php" class="nav-item nav-link">Crédito Hipotecario</a>
                    <a href="pymes.php" class="nav-item nav-link">PyMEs</a>
                    <!--<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="reservation.php" class="dropdown-item">Reservation</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>-->
                    <a href="about.php" class="nav-item nav-link">Nosotros</a>
                    <a href="contact.php" class="nav-item nav-link">Contáctanos</a>
                    <div class="nav-item">
                        <a href="admin-login.php" class="nav-link">Admin Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <!-- Page header code here -->
    </div>
    <!-- Page Header End -->


    <!-- Catalog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Catalog</h4>
                <h1 class="display-4">Houses Catalog</h1>
            </div>
            <div class="row">
                <!-- House 1 -->
                <div class="col-lg-4 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/house1.jpg" alt="">
                            <h4>House 1</h4>
                            <p class="m-0">Description of House 1.</p>
                            <p class="m-0">Price: $100,000</p>
                        </div>
                    </div>
                </div>

                <!-- House 2 -->
                <div class="col-lg-4 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/house2.jpg" alt="">
                            <h4>House 2</h4>
                            <p class="m-0">Description of House 2.</p>
                            <p class="m-0">Price: $150,000</p>
                        </div>
                    </div>
                </div>

                <!-- House 3 -->
                <div class="col-lg-4 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-.12">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/house3.jpg" alt="">
                            <h4>House 3</h4>
                            <p class="m-0">Description of House 3.</p>
                            <p class="m-0">Price: $200,000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Catalog End -->
    <!-- Filter Start -->
    <div class="container-fluid bg-primary py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="input-group">
                        <select class="custom-select" id="price-filter">
                            <option selected>Filter by Price</option>
                            <option value="100000">$100,000 and below</option>
                            <option value="150000">$150,000 and below</option>
                            <option value="200000">$200,000 and below</option>
                            <option value="250000">$250,000 and below</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-light" type="button">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter End -->

    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Amet elitr vero magna sed ipsum sit kasd sea elitr lorem rebum</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Friday</h6>
                    <p>8.00 AM - 8.00 PM</p>
                    <h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                    <p>2.00 PM - 8.00 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Newsletter</h4>
                <p>Amet elitr vero magna sed ipsum sit kasd sea elitr lorem rebum</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="#">Alejandro Coronado</a>. All Rights Reserved.</a></p>
            <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="https://www.linkedin.com/in/alejandro-obregon/">Alejandro Coronado</a></p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/script.js"></script>
</body>
</html>
