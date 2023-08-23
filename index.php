
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
    <link href="css/style.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <!-- Customized Stylesheet -->
    <style>
        .image-container {
            max-width: 1000px;
            margin: 0 auto;
            overflow: hidden;
        }
    
        .centered-image {
            display: block;
            width: 100%;
            height: auto;
            display: block;
            margin: 0px auto; /* Margen de 20px en todos los lados, con margen automático en horizontal para centrar la imagen */
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
                    <a href="index.php" class="nav-item nav-link active">Home</a>
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

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Tu Mejor Opción para</h2>
                        <h1 class="display-1 text-white m-0">Casas, Terrenos y Créditos Hipotecarios</h1>
                        <h2 class="text-white m-0"></h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Obtén Financiamiento para tu PYME</h2>
                        <h1 class="display-1 text-white m-0">Créditos para PYMES</h1>
                        <h2 class="text-white m-0"></h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <!--<div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Serving Since 2010</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Story</h1>
                    <h5 class="mb-3">Eos kasd eos dolor vero vero, lorem stet diam rebum. Ipsum amet sed vero dolor sea</h5>
                    <p>Takimata sed vero vero no sit sed, justo clita duo no duo amet et, nonumy kasd sed dolor eos diam lorem eirmod. Amet sit amet amet no. Est nonumy sed labore eirmod sit magna. Erat at est justo sit ut. Labor diam sed ipsum et eirmod</p>
                    <a href="" class="btn btn-secondary font-weight-bold py-2 px-4 mt-2">Learn More</a>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.png" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Vision</h1>
                    <p>Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est dolor</p>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Lorem ipsum dolor sit amet</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Lorem ipsum dolor sit amet</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Lorem ipsum dolor sit amet</h5>
                    <a href="" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Learn More</a>
                </div>
            </div>
        </div>
    </div>-->
    <!-- About End -->


    <!-- Service Start -->
    <!--<div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Services</h4>
                <h1 class="display-4">Titulares de casas y terrenos</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-1.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-truck service-icon"></i>El mejor servicio</h4>
                            <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo. Guberg sea et et lorem dolor sed est sit
                                invidunt, dolore tempor diam ipsum takima erat tempor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-2.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-coffee service-icon"></i>Las casas más lujosas</h4>
                            <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo. Guberg sea et et lorem dolor sed est sit
                                invidunt, dolore tempor diam ipsum takima erat tempor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-3.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-award service-icon"></i>Best Quality</h4>
                            <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo. Guberg sea et et lorem dolor sed est sit
                                invidunt, dolore tempor diam ipsum takima erat tempor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-4.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-table service-icon"></i>Contactanos</h4>
                            <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo. Guberg sea et et lorem dolor sed est sit
                                invidunt, dolore tempor diam ipsum takima erat tempor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Service End -->


    <!-- Offer Start -->
    <!--
    <div class="offer container-fluid my-5 py-5 text-center position-relative overlay-top overlay-bottom">
        <div class="container py-5">
            <h1 class="display-3 text-primary mt-3">50% OFF</h1>
            <h1 class="text-white mb-3">Sunday Special Offer</h1>
            <h4 class="text-white font-weight-normal mb-4 pb-3">Only for Sunday from 1st Jan to 30th Jan 2045</h4>
            <form class="form-inline justify-content-center mb-4">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Your Email" style="height: 60px;">
                    <div class="input-group-append">
                        <button class="btn btn-primary font-weight-bold px-4" type="submit">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    -->
    <!-- Offer End -->


    <!-- Menu Start -->
    <!--<div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
                <h1 class="display-4">Competitive Pricing</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="mb-5">Casas por menos de 6 millones</h1>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-1.jpg" alt="">
                            <h5 class="menu-price">$5M</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Texto de prueba</h4>
                            <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo guberg sea et et lorem dolor</p>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-2.jpg" alt="">
                            <h5 class="menu-price">$3.5M</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Texto de prueba</h4>
                            <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo guberg sea et et lorem dolor</p>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-3.jpg" alt="">
                            <h5 class="menu-price">$2.3M</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Texto de prueba</h4>
                            <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo guberg sea et et lorem dolor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-5">Casas por arriba de 6 millones</h1>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-1.jpg" alt="">
                            <h5 class="menu-price">$7.7M</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Texto de prueba</h4>
                            <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo guberg sea et et lorem dolor</p>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-2.jpg" alt="">
                            <h5 class="menu-price">$7M</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Texto de prueba</h4>
                            <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo guberg sea et et lorem dolor</p>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-3.jpg" alt="">
                            <h5 class="menu-price">$9.3M</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Texto de prueba</h4>
                            <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo guberg sea et et lorem dolor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Menu End -->


    <!--<div class="container-fluid p-0">
        <div class="text-center image-container">
            <img src="img/image001.png" alt="CEO Mi Nuevo Hogar" class="centered-image"> <!-- Agregamos la clase "centered-image" aquí -->
       <!-- </div>
    </div>-->
    
    <style>
        /* Cambiar el color del texto y del placeholder a blanco */
        .text-white {
            color: white;
        }

        /* Cambiar el color del borde a blanco */
        .border-white {
            border-color: white;
        }

        /* Cambiar el color de fondo transparente a blanco */
        .bg-transparent-white {
            background-color: white;
            opacity: 0.5; /* Ajusta la opacidad según tu preferencia */
        }
    </style>


    <!-- Reservation Start -->
    <div class="container-fluid my-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-6 my-5 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="display-3 text-primary">Encuentra tu espacio ideal</h1>
                                <h1 class="text-white">Para Reservar en Línea</h1>
                            </div>
                            <p class="text-white">En nuestra empresa, te ofrecemos una amplia variedad de opciones para casas y terrenos, así como créditos hipotecarios y créditos para PYMES. Nuestro equipo de expertos está listo para ayudarte a encontrar el espacio perfecto para tus necesidades.</p>
                            <ul class="list-inline text-white m-0">
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Opciones de viviendas y terrenos personalizadas</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Financiamiento hipotecario flexible y competitivo</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Créditos diseñados para impulsar el crecimiento de tu PYME</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">Reserva tu espacio</h1>
                            <form class="mb-5" method="post" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-transparent border-primary p-4 text-white" name="nombre" placeholder="Nombre" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control bg-transparent border-primary p-4 text-white" name="correo" placeholder="Correo electrónico" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control bg-transparent border-primary p-4 text-white" name="cel" placeholder="Tel. Celular" required="required" />
                                </div>
                                <!--<div class="form-group">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="text" class="form-control bg-transparent border-primary p-4 datetimepicker-input" name="fecha" placeholder="Fecha" data-target="#date" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="text" class="form-control bg-transparent border-primary p-4 datetimepicker-input" name="hora" placeholder="Hora" data-target="#time" data-toggle="datetimepicker"/>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <select class="custom-select bg-transparent border-primary px-4 text-white" name="opcion" style="height: 49px;">
                                        <option value="Casas">Casas</option>
                                        <option value="Terrenos">Terrenos</option>
                                        <option value="Crédito Hipotecario">Crédito Hipotecario</option>
                                        <option value="Crédito PyMES">Crédito PyMES</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Reservar ahora</button>
                                </div>
                            </form>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <p>Para más información visita <a href="https://minuevohogar.creditaria.com.mx/index.php">https://minuevohogar.creditaria.com.mx/index.php</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation End -->
    
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recopilar los datos del formulario
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $opcion = $_POST['opcion'];
            $cel = $_POST['cel'];
        
            // Configurar los detalles del correo
            $destinatarios = array();
        
            // Asignar los destinatarios según la opción seleccionada
            switch ($opcion) {
                case 'Casas':
                    $destinatarios = array('mcoronado@creditaria.com', 'lupitaizaguirre13@gmail.com', 'villegas.acme@gmail.com', 'vartrevil18@hotmail.com', 'campocely@gmail.com');
                    break;
                case 'Terrenos':
                    $destinatarios = array('mcoronado@creditaria.com', 'lupitaizaguirre13@gmail.com', 'villegas.acme@gmail.com', 'vartrevil18@hotmail.com', 'campocely@gmail.com');
                    //$destinatarios = array('altairauditore33@gmail.com');
                    break;
                case 'Crédito Hipotecario':
                    $destinatarios = array('mcoronado@creditaria.com', 'jg.izaguirre@creditaria.com', 'cd.villegas@creditaria.com', 'vartrevil18@hotmail.com', 'c.orozco@creditaria.com');
                    break;
                case 'Crédito PyME':
                    $destinatarios = array('mcoronado@creditaria.com', 'jg.izaguirre@creditaria.com', 'cd.villegas@creditaria.com', 'vartrevil18@hotmail.com', 'c.orozco@creditaria.com');
                    break;
                default:
                    $opcion = "Casas";
                    $destinatarios = array('mcoronado@creditaria.com', 'lupitaizaguirre13@gmail.com', 'villegas.acme@gmail.com', 'vartrevil18@hotmail.com', 'campocely@gmail.com'); // Destinatarios por defecto
                    break;
            }
        
            if (!empty($destinatarios)) {
                // Configurar el mensaje de correo
                $asunto = 'Reserva de espacio';
                $mensaje = "Nombre: $nombre\n";
                $mensaje .= "Correo electrónico: $correo\n";
                $mensaje .= "Tel. Celular: $cel\n";
                $mensaje .= "Opción: $opcion\n";
        
                // Configurar la cabecera del correo
                $cabecera = "From: $correo\r\nReply-To: $correo\r\nX-Mailer: PHP/" . phpversion();
        
                // Enviar el correo a cada destinatario
                $enviados = 0;
                foreach ($destinatarios as $destinatario) {
                    if (mail($destinatario, $asunto, $mensaje, $cabecera)) {
                        $enviados++;
                    }
                }
        
                if ($enviados > 0) {
                    // Al menos un correo se envió correctamente
                    echo "<script>alert('Correos enviados correctamente');</script>";
                } else {
                    // Hubo un error al enviar los correos
                    echo "<script>alert('Error al enviar los correos');</script>";
                }
            } else {
                // No se ha asignado ningún destinatario
                echo "<script>alert('No se ha asignado ningún destinatario');</script>";
            }
        
            // Redirigir a la misma página
            echo "<script>window.location.href = window.location.href;</script>";
        }
    ?>



    <!-- Testimonial Start -->
    <!--<div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h4>
                <h1 class="display-4">Our Clients Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-1.jpg" alt="">
                        <div class="ml-3">
                            <h4>Client Name</h4>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-2.jpg" alt="">
                        <div class="ml-3">
                            <h4>Client Name</h4>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-3.jpg" alt="">
                        <div class="ml-3">
                            <h4>Client Name</h4>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-4.jpg" alt="">
                        <div class="ml-3">
                            <h4>Client Name</h4>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Buscanos:</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Av. Nicolas Zapata 1507-A, Col del Valle, 78220 San Luis, S.L.P.</p>
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