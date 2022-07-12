<?php

/**
 * Description
 *
 * PHP version 8
 *
 * @category Cli
 * @package  What
 * @author   Display Name <svyat.2807@gmail.com>
 * @license  https://github.com/svyatik44/ svyatik44
 * @link     https://github.com/svyatik44/
 */

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Ask the name().
 *
 * Description
 *
 * @return void An array of menu items
 */
function welcome()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
