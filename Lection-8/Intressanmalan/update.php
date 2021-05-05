<?php
require_once "form.php";
require "database.php";
require_once "header.php";
// Form::main();
require_once "footer.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Hämta data från post-arrayen
    $firstName = htmlspecialchars($_POST['firstName']);
    $surName = htmlspecialchars($_POST['surName']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $id = Form::getId();
    // Förbered en SQL-sats and binda parametrar
    // UPDATE contacts SET name = :name, tel = :tel, email = :email, address = :address WHERE contacts.id = :id;
    $stmt = $conn->prepare("UPDATE registrations SET firstName = :firstName, surName = :surName, email = :email, tel = :tel WHERE `registrations`.`id` = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':surName', $surName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel);
    // Kör SQL-satsen (infoga en rad)
    $stmt->execute();
    echo "<p class='alert alert-success'>Update successful.
    <br>Updated id: $id </p>";
} else {
    Form::main();
}