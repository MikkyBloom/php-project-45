<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function isEven($name)
{
    // $nums = [17, 23, 19];
    // $answers = ['yes', 'yes', 'no'];
    $numbers = ['15' => 'no', '6' => 'yes', '7' => 'no'];

    line('Answer "yes" if the number is even, otherwise answer "no".');

    foreach ($numbers as $key => $value) {
        $answer = prompt("Question: $key\nYour answer");
        if ($answer !== $value) {
    	    print_r("'$answer' is wrong answer ;(. Correct answer was '$value'. \nLet's try again, $name\n");
    	    exit;
        } else {
            print_r("Correct!\n");
        }
    }
    print_r("Congratulations, $name!\n");
}
