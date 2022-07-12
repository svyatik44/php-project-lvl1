<?php

namespace Brain\Games\Games\Even;


use function cli\line;
use function cli\prompt;

function gameEven(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

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
