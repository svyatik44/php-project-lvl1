<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\runGame;

const DESCRIPTION = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";
use const BrainGames\Engine\ROUNDS;

function isPrime(int $num): bool
{
    if ($num == 1) {
        return false;
    }

    $flag = true;
    for ($i = 2; $i < $num; $i++) {
        if (($num % $i) === 0) {
            $flag = false;
        }
    }
    return $flag;
}

function playIsPrime(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $numb = rand(1, 100);

        $question = $numb;
        $correctAnswer = isPrime($numb) ? "yes" : "no";

        $gameData[] = [$question, $correctAnswer];
    }

    runGame($gameData, DESCRIPTION);
}
