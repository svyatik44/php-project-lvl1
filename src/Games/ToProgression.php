<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\runGame;

function genNumbersForProgression($start, $step, $missingNum): string
{
    $len = 10;
    $iter2 = 0;

    $result = [];
    for ($i = $start; $i < $len * $step + $start; $i = $i + $step) {
        $iter2++;

        if ($iter2 === $missingNum) {
            $result[] =  "..";
        } else {
            $result[] = $i;
        }
    }

    return implode(' ', $result);
}

function rightAns($start, $step, $missingNum): int
{
    $len = 10;
    $iter2 = 0;

    for ($i = $start; $i < $len * $step + $start; $i += $step) {
        $iter2++;

        if ($iter2 === $missingNum) {
            $result = $i;
        } else {
            continue;
        }
    }

    return $result;
}

/**
 * Function playProgression
 *
 * @return void
 */
function playProgression(): void
{
    $description = "What number is missing in the progression?";

    $getProgressionData = function () {
        $start = rand(0, 15);
        $step = rand(1, 9);
        $missingNum = rand(1, 10);

        $question = genNumbersForProgression($start, $step, $missingNum);
        $correctAnswer = rightAns($start, $step, $missingNum);

        $gameData = [];
        $gameData['question'] = $question;
        $gameData['correctAnswer'] = $correctAnswer;

        return $gameData;
    };

    runGame($getProgressionData, $description);
}
