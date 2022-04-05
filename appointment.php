<?php 
    $db = new mysqli("localhost", "root", "", "mgmed");
    $appointmentId = $_REQUEST['appointmentID'];
    //dwa przypadki: nowy albo stary pacjent
    if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])) {
        //nowy pacjent
    } else {
        //powracający pacjent
    }
    
    $db = new mysqli("localhost", "root", "", "mgmed");
    $appointmentId = $_REQUEST['id'];
    $q = $db->prepare("SELECT * FROM appointment WHERE id = ?");
    $q->bind_param("i", $appointmentId);
    if($q && $q->execute()) {
        //mamy tylko jedno takie spotkanie
        $appointment = $q->get_result()->fetch_assoc();
        $appointmentDate = $appointment['date'];
        $appointmentTimestamp = strtotime($appointmentDate);
        echo "Umów wizytę w terminie ".date("j.m H:i", $appointmentTimestamp)."<br>";
}
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName']) && isset($_REQUEST['phone'])) {
$q->prepare("INSERT INTO patient VALUES (NULL, ?, ?, ?)");
$q->bind_param("sss", $_REQUEST['firstName'], $_REQUEST['lastName'], $_REQUEST['phone']);
$q->execute();
$patientId = $db->insert_id;
$q->prepare("INSERT INTO patientAppointment VALUES (NULL, ?, ?)");
$q->bind_param("ii", $appointmentId, $patientId);
$q->execute();
echo "Wizyta została umówiona!";
}