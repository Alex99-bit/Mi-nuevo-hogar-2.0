<?php
    session_start();
    require 'datos-db.php';

    // Verificar si la sesión está abierta
    if (!isset($_SESSION['logged_in'])) {
        echo '<script>window.location.href = "index.php";</script>'; // Redireccionar al archivo index.php
        exit(); // Terminar la ejecución del script actual
    }

    // Verificar si se ha enviado el formulario de crear casa
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['house-title']) && isset($_POST['house-description']) && isset($_POST['house-price']) && isset($_FILES['house-image'])) {
        // Obtener los datos del formulario
        $houseTitle = $_POST['house-title'];
        $houseDescription = $_POST['house-description'];
        $housePrice = $_POST['house-price'];

        // Validar y procesar los datos aquí
        // ...

        // Verificar si se proporcionó un archivo de imagen
        if (!empty($_FILES['house-image']['name'])) {
            // Procesar y almacenar los datos de la casa en la base de datos

            // Crear la conexión a la base de datos
            $conexion = mysqli_connect($servernameDB, $usernameDB, $passwordDB, $nameDB);

            // Verificar si la conexión fue exitosa
            if (mysqli_connect_errno()) {
                echo 'Error en la conexión a la base de datos: ' . mysqli_connect_error();
                exit();
            }
            
            // Escapar los datos para prevenir inyección de SQL
            $houseTitle = mysqli_real_escape_string($conexion, $houseTitle);
            $houseDescription = mysqli_real_escape_string($conexion, $houseDescription);
            $housePrice = mysqli_real_escape_string($conexion, $housePrice);
            
            // Reemplazar los saltos de línea con una cadena que los represente
            $houseDescription = str_replace(array("\r\n", "\r", "\n"), '\n', $houseDescription);


            // Construir la consulta SQL para insertar los datos en la tabla "publicaciones"
            $consultaPublicacion = "INSERT INTO publicaciones (`titulo-publicacion`, `texto-publicacion`, `precio`, `id-apartado`) VALUES ('$houseTitle', '$houseDescription', '$housePrice', '1')";

            // Ejecutar la consulta para insertar la publicación
            if (mysqli_query($conexion, $consultaPublicacion)) {
                // La publicación se ha insertado correctamente en la tabla "publicaciones"

                // Obtener el ID de la publicación recién insertada
                $idPublicacion = mysqli_insert_id($conexion);

                // Obtener la información del archivo de imagen
                $imageTmpName = $_FILES['house-image']['tmp_name'];
                $imageType = $_FILES['house-image']['type'];

                // Verificar si el archivo es una imagen
                if (substr($imageType, 0, 5) === 'image') {
                    // Leer el contenido del archivo de imagen
                    $imageData = file_get_contents($imageTmpName);
                    if ($imageData !== false) {
                        // Construir la consulta SQL para insertar los datos en la tabla "imagenes"
                        $consultaImagen = "INSERT INTO imagenes (imagen, `id-publicacion`) VALUES (?, ?)";

                        // Preparar la consulta
                        $stmt = mysqli_prepare($conexion, $consultaImagen);
                        mysqli_stmt_bind_param($stmt, "si", $imageData, $idPublicacion);

                        // Ejecutar la consulta para insertar la imagen
                        if (mysqli_stmt_execute($stmt)) {
                            // La imagen se ha insertado correctamente en la tabla "imagenes"

                            // Redireccionar a una página de éxito o mostrar un mensaje de éxito
                            echo '<script>alert("Casa agregada correctamente.");</script>';
                            echo '<script>window.location.href = "admin-casas.php";</script>';
                            exit();
                        } else {
                            // Ocurrió un error al insertar la imagen
                            //echo 'Error al insertar la imagen en la base de datos: ' . mysqli_error($conexion);
                            echo '<script>alert("Error al insertar la imagen en la base de datos: ".mysqli_error($conexion););</script>';
                            echo '<script>window.location.href = "admin-casas.php";</script>';
                            exit();
                        }
                    } else {
                        // No se pudo leer el contenido del archivo de imagen
                        echo '<script>alert("Error al leer el contenido del archivo de imagen.");</script>';
                        echo '<script>window.location.href = "admin-casas.php";</script>';
                        exit();
                    }
                } else {
                    // El archivo no es una imagen válida
                    echo '<script>alert("Debe proporcionar un archivo de imagen válido.");</script>';
                    echo '<script>window.location.href = "admin-casas.php";</script>';
                    exit();
                }
            } else {
                // Ocurrió un error al insertar la publicación
                echo 'Error al insertar la publicación en la base de datos: ' . mysqli_error($conexion);
                echo '<script>alert("Error al insertar la publicación en la base de datos: ".mysqli_error($conexion));</script>';
                echo '<script>window.location.href = "admin-casas.php";</script>';
                exit();
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
        } else {
            echo '<script>alert("Debe proporcionar un archivo de imagen para la casa.");</script>';
            echo '<script>window.location.href = "admin-casas.php";</script>';
        }
    }

    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['house-id']) && isset($_POST['house-title']) && isset($_POST['house-description']) && isset($_POST['house-price'])) {
        $houseId = $_POST['house-id'];
    
        // Crear la conexión a la base de datos
        $conexion = mysqli_connect($servernameDB, $usernameDB, $passwordDB, $nameDB);
    
        // Verificar si la conexión fue exitosa
        if (mysqli_connect_errno()) {
            echo 'Error en la conexión a la base de datos: ' . mysqli_connect_error();
            exit();
        }
    
        // Escapar los datos para prevenir inyección de SQL
        $houseId = mysqli_real_escape_string($conexion, $houseId);
    
        // Construir la consulta SQL para obtener los datos de la casa
        $consulta = "SELECT * FROM `publicaciones` WHERE `id-publicacion` = '$houseId'";
    
        // Ejecutar la consulta para obtener los datos de la casa
        $resultado = mysqli_query($conexion, $consulta);
        $house = mysqli_fetch_assoc($resultado);
    
        // Verificar si se encontró la casa en la base de datos
        if ($house) {
            // Verificar y actualizar el título de la casa
            if (isset($_POST['house-title']) && !empty($_POST['house-title'])) {
                $houseTitle = mysqli_real_escape_string($conexion, $_POST['house-title']);
                $house['titulo-publicacion'] = $houseTitle;
            }
    
            // Verificar y actualizar la descripción de la casa
            if (isset($_POST['house-description']) && !empty($_POST['house-description'])) {
                $houseDescription = mysqli_real_escape_string($conexion, $_POST['house-description']);
                $house['texto-publicacion'] = $houseDescription;
            }
    
            // Verificar y actualizar el precio de la casa
            if (isset($_POST['house-price']) && !empty($_POST['house-price'])) {
                $housePrice = mysqli_real_escape_string($conexion, $_POST['house-price']);
                $house['precio'] = $housePrice;
            }
    
            // Construir la consulta SQL para actualizar los datos de la casa en la tabla "publicaciones"
            $updateConsulta = "UPDATE publicaciones SET 
                                `titulo-publicacion` = '{$house['titulo-publicacion']}', 
                                `texto-publicacion` = '{$house['texto-publicacion']}', 
                                `precio` = '{$house['precio']}' 
                                WHERE `id-publicacion` = '$houseId'";
    
            // Ejecutar la consulta para actualizar la publicación
            if (mysqli_query($conexion, $updateConsulta)) {
                // Los datos de la casa se han actualizado correctamente en la tabla "publicaciones"
    
                // Redireccionar a una página de éxito o mostrar un mensaje de éxito
                /*echo '<script>alert("Casa actualizada correctamente.");</script>';
                header('Location: admin-casas.php');*/
                echo 'Casa actualizada correctamente.';
                exit();
            } else {
                // Ocurrió un error al actualizar la publicación
                echo 'Error al actualizar la publicación en la base de datos: ' . mysqli_error($conexion);
                exit();
            }
        } else {
            // No se encontró la casa en la base de datos
            echo 'No se encontró la casa en la base de datos.';
            exit();
        }
    
        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    }


    // Verificar si se ha enviado el formulario de eliminación
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete-house-select'])) {
        $selectedHouseId = $_POST['delete-house-select'];
    
        // Crear la conexión a la base de datos
        $conexion = mysqli_connect($servernameDB, $usernameDB, $passwordDB, $nameDB);
    
        // Verificar si la conexión fue exitosa
        if (mysqli_connect_errno()) {
            echo 'Error en la conexión a la base de datos: ' . mysqli_connect_error();
            exit();
        }
    
        // Escapar los datos para prevenir inyección de SQL
        $selectedHouseId = mysqli_real_escape_string($conexion, $selectedHouseId);
    
        // Verificar si la casa existe en la base de datos
        $query = "SELECT `id-publicacion` FROM `publicaciones` WHERE `titulo-publicacion` = '$selectedHouseId' AND `id-apartado` = 1";
        $result = mysqli_query($conexion, $query);
        $house = mysqli_fetch_assoc($result);
    
        // Verificar si se encontró la casa en la base de datos
        if ($house) {
            $houseId = $house['id-publicacion'];
    
            // Obtener la imagen asociada a la casa
            $getImageQuery = "SELECT * FROM `imagenes` WHERE `id-publicacion` = '$houseId'";
            $imageResult = mysqli_query($conexion, $getImageQuery);
            $image = mysqli_fetch_assoc($imageResult);
    
            if ($image) {
                $imageId = $image['id'];
    
                // Eliminar la imagen asociada a la casa de la tabla "imagenes"
                $deleteImageQuery = "DELETE FROM `imagenes` WHERE `id` = '$imageId'";
                if (mysqli_query($conexion, $deleteImageQuery)) {
                    // La imagen asociada a la casa se ha eliminado correctamente de la tabla "imagenes"
    
                    // Eliminar la casa de la tabla "publicaciones"
                    $deleteQuery = "DELETE FROM `publicaciones` WHERE `id-publicacion` = '$houseId'";
                    if (mysqli_query($conexion, $deleteQuery)) {
                        // La casa se ha eliminado correctamente de la tabla "publicaciones"
    
                        // Redireccionar a una página de éxito o mostrar un mensaje de éxito
                        /*echo '<script>alert("Casa eliminada correctamente.");</script>';
                        header('Location: admin-casas.php');*/
                        echo '<script>alert("Casa eliminada correctamente.");</script>';
                        echo '<script>window.location.href = "admin-casas.php";</script>';
                        //echo 'Casa eliminada correctamente.';
                        exit();
                    } else {
                        // Ocurrió un error al eliminar la casa
                        echo 'Error al eliminar la casa en la base de datos: ' . mysqli_error($conexion);
                        exit();
                    }
                } else {
                    // Ocurrió un error al eliminar la imagen de la casa
                    echo 'Error al eliminar la imagen de la casa en la base de datos: ' . mysqli_error($conexion);
                    exit();
                }
            } else {
                // No se encontró la imagen asociada a la casa
                echo 'No se encontró la imagen asociada a la casa en la base de datos.';
                exit();
            }
        } else {
            // No se encontró la casa en la base de datos
            echo 'No se encontró la casa en la base de datos.';
            exit();
        }
    
        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    }

