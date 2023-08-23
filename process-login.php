<?php
    //error_reporting(E_ALL);
    /*  Este codigo es el chido, los otros son de prueba    */
    session_start();
    require 'datos-db.php';
    //echo 'wtf';
    
    // Crear la conexión
    $conn = new mysqli($servernameDB, $usernameDB, $passwordDB, $nameDB);
    
    // Verificar si se ha establecido la conexión correctamente
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }

    // Obtener los valores enviados desde el formulario de inicio de sesión
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL para obtener la contraseña almacenada del usuario
    $sql = "SELECT `id-admin`, `password-admin`, `user-name` FROM `user-admin` WHERE `email-admin` = '$email'";
    $result = $conn->query($sql);
   
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password-admin'];
        $username = $row['user-name'];
        $userId = $row['id-admin'];

        // Función de desencriptación
        function decrypt($encryptedData, $key) {
            $key = hash('sha256', $key, true);
            $data = base64_decode($encryptedData);
            $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
            $decrypted = openssl_decrypt(substr($data, openssl_cipher_iv_length('aes-256-cbc')), 'aes-256-cbc', $key, 0, $iv);
            return $decrypted;
        }

        // Desencriptar la contraseña almacenada
        $decryptedData = decrypt($storedPassword, $key);
        

        // Verificar si la contraseña introducida coincide con la almacenada
        if ($password == $decryptedData) {
            
            $_SESSION['email'] = $email;
            $_SESSION['logged_in'] = true;
            $_SESSION['user_name'] = $username;
            $_SESSION['user_id'] = $userId;
            
            // Redirigir a la página de inicio de administrador
            echo '<script>window.location.href = "index-admin.php";</script>';
            exit;
        } else {
            echo '<script>alert("Contraseña incorrecta");</script>';
            echo '<script>window.location.href = "index.php";</script>';
            session_destroy();
            exit;
        }
    } else {
        echo '<script>alert("El usuario no existe");</script>';
        echo '<script>window.location.href = "index.php";</script>';
        session_destroy();
        exit;
    }

    // Cerrar la conexión cuando hayas terminado
    $conn->close();
?>
