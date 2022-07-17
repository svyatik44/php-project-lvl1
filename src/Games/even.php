<?php

namespace Brain\Games\Even;

use function Brain\Games\Cli\welcome;
use function cli\line;
use function cli\prompt;

function gameEven(): void
{
    $name = prompt('May I have your name?');
    welcome($name);

    line("Answer \"yes\" if the number is even, otherwise answer \"no\"");
    for ($i=0; $i < 3; $i++) { 
        $numb = rand(0, 15);
        line("Question: " . $numb);
        $ans = prompt('Your answer');
        
        if ($numb % 2 === 0) {
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
