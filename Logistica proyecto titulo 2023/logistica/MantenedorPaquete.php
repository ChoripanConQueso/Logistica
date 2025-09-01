<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="trabajo.css">
</head>
<body>
  <header>

  </header>

  <nav>
    <ul>
      <a href=""><li>Home</li></a>
      <a href=""><li>Productos</li></a>
      <a href=""><li>Sucursales</li></a>
      <a href=""><li>contacto</li></a>
    </ul>
  </nav><br><br><br>

<article>
  <center>
  <form action="procesarPaquete.php" method="post">
    <table>
        <tr>
            <td>Servicio:</td>
            <td><input type="text" name="servicio" required ></td>
        </tr>
        <tr>
            <td>Origen:</td>
            <td> 
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
    echo '<select name="origen">'; // Agrega el atributo name
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
            <td>Destino:</td>
            <td><input type="text" name="destino" required ></td>
        </tr>
        <tr>
    <td>Remitente:</td>
    <td> 
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
            echo '<select name="remitente" id="remitente">';
            echo '<option value="">Selecciona un remitente</option>'; // Opción por defecto

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                //                             ^^^^^^^^^^^^
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
            <td>destinatario:</td>
            <td><input type="text" name="destinatario" required></td>
        </tr>
        <tr>
            <td>Direccion:</td>
            <td><input type="text" name="direccion" required ></td>
        </tr>
        <tr>
              <td>ubicacion:</td>
              <td> 
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
    echo '<select name="ubicacion">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
        //                             ^^^^^^^^^^^^
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
    <input type="submit" value="Guardar" >
</form>
</center>


</article>

<br><br><br>

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