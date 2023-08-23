<?php
    session_start();

    // Verificar si la sesión está abierta
    if (!isset($_SESSION['logged_in'])) {
        echo '<script>window.location.href = "index.php";</script>'; // Redireccionar al archivo index.php
        exit(); // Terminar la ejecución del script actual
    }
    
    /*if (isset($_GET['success'])) {
        switch($_GET['success']){
            case 1:
                echo '<script>alert("Usuario agregado correctamente.");</script>';
                break;
            case 2:
                echo '<script>alert("Usuario eliminado correctamente.");</script>';
                break;
        }
    }*/

    require 'datos-db.php';
    // Datos de conexión a la base de datos
    $db_host = $servernameDB;
    $db_usuario = $usernameDB;
    $db_contrasena = $passwordDB;
    $db_nombre = $nameDB;

    // Crear la conexión
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena, $db_nombre);

    // Verificar si la conexión fue exitosa
    if (mysqli_connect_errno()) {
        echo "Error en la conexión a la base de datos: " . mysqli_connect_error();
        exit();
    }

    // Funciones de encriptación y desencriptación
    function encrypt($data, $key) {
        $key = hash('sha256', $key, true);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }


    // Verificar si se enviaron los datos del formulario
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        // Obtener los datos del formulario
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Limpiar y escapar los datos
        $username = mysqli_real_escape_string($conexion, $username);
        $email = mysqli_real_escape_string($conexion, $email);
        $password = mysqli_real_escape_string($conexion, $password);

        // Encriptar la contraseña
        $encryptedPassword = encrypt($password, $key);

        // Insertar los datos en la tabla de usuarios
        $consulta = mysqli_prepare($conexion, "INSERT INTO `user-admin` (`user-name`, `email-admin`, `password-admin`) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($consulta, "sss", $username, $email, $encryptedPassword);
        mysqli_stmt_execute($consulta);
        mysqli_stmt_close($consulta);

        // Redireccionar después de insertar el usuario
        //header("Location: admin-usuarios.php?success=1");
        echo '<script>alert("Usuario agregado correctamente.");</script>';
        echo '<script>window.location.href = "admin-usuarios.php";</script>';
        exit();
    }

    // Verificar si se ha enviado el formulario de eliminación
    if (isset($_POST['delete-username']) && isset($_POST['special-password'])) {
        // Obtener los datos del formulario
        $deleteUsername = $_POST['delete-username'];
        $specialPassword = $_POST['special-password'];

        // Verificar la contraseña especial
        if ($specialPassword === "yosoyadmin") {

            // Escapar los valores para evitar inyección de SQL
            $deleteUsername = mysqli_real_escape_string($conexion, $deleteUsername);

            // Realizar la consulta para eliminar el usuario
            $consulta = mysqli_prepare($conexion, "DELETE FROM `user-admin` WHERE `user-name` = ?");
            mysqli_stmt_bind_param($consulta, "s", $deleteUsername);
            mysqli_stmt_execute($consulta);
            mysqli_stmt_close($consulta);

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);

            // Redireccionar después de insertar el usuario
            //header("Location: admin-usuarios.php?success=2");
            echo '<script>alert("Usuario eliminado correctamente.");</script>';
            echo '<script>window.location.href = "admin-usuarios.php";</script>';
            exit();
        } else {
            echo "<center>Contraseña especial incorrecta</center>";
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel de Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./scss/panel-admin/admin-users.css">
</head>
<body>
    <header>
        <?php
            echo '<h1>Panel de Administración: '.$_SESSION['user_name'].'</h1>';
        ?>
    </header>

    <div class="sidebar">
        <ul>
        <li><a href="index.php">Inicio</a></li>
            <li><a href="admin-usuarios.php">Usuarios</a></li>
            <li><a href="admin-casas.php">Casas</a></li>
            <li><a href="admin-terrenos.php">Terrenos</a></li>
            <li><a href="admin-pymes.php">PyMES</a></li>
            <li><a href="admin-hipotecas.php">Hipotecas</a></li>
            <li><a href="index-admin.php">Configuración</a></li>
        </ul>
        <div class="logout-container">
            <a href="cerrar-sesion.php" class="logout-button">Cerrar sesión</a>
        </div>
    </div>

    <button class="open-sidebar-button" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <center>
        <div class="content">
            <h2>Administración de usuarios</h2>
            <p>¡Aquí puedes añadir o eliminar usuarios!</p>

            <div class="add-user-form">
                <h3>Añadir usuario</h3>
                <form action="./admin-usuarios.php" method="post">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" id="username" name="username">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password">
                    <button type="submit">Añadir usuario</button>
                </form>
            </div>

            <div class="change-form delete-user-form">
                <h3>Eliminar usuario</h3>
                <form action="./admin-usuarios.php" method="post">
                    <label for="delete-username">Selecciona un usuario</label>
                    <select id="delete-username" name="delete-username">
                        <?php
                            // Obtener el nombre de usuario del usuario que ha iniciado sesión
                            $loggedInUser = $_SESSION['user_name'];

                            // Crear la conexión a la base de datos
                            $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena, $db_nombre);
                            if (mysqli_connect_errno()) {
                                echo "Error en la conexión a la base de datos: " . mysqli_connect_error();
                                exit();
                            }

                            // Realizar consulta para obtener los usuarios de la base de datos
                            $consultaUsuarios = mysqli_query($conexion, "SELECT * FROM `user-admin`");

                            // Generar las opciones del select con los usuarios existentes
                            while ($row = mysqli_fetch_assoc($consultaUsuarios)) {
                                $username = $row['user-name'];

                                // Omitir el usuario actualmente logueado
                                if ($username === $loggedInUser) {
                                    continue;
                                }

                                echo '<option value="' . $username . '">' . $username . '</option>';
                            }

                            // Liberar los resultados de la consulta
                            mysqli_free_result($consultaUsuarios);
                            // Cerrar la conexión a la base de datos
                            mysqli_close($conexion);
                        ?>
                    </select>
                    <br><br>
                    <label for="special-password">Contraseña especial</label>
                    <input type="password" id="special-password" name="special-password">
                    <button type="submit">Eliminar usuario</button>
                </form>
            </div>
        </div>
    </center>

    <footer>
        <p>Alejandro Coronado &copy; 2023. Todos los derechos reservados.</p>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const openButton = document.querySelector('.open-sidebar-button');
            const isOpen = sidebar.classList.contains('open');

            if (isOpen) {
                sidebar.classList.remove('open');
                sidebar.classList.add('closed');
                openButton.classList.remove('close');
                openButton.setAttribute('aria-expanded', 'false');
            } else {
                sidebar.classList.remove('closed');
                sidebar.classList.add('open');
                openButton.classList.add('close');
                openButton.setAttribute('aria-expanded', 'true');
            }
        }
    </script>
</body>
</html>
