<?php
include "form.php";
Form::main();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Hämta data från post-arrayen
    $firstName = htmlspecialchars($_POST['firstName']);
    $surName = htmlspecialchars($_POST['surName']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $policy = htmlspecialchars($_POST['policy']);
    //VALIDATE innan SQL
 // Förbered en SQL-sats and binda parametrar
    // INSERT INTO `registrations` (`firstName`, `surName`, `email`, `tel`, `policy`) VALUES (:firstName, :surName, :email, :tel, :policy);
    $stmt = $conn->prepare("INSERT INTO `registrations` (`firstName`, `surName`, `email`, `tel`) VALUES (:firstName, :surName, :email, :tel)");
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':surName', $surName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel);
    // Kör SQL-satsen (infoga en rad)
    $stmt->execute();
    $last_id = $conn->lastInsertId();
    echo "<p class='mt-3 alert alert-success'>New record created successfully.
    <br>Last inserted ID is: $last_id </p>";
};