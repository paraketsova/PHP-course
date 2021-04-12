<?php
//http://localhost:8888/WEBB20/Lection-01/lection-2/exercise-1.3.php?id=1&firstName=Mariia
$firstname = $_GET['firstName'] ?? '(Fel: förnamn saknas)';
$lastname = $_GET['lastName'] ?? '(Fel: efternamn saknas)';
$name = $firstname . " " . $lastname;

echo "<h1>Hej $name! </h1>";
?>