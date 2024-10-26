<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $option_id = $_POST['option_id'];

    $stmt = $conn->prepare("INSERT INTO responses (user_id, option_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $option_id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Дауыс сәтті қабылданды"]);
    } else {
        echo json_encode(["message" => "Дауыс беру мүмкін болмады"]);
    }
    $stmt->close();
}
?>

