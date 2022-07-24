<?php

namespace Brain\Games\Engine;


function checkAnswer($ans, $rightAns, $name, $i) {
    if ($ans == $rightAns) {
        echo "Correct!\n";
    } 
    if ($i == 2) {
        printf("Congratulations, %s\n", $name);
    }
}