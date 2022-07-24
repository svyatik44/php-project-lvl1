<?php

namespace Brain\Games\Prime;
use function Brain\Games\Engine\checkAnswer;
use function Brain\Games\Cli\welcome;
use function cli\line;
use function cli\prompt;

function isPrime($num)
{
    $flag = true;
	for ($i = 2; $i < $num; $i++) {
		if ($num % $i === 0) {
			$flag = false; // если хотя бы один раз поделилось
		}
	}
    
    return $flag;
}

function correctAns($numb)
{
    if (isPrime($numb)) {
        $correctAns = "yes";
    } else {
        $correctAns = "no";
    }
    return $correctAns;
}

function prime()
{
    $name = prompt('May I have your name?');
    welcome($name);
    
    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");


    for ($i=0; $i < 3; $i++) { 
        $numb = rand(0, 100);
        line("Question %d", $numb);
        $ans = prompt('Your answer');
        $rightAns = correctAns($numb);

        if ($ans != $rightAns) {
            print_r("{$ans} is wrong answer ;(. Correct answer was '{$rightAns}'.\n");
            break;
        }

        checkAnswer($ans, $rightAns, $name, $i);
    }

}