?>




<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel de Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./scss/panel-admin/admin-casas.css">
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
            <h2>Administración de casas</h2>
            <p>¡Aquí puedes gestionar tus publicaciones de Casas!</p>

            <div class="change-form">
                <h3>Agregar Casa</h3>
                <form action="./admin-casas.php" method="post" enctype="multipart/form-data">
                    <label for="house-title">Título de la casa</label>
                    <input type="text" id="house-title" name="house-title" required>
                    
                    <label for="house-description">Descripción de la casa</label>
                    <textarea id="house-description" name="house-description" required></textarea>
                    
                    <label for="house-price">Precio de la casa</label>
                    <input type="number" id="house-price" name="house-price" required>
                    
                    <label for="house-image">Imagen de la casa</label>
                    <input type="file" id="house-image" name="house-image" accept="image/*" required>
                    
                    <button type="submit">Agregar Casa</button>
                </form>
            </div>


            <!--<div class="change-form">
                <h3>Editar Casa</h3>
                <form action="admin-casas.php" method="post">
                    <label for="edit-house-select">Seleccionar Casa</label>
                    <select id="edit-house-select" name="edit-house-select" class="form-select select-large">
                        <?php
                            /*$conexion = mysqli_connect($servernameDB, $usernameDB, $passwordDB, $nameDB);

                            // Verificar si la conexión fue exitosa
                            if (mysqli_connect_errno()) {
                                echo 'Error en la conexión a la base de datos: ' . mysqli_connect_error();
                                exit();
                            }

                            // Realizar consulta a la base de datos para obtener las casas con id de apartado igual a 1
                            $query = "SELECT * FROM `publicaciones` WHERE `id-apartado` = 1"; 
                            $result = mysqli_query($conexion, $query);

                            // Iterar sobre los resultados y crear las opciones del select
                            while ($row = mysqli_fetch_assoc($result)) {
                                $houseTitle = $row['titulo-publicacion'];
                                echo "<option value='$houseTitle'>$houseTitle</option>";
                            }

                            mysqli_close($conexion);*/
                        ?>
                    </select>
                    <?php
                       /* $conexion = mysqli_connect($servernameDB, $usernameDB, $passwordDB, $nameDB);

                        // Verificar si la conexión fue exitosa
                        if (mysqli_connect_errno()) {
                            echo 'Error en la conexión a la base de datos: ' . mysqli_connect_error();
                            exit();
                        }
                        
                        // Obtener la información de la casa seleccionada
                        if (isset($_POST['edit-house-select'])) {
                            $selectedHouse = $_POST['edit-house-select'];
                            $query = "SELECT * FROM `publicaciones` WHERE `titulo-publicacion` = '$selectedHouse' AND `id-apartado` = 1";
                            $result = mysqli_query($conexion, $query);
                            $house = mysqli_fetch_assoc($result);
                        
                            if ($house) {
                                $houseDescription = $house['descripcion'];
                                $housePrice = $house['precio'];
                        
                                // Obtener la imagen de la casa mediante la llave foránea
                                $imageQuery = "SELECT imagen FROM `imagenes` WHERE `id-publicacion` = {$house['id']}";
                                $imageResult = mysqli_query($conexion, $imageQuery);
                                $imageRow = mysqli_fetch_assoc($imageResult);
                                $houseImage = $imageRow['imagen'];
                        
                                // Mostrar la imagen de la casa
                                echo "<img src='$houseImage' alt='Imagen de la casa'>";
                        
                                // Mostrar la descripción de la casa
                                echo "<p>Descripción: $houseDescription</p>";
                        
                                // Mostrar el precio de la casa
                                echo "<p>Precio: $housePrice</p>";
                            }
                        }
                        
                        mysqli_close($conexion);*/          
                    ?>

                    <label for="new-house-title">Nuevo título de la casa</label>
                    <input type="text" id="new-house-title" name="new-house-title" class="form-input" required>

                    <label for="new-house-description">Nueva descripción de la casa</label>
                    <textarea id="new-house-description" name="new-house-description" class="form-textarea" required></textarea>

                    <label for="new-house-price">Nuevo precio de la casa</label>
                    <input type="text" id="new-house-price" name="new-house-price" class="form-input" required>

                    <button type="submit" class="form-button">Editar Casa</button>
                </form>
            </div>-->


            <div class="change-form">
                <h3>Eliminar Casa</h3>
                <form action="admin-casas.php" method="post">
                    <label for="delete-house-select">Seleccionar Casa</label>
                    <select id="delete-house-select" name="delete-house-select" class="form-select select-large">
                        <?php
                            $conexion = mysqli_connect($servernameDB, $usernameDB, $passwordDB, $nameDB);

                            // Verificar si la conexión fue exitosa
                            if (mysqli_connect_errno()) {
                                echo 'Error en la conexión a la base de datos: ' . mysqli_connect_error();
                                exit();
                            }

                            // Realizar consulta a la base de datos para obtener las casas con id de apartado igual a 1
                            $query = "SELECT * FROM `publicaciones` WHERE `id-apartado` = 1";
                            $result = mysqli_query($conexion, $query);

                            // Iterar sobre los resultados y crear las opciones del select
                            while ($row = mysqli_fetch_assoc($result)) {
                                $houseTitle = $row['titulo-publicacion'];
                                echo "<option value='$houseTitle'>$houseTitle</option>";
                            }

                            mysqli_close($conexion);
                        ?>
                    </select>
                    
                    <button type="submit" class="form-button">Eliminar Casa</button>
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