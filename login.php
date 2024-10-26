<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo json_encode(["message" => "Кіру сәтті аяқталды", "user" => $user]);
        } else {
            echo json_encode(["message" => "Қате құпиясөз"]);
        }
    } else {
        echo json_encode(["message" => "Қолданушы табылмады"]);
    }

    $stmt->close();
}
?>

