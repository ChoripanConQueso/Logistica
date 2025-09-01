<?php
// abre Conexión a la base de datos
$db = new mysqli('localhost', 'root', '', 'logistica');

// Verificar la conexión
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$rut = $_POST['rut'];
$fono = $_POST['fono'];
$correo = $_POST['email'];


// Verifica  
$query = "INSERT INTO `remitente` (`nombre`, `Rut`, `fono`, `Correo`) VALUES ('$nombre', '$rut', '$fono', '$correo');";
$result = $db->query($query);
if ($result) {
    echo '<script>alert("¡Inserción exitosa!");</script>';
    echo '<script>window.location = "trabajoformremitente.html";</script>';
    exit; 
} else {
    echo '<script>alert("Error al insertar datos en la base de datos.");</script>';
}

// Cierra la conexión a la base de datos
$db->close();
?>
