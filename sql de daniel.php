$serverName = "tcp:your_server_name.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "your_database_name",
    "UID" => "your_username",
    "PWD" => "your_password"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Ejemplo de consulta SQL para obtener las preguntas del cuestionario
$query = "SELECT * FROM Preguntas";
$stmt = sqlsrv_query($conn, $query);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Procesar los resultados de la consulta
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo $row['pregunta'] . "<br />";
}

// Liberar los recursos
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
