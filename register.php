<?php
require 'db.php'; // дерекқорға қосылу

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Тіркелу сәтті аяқталды"]);
    } else {
        echo json_encode(["message" => "Қате! Тіркелу мүмкін болмады."]);
    }

    $stmt->close();
}
?>

