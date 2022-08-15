<?php

namespace BrainGames\Nod;

use function BrainGames\Engine\runGame;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";
use const BrainGames\Engine\ROUNDS;

function getNodForTwoNumbers(int $number1, int $number2): int
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

function playNod(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $numb1 = rand(1, 100);
        $numb2 = rand(1, 100);

        $question = "{$numb1} {$numb2}";
        $correctAnswer = getNodForTwoNumbers($numb1, $numb2);

        $gameData[] = [$question, $correctAnswer];
    }

    runGame($gameData, DESCRIPTION);
}
