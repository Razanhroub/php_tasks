<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// PHP String and String Functions

// 1. Find the first character that is different between two strings.
$string1 = 'dragonball';
$string2 = 'dragonboll';
$firstDifference = '';
for ($i = 0; $i < min(strlen($string1), strlen($string2)); $i++) {
    if ($string1[$i] !== $string2[$i]) {
        $firstDifference = "First difference between two strings at position " . ($i + 1) . ": \"{$string1[$i]}\" vs \"{$string2[$i]}\"";
        break;
    }
}
echo "1. " . $firstDifference . "<br><br>";

// 2. Put a string in an array and use var_dump to view it.
$string = "Twinkle, twinkle, little star.";
$array = str_split($string, 10); // splitting based on 10 characters for demonstration
echo "2. ";
var_dump($array);
echo "<br><br>";

// 3. Print the next letter of the inputted letter.
function nextLetter($char) {
    return ($char === 'z') ? 'a' : chr(ord($char) + 1);
}
echo "3. " . nextLetter('a') . "<br>";
echo "3. " . nextLetter('z') . "<br><br>";

// 4. Insert a string at the specified position in a given string.
$originalString = 'The brown fox';
$insertString = 'quick';
$position = 4; // Position to insert the string
$modifiedString = substr_replace($originalString, $insertString . ' ', $position, 0);
echo "4. " . $modifiedString . "<br><br>";

// 5. Get the first word of a sentence.
$sentence = 'The quick brown fox';
$firstWord = explode(' ', $sentence)[0];
echo "5. " . $firstWord . "<br><br>";

// 6. Remove zeroes from the given number.
$number = '0000657022.24';
$cleanedNumber = ltrim($number, '0');
echo "6. " . $cleanedNumber . "<br><br>";

// 7. Remove part of a string.
$originalString7 = 'The quick brown fox jumps over the lazy dog';
$modifiedString7 = str_replace('fox', '', $originalString7);
echo "7. " . trim($modifiedString7) . "<br><br>";

// 8. Remove special characters from a string.
$specialString = '\"\1+2/3*2:2-3/4*3';
$cleanedString = preg_replace('/[^0-9]/', ' ', $specialString);
echo "8. " . trim($cleanedString) . "<br><br>";

// 9. Select the first 5 words from a string.
$wordString = 'The quick brown fox jumps over the lazy dog';
$firstFiveWords = implode(' ', array_slice(explode(' ', $wordString), 0, 5));
echo "9. " . $firstFiveWords . "<br><br>";

// 10. Remove commas from a numeric string.
$numericString = '2,543.12';
$cleanedNumericString = str_replace(',', '', $numericString);
echo "10. " . $cleanedNumericString . "<br><br>";

// 11. Print letters from 'a' to 'z'.
$letters = range('a', 'z');
echo "11. " . implode(' ', $letters) . "<br><br>";

// LOOP

// 1. Calculate and print the Fibonacci sequence.
function fibonacci($n) {
    $sequence = [];
    $a = 0;
    $b = 1;
    for ($i = 0; $i < $n; $i++) {
        $sequence[] = $a;
        $next = $a + $b;
        $a = $b;
        $b = $next;
    }
    return $sequence;
}
$fibonacciSequence = fibonacci(10); // change 10 to the desired length
echo "1. " . implode(', ', $fibonacciSequence) . "<br><br>";

// 2. Count the "c" characters in the text.
$text = "Orange Coding Academy";
$cCount = substr_count(strtolower($text), 'c');
echo "2. " . $cCount . "<br><br>";

// 3. FizzBuzz program.
echo "3. ";
for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz ";
    } elseif ($i % 3 == 0) {
        echo "Fizz ";
    } elseif ($i % 5 == 0) {
        echo "Buzz ";
    } else {
        echo $i . " ";
    }
}
echo "<br><br>";

// 4. Generate and display the first n lines of a Floyd triangle.
function floydTriangle($n) {
    $num = 1;
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $num . " ";
            $num++;
        }
        echo "<br>";
    }
}
echo "4. <br>";
floydTriangle(5); // Change 5 for more lines
echo "<br>";

// 5. Print a pattern.
echo "5. <br>";
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo chr(64 + $j) . " ";
    }
    echo "<br>";
}
for ($i = 4; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo chr(64 + $j) . " ";
    }
    echo "<br>";
}

// Logical Statements and Operators

// 1. Check if the specified year is a leap year.
$year = 2013;
if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
    echo "1. This year is a leap year<br><br>";
} else {
    echo "1. This year is not a leap year<br><br>";
}

// 2. Check the season based on temperature.
$temperature = 27;
if ($temperature < 20) {
    echo "2. It is wintertime!<br><br>";
} else {
    echo "2. It is summertime!<br><br>";
}

// 3. Calculate the sum of two integers.
$firstInteger = 2;
$secondInteger = 2;
$sum = $firstInteger + $secondInteger;
$result = ($firstInteger === $secondInteger) ? ($sum * 3) : $sum;
echo "3. The result is: $result<br><br>";

// Array Problems

// 1. Change array strings to lower case.
$colors = array("RED", "BLUE", "WHITE", "YELLOW");
$lowercaseColors = array_map('strtolower', $colors);
echo "1. ";
var_dump($lowercaseColors);
echo "<br><br>";

// 2. Display numbers between 200 and 250 that are divisible by 4.
echo "2. ";
for ($i = 200; $i <= 250; $i++) {
    if ($i % 4 == 0) {
        echo $i . ",";
    }
}
echo "<br><br>";

// 3. Get the shortest and longest string length from an array.
$words = array("abcd", "abc", "de", "hjjj", "g", "wer");
$lengths = array_map('strlen', $words);
echo "3. The shortest array length is " . min($lengths) . ". The longest array length is " . max($lengths) . ".<br><br>";

// 4. Generate unique random 10 numbers within a specific range.
function generateUniqueRandomNumbers($min, $max, $count) {
    $numbers = [];
    while (count($numbers) < $count) {
        $randomNumber = rand($min, $max);
        if (!in_array($randomNumber, $numbers)) {
            $numbers[] = $randomNumber;
        }
    }
    return $numbers;
}
$uniqueNumbers = generateUniqueRandomNumbers(11, 20, 10);
echo "4. " . implode(" ", $uniqueNumbers) . "<br><br>";

// 5. Return the lowest integer in the array that is not 0.
$array1 = array(2, 0, 10, 12, 6);
$lowestNonZero = min(array_filter($array1, fn($value) => $value > 0));
echo "5. " . $lowestNonZero . "<br><br>";

?>

</body>
</html>