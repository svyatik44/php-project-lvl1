<?php

namespace Brain\Games\Prime;
use function Brain\Games\Engine\runGame;

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

function correctAnswer($numb)
{
    if (isPrime($numb)) {
        $correctAns = "yes";
    } else {
        $correctAns = "no";
    }
    return $correctAns;
}

function toPrime()
{
    $description = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

    $getPrimeData = function () {
        $numb = rand(0, 100);
        $correctAnswer = correctAnswer($numb);

        $gameData = [];
        $gameData['question'] = $numb;
        $gameData['correctAnswer'] = $correctAnswer;
        return $gameData;
    };

    runGame($getPrimeData, $description);
}


