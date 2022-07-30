<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\runGame;

function correctAns($numb)
{
    if ($numb % 2 === 0) {
        $correctAns = "yes";
    } else {
        $correctAns = "no";
    }
    return $correctAns;
}


function toEven(): void
{
    $description = "Answer 'yes' if the number is even, other answer 'no'.";

    $getEvenData  = function () {
        $numb = rand(0, 15);

        $correctAnswer = correctAns($numb);

        $gameData = [];
        $gameData['question'] = $numb;
        $gameData['correctAnswer'] = $correctAnswer;

        return $gameData;
    };

    runGame($getEvenData , $description);
}