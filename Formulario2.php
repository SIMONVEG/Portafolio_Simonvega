<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparte tu opinión</title>
    <link rel="stylesheet" href="Formulario.css">
</head>
<body>
    <!-- Capa oscura superpuesta -->
    <div class="overlay"></div>

    <!-- Contenedor del carrusel -->
    <div class="carousel-container">
        <div class="carousel-slide"></div>
    </div>

    <!-- Contenedor del formulario -->
    <div class="form-container">
        <form action="Formulario.php" method="POST" class="form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>
            </div>
            <div class="form-group">
                <label for="comentario">Comenta</label>
                <textarea name="comentario" id="comentario" placeholder="Escribe tu opinión aquí..." required></textarea>
            </div>
            <button class="form-submit-btn" type="submit">Enviar</button>
        </form>
    </div>

    <!-- Script para el carrusel -->
    <script src="Formulario.js"></script>
</body>
</html>
