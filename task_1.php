<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    // echo " Question 1 ";
   
    // $colors = array('white', 'green', 'red');
    // function display_arr ($arr){
    //     for($i = 0 ; $i < count($arr) ; $i++){
    //         echo "<li> $arr[$i] </li>";
           
    //     }
    // }
    // display_arr($colors);

    // echo "<br><br>";
    // echo " Question 2 ";
    // echo "<br><br>"; 

    // $cities= array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", 
    // "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", 
    // "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", 
    // "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid" );  
    
    // asort($cities);
    // foreach($cities as $country => $capital) {
    //     echo "The capital of $country is $capital.<br>";
    // }
 
    // echo "<br> Question 3 <br>";


    // $color = array (4 => 'white', 6 => 'green', 11=> 'red');
    // foreach ($color as $num => $color){
    //     echo "The first element is $color.<br>";
    // }

    // echo " <br> <br> Question 4";

    // $arr = array( 1, 2 ,3 ,4 ,5);
    // array_splice($arr ,3 , 0 , "$");
    // display_arr($arr);


    // echo " <br><br> Question 5 <br>";

    // $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");

    // ksort($fruits);

    // foreach ($fruits as $letter => $fruit){
    //     echo "$letter =  $fruit.<br>";
    // }


    // echo " <br><br> Question 6 <br>";

    // $numbers = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62,
    // 65, 64, 68, 73, 75, 79, 73);

    
    // function sum ( $arr){
    //     $sum = 0 ;
        
    //     for($i = 0 ; $i < count($arr); $i++){
    //         $sum += $arr[$i];
            
    //     }
    //     $avg = $sum/ count($arr);;
    //     return $avg; 
    // }
    
    // sort($numbers);

    // $lowest =array_slice($numbers , 0 ,7);
    // $highest = array_slice($numbers ,-7 , 7);


    // echo "Average Temperature is: " . sum($numbers);
    // echo "List of seven lowest temperatures:". display_arr($lowest) ;
    // echo "List of seven highest temperatures:". display_arr($highest);


    // echo"<br><br> Question 7 <br>";


// 1. Display the colors as unordered list
$colors = array('white', 'green', 'red');
echo "<ul>";
foreach ($colors as $color) {
    echo "<li>$color</li>";
}
echo "</ul><br>";

// 2. Display the capital and country name from the $cities array, sorted by the capital
$cities = array(
    "Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" => "Brussels", 
    "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" => "Paris", 
    "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" => "Berlin", 
    "Greece" => "Athens", "Ireland" => "Dublin", "Netherlands" => "Amsterdam", 
    "Portugal" => "Lisbon", "Spain" => "Madrid"
);

asort($cities); // Sort by capital (values)
foreach ($cities as $country => $capital) {
    echo "The capital of $country is $capital<br>";
}
echo "<br>";

// 3. Display the first element of the array
$color = array(4 => 'white', 6 => 'green', 11 => 'red');
echo $color[4]; 
echo "<br><br>";

// 4. Insert a new item in an array at a specific position
$array = array(1, 2, 3, 4, 5);
$position = 3; // Insert at position 4 (index 3)
$newItem = "$";
array_splice($array, $position, 0, $newItem); // Insert without removing any element
print_r($array); 
echo "<br><br>";

// 5. Sort associative array by key in ascending order
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
ksort($fruits); // Sort by key
foreach ($fruits as $key => $value) {
    echo "$key = $value<br>";
}
echo "<br>";

// 6. Calculate and display average temperature, 5 lowest, and 5 highest temperatures
$temperatures = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);

// Calculate the average
$averageTemp = array_sum($temperatures) / count($temperatures);
echo "Average Temperature is: " . round($averageTemp, 1) . "<br>";

// Sort temperatures
sort($temperatures);

// Find the 5 lowest temperatures
$lowestTemps = array_slice($temperatures, 0, 5);
echo "List of five lowest temperatures: " . implode(", ", $lowestTemps) . "<br>";

// Find the 5 highest temperatures
$highestTemps = array_slice($temperatures, -5);
echo "List of five highest temperatures: " . implode(", ", $highestTemps) . "<br>";
echo "<br>";

// 7. Merge two arrays
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);

$result = array_merge($array1, $array2);
print_r($result); 
echo "<br><br>";

// 8. Convert all strings to uppercase in an array
$colors = array("red", "blue", "white", "yellow");
$uppercaseColors = array_map('strtoupper', $colors);
print_r($uppercaseColors);
echo "<br><br>";

// 1. Prime Number Check
echo "1. Prime Number Check<br>";
function isPrime($num) {
    if ($num <= 1) {
        return "$num is not a prime number";
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return "$num is not a prime number";
        }
    }
    return "$num is a prime number";
}
echo isPrime(3);
echo "<br><br>";

// 2. Reverse a String
echo "2. Reverse a String<br>";
function reverseString($str) {
    return strrev($str);
}
echo reverseString("remove");
echo "<br><br>";

