<?php
$link = mysqli_connect("localhost", "root", "");
$dbname = "Kursach";

// Перевірка з'єднання
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Вибір бази даних
mysqli_select_db($link, $dbname);
$id = $_GET['id'];
$name = $_POST['name'];
$cost = $_POST['cost'];
$count = $_POST['count'];

$update_query = "UPDATE tech SET name = '$name', cost = '$cost', count = '$count' WHERE id = $id";
$update_result = mysqli_query ($link, $update_query);
?>
<a href ='index.php'>To main page</a>
