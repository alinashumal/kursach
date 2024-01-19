<!DOCTYPE html>
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


    $sql = "SELECT name, cost, count FROM tech WHERE id = $id";

    $result = mysqli_query($link, $sql);
    if ($result === false) {
        die("Error: " . mysqli_error($link));
    }
    if ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $cost = $row['cost'];
            $count = $row['count'];
    }
    mysqli_close($link);
?>
<html lang="en">
<body>
    <form action="editgoods_action.php?id=<?php echo $id; ?>" name="editnote_action" method="post" >
    
    <input type="text" name="name" id="name" value="<?php echo $name; ?>" /><br><br>
    <label for="cost">Cost </label><br>
    <input type="number" name="cost" id="cost" value="<?php echo $cost; ?>" /><br><br>
    <label for="count">Count </label><br>
    <input type="number" name="count" id="count" value="<?php echo $count; ?>" /><br><br>


    <input type="submit" value="Edit" />
</form>
        <a href="index.php">Main Page</a>
</body>
</html>
