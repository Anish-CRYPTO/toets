<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
    if (isset($POST['verzenden'])) {

        $naam = filter_input(INPUT_POST, "naam",
        FILTER_SANITIZE_STRING);
        $klas = filter_input(INPUT_POST, "klas",
        FILTER_SANITIZE_STRING);

        
        $query = $db->prepare("INSERT INTO leerling(naam, klas)
        VALUES(:naam, :klas)");


        $query->bindParam("naam", $naam);
        $query->bindParam("klas", $klas);


        if($query->execute()) {
            echo "De nieuwe leerling is toegevoegd.";
        } else {
            echo "Er is iets misgegaan.";
        }
        echo "<br>";                                                                                                                                                         
    }

} catch(PDOException $e)  {
    die("Error!: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
    <body>
        <form method="post" action="">
            <label>Student</label>
            <input type="text" name="student"> <br>
            <label>klas</label>
            <input type="text" name="klas">
            <input type="submit" name="verzenden" value="verzenden">
            <br>
            <a href="index.php">terug naar overzicht</a>
        </form>
    </body>
</html>