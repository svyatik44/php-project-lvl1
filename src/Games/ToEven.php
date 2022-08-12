<?php

namespace BrainGames\Even;

use function BrainGames\Engine\runGame;

const DESCRIPTION = "Answer 'yes' if the number is even, other answer 'no'.";
const ROUNDS = 3;

function isEven(int $numb): bool
{
    return $numb % 2 === 0 ? true : false;
}

function playEven(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $numb = rand(0, 15);

        $question = $numb;
        $correctAnswer = isEven($numb) ? "yes" : "no";

        $gameData[] = [$question, $correctAnswer];
    }

    runGame($gameData, DESCRIPTION);
}
