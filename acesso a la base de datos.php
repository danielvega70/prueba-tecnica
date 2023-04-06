<?php
require_once "config.php"; // Incluye el archivo de configuración de base de datos

// Ejecuta una consulta a la base de datos
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn, $sql);

// Procesa los resultados de la consulta
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo $fila["nombre"];
}
?>
