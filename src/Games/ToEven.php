<?php

namespace Brain\Games\Even;
use function Brain\Games\Engine\checkAnswer;
use function Brain\Games\Cli\welcome;
use function cli\line;
use function cli\prompt;


function correctAns($numb)
{
    if ($numb % 2 === 0) {
        $correctAns = "yes";
    } else {
        $correctAns = "no";
    }
    return $correctAns;
}

function gameEven(): void
{
    $name = prompt('May I have your name?');
    welcome($name);

    line("Answer \"yes\" if the number is even, otherwise answer \"no\"");
    for ($i=0; $i < 3; $i++) { 
        $numb = rand(0, 15);
        line("Question: " . $numb);
        $ans = prompt('Your answer');

        $rightAns = correctAns($numb);
        
        if ($ans != $rightAns) {
            print_r("{$ans} is wrong answer ;(. Correct answer was '{$rightAns}'.\n");
            break;
        }

        checkAnswer($ans, $rightAns, $name, $i);
    }
}
