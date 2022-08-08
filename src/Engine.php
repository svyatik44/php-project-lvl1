<?php

namespace Brain\Games\Engine;

use function Brain\Games\Cli\welcome;
use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function runGame($getGameData, $description): void
{
    line("Welcome To The Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($description);

    for ($i = 0; $i < ROUNDS; $i++) {
        $gameData = $getGameData();
        $question = $gameData['question'];
        $correctAnswer = $gameData['correctAnswer'];
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");

        if ($userAnswer != $correctAnswer) {
            $temp = "is wrong answer ;(. Correct answer was"; //линтер ругаеться
            print_r("{$userAnswer} {$temp} '{$correctAnswer}'.\n");
            printf("Let's try again, %s!\n", $name);
            break;
        } else {
            echo "Correct!\n";
        }
        if ($i == 2) {
            printf("Congratulations, %s!\n", $name);
        }
    }
}
