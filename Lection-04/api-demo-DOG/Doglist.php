<?php
  class DogList {
    private static $endpoint = "https://dog.ceo/api/breeds/list/all";
    public static function main() {
      try{
          $array = self::getData();
          self::renderData($array);
      } catch (Exception $error){
          echo $error->getMessage();
      }
    }
    private static function getData() {
      $json = @file_get_contents(self::$endpoint);
      if(!$json)
          throw new Exception("Could not access " . self::$endpoint);

      return json_decode($json, true);
    }
    private static function renderData($array) {
      $output = "<ul class='list-group'>";

      foreach ($array['message'] as $breed => $array) {
          $link = "<a href='?breed=$breed' class='list-group-item'>" . ucwords($breed) . "</a>";
          $output .= $link;
      }
      $output .= "</ul>";
      echo $output;
    }
  }
?>
