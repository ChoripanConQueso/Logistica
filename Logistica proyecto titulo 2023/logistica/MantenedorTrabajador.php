<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="MantenedorTrabajador.css">
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
      <a href="VisorPaquetesGerente.html"><li>Paquetes</li></a>
      <a href="RegistrarPaqueteGerente.php"><li>Registrar paquete</li></a>
      <a href="RegistrarRemitenteGerente.html"><li>Registrar remitente</li></a>
      <a href="ActualizarPaqueteGerente.php"><li>Actualizar paquete</li></a>
      <a href="GerenteEntrega.html"><li>Crear entrega</li></a>
      <a href="MantenedorTrabajador.php"><li>Administacion</li></a>
    </ul>
  </nav><br>

  <article>
      <form action="procesar_Cargos.php" method="post"><Br>
      <H2> Registrar empleado </H2><Br>
        <table>
          <tr>
            <td>
              <label for="nombre">Nombre:</label>
              <br>
              <input type="text" name="nombre">
            </td>
          </tr>
          <tr>
            <td>
              <label for="ID">ID:</label>
              <br>
              <input type="text" name="id">
            </td>
          </tr>
          <tr>
            <td>
              <label for="cargo">Cargo:</label>
              <br>
              <select name="cargo">
                <option value="recepcionista">Recepcionista</option>
                <option value="bodeguero">Bodeguero</option>
                <option value="repartidor">Repartidor</option>
                <option value="gerente">Gerente</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="sucursal">Sucursal:</label>
              <br>
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
                  echo '<select name="socursal">'; // Agrega el atributo name
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
            <td>
              <label for="clave">Clave:</label>
              <br>
              <input type="text" name="clave">
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
          <li><img src="fotos/wtsp.png" alt="wtsp" class="wtsp"><a>2123</a></li>
          <li><a>a</a></li>
        </ul>
      </div>

      <div class="footercolumna">
        <h4>Servicios</h4>
        <ul>
          <li><a>a</a></li>
          <li><a>a</a></li>
          <li><a>a</a></li>
          <li><a>a</a></li>
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
