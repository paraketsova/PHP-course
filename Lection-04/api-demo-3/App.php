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
      $link = "<a href=https://dog.ceo/api/breed/$key/images>$key</a>";
      echo "<li> {$link} </li>";
    }

    /*
    fetch(url)
      .then(res => res.json())
      .then(data => setDogItem(data))
    }, [])

    <div className="col-md-12">
    <h2>{productItem.name}</h2>
    <img
      className="img-fluid"
      src={productItem.images[0].src.large}
      alt={productItem.images[0].alt}
    />
    */

  }
}
