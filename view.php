<?php include 'db.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head><title>Ver Usuario</title></head>
<body>
  <h1>Detalles del Usuario</h1>
  <p><strong>ID:</strong> <?= $usuario['id'] ?></p>
  <p><strong>Nombre:</strong> <?= $usuario['nombre'] ?></p>
  <p><strong>Correo:</strong> <?= $usuario['correo'] ?></p>
  <p><strong>Teléfono:</strong> <?= $usuario['telefono'] ?></p>
  <a href="index.php">Regresar</a>
</body>
</html>