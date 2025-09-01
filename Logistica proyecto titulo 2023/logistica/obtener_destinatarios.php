<?php
// Conecta a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logistica";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Realiza una consulta SQL para obtener los destinatarios
$sql = "SELECT nombre FROM remitente";
$result = $conn->query($sql);

$destinatarios = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $destinatarios[] = $row;
    }
}

// Cierra la conexión a la base de datos
$conn->close();

// Devuelve los datos en formato JSON
echo json_encode($destinatarios);
?>