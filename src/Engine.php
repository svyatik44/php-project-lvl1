<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runGame(array $gameData, string $description): void
{
    line("Welcome To The Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($description);

    $i = 0;
    foreach ($gameData as [$question, $correctAnswer]) {
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");

        if ($userAnswer != $correctAnswer) {
            $temp = "is wrong answer ;(. Correct answer was"; //линтер ругаеться
            print_r("{$userAnswer} {$temp} '{$correctAnswer}'.\n");
            printf("Let's try again, %s!\n", $name);
            break;
        } else {
            printf("Correct!\n");
        }
        if ($i == 2) {
            printf("Congratulations, %s!\n", $name);
        }
        $i++;
    }
}
