<?php
    session_start();
    
    // Verificar si la sesión está abierta
    if (!isset($_SESSION['logged_in'])) {
        echo '<script>window.location.href = "index.php";</script>'; // Redireccionar al archivo index.php
        exit(); // Terminar la ejecución del script actual
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel de Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./scss/panel-admin/index-admin.css">
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
            <h2>Configuración</h2>
            <p>¡Aquí puedes gestionar tu perfil!</p>

            <div class="change-form">
                <h3>Cambiar nombre de usuario</h3>
                <form action="index-admin.php" method="post">
                    <label for="username">Nuevo nombre de usuario</label>
                    <input type="text" id="username" name="username">
                    <button type="submit">Cambiar nombre de usuario</button>
                </form>
            </div>

            <div class="change-form">
                <h3>Cambiar correo electrónico</h3>
                <form action="index-admin.php" method="post">
                    <label for="email">Nuevo correo electrónico</label>
                    <input type="email" id="email" name="email">
                    <button type="submit">Cambiar correo electrónico</button>
                </form>
            </div>

            <div class="change-form">
                <h3>Cambiar contraseña</h3>
                <form action="index-admin.php" method="post">
                    <label for="current-password">Contraseña actual</label>
                    <input type="password" id="current-password" name="current-password">

                    <label for="new-password">Nueva contraseña</label>
                    <input type="password" id="new-password" name="new-password">

                    <label for="confirm-password">Confirmar nueva contraseña</label>
                    <input type="password" id="confirm-password" name="confirm-password">

                    <button type="submit">Cambiar contraseña</button>
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
<?php
    require 'datos-db.php';
    // Generado por ia

    // Verificar si la sesión está abierta
    if (!isset($_SESSION['logged_in'])) {
        header("Location: index.php"); // Redireccionar al archivo index.php
        exit(); // Terminar la ejecución del script actual
    }

    // Configuración de la conexión a la base de datos
    $db_host = $servernameDB;
    $db_usuario = $usernameDB;
    $db_contrasena = $passwordDB;
    $db_nombre = $nameDB;

    // Establecer conexión con la base de datos
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena, $db_nombre);

    // Verificar si la conexión fue exitosa
    if (mysqli_connect_errno()) {
        echo '<script>alert("Error en la conexión a la base de datos: '. mysqli_connect_error() .'");</script>';
        exit();
    }

    // Funciones de encriptación y desencriptación
    function encrypt($data, $key) {
        $key = hash('sha256', $key, true);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }

    function decrypt($encryptedData, $key) {
        $key = hash('sha256', $key, true);
        $data = base64_decode($encryptedData);
        $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
        $decrypted = openssl_decrypt(substr($data, openssl_cipher_iv_length('aes-256-cbc')), 'aes-256-cbc', $key, 0, $iv);
        return $decrypted;
    }

    // Función para limpiar y escapar los datos ingresados por el usuario
    function limpiarDatos($conexion, $datos) {
        $datos = trim($datos); // Eliminar espacios en blanco al inicio y al final
        $datos = stripslashes($datos); // Eliminar slashes
        $datos = htmlspecialchars($datos); // Convertir caracteres especiales en entidades HTML
        $datos = mysqli_real_escape_string($conexion, $datos); // Escapar caracteres especiales para su uso en consultas SQL
        return $datos;
    }

    // Procesar cambio de nombre de usuario
    if (isset($_POST['username'])) {
        $nuevoUsuario = limpiarDatos($conexion, $_POST['username']);
        $idUsuario = $_SESSION['user_id'];
        // Consulta preparada para actualizar el nombre de usuario
        $consulta = mysqli_prepare($conexion, "UPDATE `user-admin` SET `user-name` = ? WHERE `id-admin` = ?");

        mysqli_stmt_bind_param($consulta, "si", $nuevoUsuario, $idUsuario);
        mysqli_stmt_execute($consulta);

        // Verificar si la consulta fue exitosa
        if (mysqli_stmt_affected_rows($consulta) > 0) {
            echo '<script>alert("El nombre de usuario se ha actualizado correctamente.");</script>';
            $_SESSION['user_name'] = $nuevoUsuario;
        } else {
            echo '<script>alert("Error al actualizar el nombre de usuario.");</script>';
        }

        mysqli_stmt_close($consulta);
        //echo "<script> location.reload(); </script>";
    }

    // Procesar cambio de correo electrónico
    if (isset($_POST['email'])) {
        $nuevoEmail = limpiarDatos($conexion, $_POST['email']);
        $idUsuario = $_SESSION['user_id'];

        // Consulta preparada para actualizar el correo electrónico
        $consulta = mysqli_prepare($conexion, "UPDATE `user-admin` SET `email-admin` = ? WHERE `id-admin` = ?");
        mysqli_stmt_bind_param($consulta, "si", $nuevoEmail, $idUsuario);
        mysqli_stmt_execute($consulta);


        // Verificar si la consulta fue exitosa
        if (mysqli_stmt_affected_rows($consulta) > 0) {
            echo '<script>alert("El correo se ha actualizado correctamente.");</script>';
            $_SESSION['email'] = $nuevoEmail;
        } else {
            echo '<script>alert("Error al actualizar el correo.");</script>';
        }

        mysqli_stmt_close($consulta);
    }

    // Procesar cambio de contraseña
    if (isset($_POST['current-password']) && isset($_POST['new-password']) && isset($_POST['confirm-password'])) {
        $contrasenaActual = limpiarDatos($conexion, $_POST['current-password']);
        $nuevaContrasena = limpiarDatos($conexion, $_POST['new-password']);
        $confirmarContrasena = limpiarDatos($conexion, $_POST['confirm-password']);
        $idUsuario = $_SESSION['user_id'];

        // Verificar si la contraseña actual es correcta
        $consulta1 = mysqli_prepare($conexion, "SELECT `password-admin` FROM `user-admin` WHERE `id-admin` = ?");
        mysqli_stmt_bind_param($consulta1, "i", $idUsuario);
        mysqli_stmt_execute($consulta1);
        mysqli_stmt_bind_result($consulta1, $contrasenaHash);

        if (mysqli_stmt_fetch($consulta1)) {
            // Verificar si la contraseña actual coincide con la almacenada en la base de datos
            if (decrypt($contrasenaHash, $key) == $contrasenaActual) {
                // Verificar si la nueva contraseña y la confirmación coinciden
                if ($nuevaContrasena === $confirmarContrasena) {
                    $contrasenaNuevaHash = encrypt($nuevaContrasena, $key);

                    // Cerrar y liberar los resultados de la consulta anterior
                    mysqli_stmt_free_result($consulta1);

                    // Consulta preparada para actualizar la contraseña
                    $consulta2 = mysqli_prepare($conexion, "UPDATE `user-admin` SET `password-admin` = ? WHERE `id-admin` = ?");
                    mysqli_stmt_bind_param($consulta2, "si", $contrasenaNuevaHash, $idUsuario);
                    mysqli_stmt_execute($consulta2);

                    // Verificar si la consulta fue exitosa
                    if (mysqli_stmt_affected_rows($consulta2) > 0) {
                        echo '<script>alert("La contraseña se ha actualizado correctamente.");</script>';
                    } else {
                        echo '<script>alert("Error al actualizar la contraseña.");</script>';
                    }

                    mysqli_stmt_close($consulta2);
                } else {
                    echo '<script>alert("La nueva contraseña y la confirmación no coinciden.");</script>';
                }
            } else {
                echo '<script>alert("La contraseña actual es incorrecta.");</script>';
            }
        }

        mysqli_stmt_free_result($consulta1);
        mysqli_stmt_close($consulta1);
    }



    mysqli_close($conexion);
?>
</html>

