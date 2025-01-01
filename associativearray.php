<?php
// Example associative array with subjects as keys and scores as values
$studentScores = array(
    "Math" => 85,
    "Science" => 92,
    "English" => 78,
    "History" => 90,
    "Art" => 95
);

// Function to find the highest score
function getHighestScore($scores) {
    $highestScore = max($scores);
    return $highestScore;
}

// Get the highest score from the studentScores array
$highestScore = getHighestScore($studentScores);

// Output the highest score
echo "The highest score is: " . $highestScore;
?>
