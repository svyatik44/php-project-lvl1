<?php

namespace Brain\Games\Nod;


use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\checkAnswer;
use function Brain\Games\Cli\welcome;

function getNodForTwoNumbers($number1, $number2): int 
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


function gameNod()
{
    $name = prompt('May I have your name?');
    welcome($name);
    line("Find the greatest common divisor of given numbers.");

    for ($i=0; $i < 3; $i++) { 
        $numb1 = rand(1, 100);
        $numb2 = rand(1, 100);
        line("Question: %d %d", $numb1, $numb2);
        $ans = prompt("Your answer");
        $rightAns = getNodForTwoNumbers($numb1, $numb2);

        if ($ans != $rightAns) {
            print_r("{$ans} is wrong answer ;(. Correct answer was '{$rightAns}'.\n");
            break;
        }

        checkAnswer($ans, $rightAns, $name, $i);
    }
}