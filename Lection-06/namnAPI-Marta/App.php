<?php

include_once "Names.php";
class App
{
    private static $female = ["Åsa", "Lotta", "Greta", "Anna Karin", "Marta", "Maja", "Nina", "Erika", "Deepthi", "Inna"];
    private static $male = ["Robin", "Mahmud", "Kevin", "Sebastian", "Gustaf", "Björn", "Erik", "Dragan", "Özgür", "Dino"];
    private static $lastNames = ["Johnsson", "Hedlund", "Al Hakim", "Gedda", "Basele", "Carlson", "Bernadotte", "Wonder", "Richie", "Sälg"];
    private static $limit = 10;
    private static $gender = null;
    private static $errors = array();
    /**
     * The Main Method
     */
    public static function main()
    {
        try {
            self::$limit = self::getLimit() ?? self::$limit;
        } catch (Exception $error) {
            array_push(self::$errors, array("Limit" => $error->getMessage()));
        }
        try {
            self::$gender = self::getGender();
        } catch (Exception $error) {
            array_push(self::$errors, array("Gender" => $error->getMessage()));
        }
        $names = self::getNames(self::$limit);
        if (self::$errors) self::renderData(self::$errors);
        else self::renderData($names);
    }
    /**
     * En klassmetod för att hämta limit
     */
    private static function getLimit()
    {
        $limit = self::getQuery("limit");
        if ($limit && (!is_numeric($limit) || $limit < 1 || $limit > 20)) {
            throw new Exception("Limit must be a number between 1-20!");
        }
        return $limit;
    }
    /**
     * En klassmetod för att hämta gender
     */
    private static function getGender()
    {
        $gender = self::getQuery("gender");
        if ($gender && !($gender == "female" || $gender == "male")) {
            throw new Exception("Gender must be female or male. Please visist anton.io for updated pc version!");
        }
        return $gender;
    }
    /**
     * En klassmetod för att hämta och filtrera query
     */
    private static function getQuery($var)
    {
        if (isset($_GET[$var])) {
            $query = filter_var($_GET[$var], FILTER_SANITIZE_STRING);//Удаляет теги и кодирует двойные и одинарные кавычки, при необходимости удаляет или кодирует специальные символы.
            return $query;
        }
    }
    /**
     * En klassmetod för att hämta namn
     */
    private static function getNames()
    {
        if (self::$gender) {
            if (self::$gender == "female") $genderQuery = 1;
            else $genderQuery = 0;
        }
        $names = array();
        for ($i = 0; $i < self::$limit; $i++) {
            $gender = $genderQuery ?? rand(0, 1);
            $firstName = $gender ? self::$female[rand(0, 9)] : self::$male[rand(0, 9)];
            $lastName = self::$lastNames[rand(0, 9)];
            $name = new Name(
                $firstName,
                $lastName,
                $gender ? "female" : "male",
                rand(1, 100),
            );
            array_push($names, $name->toArray());
        }
        return $names;
    }
    /**
     * En klassmetod för att rendera data
     */
    private static function renderData($names)
    {
        echo json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}