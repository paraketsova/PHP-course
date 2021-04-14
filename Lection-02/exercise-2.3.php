<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="#" method="GET">
    <input type="number" name="number">
    <input type="submit" value="Count">
  </form>
  <?php
    $number = $_GET['number'];
    facultet($number);


    function facultet($number)
    {
      $sum = 0;
      for ($i = 0; $i <= $number; $i++) {
        $sum = $sum + $i;
      }
      echo "<h3>$number ! = $sum</h3>";
    }
  ?>
</body>
</html>