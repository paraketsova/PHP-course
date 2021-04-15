<?php
class App2 {
   // En klassvaraiabel = statisk variabel
  public static $endpoint = "https://jsonplaceholder.typicode.com/users";
  /*****
   * The Main Method
   */
  public static function main()
  {
    try {
      $array =  self::getData();
      self::viewData($array);
    } catch (Exception $error) {
      echo $error->getMessage();
    }
  }
  // En klassmetod som hämtar data
  public static function getData()
  {
    $json =  @file_get_contents(self::$endpoint);  // self:: -> syntax i PHP
    if (!$json)
      throw new Exception("Could not access" . self::$endpoint);
    return json_decode($json, true);
  }
  // En klassmetod som renderar data
  public static function viewData($array)
  {
    $div = "<div class='row'>";
    foreach ($array as $user) {
      $div .= "
       <div class='col-sm-4'>
        <div class='card'>
          <div class='card-body'>
            <h5 class='card-title'> $user[name] </h5>
            <p class='card-text'>{$user['address']['street']}</p>
            <p class='card-text'>{$user['address']['suite']}</p>
            <p class='card-text'>{$user['address']['city']}</p>
            <p class='card-text'>{$user['address']['zipcode']}</p>
          </div>
        </div>
      </div>";
    }
    $div .= "</div>";
    echo $div;
  }
}
