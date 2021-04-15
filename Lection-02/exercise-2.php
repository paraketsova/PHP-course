<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $age = $_GET['age'];

    if ($age < 18) {
      $greeting = "Du får inte handla här!";
    } else {
      $greeting = "Välkommen till vår webshop";
    }
    echo ($greeting);
  ?>
</body>
</html>