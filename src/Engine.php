<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function communication(array $finalAssocArray, string $name, string $task)
{
    line($task);
    foreach ($finalAssocArray as $key => $value) {
        $answer = prompt("Question: $key\nYour answer");
        if ($answer != $value) {
            print_r("'$answer' is wrong answer ;(. Correct answer was '$value'. \nLet's try again, $name!\n");
            exit;
        } else {
            print_r("Correct!\n");
        }
    }
    print_r("Congratulations, $name!\n");
}
