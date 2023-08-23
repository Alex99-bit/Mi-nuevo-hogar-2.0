<?php
    // Iniciar sesión
    session_start();
    
    // Verificar si la variable de sesión está definida
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) 
    {
        // La sesión está iniciada, el usuario tiene acceso
        header("Location: index-admin.php");
        exit;
    }
    else 
    {
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
    <header>
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><!--Your logo--></a>
            </div>
            <div class="container-fluid p-0 nav-bar">
                <a href="index.php" class="navbar-brand px-lg-4 m-0">
                    <h1 class="m-0 display-4 text-uppercase text-white"></h1>
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
                    </div>
                    <a href="about.php" class="nav-item nav-link">Nosotros</a>
                    <a href="contact.php" class="nav-item nav-link">Contáctanos</a>-->
                    <div class="nav-item">
                        <a href="admin-login.php" class="nav-link active">Admin Login</a>
                    </div>
                </div>
            </div>
            </div>
        </nav>
        <!-- Navbar End -->
    </header>

    <!-- Content Start -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Admin Login</h5>
                        <form method="post" action="process-login.php">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->

    <footer class="bg-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>&copy; 2023 Alejandro Coronado. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.min.js"></script>
</body>

</html>
