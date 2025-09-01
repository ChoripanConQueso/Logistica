<?php
// Abre la conexión a la base de datos
$db = new mysqli('localhost', 'root', '', 'logistica');

// Verifica la conexión
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$id = $_POST['id'];
$cargo = $_POST['cargo'];
$socursal = $_POST['socursal'];
$clave = $_POST['clave'];

// Realiza la inserción en la base de datos
$query = "INSERT INTO `empleado` (`nombre`, `id`, `cargo`, `socursal`, `clave`) VALUES ('$nombre', '$id', '$cargo', '$socursal', '$clave')";
$result = $db->query($query);

if ($result) {
    echo '<script>alert("¡Inserción exitosa!");</script>';
    echo '<script>window.location = "trabajoformremitente.html";</script>';
    exit;
} else {
    echo '<script>alert("Error al insertar datos en la base de datos.");</script>';
    echo "Mensaje de error: " . $db->error;
}

// Cierra la conexión a la base de datos
$db->close();
?>