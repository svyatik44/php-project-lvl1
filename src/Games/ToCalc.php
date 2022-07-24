<?php

namespace Brain\Games\Calc;

use function Brain\Games\Cli\welcome;
use function Brain\Games\Engine\checkAnswer;
use function cli\line;
use function cli\prompt;

function countAns($firstNumber, $secondNumber, $choice): int
{
    $correctAns = 0;
    
    switch ($choice) {
        case '*':
            $correctAns = $firstNumber * $secondNumber;
            break;
        
        case '+':
            $correctAns = $firstNumber + $secondNumber;
            break;
        
        case '-':
            $correctAns = $firstNumber - $secondNumber;
            break;
    }

    return $correctAns;
}



function randSymbol($str): string
{
    $choice = $str;
    $size = strlen( $choice ); 
    $str= $choice[ rand( 0, $size - 1 ) ]; 
    return $str; 
}


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

        if ($ans != $correctAnswer) {
            print_r("{$ans} is wrong answer ;(. Correct answer was '{$correctAnswer}'.\n");
            break;
        }

        checkAnswer($ans, $correctAnswer, $name, $i);
    }
}

