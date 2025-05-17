<?php
echo "<h2>Prueba de conexión a PostgreSQL en Railway</h2>";

$host = getenv("PGHOST");
$db = getenv("PGDATABASE");
$user = getenv("PGUSER");
$password = getenv("PGPASSWORD");
$port = getenv("PGPORT");

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:green;'>✅ Conexión exitosa a la base de datos '$db'.</p>";

    $result = $conn->query("SELECT * FROM usuarios");
    echo "<h3>Registros en la tabla 'usuarios':</h3>";
    echo "<ul>";
    foreach ($result as $row) {
        echo "<li>ID: {$row['id']} - Nombre: {$row['nombre']}</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo "<p style='color:red;'>❌ Error de conexión: " . $e->getMessage() . "</p>";
}
?>
