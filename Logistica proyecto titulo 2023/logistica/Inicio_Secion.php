<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Establecer el tiempo de vida de la cookie de sesión a 15 minutos
    $tiempo_de_vida = 15 * 60; // 15 minutos en segundos

    // Verificar las credenciales en la base de datos
    $db = obtenerConexion();
    $sql = "SELECT * FROM empleado WHERE nombre = '$usuario' AND clave = '$clave'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Usuario autenticado correctamente
        $usuario_data = $result->fetch_assoc();

        // Crear variables de sesión
        session_start();
        $_SESSION['usuario_id'] = $usuario_data['id'];
        $_SESSION['usuario_nombre'] = $usuario_data['nombre'];
        $_SESSION['usuario_cargo'] = $usuario_data['cargo'];
        $_SESSION['usuario_sucursal'] = $usuario_data['socursal'];
        session_write_close();

        // Crear la cookie 'sucursal_trabajador' con la sucursal del usuario y asignarle el tiempo de vida
        setcookie('sucursal_trabajador', $usuario_data['socursal'], time() + $tiempo_de_vida, '/');

        // Crear la cookie 'tiempodevida' con el tiempo de vida de la sesión
        setcookie('tiempodevida', 'valor', time() + $tiempo_de_vida, '/');

        // Redirigir a la página correspondiente según el cargo
        switch ($usuario_data['cargo']) {
            case 'recepcionista':
                header("Location: recepcionista.html");
                break;
            case 'bodeguero':
                header("Location: bodeguero.html");
                break;
            case 'repartidor':
                header("Location: repartidor.html");
                break;
            case 'gerente':
                header("Location: gerente.html");
                break;
            default:
                // Página por defecto si el cargo no coincide con ninguno de los anteriores
                header("Location: inicio.php");
        }

    } else {
        // Usuario no encontrado
        echo "Usuario o contraseña incorrectos.";
    }

    $db->close();
}
?>