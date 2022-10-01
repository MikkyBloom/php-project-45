<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function randArray()
{
    for ($i = 0; $i < 3; $i++) {
        $randArray[] = rand(1, 100);
    }
    // $randArray = shuffle($randArray);
    return $randArray;
}

function communication(array $finalAssocArray, string $name)
{
    foreach ($finalAssocArray as $key => $value) {
        $answer = prompt("Question: $key\nYour answer");
        if ($answer != $value) {
            print_r("'$answer' is wrong answer ;(. Correct answer was '$value'. \nLet's try again, $name\n");
            exit;
        } else {
            print_r("Correct!\n");
        }
    }
    print_r("Congratulations, $name!\n");
}

function isEven($name)
{
    $numbers = [];
    $values = [];
    $finalAssocArray = [];
    $numbers = randArray();

    foreach ($numbers as $number) {
        if (($number % 2) == 0) {
            $values[] = "yes";
        } else {
            $values[] = "no";
        }
    }
    $finalAssocArray = array_combine($numbers, $values);
    // print_r($answers);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    communication($finalAssocArray, $name);
}

function calc($name)
{
    // массив случайных чисел
    $numbers = [];
    // массив ответов
    $values = [];
    // массив ключей для ответов
    $answers = [];
    // итоговый массив для игры
    $finalAssocArray = [];

    $numbers = randArray();
    
    for ($i = 0; $i < 3; $i++) {

        $randKey1 = array_rand($numbers);
        $randKey2 = array_rand($numbers);

        switch (mt_rand(1, 3)) {
            case 1:
                $answers[] = "$numbers[$randKey1] + $numbers[$randKey2]";
                $values[] = $numbers[$randKey1] + $numbers[$randKey2];
            break;
            case 2:
                $answers[] = "$numbers[$randKey1] - $numbers[$randKey2]";
                $values[] = $numbers[$randKey1] - $numbers[$randKey2];
            break;
            case 3:
                $answers[] = "$numbers[$randKey1] * $numbers[$randKey2]";
                $values[] = $numbers[$randKey1] * $numbers[$randKey2];
            break;
        }
    }

    $finalAssocArray = array_combine($answers, $values);

    line('What is the result of the expression?');

    communication($finalAssocArray, $name);
}

// $name = 'Misket';
// print_r(calc($name));

// $name = 'Mikky';
// print_r(isEven($name));

// function isEven($name)
// {
//     $numbers = ['15' => 'no', '6' => 'yes', '7' => 'no'];

//     line('Answer "yes" if the number is even, otherwise answer "no".');

//     foreach ($numbers as $key => $value) {
//         $answer = prompt("Question: $key\nYour answer");
//         if ($answer !== $value) {
//             print_r("'$answer' is wrong answer ;(. Correct answer was '$value'. \nLet's try again, $name\n");
//             exit;
//         } else {
//             print_r("Correct!\n");
//         }
//     }
//     print_r("Congratulations, $name!\n");
// }

// function calc($name)
// {
//     $numbers = ['4 + 10' => '14', '25 - 11' => '14', '25 * 7' => '175'];

//     line('What is the result of the expression?');

//     foreach ($numbers as $key => $value) {
//         $answer = prompt("Question: $key\nYour answer");
//         if ($answer !== $value) {
//             print_r("'$answer' is wrong answer ;(. Correct answer was '$value'. \nLet's try again, $name\n");
//             exit;
//         } else {
//             print_r("Correct!\n");
//         }
//     }
//     print_r("Congratulations, $name!\n");
// }