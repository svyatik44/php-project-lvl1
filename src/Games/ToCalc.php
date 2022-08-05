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

namespace Brain\Games\Calc;

use function Brain\Games\Engine\runGame;

/**
 * Function calculate
 *
 * @param int $firstNumber  first operand
 * @param int $secondNumber second operand
 * @param int $choice       random char +-*
 *
 * @return string
 */
function calculate($firstNumber, $secondNumber, $choice): int
{
    $correctAns = 0;

    switch ($choice) {
        case '*':
            $correctAns = $firstNumber * $secondNumber;
            break;

        case '+':
            $correctAns = $firstNumber + $secondNumber;
            break;

        case '-':
            $correctAns = $firstNumber - $secondNumber;
            break;
    }

    return $correctAns;
}


/**
 * Function playCalc
 *
 * @return void
 */
function playCalc(): void
{
    $description = "What is the result of the expression?";

    $getCalcData = function () {
        $firstNumber = rand(0, 25);
        $secondNumber = rand(0, 25);
        $choice = substr(str_shuffle("+-*"), 0, 1);

        $question = "{$firstNumber} {$choice} {$secondNumber}";
        $correctAnswer = calculate($firstNumber, $secondNumber, $choice);


        $gameData = [];
        $gameData['question'] = $question;
        $gameData['correctAnswer'] = $correctAnswer;

        return $gameData;
    };

    runGame($getCalcData, $description);
}
