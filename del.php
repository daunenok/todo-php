<?php
require_once "lib/Database.php";
require_once "lib/Dbobject.php";
Database::connect();

$todo = new Dbobject("todo");
$items = $todo->query_many("done", 1);
foreach ($items as $item) {
	$todo->del_item($item["id"]);
}

Database::disconnect();
header("Location: index.php");
exit;
?>