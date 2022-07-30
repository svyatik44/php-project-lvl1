<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\runGame;

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


function toCalc(): void
{   
    $description = "What is the result of the expression?";

    $getCalcData = function () {
        $firstNumber = rand(0, 25);
        $secondNumber = rand(0, 25); 
        $choice = randSymbol("*-+");

        $question = "Question: {$firstNumber} {$choice} {$secondNumber}";
        $correctAnswer = countAns($firstNumber, $secondNumber, $choice);


        $gameData = [];
        $gameData['question'] = $question;
        $gameData['correctAnswer'] = $correctAnswer;
        
        return $gameData;
    };

    runGame($getCalcData, $description);
}

