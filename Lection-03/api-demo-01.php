<?php
//Arbeta med befintliga APIer
//Steg 1 - Skapa en endpoints
  $url = "http://jsonplaceholder.typicode.com/users";

  //Steg 2 - Hämta det
  $json = file_get_contents($url);

  //test
  //echo $json

  //Steg 3 - Konvertera JSON till en array
  $array = json_decode($json, true);

  //test
  //print_array($array)

  //skriv ut alla users
  foreach ($array as $key => $value) {
    //echo $key;
    //echo $value;
    //echo "<h3>$value[name]</h3>";
  }

  $table = "<table>
              <tr>
                <th>Name</th>
                <th>Email</th>
              </tr>";
  foreach ($array as $user) {
    $table = "<table>
              <tr>
                <th>$user[name]</th>
                <td>$user[email]</td>
              </tr>";
  }
  $table .= "<table>";
  echo $table;
?>