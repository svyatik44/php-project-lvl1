<?php

namespace Brain\Games\Games\Progression;
use function Brain\Games\Cli\welcome;


use function cli\line;
use function cli\prompt;

function genNumbersForProgression($start, $step, $missingNum)
{
    $len = 10;
    $iter2 = 0;
    
    $result = [];
    for ($i=$start; $i < $len * $step + $start; $i = $i + $step) { 
        $iter2++;

        if ($iter2 === $missingNum) {
            $result[] =  "..";
        } else {
            $result[] = $i;
        }
    }

    return implode(' ', $result);
}

function rightAns($start, $step, $missingNum)
{
    $len = 10;
    $iter2 = 0;

    for ($i=$start; $i < $len * $step + $start; $i = $i + $step) { 
        $iter2++;

        if ($iter2 === $missingNum) {
            $result = $i;
        } else {
            continue;
        }
    }

    return $result;
}

function progression()
{
    $name = prompt('May I have your name?');
    welcome($name);
    
    line("What number is missing in the progression?"); 

    for ($i=0; $i < 3; $i++) { 
        $start = rand(0, 15);
        $step = rand(1, 9);
        $missingNum = rand(1, 10);
        
        print_r("Question: " . genNumbersForProgression($start, $step, $missingNum) . "\n");

        $ans = prompt("Your answer");

        $rightAns = rightAns($start, $step, $missingNum);

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
