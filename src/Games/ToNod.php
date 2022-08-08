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

namespace Brain\Games\Nod;

use function Brain\Games\Engine\runGame;

/**
 * Function getNodForTwoNumbers
 *
 * @param int $number1 first number to find nod
 * @param int $number2 second number to find nod
 *
 * @return int
 */
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


function playNod(): void
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

    runGame($getNodData, $description);
}
