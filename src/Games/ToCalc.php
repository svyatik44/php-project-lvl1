<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\runGame;

const DESCRIPTION = "What is the result of the expression?";
use const BrainGames\Engine\ROUNDS;

function calculate(int $firstNumber, int $secondNumber, string $choice): int
{
    $correctAns = 0;

    switch ($choice) {
        case '*':
            $correctAns = $firstNumber * $secondNumber;
            break;
        case '+':
            $correctAns = $firstNumber + $secondNumber;
            break;
        case '-':
            $correctAns = $firstNumber - $secondNumber;
            break;
    }

    return $correctAns;
}

function playCalc(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $firstNumber = rand(0, 25);
        $secondNumber = rand(0, 25);
        $choice = substr(str_shuffle("+-*"), 0, 1);

        $question = "{$firstNumber} {$choice} {$secondNumber}";
        $correctAnswer = calculate($firstNumber, $secondNumber, $choice);

        $gameData[] = [$question, $correctAnswer];
    }


    runGame($gameData, DESCRIPTION);
}
