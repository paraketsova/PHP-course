<?php
  //Steg 1 - Ange lämplifa HTTP Headers
  //Läs mer här - https://stackoverflow.com/questions/10636611/how-does-access-control-allow-origin-header-work
  header("Content-Type: application/json; charset=UTF-8");// хорошие названия для хедеров важны!

  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET");
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  header("Referrer-Policy: no-referrer");

  //Steg 2 - Skapa en ny array

  $firstNamesFemale = ["Åsa","Anna","Elisa","Annika","Mariia"];
  $firstNamesMale = ["Mahmud","Bjorn","Oleg","Max","Edvard"];
  $lastNames = ["Öberg","Paraketsova","Olsson","Pukka","Lee","Andersson","Carlsson","Friske","Madsson","Baru"];
  $gender = ["female", "male"];

  //Steg 3 - Skapa 10 namn och spara dess i en ny array
  $names = array();
  for ($i = 0; $i < 5; $i++) {
    $name = array(
        "firstname" => $firstNamesFemale[rand(0, 4)],
        "lastname" => $lastNames[rand(0, 9)],
        "gender" => $genders[0],
        "age" => rand(0, 100),
        "email" => ''
    );
    array_push($names, $name);
  }
  for ($i = 0; $i < 5; $i++) {
    $name = array(
        "firstname" => $firstNamesMale[rand(0, 4)],
        "lastname" => $lastNames[rand(0, 9)],
        "gender" => $genders[1],
        "age" => rand(0, 100),
        "email" => ''
    );
    array_push($names, $name);
  }

  $emailArray = array();

  foreach ($names as $name) {
    $firstEname = $name['firstname'];
    $lastEname = $name['lastname'];
    $genderE = $name['gender'];
    $ageE = $name['age'];
    $email = strtolower(substr($name['firstname'], 0, 2) . substr($name['lastname'], 0, 3)) . "@example.com";

    $nameE = array(
      "firstname" => $firstEname,
      "lastname" => $lastEname,
      "gender" => $genderE,
      "age" => $ageE,
      "email" => $email
    );
    array_push($emailArray, $nameE);
  }

  //$emailArray = array_map('addEmail', $names);

/* TEST
  print_r($names);
  die();
  */

  //Steg 4 - Konvertera PHP arrayen ($names) till JSON
  //$json = json_encode($names,
  //JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); // первый позволяет видеть шведские буквы, второй даёт претти вид массиву
 /*  $json = json_encode($emailArray,
  JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); */
  $json = json_encode($emailArray,
  JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
  // json_encode — Returns the JSON representation of a value
  // http://php.net/manual/en/function.json-encode.php

  //Steg 5 – Skicka JSON till klienten
  echo $json;
  // OBS!
  // Ingen extra data får skickas till klienten,
  // t.ex. HTML