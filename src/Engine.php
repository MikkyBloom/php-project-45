<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function randArray()
{
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

function gcd($name)
{
    $randArray = [];
    $questions = [];
    $answers = [];
    $finalAssocArray = [];

    $randArray = randArray();

    for ($i = 0; $i < 3; $i++) {

        $randKey1 = array_rand($randArray);
        $randKey2 = array_rand($randArray);

        $questions[$i] = "$randArray[$randKey1] $randArray[$randKey2]";
        $first = $randArray[$randKey1];
        $second = $randArray[$randKey2];

        $min = min($first, $second);
    
        while ($first != $second)
        {
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

function progression($name)
{
    $progression = [];
    $questions = [];
    $answers = [];
    $finalAssocArray = [];

    for ($i = 0; $i < 3; $i++){

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

function isPrime($name)
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
        if (in_array($number, $primeNumbers)) {
            $answers[] = 'yes';
        }

        $flag = simplicity($number);

        if ($flag == true) {
            $answers[] = 'yes';
        } else {
            $answers[] ='no';
        }
    }
    $finalAssocArray = array_combine($questions, $answers);
    
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    communication($finalAssocArray, $name);
}

function simplicity($number)
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
