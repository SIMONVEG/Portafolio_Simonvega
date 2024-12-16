<?php
session_start();

// Verificar si el administrador ha iniciado sesión
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: FormularioAdminL.php");
    exit();
}

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "semestral";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Actualizar comentario si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_comment'])) {
    $id = $_POST['id'];
    $comentario = $conn->real_escape_string($_POST['comentario']);

    $sql_update = "UPDATE cometarios SET comentario = '$comentario' WHERE id = $id";
    if ($conn->query($sql_update) === TRUE) {
        echo "<p class='text-success'>Comentario actualizado correctamente.</p>";
    } else {
        echo "<p class='text-danger'>Error al actualizar: " . $conn->error . "</p>";
    }
}

// Borrar comentario si se solicita
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_comment'])) {
    $id = $_POST['id'];

    $sql_delete = "DELETE FROM cometarios WHERE id = $id";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<p class='text-success'>Comentario eliminado correctamente.</p>";
    } else {
        echo "<p class='text-danger'>Error al eliminar: " . $conn->error . "</p>";
    }
}

// Consultar los comentarios
$sql = "SELECT id, email, comentario, fecha FROM cometarios ORDER BY fecha DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Comentarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Comentarios.css">
    <style>
        body {
            background-color: #000; /* Fondo negro */
            color: #fff; /* Texto blanco */
        }
        .comentario {
            background-color: #1c1c1c; /* Fondo gris oscuro */
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center mb-4">Gestión de Comentarios</h2>

        <div class="comentarios-section">
            <?php if ($resultado->num_rows > 0): ?>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <div class="comentario">
                        <p><strong>Email:</strong> <?= htmlspecialchars($fila["email"]) ?></p>
                        <p><strong>Fecha:</strong> <?= $fila["fecha"] ?></p>
                        <form method="POST" action="" class="mt-3">
                            <textarea name="comentario" rows="3" class="form-control mb-2"><?= htmlspecialchars($fila["comentario"]) ?></textarea>
                            <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                            <div class="d-flex justify-content-between">
                                <button type="submit" name="update_comment" class="btn btn-success">Actualizar</button>
                                <button type="submit" name="delete_comment" class="btn btn-danger">Borrar</button>
                            </div>
                        </form>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">No hay comentarios para mostrar.</p>
            <?php endif; ?>
        </div>

        <div class="text-center mt-5">
            <a href="FormularioAdminO.php" class="neu-button">Cerrar sesión</a>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
