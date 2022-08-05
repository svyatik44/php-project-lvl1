<?php

/**
 * Command Line functions to interraction with user
 *
 * PHP version 7.4.3
 *
 * @category PHP
 * @package  Php-project-lvl1
 * @author   syvatik44 <svyat.2807@gmail.com>
 * @license  https://github.com/svyatik44/php-project-lvl1 MIT
 * @link     https://github.com/svyatik44/php-project-lvl1
 */

namespace Brain\Games\Progression;

use function Brain\Games\Engine\runGame;

/**
 * Function genNumbersForProgression
 *
 * @param int $start      first value in progression
 * @param int $step       difference between next and prev number
 * @param int $missingNum random number from 1 to 10
 *
 * @return string
 */
function genNumbersForProgression($start, $step, $missingNum)
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

/**
 * Function rightAns
 *
 * @param int $start      first value in progression
 * @param int $step       difference between next and prev number
 * @param int $missingNum random number from 1 to 10
 *
 * @return int
 */
function rightAns($start, $step, $missingNum)
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
function playProgression()
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
