<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    <label for="addtext">Name</label>
    <input type="text" id="addtext" name="addtext"></input>

    <label for="addcost">Cost</label>
    <input type="number" id="addcost" name="addcost"></input>

    <label for="addcount">Count</label>
    <input type="number" id="addcount" name="addcount"></input>

    <input type="submit" value="Send">
</form>

</body>
</html>

<?php
$link = mysqli_connect("localhost", "root", "");
$dbname = "Kursach";

// Перевірка з'єднання
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Вибір бази даних
mysqli_select_db($link, $dbname);

$name = $_POST['addtext'];
$cost = $_POST['addcost'];
$count = $_POST['addcount'];

$query = "INSERT INTO tech (name, cost, count) VALUES ('$name', '$cost', '$count')";
    $result = mysqli_query ($link, $query);

mysqli_close($link);
?>
