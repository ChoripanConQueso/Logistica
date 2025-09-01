<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="registrarpaquete.css">
  <script>
    // Verificar la existencia de la cookie al cargar la página
    window.onload = function() {
      // Verificar la existencia de la cookie 'tiempodevida'
      if (!document.cookie.includes('tiempodevida')) {
        // Si la cookie no está presente, redirigir o tomar alguna acción
        alert('vuelva a iniciar secion');
        window.location.href = 'pagina_de_redireccion.html'; // Cambia a la página de redirección que desees
      }
    };
</script>
</head>
<body>
  <header>

  </header>

  <nav>
    <div class="logo-container">
      <img src="imagenes/logo.png" alt="Logo" class="logo">
    </div>
    <ul>
    <a href="visorpaquetes.html"><li>Paquetes</li></a>
      <a href="RegistrarPaqueteGerente.php"><li>Registrar paquete</li></a>
      <a href="RegistrarRemitenteGerente.html"><li>Registrar remitente</li></a>
      <a href="MantenedorPaqueteGerente.php"><li>Crear paquete</li></a>
      <a href="GerenteEntrega.html"><li>Crear entrega</li></a>
      <a href="MantenedorTrabajador.php"><li>Administacion</li></a>
    </ul>
  </nav>

  <article><Br>
        <form action="Registrar_Paquete_Gerente.php" method="post">
          <H2> Registro de paquetes </H2>
            <table>
                <tr>
                    <td colspan="2">
                        <label for="servicio">Servicio:</label>
                        <input type="text" id="servicio" name="servicio" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="origen">Origen:</label>
                        <?php
                        $db = new mysqli('localhost', 'root', '', 'logistica');

                        // Verificar la conexión
                        if ($db->connect_error) {
                            die("Error de conexión: " . $db->connect_error);
                        }

                        // Realiza la consulta para obtener los remitentes desde la base de datos
                        $query = "SELECT nombre FROM socursal";
                        $result = mysqli_query($db, $query); // Pasar la conexión $db como primer argumento

                        // Verifica si hay resultados
                        if ($result) {
                            echo '<select id="origen" name="origen">'; // Agrega el atributo name
                            echo '<option value="">Seleccione el origen</option>'; // Opción por defecto
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                            }
                            echo '</select>';
                            mysqli_free_result($result);
                        } else {
                            // Maneja cualquier error de consulta aquí
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="destino">Destino:</label>
                        <input type="text" id="destino" name="destino" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="remitente">Remitente:</label>
                        <?php
                        $db = new mysqli('localhost', 'root', '', 'logistica');

                        // Verificar la conexión
                        if ($db->connect_error) {
                            die("Error de conexión: " . $db->connect_error);
                        }

                        // Realiza la consulta para obtener los remitentes desde la base de datos
                        $query = "SELECT nombre FROM remitente";
                        $result = mysqli_query($db, $query); // Pasar la conexión $db como primer argumento

                        // Verifica si hay resultados
                        if ($result) {
                            echo '<select id="remitente" name="remitente">';
                            echo '<option value="">Selecciona un remitente</option>'; // Opción por defecto

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                            }

                            echo '</select>';
                            mysqli_free_result($result);
                        } else {
                            // Maneja cualquier error de consulta aquí
                            echo '<p>Error al obtener los remitentes</p>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="destinatario">Destinatario:</label>
                        <input type="text" id="destinatario" name="destinatario" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="direntrega">Direccion:</label>
                        <input type="text" id="direntrega" name="direntrega" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="ubicacionact">Ubicacion:</label>
                        <?php
                        $db = new mysqli('localhost', 'root', '', 'logistica');

                        // Verificar la conexión
                        if ($db->connect_error) {
                            die("Error de conexión: " . $db->connect_error);
                        }

                        // Realiza la consulta para obtener los remitentes desde la base de datos
                        $query = "SELECT nombre FROM socursal";
                        $result = mysqli_query($db, $query); // Pasar la conexión $db como primer argumento

                        // Verifica si hay resultados
                        if ($result) {
                            echo '<select id="ubicacionact" name="ubicacionact">';
                            echo '<option value="">ubicacion actual</option>'; // Opción por defecto
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                            }
                            echo '</select>';
                            mysqli_free_result($result);
                        } else {
                            // Maneja cualquier error de consulta aquí
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Guardar">
        </form><Br>
    </article>

<footer>
      <div class="container">
        <div class="footercolumna">
          <h4>Contacto</h4>
          <ul>
            <li><img src="imagenes/wtsp.png" alt="wtsp" class="wtsp"><a>2123</a></li>
            <li><a>a</a></li>
          </ul>
        </div>

        <div class="footercolumna">
          <h4>Redes sociales</h4>
          <ul>
            <li><a><img src="imagenes/insta.png" class="insta">INSTAGRAM</a></li>
            <li><a><img src="imagenes/face.png" alt="face" class="face">FACEBOOK</a></li>
            <li><a><img src="imagenes/twitter.png" alt="twitter" class="twitter">TWITTER</a></li>
          </ul>
        </div>
      </div>
    </footer>
</body>
</html>