// 3. Swap Two Variables
echo "3. Swap Two Variables<br>";
function swap(&$x, &$y) {
    $temp = $x;
    $x = $y;
    $y = $temp;
}
$x = 12;
$y = 10;
swap($x, $y);
echo "x = $x, y = $y";
echo "<br><br>";

// 4. Armstrong Number Check
echo "4. Armstrong Number Check<br>";
function isArmstrong($num) {
    $sum = 0;
    $temp = $num;
    while ($temp != 0) {
        $digit = $temp % 10;
        $sum += $digit ** 3;
        $temp = intval($temp / 10);
    }
    if ($sum == $num) {
        return "$num is an Armstrong Number";
    } else {
        return "$num is not an Armstrong Number";
    }
}
echo isArmstrong(407);
echo "<br><br>";

// 5. Palindrome Check
echo "5. Palindrome Check<br>";
function isPalindrome($str) {
    // Remove spaces and special characters, convert to lowercase
    $cleanStr = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $str));
    $reversedStr = strrev($cleanStr);
    if ($cleanStr == $reversedStr) {
        return "Yes, it is a palindrome";
    } else {
        return "No, it is not a palindrome";
    }
}
echo isPalindrome("Eva, can I see bees in a cave?");
echo "<br><br>";

// 6. Remove Duplicates from an Array
echo "6. Remove Duplicates from an Array<br>";
function removeDuplicates($array) {
    return array_values(array_unique($array));
}
$array1 = array(2, 4, 7, 4, 8, 4);
$result = removeDuplicates($array1);
print_r($result);
echo "<br><br>";

// 1. Check if the sum of two numbers equals 30
echo "1. Check if the sum equals 30<br>";
function checkSum($firstInteger, $secondInteger) {
    if ($firstInteger + $secondInteger == 30) {
        return $firstInteger + $secondInteger;
    }
    return 'false';
}
echo checkSum(10, 10);
echo "<br><br>";

// 2. Check if a number is a multiple of 3
echo "2. Check if the number is a multiple of 3<br>";
function isMultipleOfThree($number) {
    return $number % 3 === 0 ? 'true' : 'false';
}
echo isMultipleOfThree(20);
echo "<br><br>";

// 3. Check if the integer is in the range of [20-50] inclusive
echo "3. Check if the number is in the range of [20-50]<br>";
function isInRange($number) {
    return ($number >= 20 && $number <= 50) ? 'true' : 'false';
}
echo isInRange(50);
echo "<br><br>";

// 4. Find the largest number between three integers
echo "4. Find the largest number between three integers<br>";
function findLargest($a, $b, $c) {
    return max($a, $b, $c);
}
echo findLargest(1, 5, 9);
echo "<br><br>";

// 5. Calculate the monthly electricity bill
echo "5. Calculate the monthly electricity bill<br>";
function calculateElectricityBill($units) {
    if ($units <= 50) {
        return $units * 2.50;
    } elseif ($units <= 150) {
        return 50 * 2.50 + ($units - 50) * 5;
    } elseif ($units <= 250) {
        return 50 * 2.50 + 100 * 5 + ($units - 150) * 6.20;
    } else {
        return 50 * 2.50 + 100 * 5 + 100 * 6.20 + ($units - 250) * 7.50;
    }
}
echo calculateElectricityBill(100);
echo "<br><br>";

// 6. Calculate the sum of first n natural numbers
echo "6. Calculate the sum of first n natural numbers<br>";
function sumNaturalNumbers($n) {
    return ($n * ($n + 1)) / 2;
}
echo sumNaturalNumbers(10);
echo "<br><br>";

// 1. Calculate the factorial of a number
echo "1. Calculate the factorial of a number<br>";
function factorial($n) {
    return $n === 0 ? 1 : $n * factorial($n - 1);
}
echo factorial(5);
echo "<br><br>";

// 2. Check if a number is even or odd
echo "2. Check if a number is even or odd<br>";
function isEven($number) {
    return $number % 2 === 0 ? 'Even' : 'Odd';
}
echo isEven(7);
echo "<br><br>";

// 3. Check if a string contains a specific word
echo "3. Check if a string contains a specific word<br>";
function containsWord($str, $word) {
    return strpos($str, $word) !== false ? 'True' : 'False';
}
echo containsWord("Hello world", "world");
echo "<br><br>";

// 4. Count the number of vowels in a string
echo "4. Count the number of vowels in a string<br>";
function countVowels($str) {
    return preg_match_all('/[aeiou]/i', $str);
}
echo countVowels("Hello World");
echo "<br><br>";

// 5. Check if a number is positive, negative, or zero
echo "5. Check if a number is positive, negative, or zero<br>";
function checkNumber($num) {
    if ($num > 0) {
        return "Positive";
    } elseif ($num < 0) {
        return "Negative";
    } else {
        return "Zero";
    }
}
echo checkNumber(0);
echo "<br><br>";

// 6. Print Fibonacci series up to a certain number
echo "6. Print Fibonacci series up to a certain number<br>";
function fibonacci($n) {
    $fib = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }
    return implode(", ", array_slice($fib, 0, $n));
}
echo fibonacci(10);
echo "<br><br>";

    
    ?>
</body>
</html>
