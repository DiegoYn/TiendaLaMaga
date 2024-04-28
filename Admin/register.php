<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Cambiar al nombre de usuario adecuado
define('DB_PASS', ''); // Cambiar a la contraseña adecuada
define('DB_NAME', 'sitio');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    // Hash y salt
    $salt = bin2hex(random_bytes(16));
    $hashedPassword = password_hash($contrasenia . $salt, PASSWORD_DEFAULT);

    // Conexión a la base de datos
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar usuario en la base de datos
    $query = "INSERT INTO usuarios (usuario, contrasenia, salt) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $usuario, $hashedPassword, $salt);
    $stmt->execute();
    $stmt->close();

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form method="post">
        Usuario: <input type="text" name="usuario"><br>
        Contraseña: <input type="password" name="contrasenia"><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>