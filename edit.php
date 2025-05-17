<?php include 'db.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $conn->prepare("UPDATE usuarios SET nombre=?, correo=?, telefono=? WHERE id=?");
  $stmt->execute([$_POST['nombre'], $_POST['correo'], $_POST['telefono'], $id]);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Editar Usuario</title></head>
<body>
  <h1>Editar Usuario</h1>
  <form method="POST">
    Nombre: <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>"><br>
    Correo: <input type="email" name="correo" value="<?= $usuario['correo'] ?>"><br>
    Teléfono: <input type="text" name="telefono" value="<?= $usuario['telefono'] ?>"><br>
    <button type="submit">Actualizar</button>
  </form>
</body>
</html>