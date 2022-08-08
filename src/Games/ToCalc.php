<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\runGame;

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
    $description = "What is the result of the expression?";

    $getCalcData = function () {
        $firstNumber = rand(0, 25);
        $secondNumber = rand(0, 25);
        $choice = substr(str_shuffle("+-*"), 0, 1);

        $question = "{$firstNumber} {$choice} {$secondNumber}";
        $correctAnswer = calculate($firstNumber, $secondNumber, $choice);


        $gameData = [];
        $gameData['question'] = $question;
        $gameData['correctAnswer'] = $correctAnswer;

        return $gameData;
    };

    runGame($getCalcData, $description);
}
