<?php

/**
 * Command Line functions to interraction with user
 *
 * PHP version 7.4.3
 *
 * @category PHP
 * @package  Php-project-lvl1
 * @author   syvatik44 <svyat.2807@gmail.com>
 * @license  https://github.com/svyatik44/php-project-lvl1
 * @link     https://github.com/svyatik44/php-project-lvl1
 */

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Function sayWelcome
 *
 * @return void
 */
function sayWelcome(): void
{
    line("Welcome To The Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
