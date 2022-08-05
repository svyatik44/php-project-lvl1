<?php

/**
 * Command Line functions to interraction with user
 *
 * PHP version 7.4.3
 *
 * @category PHP
 * @package  Php-project-lvl1
 * @author   syvatik44 <svyat.2807@gmail.com>
 * @license  https://github.com/svyatik44/php-project-lvl1
 * @link     https://github.com/svyatik44/php-project-lvl1
 */

namespace Brain\Games\Even;

use function Brain\Games\Engine\runGame;

/**
 * Function correctAns
 *
 * @param int $numb number to check even or odd
 *
 * @return string
 */
function correctAns($numb)
{
    if ($numb % 2 === 0) {
        $correctAns = "yes";
    } else {
        $correctAns = "no";
    }
    return $correctAns;
}


/**
 * Function playEven
 *
 * @return void
 */
function playEven(): void
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

    runGame($getEvenData, $description);
}
