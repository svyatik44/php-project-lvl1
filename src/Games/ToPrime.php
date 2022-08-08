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

namespace Brain\Games\Prime;

use function Brain\Games\Engine\runGame;

/**
 * Function isPrime
 *
 * @param int $num to check if it's prime
 *
 * @return bool
 */
function isPrime($num)
{
    if($num == 1) return false;

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
function correctAnswer($numb)
{
    if (isPrime($numb)) {
        $correctAns = "yes";
    } else {
        $correctAns = "no";
    }
    return $correctAns;
}


/**
 * Function playIsPrime
 *
 * @return void
 */
function playIsPrime()
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
