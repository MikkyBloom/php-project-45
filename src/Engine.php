<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function isEven($name)
{
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

function calc($name)
{
    $numbers = ['4 + 10' => '14', '25 - 11' => '14', '25 * 7' => '175'];

    line('What is the result of the expression?');

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