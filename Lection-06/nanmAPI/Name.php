<?php
/**************
 *
 * En klass som hanterar namn
 */
 class Name{
  /**
   * Instansvariabler (ej static) -> finns bara inuti klassen
   */
   private $firstName;
   private $lastName;
   private $gender;
   private $age;
   private $email;
  /**
    * En konstruktor (skapar ett ogjekt)
    */
  public function __construct($firstName, $lastName, $gender, $age, $email)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->gender = $gender;
    $this->age = $age;
    $this->email = $email;
  }
    /**
   * En instansmetod som skapar konverterar objekt till array
   */
  public function toArray()
    {
      $array = array(
          "id" => $this->id,
          "title" => $this->title,
          "image" => $this->image,
          "author" => $this->author,
          "text" => $this->text
      );
      return $array;
    }

 }










