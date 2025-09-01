<?php
// abre Conexión a la base de datos
$db = new mysqli('localhost', 'root', '', 'logistica');

// Verificar la conexión
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

// Realiza la consulta para obtener los remitentes desde la base de datos
$query = "SELECT nombre FROM remitente";
$result = $db->query($query);

$remitente = array();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $remitente[] = $row;
    }
    $result->free();
}

// Devuelve los datos como JSON
echo json_encode($remitente);
?>