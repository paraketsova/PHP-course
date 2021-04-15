<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>exercise-3</title>
</head>
<body>
  <form action="#" method="GET">
    <input type="text" name="name">
    <input type="submit" value="Add">
  </form>

  <?php
    $name = $_GET['name'] ?? "---";
    echo "<h3>There is a name in URL: $name .</h3>";
    getURL($_GET);

/*
    function getURL1()
    {
      $keyName = $_GET['name'];
      if (isset ($keyName)) {
        echo "<h3>This is a name in URL: " . $keyName . "!<h3>";
      } else {
        echo "<h3>There is not a name in URL";
      }
    }
 */
    function getURL($value) {
      $input = $_GET[$value] ?? false;
      $message = $input ? $input : "Please enter your $value";
      return $message;
  }

  ?>

</body>
</html>