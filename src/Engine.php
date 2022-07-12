<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function randSymbol($str):string
{
    $choice = $str;
    $size = strlen( $choice ); 
    $str= $choice[ rand( 0, $size - 1 ) ]; 
    return $str; 
}


function countAns($firstNumber, $secondNumber, $choice)
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



function calc()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

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