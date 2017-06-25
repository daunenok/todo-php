<?php
$id = (int)$_GET["id"];
require_once "lib/Database.php";
require_once "lib/Dbobject.php";
Database::connect();

$todo = new Dbobject("todo");
$todo->update($id, "done", 1); 

Database::disconnect();
header("Location: index.php");
exit;
?>