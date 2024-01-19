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
    $sql = "DELETE FROM tech WHERE id = $id";
    $result1 = mysqli_query($link, $sql);

    mysqli_close($link);
   
?>
 <a href = "index.php">to main page</a>
