<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function randArray()
{
    $randArray = [];
    for ($i = 0; $i < 3; $i++) {
        $randArray[] = rand(1, 100);
    }
    return $randArray;
}

function communication(array $finalAssocArray, string $name)
{
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

function isEven(string $name)
{
    $finalAssocArray = [];

    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100);
        if ($number % 2 == 0) {
            $finalAssocArray[$number] = 'yes';
        } else {
            $finalAssocArray[$number] = 'no';
        }
    }

    line('Answer "yes" if the number is even, otherwise answer "no".');

    communication($finalAssocArray, $name);
}

function calc(string $name)
{
    $finalAssocArray = [];

    for ($i = 0; $i < 3; $i++) {
        $first = rand(1, 100);
        $second =  rand(1, 100);
        switch (mt_rand(1, 3)) {
            case 1:
                $finalAssocArray["$first - $second"] = $first - $second;
                break;
            case 2:
                $finalAssocArray["$first + $second"] = $first + $second;
                break;
            case 3:
                $finalAssocArray["$first * $second"] = $first * $second;
                break;
        }
    }

    line('What is the result of the expression?');
    communication($finalAssocArray, $name);
}

function gcd(string $name)
{
    $questions = [];
    $answers = [];
    $finalAssocArray = [];

    for ($i = 0; $i < 3; $i++) {
        $first = rand(1, 100);
        $second = rand(1, 100);

        $questions[$i] = "$first $second";

        while ($first != $second) {
            if ($first > $second) {
                $first =  $first - $second;
            } else {
                $second = $second - $first;
            }
        }
        $answers[$i] = $second;
    }
    $finalAssocArray = array_combine($questions, $answers);

    line('Find the greatest common divisor of given numbers.');
    communication($finalAssocArray, $name);
}

function progression(string $name)
{
    $progression = [];
    $questions = [];
    $answers = [];
    $finalAssocArray = [];

    for ($i = 0; $i < 3; $i++) {
        $start = rand(0, 3);
        $end = rand(20, 50);
        $step = rand(2, 5);

        $progression = range($start, $end, $step);
        $randKey = array_rand($progression);
        $answers[] = $progression[$randKey];
        $progression[$randKey] = '..';
        $questions[$i] = implode(' ', $progression);
    }
    $finalAssocArray = array_combine($questions, $answers);

    line('What number is missing in the progression?');

    communication($finalAssocArray, $name);
}

function isPrime(string $name)
{
    //массив вопросов
    $questions = [];
    //массив ответов
    $answers = [];
    //массив рандомных чисел, получаемый из функции randArray()
    $randArray = [];
    //список рандомных чисел
    $primeNumbers = [1, 2, 3, 5, 7, 9];

    $randArray = randArray();

    foreach ($randArray as $number) {
        $questions[] = $number;
        if (in_array($number, $primeNumbers, bool $strict = false)) {
            $answers[] = 'yes';
            continue;
        }

        $flag = simplicity($number);

        if ($flag == true) {
            $answers[] = 'yes';
        } else {
            $answers[] = 'no';
        }
    }
    $finalAssocArray = array_combine($questions, $answers);

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    communication($finalAssocArray, $name);
}

function simplicity(int $number)
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
