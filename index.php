<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Usuarios</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Lista de Usuarios</h1>
  <a href="create.php">Agregar Usuario</a>
  <table>
    <tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Teléfono</th><th>Acciones</th></tr>
    <?php
    $stmt = $conn->query("SELECT * FROM usuarios");
    while ($row = $stmt->fetch()) {
      echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nombre']}</td>
        <td>{$row['correo']}</td>
        <td>{$row['telefono']}</td>
        <td>
          <a href='view.php?id={$row['id']}'>Ver</a> |
          <a href='edit.php?id={$row['id']}'>Editar</a> |
          <a href='delete.php?id={$row['id']}'>Eliminar</a>
        </td>
      </tr>";
    }
    ?>
  </table>
</body>
</html>