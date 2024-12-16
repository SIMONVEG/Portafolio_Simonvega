<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'tienda_perfumes';  // Nombre de la base de datos
$username = 'root';  // Usuario por defecto de XAMPP es 'root'
$password = '';  // La contraseña por defecto de XAMPP es vacía

try {
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configurar el manejo de errores de PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la consulta SQL para insertar los datos
    $stmt = $conn->prepare("INSERT INTO pedidos (nombre, celular, correo, direccion, tipo_perfume, cantidad, tamano, descripcion)
                            VALUES (:nombre, :celular, :correo, :direccion, :tipo_perfume, :cantidad, :tamano, :descripcion)");

    // Asignar los valores a cada parámetro
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':celular', $_POST['celular']);
    $stmt->bindParam(':correo', $_POST['correo']);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':tipo_perfume', $_POST['tipo_perfume']);
    $stmt->bindParam(':cantidad', $_POST['cantidad']);
    $stmt->bindParam(':tamano', $_POST['tamano']);
    $stmt->bindParam(':descripcion', $_POST['descripcion']);

    // Ejecutar la consulta
    $stmt->execute();

    // Mostrar mensaje de éxito
    echo "Tu pedido ha sido realizado con éxito.";

} catch (PDOException $e) {
    // Mostrar error si no se puede conectar
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>
