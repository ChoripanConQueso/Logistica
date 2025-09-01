<?php

require_once 'config.php';

function validarRut($rut) {
    // Eliminar espacios y puntos
    $rut = preg_replace('/[\.\s]/', '', $rut);

    // Dividir el Rut y el dígito verificador
    $rutArray = explode('-', $rut);

    // Verificar que haya dos partes después de la división
    if (count($rutArray) !== 2) {
        return false;
    }

    $numeros = $rutArray[0];
    $digitoVerificador = strtoupper($rutArray[1]);

    // Calcular el dígito verificador esperado
    $factor = 2;
    $suma = 0;

    for ($i = strlen($numeros) - 1; $i >= 0; $i--) {
        $suma += $factor * intval($numeros[$i]);
        $factor = $factor % 7 == 0 ? 2 : $factor + 1;
    }

    $digitoCalculado = 11 - ($suma % 11);

    // Convertir 10 y 11 a K
    $digitoCalculado = $digitoCalculado == 10 ? 'K' : $digitoCalculado;
    $digitoCalculado = $digitoCalculado == 11 ? '0' : $digitoCalculado;

    // Comparar dígitos
    return $digitoCalculado == $digitoVerificador;
}

function insertarDatos($nombre, $rut, $telefono, $paquete) {
    $conexion = obtenerConexion();

    // Escapar caracteres especiales para evitar inyección de SQL
    $nombre = $conexion->real_escape_string($nombre);
    $rut = $conexion->real_escape_string($rut);
    $fono = $conexion->real_escape_string($fono);
    $correo = $conexion->real_escape_string($correo);

    // Consulta para insertar datos en la base de datos
    $sql =  "INSERT INTO `remitente` (`nombre`, `Rut`, `fono`, `Correo`) VALUES ('$nombre', '$rut', '$fono', '$correo');";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo '<script>alert("¡Registro exitoso!");</script>';
        echo '<script>window.location = "RegistrarRemitente.html";</script>';
    } else {
        echo "Error al insertar datos: " . $conexion->error;
        echo '<script>window.location = "trabajoformremitente.html";</script>';
    }

    // Cerrar la conexión
    $conexion->close();
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $rut = $_POST["rut"];
    $fono = $_POST["telefono"];
    $correo = $_POST["paquete"];

    // Validar el Rut
    if (validarRut($rut)) {
        // Insertar datos en la base de datos con el paquete
        insertarDatos($nombre, $rut, $telefono, $paquete);
    } else {
        echo '<script>alert("El rut no es valido");</script>';
        echo '<script>window.location = "gerente.html";</script>';
    }
}