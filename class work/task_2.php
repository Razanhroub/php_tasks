<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task2</title>
</head>
<body>
    <?php 
     echo"<br><br> PHP String and String Functions <br>";

     echo"<br><br> Question 1<br>";
     $String1 = 'dragonball' ;
     $String2 ='dragonboll' ;
     

    function find_first_difference($str1 , $str2){
        $count = strlen($str1);
        for ($i = 0; $i < $count; $i++){
            if ($str1[$i] != $str2[$i]){
                echo "the difference is the first string has '$str1[$i]' in this position $i and the second string has '$str2[$i]' ";
                break;
            }
            
        }
    }
    find_first_difference($String1 , $String2);

    echo"<br><br> Question 2<br>";

    $string_twinkle = " Twinkle, twinkle, little star";
    function string_to_arr($str){
        $str = explode(",",$str);
       array_splice($str , 2,0," twinkle");
        return $str;

    }
    
    $arr_str = string_to_arr($string_twinkle);
    var_dump($arr_str);


    echo"<br><br> Question 3<br>";
    
    
    function return_next_char($char){
        $asci_val = ord($char);
        $next_char_asci = $asci_val + 1;
        if ($next_char_asci == 123){
            $next_char_asci = 97;
        }
        return chr($next_char_asci);
    }

    $next_char = return_next_char('z');
    echo $next_char;

    echo"<br><br> Question 4<br>";

    function instert_into_arr($str , $word){
        $str = explode(" ", $str);
        array_splice($str , 1 , 0 , $word);
        return implode(" ",$str) ;
    }

    $str_insert =  'The brown fox' ;
    $word_to_insert = "quick";

    $new_str = instert_into_arr($str_insert , $word_to_insert);
    echo $new_str;

    echo"<br><br> Question 4 part two <br>";
    function return_first_word ($str){
        $str = explode(" ", $str);
        return $str[0];
    }

   echo $new_str = return_first_word($new_str);

   echo"<br><br> Question 5<br>";

   $str_to_replcae = '0000657022.24';

   //replacing zeros with nothing so that we can remove them 
   function remove_zeros($str){
    $new_str = str_replace(0 , "",$str);
    return $new_str;
   }

   echo remove_zeros($str_to_replcae);

   echo"<br><br> Question 6<br>";
   $str_to_remove_from = "The quick brown fox jumps over the lazy dog";
   $word_to_remove = "fox";

   function remove_from_string ($str , $word){
    $str = explode (" ", $str);
    $position = array_search($word , $str);
    array_splice($str ,$position , 1 );
    return implode(" ", $str);
   }

   echo " the value of the string before removing the specific word is : ".$str_to_remove_from, "<br>";
   echo " the value of  the specific word is : ".$word_to_remove ."<br>";
   echo "the value of the new string is :". remove_from_string($str_to_remove_from , $word_to_remove);

   echo"<br><br> Question 7<br>";

   function remove_dashes($str){
    $str = str_replace ("-", "",$str);
    return $str;
   }
   $str_with_dashes = "The quick brown fox jumps over the lazy dog---";
   echo remove_dashes($str_with_dashes);

   echo"<br><br> Question 8<br>";

   $string_with_special = '\"\1+2/3*2:2-3/4*3';

   function remove_special ($str){
    $clean_str = preg_replace('/[^0-9\s]/', ' ', $str);
    return $clean_str;
   }

   echo remove_special($string_with_special);

   echo"<br><br> Question 9<br>";

   $stri = 'The quick brown fox jumps over the lazy dog';
   function retun_5_words($str){
        $str = explode (" " , $str);
        $new_str = array_splice($str , 0 , 5 );
        return  implode (" ", $new_str);

    }

   echo retun_5_words($stri);


   echo"<br><br> Question 10<br>";

   $comma = "'2,543.12' ";

   function remove_comma ( $str){

    $str = str_replace("'", "",$str);
    return $str;
   }

   echo remove_comma($comma);


   echo"<br><br> Question 11<br>";

   function print_alpha(){
    for ( $i = 0 ; $i < 26 ; $i++){
        $asci_val = $i + 97;
        echo chr($asci_val). " ";
    }
   }
   print_alpha();


   echo"<br><br> LOOPS<br>";
   echo"<br><br> Question 1<br>";

   
    // Number of terms to display in the Fibonacci sequence
    $numberOfTerms = 10;

    // Initial two numbers in the Fibonacci sequence
    $first = 0;
    $second = 1;

    // Print the first two terms
    echo $first . ", " . $second;

    // Loop to calculate the next terms in the Fibonacci sequence
    for ($i = 2; $i < $numberOfTerms; $i++) {
        // Calculate the next number by adding the previous two numbers
        $next = $first + $second;

        // Print the next number
        echo ", " . $next;

        // Update the first and second numbers for the next iteration
        $first = $second;
        $second = $next;
    }

    echo"<br><br> Question 2<br>";

    function count_char ( $str , $char ){ 
        
        $to_lower_str = strtolower($str);
        $length_str = strlen($str);
        $ctr= 0;

        for ( $i = 0 ; $i < $length_str ; $i++){
            if ($to_lower_str[$i] == $char){
                $ctr +=1;
            }

        }
        return $ctr;
    }
    $str_find = " Orange Coding Academy ";
    $char_find = 'c';
    echo count_char($str_find , $char_find);

    echo"<br><br> Question 3<br>";

    function FizzBuzz(){
        for ($i = 1 ; $i <= 50 ; $i++){
            if ($i % 3 == 0 && $i % 5 == 0){
                echo "FizzBuzz"."  ";
            }elseif ($i % 3 == 0){
                echo "Fizz"."  ";
            }elseif ($i % 5 == 0){
                echo "Buzz"."  ";
            }else {
                echo " $i". "  ";
            }
        }
    }

    FizzBuzz();

    echo"<br><br> Question 4<br>";

    function Floyd_traingle (){
        $int = 1;
        for ($i = 0 ; $i < 5 ; $i++){
            for ($j = 0 ; $j < $i+1  ; $j++){
                echo $int . " ";
                $int++;
            }
            echo " <br>";
        }
    }
    Floyd_traingle();

    echo"<br><br> Question 5<br>";

    function Display_traingles(){
        $int = 1;
        for ($i = 0 ; $i < 9 ; $i++){
            for ($j = 0 ; $j < $i+1  ; $j++){
                echo chr(65+$i) . " ";
                $int++;
            }
            echo " <br>";
        }
    }
    Display_traingles();

    echo"<br><br> Logical Statements and Operators  <br>";
    echo"<br><br> Question 1  <br>";

    function Leap_year($year){ 
        if ($year % 4 == 0 && $year %400 == 0 ){
            echo " the year is leap year ";
        }elseif ($year % 4 == 0 ){
            echo " the year is leap year ";
        }elseif ($year % 100 == 0){
            echo " the year is not a leap year ";
        }else {
            echo " the year is not leap ";
        }
    }

    Leap_year(2024);

    echo"<br><br> Question 2  <br>";

    function Weather ($temp){
        if ($temp < 20){
            echo " it's winter  ";
        }else {
            echo " it's summer  ";
        }
    }

    Weather(27);

    echo"<br><br> Question 3 <br>";

    function sum_of_two($num1 , $num2 ){
        if ($num1 == $num2){
            return ($num1 + $num2 )*3;
        
        }else {
            return $num1 + $num2 ;
        }
    }
   echo  sum_of_two(2,2);

   echo"<br><br> Array <br>";
   echo"<br><br> Question 1 <br>";

   $colors = array("RED","BLUE", "WHITE","YELLOW");

   function convert_array_tolower($arr){
    $new_arr=[];
    foreach ( $arr as $value ){
        $new_arr[] = strtolower($value);
    }

    return $new_arr;
   }

   print_r(convert_array_tolower ($colors)); 

   echo"<br><br> Question 2 <br>";
   function nums_div_by_four ($min , $max){
    $arr = range($min , $max);
    foreach ($arr as $ar){
        if ($ar % 4 == 0){
            echo $ar  . " ";
        }
    }
   }

   nums_div_by_four(200, 250);


   echo"<br><br> Question 3 <br>";

   function shortest_longest_inarr($arr) {
        // Initialize $longest and $shortest with the first element of the array
        $longest = $arr[0];
        $shortest = $arr[0];
        
        // Loop through the array to find longest and shortest strings
        foreach ($arr as $word) {
            if (strlen($word) > strlen($longest)) {
                $longest = $word;
            }
            if (strlen($word) < strlen($shortest)) {
                $shortest = $word;
            }
        }
        
        // Output the result
        echo "The shortest is '$shortest' with " . strlen($shortest) . " characters and the longest is '$longest' with " . strlen($longest) . " characters.";
    }

    $words = array("abcd", "abc", "de", "hjjj", "g", "wer");
    shortest_longest_inarr($words);

    echo"<br><br> Question 4 <br>";
    function generate_unique($min, $max) {
        // Create a range of numbers from $min to $max
        $range = range($min, $max);
        shuffle($range);
        $new = [];
        $limit = 10;
    
        for ($i = 0; $i < $limit; $i++) {
            $new[$i] = $range[$i]; 
        }
        return implode(", ", $new);
    }
    
    echo generate_unique(11, 20);
    
    echo"<br><br> Question 5 <br>";
    function findLowestNonZero($array) {
        $lowest = null;
    
        foreach ($array as $number) {
            if ($number !== 0 && ($lowest === null || $number < $lowest)) {
                $lowest = $number;
            }
        }
    
        return $lowest;
    }
    
    $array1 = array(2, 0, 10, 12, 6);
    echo findLowestNonZero($array1);
    




























    ?>
    
</body>
</html>