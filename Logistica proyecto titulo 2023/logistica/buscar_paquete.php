<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_paquete = $_POST['codigo'];
    $db = obtenerConexion();

    $sql = "SELECT * FROM paquete WHERE codigo = '$codigo_paquete'";
    $result = $db->query($sql);

    if ($result && $result->num_rows > 0) {
        $paquete = $result->fetch_assoc();
        echo "<h3>Datos del Paquete</h3>";
        echo "Número de Paquete: " . $paquete['codigo'] . "<br>";
        echo "Servicio: " . $paquete['servicio'] . "<br>";
        echo "Origen: " . $paquete['origen'] . "<br>";
        echo "Destino: " . $paquete['destino'] . "<br>";
        echo "Remitente: " . $paquete['remitente'] . "<br>";
        echo "Dirección de Entrega: " . $paquete['direntrega'] . "<br>";
        echo "Destinatario: " . $paquete['destinatario'] . "<br>";
        echo "Estado: " . $paquete['estado'] . "<br>";
        echo "Receptor: " . $paquete['receptor'] . "<br>";
        echo "Ubicación Actual: " . $paquete['ubicacionact'] . "<br>";
        echo "Fecha de Modificación: " . $paquete['fechain'] . "<br>";
    } else {
        echo "Paquete no encontrado.";
    }

    $db->close();
}
?>