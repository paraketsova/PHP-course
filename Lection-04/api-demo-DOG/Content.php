<?php
  class Content {
    private static $endpoint = "https://dog.ceo/api/breeds/image/random";
    public static $breed = "random";
    public static function main() {
      if (isset($_GET['breed'])) {
        $breed = $_GET['breed'];
        self::setEndPoint($breed);
        self::$breed = $breed;
      }
      try{
        $array = self::getData();
        self::renderData($array);
      }catch (Exception $error){
        echo $error->getMessage();
      }
    }
    public static function setEndPoint($breed) {
      $newEndpoint = "https://dog.ceo/api/breed/$breed/images";
      if (filter_var($newEndpoint, FILTER_VALIDATE_URL)) self::$endpoint = $newEndpoint;
    }
    private static function getData() {
      $json = @file_get_contents(self::$endpoint);
      if(!$json)
          throw new Exception("Could not access " . self::$endpoint);
      return json_decode($json, true);
    }
    private static function renderData($array) {
      $output = "<h1><a href='index.php'>" . ucwords(self::$breed) . "</a></h1>
      <div class='container'><div class=''>";
      if (self::$breed === "random") {
          $img = "<img src='$array[message]' class='' style='width: 100%;'>";
          $output .= $img;
      } else {
          foreach ($array['message'] as $url) {
              $img = "<img src='$url' class='img-fluid m-2' style='width: 30%;'>";
              $output .= $img;
          }
      }
      $output .= "</div></div>";
      echo $output;
    }
  }
?>