<?php include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, telefono) VALUES (?, ?, ?)");
  $stmt->execute([$_POST['nombre'], $_POST['correo'], $_POST['telefono']]);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Agregar Usuario</title></head>
<body>
  <h1>Nuevo Usuario</h1>
  <form method="POST">
    Nombre: <input type="text" name="nombre"><br>
    Correo: <input type="email" name="correo"><br>
    Teléfono: <input type="text" name="telefono"><br>
    <button type="submit">Guardar</button>
  </form>
</body>
</html>