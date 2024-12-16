<?php
// Inicia la sesión para verificar al administrador
session_start();

// Verificar si el usuario ha iniciado sesión como administrador
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: FormularioAdminL.php");
    exit();
}

// Verificar si se envió el ID del comentario
if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Sanitizar el ID

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "semestral";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Eliminar el comentario
    $sql = "DELETE FROM cometarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Comentario eliminado correctamente.";
    } else {
        echo "Error al eliminar el comentario: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: FormularioAdmin.php"); // Redirigir de nuevo a la página de administración
    exit();
} else {
    echo "No se recibió ningún ID válido.";
}
?>
