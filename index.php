<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=school", "root", "");

    $query = $db->prepare("SELECT * FROM leerling"); 
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>";
    foreach ($result as $student) {
        echo "<tr>";
        echo "<td>" . $student["naam"] . "</td>";
        echo "<td>" . $student["klas"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "aantal leerlingen is: " . count($result);
    echo "<br><br>";

} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
    <body>
        <a href="insert.php">leerling toevoegen</a>
    </body>
</html>