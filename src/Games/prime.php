<?php

namespace Brain\Games\Prime;

use function Brain\Games\Cli\welcome;
use function Brain\Games\Engine\isPrime;
use function cli\line;
use function cli\prompt;

function prime()
{
    $name = prompt('May I have your name?');
    welcome($name);
    
    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");


    for ($i=0; $i < 3; $i++) { 
        $numb = rand(0, 100);
        line("Question %d", $numb);
        $ans = prompt('Your answer');

        if (isPrime($numb)) {
            if ($ans === "yes") {
                echo "Correct!\n";
            } else {
                print_r("{$ans} is wrong answer ;(. Correct answer was 'yes'.\n");
                break;
            }
        } else {
            if ($ans === "no") {
                echo "Correct!\n";
            } else {
                print_r("{$ans} is wrong answer ;(. Correct answer was 'no'.\n");
                break;
            }
        }
        if ($i == 2) {
            printf("Congratulations, %s\n", $name);
        }
    }

}