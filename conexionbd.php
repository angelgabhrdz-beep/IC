<?php
$servername='localhost';
$database = 'alumnos';
$username = 'root';
$password = '';

// Creación de conexión
$conexion = mysqli_connect($servername, $username, $password, $database);

// Chequeo de conexión
if (!$conexion) {
    die("❌ 3
    Conexión fallida: " . mysqli_connect_error());
}
echo "✅ Conexión exitosa a la base de datos: " . $database . "<br>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Atributos de la tabla
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];

    // Validar que no vengan vacíos
    if (!empty($nombre) && !empty($edad) && !empty($telefono)) {
        // Sentencia SQL (id se omite si es AUTO_INCREMENT)
        $sql = "INSERT INTO tabla (nombre, edad, telefono) VALUES ('$nombre', '$edad', '$telefono')";
if (mysqli_query($conexion, $sql)) {
            echo "Nuevo registro creado exitosamente.";
        } else {
            echo "X Error al insertar: " . mysqli_error($conexion);
        }
    } else {
        // Create Jira Issue
        echo "⚠ Por favor, completa todos los campos del formulario.";
    }
}

// Cerrar conexión
mysqli_close($conexion);
?>


    