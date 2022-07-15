<?php

namespace Brain\Games\Calc;

use function Brain\Games\Cli\welcome;
use function Brain\Games\Engine\randSymbol;
use function Brain\Games\Engine\countAns;
use function cli\line;
use function cli\prompt;


function calc(): void
{
    $name = prompt('May I have your name?');
    welcome($name);

    line("What is the result of the expression?");
    
    for ($i=0; $i < 3; $i++) { 
        $firstNumber = rand(0, 25);
        $secondNumber = rand(0, 25); 

        $choice = randSymbol("*-+");
        
        line("Question: %d %s %d", $firstNumber, $choice, $secondNumber);
        $ans = prompt('Your answer');
        $correctAnswer = countAns($firstNumber, $secondNumber, $choice);
        if ($ans == $correctAnswer) {
            echo "Correct!\n";
        } else {
            print_r("{$ans} is wrong answer ;(. Correct answer was '{$correctAnswer}'.\n");
            break;
        }
        if ($i == 2) {
            printf("Congratulations, %s\n", $name);
        }
    }
}

