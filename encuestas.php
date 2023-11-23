<?php
header('Content-Type: text/html; charset=utf-8');
// Parámetros de conexión a la base de datos PostgreSQL
$host = "127.0.0.1";
$dbname = "proyecto";
$user = "postgres";
$password = "29demayo";
$puerto = "5432";

try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

// Conectar a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$postgres;user=$user;password=$password");


// Obtener datos del formulario
$satisfaccion = $_POST['satisfaccion'];
$clima = $_POST['clima'];
$carga = $_POST['carga'];
$equilibrio = $_POST['equilibrio'];
$bienestar = $_POST['bienestar'];
$reconocimiento = $_POST['reconocimiento'];
$desarrollo = $_POST['desarrollo'];



// Preparar y ejecutar la consulta SQL
$stmt = $conn->prepare("INSERT INTO ENCUESTA (satisfaccion, clima, carga, equilibrio, bienestar, reconocimiento, desarrollo) VALUES (:satisfaccion, :clima, :carga, :equilibtio, :bienestar, :reconocimiento, :desarrollo)");
$stmt->bindParam(':satisfaccion', $satisfaccion);
$stmt->bindParam(':clima', $clima);
$stmt->bindParam(':carga', $carga);
$stmt->bindParam(':equilibrio', $equilibrio);
$stmt->bindParam(':reconocimiento', $reconocimiento);
$stmt->bindParam(':desarrollo', $desarrollo);
$stmt->execute();

// Cerrar la conexión
$conn = null;

// Redirigir al usuario o mostrar un mensaje de éxito
header("Location: index.html");
exit();
?>