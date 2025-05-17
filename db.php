<?php
$host = getenv("PGHOST");
$db = getenv("PGDATABASE");
$user = getenv("PGUSER");
$password = getenv("PGPASSWORD");
$port = getenv("PGPORT");

$conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>