<?php 
$db = new mysqli("localhost", "root", "", "mgmed");
//zakładamy, że dostaliśmy z requesta
$staffId = $_REQUEST['id'];

$q = $db->prepare("SELECT  appointment.id, appointment.date, patientappointment.patient_id FROM appointment
                    LEFT JOIN patientappointment ON appointment.id = patientappointment.appointment_id
                    WHERE staff_id = ?
                    ORDER BY appointment.date ASC");
$q->bind_param("i", $staffId);
$q->execute();
$appointments = $q->get_result();
while($appointment = $appointments->fetch_assoc()) {
    $appointmentId = $appointment['id'];
    $appointmentDate = $appointment['date'];
    $patient = $appointment['firstName'] . " " . $appointment['lastName'];
    echo "$appointmentDate $patient<br>";
}
?>