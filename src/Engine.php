<?php

namespace Brain\Games\Engine;
use function Brain\Games\Cli\welcome;
use function cli\line;
use function cli\prompt;

function runGame($getGameData, $description): void
{
    line("Welcome To The Brain Games!");
    $name = prompt('May I have your name?');
    welcome($name);

    line($description);
    
    for ($i=0; $i < 3; $i++) {
        $gameData = $getGameData();
        $question = $gameData['question'];
        $correctAnswer = $gameData['correctAnswer'];
        $userAnswer = prompt("Question: {$question}");

        if ($userAnswer != $correctAnswer) {
            print_r("{$userAnswer} is wrong answer ;(. Correct answer was '{$correctAnswer}'.\n");
            break;
        }

        checkAnswer($userAnswer, $correctAnswer, $name, $i);
    }
}


function checkAnswer($ans, $rightAns, $name, $i) {
    if ($ans == $rightAns) {
        echo "Correct!\n";
    } 
    if ($i == 2) {
        printf("Congratulations, %s\n", $name);
    }
}