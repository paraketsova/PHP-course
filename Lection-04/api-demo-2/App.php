<?php

class App
{
  /*****
     * En klassvaraibel = statisk variabel
     */
  public static $endpoint = "https://dog.ceo/api/breeds/list/all";

  /*****
   * The Main Method
   */
  public static function main()
    {
      try {
          $array = self::getData();
          self::viewData($array);
      } catch (Exception $error) {
          echo $error->getMessage();
      }
    }

  /*****
   * En klassmetod som hämtar data
   */
  public static function getData()
  {
    $json =  @file_get_contents(self::$endpoint);
    if (!$json)
      throw new Exception("Could not access ". self::$endpoint);
    return json_decode($json, true); // return array
  }

  public static function viewData($array)
  {
    $table = "<table class='table'>
    <tr>
        <th>Dogs</th>
    </tr>";

    $dogs = $array['message'];

    foreach ($dogs as $key => $dog) {
      echo "<li> {$key} </li>";
    }

  }
}