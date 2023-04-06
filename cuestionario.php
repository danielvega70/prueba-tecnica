<?php
// Establecer la conexión a la base de datos
$servername = "nombre_servidor";
$username = "nombre_usuario";
$password = "contraseña";
$dbname = "nombre_base_datos";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si se han enviado preguntas desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar las preguntas enviadas y almacenarlas en la base de datos
    $preguntas = $_POST["preguntas"];
    foreach ($preguntas as $pregunta) {
        $tipo = $pregunta["tipo"];
        $contenido = $pregunta["contenido"];
        // Realizar la consulta de inserción en la base de datos
        $sql = "INSERT INTO preguntas (tipo, contenido) VALUES ('$tipo', '$contenido')";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    echo "Las preguntas han sido guardadas exitosamente.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cuestionario</title>
</head>
<body>
    <h1>Cuestionario</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="preguntas">Preguntas:</label><br>
        <div id="preguntas">
            <!-- Aquí se agregarán dinámicamente las preguntas mediante JavaScript -->
        </div>
        <button type="button" onclick="agregarPregunta()">Agregar pregunta</button><br><br>
        <button type="submit">Guardar preguntas</button>
    </form>
    
    <script>
        function agregarPregunta() {
            // Crear un nuevo elemento de pregunta con HTML y agregarlo al contenedor de preguntas
            var pregunta = document.createElement("div");
            pregunta.innerHTML = `
                <label for="tipo">Tipo de pregunta:</label>
                <select name="preguntas[][tipo]">
                    <option value="texto">Texto libre</option>
                    <option value="opcion_simple">Single Choice</option>
                    <option value="opcion_multiple">Multiple Choice</option>
                </select>
                <br>
                <label for="contenido">Contenido de la pregunta:</label>
                <input type="text" name="preguntas[][contenido]">
                <br><br>
            `;
            document.getElementById("preguntas").appendChild(pregunta);
        }
    </script>
</body>
</html>
