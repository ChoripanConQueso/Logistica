<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_paquete = $_POST['paquete'];
    $entrega_completada = isset($_POST['Entrega']) ? 1 : 0; // 1 si está marcado, 0 si no

    $db = obtenerConexion();

    // Actualizar el estado del paquete en la base de datos
    $sql = "UPDATE paquete SET estado = 'Entrega completada' WHERE codigo = '$codigo_paquete'";
    $result = $db->query($sql);

    if ($result) {
        echo "Estado del paquete actualizado correctamente.";
        echo '<script>alert("Entrega completada");</script>';
        echo '<script>window.location = "repartidor.html";</script>';
    } else {
        echo "Error al actualizar el estado del paquete: " . $db->error;
    }

    $db->close();
}
?>