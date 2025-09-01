<?php
include 'config.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar la existencia de la cookie 'sucursal_trabajador'
    if (!isset($_COOKIE['sucursal_trabajador'])) {
        // Si la cookie no está presente, redirigir o tomar alguna acción
        echo 'Vuelva a iniciar sesión.';
        // Puedes redirigir a otra página o mostrar un mensaje de error
        exit;
    }

    // Obtener la ubicación del repartidor desde la cookie
    $ubicacionRepartidor = $_COOKIE['sucursal_trabajador'];

    // Realizar la consulta para obtener los paquetes en reparto en la ubicación del repartidor
    $db = obtenerConexion();
    $sql = "SELECT codigo, servicio, direntrega, destinatario FROM paquete WHERE estado = 'en reparto' AND ubicacionact = '$ubicacionRepartidor'";
    $result = $db->query($sql);

    if ($result) {
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            echo '<h2>Paquetes en reparto en la ubicación del repartidor:</h2>';
            echo '<ul>';
            while ($row = $result->fetch_assoc()) {
                // Puedes mostrar la información del paquete como desees
                echo '<li>Código: ' . $row['codigo'] . ', Servicio: ' . $row['servicio'] . ', Dirección de Entrega: ' . $row['direntrega'] . ', Destinatario: ' . $row['destinatario'] . '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No hay paquetes en reparto en la ubicación del repartidor.</p>';
        }
        $result->free_result();
    } else {
        // Manejar cualquier error de consulta aquí
        echo '<p>Error al obtener los paquetes en reparto.</p>';
    }

    // Cerrar la conexión a la base de datos
    $db->close();
}
?>