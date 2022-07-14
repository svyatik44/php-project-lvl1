<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;


function welcome($name): void
{
    line('Welcome to the Brain Game!');
    line("Hello, %s!", $name);
}
