<?php include "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formular and GET-Request</title>
</head>
<body>
  <h2>Demo-2 - Gå till annan sida</h2>
  <form action="form-get-demo-2.php" method="GET">
  <!--   ставим решётку, чтобы это значение не было пустым. Another way  - use $_SERVER-->
    <input type="text" name="firstname">
    <input type="submit" value="Sök">
  </form>
<?php
  print_array($_GET);
  $firstname = $_GET['firstname'] ?? "Guest";
  echo "<h3>Hello $firstname!<h3>";
?>

</body>
</html>