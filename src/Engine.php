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

namespace Brain\Games\Engine;

use function Brain\Games\Cli\welcome;
use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

/**
 * Function runGame
 *
 * @param array  $getGameData save game param to variable
 * @param string $description save game rules
 *
 * @return void
 */
function runGame($getGameData, $description): void
{
    line("Welcome To The Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($description);

    for ($i = 0; $i < ROUNDS; $i++) {
        $gameData = $getGameData();
        $question = $gameData['question'];
        $correctAnswer = $gameData['correctAnswer'];
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");

        if ($userAnswer != $correctAnswer) {
            $temp = "is wrong answer ;(. Correct answer was"; //линтер ругаеться
            print_r("{$userAnswer} {$temp} '{$correctAnswer}'.\n");
            printf("Let's try again, %s!\n", $name);
            break;
        } else {
            echo "Correct!\n";
        }
        if ($i == 2) {
            printf("Congratulations, %s!\n", $name);
        }
    }
}
