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
    $number = $_GET['number'] ?? null;;
    getFactorial($number);
    //getFactorial1($number);



    function getFactorial($number)
    {
      if ($number <= 1) {
        return 1;
      }
      return $number * getFactorial($number - 1);
    }
    if ($number) {
      echo getFactorial($number);
    }

 /*    function getFactorial1
    {
      $number = $_GET['number'] ?? 0;
      $faculty = 1;
      for ($i = 1; $i <= $number; $i++) {
        $faculty *= $i;
      }
      $message = $number ? "<h1>Fakulteten av $number är $faculty</h1>" : false;
      if ($message) echo $message;
    } */
  ?>
</body>
</html>