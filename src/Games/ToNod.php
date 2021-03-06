<?php

namespace Brain\Games\Nod;

use function Brain\Games\Engine\runGame;

function getNodForTwoNumbers($number1, $number2) 
{
    while ($number1 != $number2) {
        if ($number1 > $number2) {
            $number1 -= $number2;
        } else {
            $number2 -= $number1;
        }
    }
    return $number1;
}

function toNod(): void
{
    $description = "Find the greatest common divisor of given numbers.";

    $getNodData  = function () {
        $numb1 = rand(1, 100);
        $numb2 = rand(1, 100);

        $question = "{$numb1} {$numb2}";
        $correctAnswer = getNodForTwoNumbers($numb1, $numb2);
        
        $gameData = [];
        $gameData['question'] = $question;
        $gameData['correctAnswer'] = $correctAnswer;

        return $gameData;
    };

    runGame($getNodData , $description);
}