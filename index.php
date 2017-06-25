<?php
require_once "lib/Database.php";
require_once "lib/Dbobject.php";
Database::connect();

$todo = new Dbobject("todo");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST["item"];
    $arr1 = ["content", "done"];
    $arr2 = [$item, 0];
    $todo->insert($arr1, $arr2);
}
$items = $todo->find_all(); 

Database::disconnect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>To Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>

<div class="container">
    <div class="row">
        <h1>To Do List</h1>
        <ul>
            <?php
            foreach ($items as $item) {
                echo "<li";
                if ($item["done"]) echo " class='done'";
                echo ">" . $item["content"];
                if (!$item["done"]) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<a href='mark.php?id=" . $item["id"] . "'>";
                    echo "Mark as done";
                    echo "</a>";
                }
                echo "</li>";
            }
            ?>
        </ul>
        <form action="" method="post">
            <input class="u-full-width" type="text" placeholder="New item" name="item">
            <input class="button-primary u-full-width" type="submit" value="Add">
        </form>
        <a href="del.php" class="button button-primary u-full-width">
            Delete done
        </a>
    </div>
</div>

</body>
</html>
