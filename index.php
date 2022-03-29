<?php

$db = new mysqli("localhost", "root", "", "mgmed");
//stary sposób
//$q = "SELECT * FROM staff";
//$result = $db->query($q); 
$q = $db->prepare("SELECT * FROM staff");
if ($q->execute()) {
    //wywoła jeżeli kwerenda wykona się prawidłowo
    $result = $q->get_result();
    while($row = $result->fetch_assoc()) {
        //każde wywołanie to jeden wiersz gdzie w $row będą inne dane
        $id = $row['id'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        echo "Lekarz $firstName $lastName<br>";
    }
} else {
    //wywoła jeżeli kwerenda nie wykona się prawidłowo
    die("Błąd pobierania z bazy danych");
}

?>