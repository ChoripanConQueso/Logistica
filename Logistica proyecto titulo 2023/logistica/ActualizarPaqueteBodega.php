<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Logística - Paquetes</title>
    <link rel="stylesheet" href="actualizarpaquete.css">
    <style>
        .form-container {
            display: flex;
            justify-content: space-between;
        }

        .form-container form {
            width: 48%; /* Ajusta el ancho según sea necesario */
        }
    </style>
</head>
<body>
    <header>
        <!-- Contenido del encabezado, si es necesario -->
    </header>

    <nav>
        <ul>    
            <div class="logo-container">
            <img src="imagenes/logo.png" alt="Logo" class="logo">
            </div>
            <a href="bodeguero.html"><li>inicio</li></a>
            <a href="visorpaquetesBodega.html"><li>Ver paquetes</li></a>
            <a href="ActualizarPaqueteBodega.php"><li>Actualizar Paquetes</li></a>
        </ul>
    </nav>

    <br><br>

    <article>
        <div class="article-container"><br>
            <h2 class="title-section">Buscar Paquete</h2>
            <!-- Formulario de búsqueda -->
            <form action="" method="post">
                <label for="codigo">Número de Paquete:</label>
                <input type="text" name="codigo" id="codigo" required><br>
                <input type="submit" value="Buscar">

                <!-- Campo oculto para el código del paquete -->
                <?php if(isset($paquete['codigo'])): ?>
                    <input type="hidden" name="codigo_paquete" value="<?php echo $paquete['codigo']; ?>">
                <?php endif; ?>
            </form>

            <!-- Mostrar datos del paquete -->
            <div class="center-container" id="datos_paquete">
                <?php
                // Verificar si se ha enviado el formulario
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Realizar la búsqueda y mostrar los resultados
                    include 'buscar_paquete.php'; // Reemplaza con el nombre correcto de tu script
                }
                ?>
            </div>

            <br>

            <!-- Formulario de actualización de estado y ubicación -->
            <div class="form-container">
                <form action="Actualizar_Estado_Bodega.php" method="post">
                    <input type="hidden" name="codigo_paquete" value="<?php echo $paquete['codigo']; ?>">
                    <label for="nuevo_estado">Nuevo Estado:</label>
                    <select name="nuevo_estado" id="nuevo_estado">
                        <option value="" selected disabled>Selecciona una opción</option>
                        <option value="en reparto">En Reparto</option>
                        <option value="en sucursal">En Sucursal</option>
                        <option value="en transito">En Tránsito</option>
                    </select>
                    <input type="submit" value="Actualizar Estado">
                </form>

                <form action="Actualizar_Ubicacion_Bodega.php" method="post">
                    <input type="hidden" name="codigo_paquete" value="<?php echo $paquete['codigo']; ?>">
                    <label for="nueva_ubicacion">Nueva ubicación:</label>
                    <select name="nueva_ubicacion" id="nueva_ubicacion" required>
                        <option value="" selected disabled>Selecciona una opción</option>
                        <option value="Rancagua">Rancagua</option>
                        <option value="SanFernando">SanFernando</option>
                        <option value="Santiago Norte">Santiago Norte</option>
                        <option value="Santiago Sur">Santiago Sur</option>
                    </select>
                    <input type="submit" value="Actualizar Ubicación">
                </form>
            </div>

            <br><br>
        </div>
    </article>

    <br>

    <footer>
        <div class="container">
            <div class="footercolumna">
                <h4>Contacto</h4>
                <ul>
                    <li><img src="fotos/wtsp.png" alt="wtsp" class="wtsp"><a>2123</a></li>
                    <li><a>correo@dominio.com</a></li>
                </ul>
            </div>

            <div class="footercolumna">
                <h4>Servicios</h4>
                <ul>
                    <li><a>Servicio 1</a></li>
                    <li><a>Servicio 2</a></li>
                    <li><a>Servicio 3</a></li>
                    <li><a>Servicio 4</a></li>
                </ul>
            </div>

            <div class="footercolumna">
                <h4>Redes sociales</h4>
                <ul>
                    <li><a><img src="fotos/insta.png" class="insta">INSTAGRAM</a></li>
                    <li><a><img src="fotos/face.png" alt="face" class="face">FACEBOOK</a></li>
                    <li><a><img src="fotos/twitter.png" alt="twitter" class="twitter">TWITTER</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>
