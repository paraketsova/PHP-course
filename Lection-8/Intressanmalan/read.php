<?php
// Förbered en SQL-sats
$stmt = $conn->prepare("SELECT * FROM registrations");
// Kör SQL-satsen
$stmt->execute();
// Hämta all data från tabellen och spara i en array
$result = $stmt->fetchAll();
// fetchAll — Returns an array containing all of the result set rows
// https://www.php.net/manual/en/pdostatement.fetchall.php
$table = "
        <table class='table'>
            <tr>
                <th>Fornamn</th>
                <th>Etternamn</th>
                <th>Elektroniske posteboksselle</th>
                <th>Hyttesiffrestellesena</th>
                <th>Admin</th>
                <th>Admin</th>
            </tr>";
foreach ($result as $key => $value) {
    $table .= "
    <tr>
        <td>$value[firstName]</td>
        <td>$value[surName]</td>
        <td>$value[email]</td>
        <td>$value[tel]</td>
        <td>
            <a class='btn btn-outline-secondary' href='update.php?id=$value[id]'>Uppdatera</a>
        </td>
        <td>
            <a class='btn btn-outline-danger' href='delete.php?id=$value[id]'>Ta bort</a>
        </td>
    </tr>";
}
$table .= '</table>';
echo $table;