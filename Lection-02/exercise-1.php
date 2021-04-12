<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Övning 1</title>
  <style>
    table, th, td {
      border: 1px solid black;
    }
    .red {
      color: red;
    }
  </style>
</head>
<body>
  <?php
  $firstname = $_GET['firstName'] ?? 'Fel: förnamn saknas';
  $lastname = $_GET['lastName'] ?? 'Fel: efternamn saknas';
  $class1 = isset($_GET['firstName']) ? '' : 'red';
  $class2 = isset($_GET['lastName']) ? '' : 'red';
  echo "<h1>Hej <span class =$class1>$firstname</span> <span class =$class2>$lastname</span>!</h1>";
  ?>
<hr>
<table>
  <tr>
    <td><a href="exercise.php">Sida utan query strings</a></td>
  </tr>
  <tr>
    <td><a href="?firstname=Björn">Sidan enbart med förnamn</a></td>
  </tr>
  <tr>
    <td><a href="?lastname=Tirsén">Sidan enbart med efternamn</a></td>
  </tr>
  <tr>
    <td><a href="?firstname=Björn&lastname=Tirsén">Med för- och efternamn</a></td>
  </tr>
</table>
</body>
</html>