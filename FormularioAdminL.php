<?php
session_start();

// Verificar si ya está autenticado
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: FormularioAdmin.php");
    exit();
}

// Manejo del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Credenciales estáticas (puedes almacenarlas en la base de datos)
    $admin_username = "admin";
    $admin_password = "1234"; // Cambiar por un hash seguro en producción

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: FormularioAdmin.php");
        exit();
    } else {
        $error = "Credenciales inválidas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="1.css">
</head>
<body>
    <div class = "r">
    <h2>Inicio de Sesión de Administrador</h2>
    </div>
    <form method="POST" action="" class="form">
        <div class="input-span">
            <label for="username" class="label">Usuario:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-span">
            <label for="password" class="label">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="submit">Iniciar Sesión</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
