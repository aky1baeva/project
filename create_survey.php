<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $questions = $_POST['questions']; // JSON массиві ретінде сұрақтар мен жауаптар

    $stmt = $conn->prepare("INSERT INTO surveys (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        $survey_id = $conn->insert_id;

        foreach ($questions as $question) {
            $question_text = $question['question_text'];
            $stmt = $conn->prepare("INSERT INTO questions (survey_id, question_text) VALUES (?, ?)");
            $stmt->bind_param("is", $survey_id, $question_text);
            $stmt->execute();
            $question_id = $conn->insert_id;

            foreach ($question['options'] as $option_text) {
                $stmt = $conn->prepare("INSERT INTO options (question_id, option_text) VALUES (?, ?)");
                $stmt->bind_param("is", $question_id, $option_text);
                $stmt->execute();
            }
        }
        echo json_encode(["message" => "Сауалнама сәтті жасалды", "survey_id" => $survey_id]);
    } else {
        echo json_encode(["message" => "Сауалнама жасау сәтсіз аяқталды"]);
    }
    $stmt->close();
}
?>

