<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <linkrel="stylesheet" href="/css.css">
    <title>Kursach</title>
</head>
<body>
        <a href = "addgoods.php">Add goods</a>
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

// Пошук
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search = mysqli_real_escape_string($link, $search);

$sql = "SELECT * FROM tech";
if (!empty($search)) {
    $sql .= " WHERE name LIKE '%$search%' OR cost LIKE '%$search%' OR count LIKE '%$search%'";
}

$result = mysqli_query($link, $sql);

// Перевірка результату запиту
if ($result) {
    // Отримання назв стовпців
    echo "<form method='get' action=''>"; // Форма для пошуку
    echo "<input type='text' name='search' placeholder='Search...' value='$search'>";
    echo "<input type='submit' value='Search'>";
    echo "</form>";

    echo "<table border='1'><tr>";
    while ($fieldinfo = mysqli_fetch_field($result)) {
        echo "<th>{$fieldinfo->name}</th>";
    }
    echo "<th>Edit</th><th>Delete</th></tr>";

    // Виведення всіх стовпців у вигляді таблиці
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "<td><a href = 'editgoods.php?id={$row['id']}'>Edit</a></td><td><a href='deletegoods.php?id={$row['id']}'>Delete</a></td></tr>";
    }
    echo "</table>";

    mysqli_free_result($result); // Звільнення результату запиту
} else {
    echo "Query failed: " . mysqli_error($link);
}

// Закриття підключення до бази даних
mysqli_close($link);
?>
