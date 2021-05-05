<?php
  require_once 'Database.php';
  require_once 'Name.php';
  ?>

<!doctype html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>NamnAPI Adminpanel</title>
</head>
<body class="container">
<h1 class="text-center">
    <a href="index.php" class=" text-decoration-none">NamnAPI Adminpanel</a>
</h1>
<form action="#" method="post" class="row">

    <div class="col-md-6 offset-md-3 mt-2">
        <input type="text" name="firstname" class="form-control" placeholder="Ange förnamn">
    </div>

    <div class="col-md-6 offset-md-3 mt-2">
        <input type="text" name="lastname" class="form-control" placeholder="Ange efternamn">
    </div>

    <div class="col-md-6 offset-md-3  mt-2">
        <select name="gender" class="form-select">
            <option value="">-- Välj kön --</option>
            <option value="male">Man</option>
            <option value="female">Kvinna</option>
        </select>
    </div>

    <div class="col-md-6 offset-md-3  mt-2">
        <input type="submit" class="form-control mt-2 btn btn-primary" value="Lägg till">
    </div>

</form><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>

<?php

  require_once 'Database.php';
  require_once 'Name.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    // Hämta data från post-arrayen
    $lastname = htmlspecialchars($_POST['lastname']);
    if (!empty($lastname)) {
      $stmt = $this->conn->prepare("INSERT INTO lastNames (lastNames) VALUES (:lastNames)");
      $stmt->bindParam(':lastNames', $lastname);
      $stmt->execute();
    }
    $gender = htmlspecialchars($_POST['gender']);
    if ($gender === 'male') {
      $firstNameMale = htmlspecialchars($_POST['firstname']);
      $stmt = $this->conn->prepare("INSERT INTO firstNamesMale (firstNamesMale) VALUES (:firstNamesMale)");
      $stmt->bindParam(':firstNamesMale', $firstNameMale);
      $stmt->execute();
    } else {
      $firstNameFemale = htmlspecialchars($_POST['firstname']);
      $stmt = $this->conn->prepare("INSERT INTO firstNamesFemale (firstNamesFemale) VALUES (:firstNamesFemale)");
      $stmt->bindParam(':firstNamesFemale', $firstNameFemale);
      $stmt->execute();
    }

  echo "<p class='alert alert-success mt-3'>New record created successfully.</p>";
  }