<!--
  Övning 2
• Skriv ett skript som beräknar porto för brev enligt följande:
Max vikt i gram Antal frimärken
50
100
250
500
1 000
2 000
Pris
9,00
18,00
36,00
54,00
72,00
90,00
Antal frimärken
1
2
4
6
8
10
34
• Skicka vikt via ett formulär (använd en GET-Request)
 -->
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
      <label for="vikt">Vikt i gram:</label>
      <input id="vikt" type="text" name="vikt">
      <input type="submit" value="Skicka">
  </form>
  <?php
    $vikt = $_GET['vikt'];
    if ($vikt <= 50) {
      $frimarke = 1;
    }
    else if ($vikt > 50 && $vikt < 101) {
      $frimarke = 2;
    }
    else if ($vikt > 100 && $vikt < 251) {
      $frimarke = 4;
    }
    else if ($vikt > 250 && $vikt < 501) {
      $frimarke = 6;
    }
    else if ($vikt > 500 && $vikt < 1001) {
      $frimarke = 8;
    }
    else if ($vikt > 1000 && $vikt < 2001) {
      $frimarke = 10;
    }
    else {
        exit();
    }
    $pris = 9 * $frimarke;
    $svar = "Beräknat porto för brev är $pris kr och det motsvarar $frimarke frimarken";
    echo ($svar);
  ?>
</body>
</html>