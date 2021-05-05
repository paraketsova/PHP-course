<?php
class Form
{
    private static $id = null;
    private static $firstName = "";
    private static $surName = "";
    private static $email = "";
    private static $tel = "";
    public static function main()
    {
        self::getId();
        if (self::$id) {
            $data = self::getThatData();
            self::setData($data);
        }
        self::renderData();
    }
    private static function setData($data)
    {
        self::$firstName = $data["firstName"];
        self::$surName = $data["surName"];
        self::$email = $data["email"];
        self::$tel = $data["tel"];
    }
    public static function getId()
    {
        if (isset($_GET["id"])) {
            $id = htmlspecialchars($_GET["id"]);
            self::$id = $id;
            return $id;
        }
    }
    private static function getThatData()
    {
        require 'database.php';
        // Förbered en SQL-sats
        $stmt = $conn->prepare("SELECT * FROM registrations WHERE id = :id");
        $stmt->bindParam(':id', self::$id);
        // Kör SQL-satsen
        $stmt->execute();
        // Hämta all data från tabellen och spara i en array
        $result = $stmt->fetchAll();
        return $result[0];
        // fetchAll — Returns an array containing all of the result set rows
        // https://www.php.net/manual/en/pdostatement.fetchall.php
    }
    private static function renderData()
    {
        !self::$id ? $policyDiv =
            "<div class='col-md-5'>
                <label class='form-label' for='policy'>Jeg godkenner policy dokumente</label>
                <input required id='policy' type='checkbox' name='policy' class='form-check-input mt-2'>
            </div>" : $policyDiv = "";
        $output = "
            <form action='#' method='post' class='row g-3'>
            <div class='col-md-5'>
                <label class='form-label' for='firstName'>Ange fornamn ditt</label>
                <input id='firstName' type='text' name='firstName' class='form-control mt-2' value='" . self::$firstName . "'>
            </div>
            <div class='col-md-5'>
                <label class='form-label' for='surName'>Ange etternamnen din</label>
                <input id='surName' type='text' name='surName' class='form-control mt-2' value='" . self::$surName . "'>
            </div>
            <div class='col-md-5'>
                <label class='form-label' for='email'>Ange emailen din</label>
                <input required id='email' type='email' name='email' class='form-control mt-2'  value='" . self::$email . "'>
            </div>
            <div class='col-md-5'>
                <label class='form-label' for='tel'>Ange hyttesiffrerna dine</label>
                <input id='tel' type='text' name='tel' class='form-control mt-2' value='" . self::$tel . "'>
            </div>
            $policyDiv
            <div class='col-md-5'>
                <input type='submit' class='form-control mt-2 btn btn-primary' value='Spara'>
            </div>
            </form>
            ";
        echo $output;
    }
};