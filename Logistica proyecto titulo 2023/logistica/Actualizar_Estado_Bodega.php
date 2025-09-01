<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_paquete = $_POST['codigo_paquete'];
    $nuevo_estado = $_POST['nuevo_estado'];

    $db = obtenerConexion();

    // Obtener la fecha actual
    $fecha_modificacion = date("Y-m-d H:i:s");

    // Actualizar el estado y la fecha de modificación en la base de datos
    $sql = "UPDATE paquete SET estado = '$nuevo_estado', Fecha_modificacion = '$fecha_modificacion' WHERE codigo = '$codigo_paquete'";
    $result = $db->query($sql);

    if ($result) {
        echo '<script>alert("Estado actualizado!");</script>';
        echo '<script>window.location = "ActualizarPaqueteBodega.php";</script>';
    } else {
        echo "Error al actualizar el estado del paquete: " . $db->error;
    }

    $db->close();
}
?>