<?php
$host = "localhost"; // La dirección del servidor de la base de datos
$user = "root"; // El nombre de usuario de la base de datos
$password = ""; // La contraseña de la base de datos (si la has establecido)
$dbname = "nombre_de_tu_base_de_datos"; // El nombre de la base de datos que acabas de crear

// Crea una conexión a la base de datos
$conn = mysqli_connect($host, $user, $password, $dbname);

// Verifica si se ha producido un error de conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
