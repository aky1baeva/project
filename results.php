<?php
require 'db.php';

$survey_id = $_GET['survey_id'];

$stmt = $conn->prepare("
    SELECT questions.id as question_id, questions.question_text, options.id as option_id, options.option_text, 
           COUNT(responses.id) as votes 
    FROM questions 
    JOIN options ON questions.id = options.question_id 
    LEFT JOIN responses ON options.id = responses.option_id 
    WHERE questions.survey_id = ? 
    GROUP BY options.id
");
$stmt->bind_param("i", $survey_id);
$stmt->execute();
$result = $stmt->get_result();

$results = [];
while ($row = $result->fetch_assoc()) {
    $results[] = $row;
}

echo json_encode($results);
$stmt->close();
?>

