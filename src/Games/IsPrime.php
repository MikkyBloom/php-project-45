<?php

namespace BrainGames\Cli;

use function BrainGames\Cli\welcome;

function prime()
{
    $name = welcome();
    isPrime($name);
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
    $primeNumbers = [1, 2, 3, 5, 7];

    for ($i = 0; $i < 3; $i++) {
        $randArray[] = rand(1, 100);
    }

    foreach ($randArray as $number) {
        $questions[] = $number;
        if (in_array($number, $primeNumbers)) {
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

    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    communication($finalAssocArray, $name, $task);
}

function simplicity(int $number)
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
