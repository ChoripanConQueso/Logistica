<?php
// Abre la conexión a la base de datos
$db = new mysqli('localhost', 'root', '', 'logistica');

// Verifica la conexión
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

// Obtener los datos del formulario
$servicio = $_POST['servicio'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$remitente = $_POST['remitente'];
$direntrega = $_POST['direntrega'];
$destinatario = $_POST['destinatario'];
$ubicacion = $_POST['ubicacionact'];
$fecha_ingreso = date("Y-m-d H:i:s");

// Realiza la inserción en la base de datos
$query = "INSERT INTO `paquete` (`servicio`, `origen`, `destino`, `remitente`, `direntrega`, `destinatario`, `estado`,`receptor`,`fechain`,`ubicacionact`) VALUES ('$servicio', '$origen', '$destino', '$remitente', '$direntrega', '$destinatario', 'recepcionado',null , '$fecha_ingreso', '$ubicacion')";
$result = $db->query($query);

if ($result) {
    echo '<script>alert("¡Inserción exitosa!");</script>';
    echo '<script>window.location = "RegistrarPaquete.php";</script>';
    
    exit;
} else {
    echo '<script>alert("Error al insertar datos en la base de datos.");</script>';
    echo "Mensaje de error: " . $db->error;
}

// Cierra la conexión a la base de datos
$db->close();
?>