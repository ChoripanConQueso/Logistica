<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_paquete = $_POST['codigo_paquete'];
    $nueva_ubicacion = $_POST['nueva_ubicacion']; // Corregido el nombre de la variable

    $db = obtenerConexion();

    // Obtener la fecha actual
    $fecha_modificacion = date("Y-m-d H:i:s");

    // Actualizar la ubicación y la fecha de modificación en la base de datos
    $sql = "UPDATE paquete SET ubicacionact = '$nueva_ubicacion', fecha_modificacion = '$fecha_modificacion' WHERE codigo = '$codigo_paquete'";
    $result = $db->query($sql);

    if ($result) {
        echo '<script>alert("Ubicacion actualizada!");</script>';
        echo '<script>window.location = "ActualizarPaquete.php";</script>';
        exit;
    } else {
        echo '<script>alert("error al actualizar ubicacion.");</script>';
        echo "Mensaje de error: " . $db->error;
    }
    $db->close();
}
?>