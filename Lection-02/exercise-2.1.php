<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="#" method="POST">

  <label for="vikt">Vikt i gram: </label>
  <input id="vikt" type="text" name="vikt" required> <br> <br>

  <input type="submit" value="Skicka">
  </form>


  <?php
    $vikt = $_POST['vikt'];
    if ($vikt < 51) {
      $frimarke = 1;
    } else if (50 < $vikt && $vikt < 101) {
      $frimarke = 2;
    }

    $pris = 9 * $frimarke;
    $svar = "Beräknar porto för brev är $pris kr och det motsvarar $frimarke frimarken";
    echo "<pre>";
    print_r($svar);
    echo "</pre>";
  ?>
</body>
</html>