<?php
class Name
{
    private $firstName;
    private $lastName;
    private $gender;
    private $age;
    private $email;
    /**
     * En konstruktor
     * förväntar sig firstName, lastName, gender, age
     */
    public function __construct($firstName, $lastName, $gender, $age)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->age = $age;
        $this->email = $this->getEmail();
    }

    /**
     * En instansmetod för att hämta email
     */
    public function getEmail()
    {
        $search = ['å', 'ä', 'ö', ' '];
        $replace = ['a', 'a', 'o', ''];
        $firstName = mb_strtolower($this->firstName);
        $lastName = mb_strtolower($this->lastName);
        $firstName = str_replace($search, $replace, $firstName);
        $lastName = str_replace($search, $replace, $lastName);
        $firstName = substr($firstName, 0, 2);
        $lastName = substr($lastName, 0, 3);
        $email = $firstName . $lastName . "@email.com";
        return $email;
    }
    /********************************
     * En instansmetod!
     * Konverterar objekt till array
     */
    public function toArray()
    {
        $array = array(
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "gender" => $this->gender,
            "age" => $this->age,
            "email" => $this->email,
        );
        return $array;
    }
}
