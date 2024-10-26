<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survey_polling_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Қосылу қатесі: " . $conn->connect_error);
}
?>

