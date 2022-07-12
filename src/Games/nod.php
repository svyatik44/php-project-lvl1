<?php

namespace Brain\Games\Games\Nod;


use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\getNodForTwoNumbers;

function gameNod()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line("Find the greatest common divisor of given numbers.");

    for ($i=0; $i < 3; $i++) { 
        $numb1 = rand(0, 100);
        $numb2 = rand(0, 100);
        line("Question: %d %d", $numb1, $numb2);
        $ans = prompt("Your answer");
        $rightAns = getNodForTwoNumbers($numb1, $numb2);
        if ($ans == $rightAns) {
            echo "Correct!\n";
        } else {
            print_r("{$ans} is wrong answer ;(. Correct answer was '{$rightAns}'.\n");
            break;
        }

        if ($i == 2) {
            printf("Congratulations, %s\n", $name);
        }
    }
}