<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;



function randSymbol($str): string
{
    $choice = $str;
    $size = strlen( $choice ); 
    $str= $choice[ rand( 0, $size - 1 ) ]; 
    return $str; 
}


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



function getNodForTwoNumbers($number1, $number2): int 
{
    while ($number1 != $number2) {
        if ($number1 > $number2) {
            $number1 -= $number2;
        } else {
            $number2 -= $number1;
        }
    }
    return $number1;
}
