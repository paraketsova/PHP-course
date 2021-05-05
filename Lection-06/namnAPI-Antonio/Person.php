<?php
class Person
{
    private $firstname;
    private $lastname;
    private $gender;
    private $age;
    private $email_address;
    public function __construct()
    {
        $this->gender = $this->get_gender();
        $this->firstname = $this->get_name($this->gender);
        $this->lastname = $this->get_lastname();
        $this->age = rand(1, 100);
        $this->email_address = $this->generate_email_address($this->firstname, $this->lastname);
    }
    public function get_gender()
    {
        $gender_int = rand(0, 10);
        if ($gender_int >= 0 && $gender_int <= 4)
            return "female";
        if ($gender_int >= 5 && $gender_int <= 9)
            return "male";
        return "other";
    }
    public function get_name($gender)
    {
        $female_firstnames = [
            "Marie", "Gertrud", "Åsa", "Jasmine", "Kim", "Rickard", "Kicki", "Gittan"
        ];
        $male_firstnames = [
            "Markus", "Gösta", "Orvar", "Urban", "Människo-Björn", "Kim", "Calle", "Jens"
        ];
        if ($gender === "other") {
            $names = array_merge($female_firstnames, $male_firstnames);
            return $names[rand(0, count($names) - 1)];
        }
        if ($gender === "male")
            return $male_firstnames[rand(0, count($male_firstnames) - 1)];
        return $female_firstnames[rand(0, count($female_firstnames) - 1)];
    }
    public function get_lastname()
    {
        $lastnames = [
            "Ökänd", "Ålborg", "Ek", "Wök", "Snabbsson", "Somtognamnet", "Al Hakim", "Jimmysson", "af Kulle", "Githubsson"
        ];
        return $lastnames[rand(0, count($lastnames) - 1)];
    }
    public function generate_email_address($firstname, $lastname)
    {
        $email_prefix = mb_substr($firstname, 0, 2, 'UTF-8') .  mb_substr($lastname, 0, 3, 'UTF-8');
        $email_prefix = mb_strtolower($email_prefix, 'UTF-8');
        $search  = array('å', 'ä', 'é', 'ö', '-', ' ');
        $replace = array('a', 'a', 'e', 'o', '',  '');
        $email_prefix = str_replace($search, $replace, $email_prefix);
        $email =  $email_prefix . '@example.com';
        return $email;
    }
    public function to_array()
    {
        $array = array(
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "gender" => $this->gender,
            "age" => $this->age,
            "email" => $this->email_address
        );
        return $array;
    }
}