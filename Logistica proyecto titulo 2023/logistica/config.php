<?php

function obtenerConexion() {
    // Configurar las credenciales de la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "logistica";

    // Crear y retornar la conexión
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    return $conexion;
}

?>






