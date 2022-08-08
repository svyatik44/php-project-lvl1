<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\runGame;

function isPrime($num): bool
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

/**
 * Function correctAnswer
 *
 * @param int $numb to check if it's prime
 *
 * @return string
 */
function correctAnswer($numb): string
{
    if (isPrime($numb)) {
        $correctAns = "yes";
    } else {
        $correctAns = "no";
    }
    return $correctAns;
}

function playIsPrime(): void
{
    $description = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

    $getPrimeData = function () {
        $numb = rand(1, 100);
        $correctAnswer = correctAnswer($numb);

        $gameData = [];
        $gameData['question'] = $numb;
        $gameData['correctAnswer'] = $correctAnswer;
        return $gameData;
    };

    runGame($getPrimeData, $description);
}
