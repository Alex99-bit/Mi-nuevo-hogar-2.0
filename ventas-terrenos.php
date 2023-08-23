<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Mi nuevo hogar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Créditos, casas y más" name="keywords">
    <meta content="Créditos, casas y más" name="description">

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
    <link rel="stylesheet" href="/css/slider&select.css">
    <style>
        .post-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .post-image {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
        }

        .post-description {
            text-align: center;
            margin-bottom: 10px;
        }

        .post-price {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        
        .select-container {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.php" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">Mi Nuevo Hogar</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="ventas-casas.php" class="nav-item nav-link">Casas</a>
                    <a href="ventas-terrenos.php" class="nav-item nav-link active">Terrenos</a>
                    <a href="creditos.php" class="nav-item nav-link">Crédito Hipotecario</a>
                    <a href="pymes.php" class="nav-item nav-link">PyMEs</a>
                    <!--<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="reservation.php" class="dropdown-item">Reservation</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>
                    <a href="about.php" class="nav-item nav-link">Nosotros</a>
                    <a href="contact.php" class="nav-item nav-link">Contáctanos</a>-->
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
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Terrenos en venta</h1>
            <!--<div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Services</p>
            </div>-->
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <center>
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="row">
                <center>
                    <div class="select-container">
                        <select class="select" name="filtro" onchange="filtrarPublicaciones(this.value)">
                            <option value="all">Todos</option>
                            <option value="0-1000000">Menos de 1 millón</option>
                            <option value="1000000-2000000">De 1 a 2 millones</option>
                            <option value="2000000-4000000">De 2 a 4 millones</option>
                            <option value="4000000-6000000">De 4 a 6 millones</option>
                            <option value="6000000-infinito">De 6 millones en adelante</option>
                        </select>
                    </div>
                </center>
                <div id="publicaciones-container">
                    <?php
                    require 'datos-db.php';
    
                    // Conexión a la base de datos
                    $conexion = mysqli_connect($servernameDB, $usernameDB, $passwordDB, $nameDB);
                    if (!$conexion) {
                        die("Error al conectar con la base de datos: " . mysqli_connect_error());
                    }
    
                    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'all';
    
                    // Mostrar las publicaciones según el filtro seleccionado
                    mostrarPublicaciones($conexion, $filtro);
    
                    // Cerrar la conexión a la base de datos
                    mysqli_close($conexion);
    
                    function mostrarPublicaciones($conexion, $filtro)
                    {
                        $consulta = "SELECT p.`titulo-publicacion`, p.`texto-publicacion`, p.`precio`, i.`imagen`
                                FROM `publicaciones` p
                                INNER JOIN `imagenes` i ON p.`id-publicacion` = i.`id-publicacion`
                                WHERE p.`id-apartado` = 2";
    
                        switch ($filtro) {
                            case '0-1000000':
                                $consulta .= " AND p.`precio` < 1000000";
                                break;
                            case '1000000-2000000':
                                $consulta .= " AND p.`precio` >= 1000000 AND p.`precio` <= 2000000";
                                break;
                            case '2000000-4000000':
                                $consulta .= " AND p.`precio` >= 2000000 AND p.`precio` <= 4000000";
                                break;
                            case '4000000-6000000':
                                $consulta .= " AND p.`precio` >= 4000000 AND p.`precio` <= 6000000";
                                break;
                            case '6000000-infinito':
                                $consulta .= " AND p.`precio` > 6000000";
                                break;
                        }
    
                        $consulta .= " ORDER BY p.`precio` ASC";
                        $resultados = mysqli_query($conexion, $consulta);
    
                        while ($row = mysqli_fetch_assoc($resultados)) {
                            $titulo = $row['titulo-publicacion'];
                            $descripcion = $row['texto-publicacion'];
                            $precio = $row['precio'];
                            $imagen = $row['imagen'];
                    ?>
                            <div class="col-lg-6 mb-5">
                                <br><br><br>
                                <div class="row align-items-center">
                                    <div class="col-sm-12">
                                        <h4 class="post-title"><?php echo $titulo; ?></h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <img class="post-image" src="data:image/jpeg;base64,<?php echo base64_encode($imagen); ?>" alt="">
                                    </div>
    
                                    <div class="col-sm-12">
                                        <p class="post-description"><?php echo nl2br($descripcion); ?></p>
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <p class="post-price"><?php echo 'Precio: $' . $precio; ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
    
                        mysqli_free_result($resultados);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    
    <script>
        function filtrarPublicaciones(filtro) {
            window.location.href = 'ventas-terrenos.php?filtro=' + filtro;
        }
    
        // Marcar la opción seleccionada en el select
        var filtroActual = '<?php echo $filtro; ?>';
        var selectElement = document.querySelector('select[name="filtro"]');
        if (selectElement) {
            var options = selectElement.options;
            for (var i = 0; i < options.length; i++) {
                if (options[i].value === filtroActual) {
                    options[i].selected = true;
                    break;
                }
            }
        }
    </script>
    </center>


    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Llámanos y agenda una cita con nuestros expertos</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Av. Nicolas Zapata 1507-A, Col del Valle, 78220 San Luis, S.L.P.</p>
                <i class="fa fa-phone-alt mr-2"></i>
                <p>+52 444 130 7507</p>
                <p>+52 444 283 3121</p>
                <p>+52 444 336 9793</p>
                <p>+52 444 417 0572</p>
                <p>+52 444 236 8953</p>
                <i class="fa fa-envelope mr-2"></i>
                <a href="mailto:mcoronado@creditaria.com.com?subject=Casas y terrenos.&body=Me%20gustaría%20agendar%20una%20cita."><p class="m-0">mariselacoronado33@gmail.com</p></a><br>
                <a href="mailto:vartrevi18@hotmail.com?subject=Casas y terrenos.&body=Me%20gustaría%20agendar%20una%20cita."><p class="m-0">vartrevi18@hotmail.com</p></a><br>
                <a href="mailto:lupitaizaguirre13@gmail.com?subject=Casas y terrenos.&body=Me%20gustaría%20agendar%20una%20cita."><p class="m-0">lupitaizaguirre13@gmail.com</p></a><br>
                <a href="mailto:campocely@gmail.com?subject=Casas y terrenos.&body=Me%20gustaría%20agendar%20una%20cita."><p class="m-0">campocely@gmail.com</p></a><br>
                <a href="mailto:villegas.acme@gmail.com?subject=Casas y terrenos.&body=Me%20gustaría%20agendar%20una%20cita."><p class="m-0">villegas.acme@gmail.com</p></a><br>
            </div>
            <!--<div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Amet elitr vero magna sed ipsum sit kasd sea elitr lorem rebum</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>-->
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Friday</h6>
                    <p>8.00 AM - 6.00 PM</p>
                    <!--<h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                    <p>2.00 PM - 8.00 PM</p>-->
                </div>
            </div>
            <!--<div class="col-lg-3 col-md-6 mb-5">
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
            </div>-->
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="#">Alejandro Coronado</a>. All Rights Reserved.</a></p>
            <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="https://www.linkedin.com/in/alejandro-obregon/">Alejandro Coronado</a></p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>