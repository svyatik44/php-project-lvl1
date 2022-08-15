<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\runGame;

const DESCRIPTION = "What number is missing in the progression?";
use const BrainGames\Engine\ROUNDS;

function genNumbersForProgression(int $start, int $step, int $missingNum): string
{
    $result = [];
    $len = 10;
    $iter2 = 0;

    for ($i = $start; $i < $len * $step + $start; $i += $step) {
        $iter2++;

        $result[] = $iter2 === $missingNum ? ".." : $i;
    }

    return implode(' ', $result);
}

function playProgression(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $start = rand(0, 15);
        $step = rand(1, 9);
        $missingNum = rand(1, 10);

        $question = genNumbersForProgression($start, $step, $missingNum);
        $correctAnswer = $missingNum * $step + $start - $step;

        $gameData[] = [$question, $correctAnswer];
    }

    runGame($gameData, DESCRIPTION);
}
