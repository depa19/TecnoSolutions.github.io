<?php
// Configuración de la conexión a la base de datos
$servername = "192.168.2.101"; // Cambia esto por el nombre de tu servidor MySQL
$username = "root"; // Cambia esto por tu nombre de usuario de MySQL
$password = "1234"; // Cambia esto por tu contraseña de MySQL
$dbname = "test"; // Cambia esto por el nombre de tu base de datos

// Establecer conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$movil = $_POST['movil'];
$fecha = $_POST['fecha'];
$dni = $_POST['dni'];
$genero = $_POST['genero'];

// Verificar si $_POST['devices'] es un array o una cadena
if (is_array($_POST['servicios'])) {
    // Si es un array, unir los elementos en una cadena separada por comas
    $servicios = implode(", ", $_POST['servicios']);
} else {
    // Si es una cadena, asignar directamente a la variable $devices
    $servicios = $_POST['servicios'];
}

$consulta = $_POST['consulta'];
$mensaje = $_POST['mensaje'];

// Preparar la consulta SQL
$sql = "INSERT INTO clientes (nombre, email, telefono, fecha_de_nacimiento, dni, genero, dispositibos_que_posees, motivo_de_consulta, mensaje)
        VALUES ('$nombre', '$email', '$movil', '$fecha', '$dni', '$genero', '$servicios', '$consulta', '$mensaje')";

// Ejecutar la consulta SQL
if (mysqli_query($conn, $sql)) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: " . mysqli_error($conn);
}

// Cerrar conexión
mysqli_close($conn);
