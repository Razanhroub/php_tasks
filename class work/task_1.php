<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    echo " Question 1 ";
   
    $colors = array('white', 'green', 'red');
    function display_arr ($arr){
        for($i = 0 ; $i < count($arr) ; $i++){
            echo "<li> $arr[$i] </li>";
           
        }
    }
    display_arr($colors);

    echo "<br><br>";
    echo " Question 2 ";
    echo "<br><br>"; 

    $cities= array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", 
    "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", 
    "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", 
    "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid" );  
    
    asort($cities);
    foreach($cities as $country => $capital) {
        echo "The capital of $country is $capital.<br>";
    }
 
    echo "<br> Question 3 <br>";


    $color = array (4 => 'white', 6 => 'green', 11=> 'red');
    foreach ($color as $num => $color){
        echo "The first element is $color.<br>";
    }

    echo " <br> <br> Question 4";

    $arr = array( 1, 2 ,3 ,4 ,5);
    array_splice($arr ,3 , 0 , "$");
    display_arr($arr);


    echo " <br><br> Question 5 <br>";

    $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");

    ksort($fruits);

    foreach ($fruits as $letter => $fruit){
        echo "$letter =  $fruit.<br>";
    }


    echo " <br><br> Question 6 <br>";

    $numbers = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62,
    65, 64, 68, 73, 75, 79, 73);

    
    function sum ( $arr){
        $sum = 0 ;
        
        for($i = 0 ; $i < count($arr); $i++){
            $sum += $arr[$i];
            
        }
        $avg = $sum/ count($arr);;
        return $avg; 
    }
    
    sort($numbers);

    $lowest =array_slice($numbers , 0 ,7);
    $highest = array_slice($numbers ,-7 , 7);


    echo "Average Temperature is: " . sum($numbers);
    echo "List of seven lowest temperatures:". display_arr($lowest) ;
    echo "List of seven highest temperatures:". display_arr($highest);


    echo"<br><br> Question 7 <br>";

    $array1 = array("color" => "red", 2, 4); 
    $array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);

    $merged_array = array_merge( $array1 , $array2); 

    foreach ($merged_array as $key_array => $value_array){
        echo "  $key_array => $value_array <br> ";
    }

    echo"<br><br> Question 8 <br>";
    $colors = array("red","blue", "white","yellow");

    foreach ($colors as $key => $color){
        $colors[$key] = strtoupper($color); 
       
    }

    print_r($colors);



    echo"<br><br> FUNCTIONS <br>";
    echo"<br><br> Question 1 <br>";

    function check_number ($num){
        if ($num % 2 != 0 ){
            echo "the number is odd number <br>";
        }else{
            echo "the number is prime number <br>";
        }
    }

    check_number(3);
    check_number(4);
    
    echo"<br><br> Question 2 <br>";

    function rev_string ($str){
        $str = strrev($str);
        echo "$str <br>";
    }

    rev_string("remove ");

    echo"<br><br> Question 3 <br>";

    function swap_values($num1 , $num2){
        $temp = $num1;
        $num1 = $num2;
        $num2 = $temp;
        echo " first number $num1 <br>";
        echo " second number $num2 <br>";
    }

    swap_values(12,22);

    echo"<br><br> Question 4 <br>";

    function isArmstrong($number) {
        $digits = str_split($number);
        $n = count($digits);
        $sum = 0;
    
        foreach ($digits as $digit) {
            $sum += pow($digit, $n);
        }
    
        return $sum == $number;
    }
    
   
    $number = 153;
    if (isArmstrong($number)) {
        echo "$number is an Armstrong number.<br>";
    } else {
        echo "$number is not an Armstrong number.<br>";
    }
    
    echo"<br><br> Question 5 <br>";
  
    function is_palindrome($str) {
        // Normalize the string: remove non-alphanumeric characters and convert to lowercase
        $cleanedStr = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $str));
    
        // Check if the cleaned string is equal to its reverse
        if ($cleanedStr == strrev($cleanedStr)) {
            return "Yes, it is a palindrome.";
        } else {
            return "No, it is not a palindrome.";
        }
    }
    
    // Example usage
    $input = "Eva, can I see bees in a cave?";
    $output = is_palindrome($input);
    echo $output;
    
    echo"<br><br> Question 6 <br>";
    
    function remove_duplicates($arr_nums) {
        foreach ($arr_nums as $index => $value) {
            // Compare the current value with the rest of the array
            for ($i = $index + 1; $i < count($arr_nums); $i++) {
                if ($value == $arr_nums[$i]) {
                    // Remove the duplicate element
                    array_splice($arr_nums, $i, 1);
                    // Decrement $i to account for the removed element
                    $i--;
                }
            }
        }
        return $arr_nums;
    }
    
    // Example usage
    $arr = [1, 2, 3, 2, 4, 1, 5];
    $result = remove_duplicates($arr);
    print_r($result);
    
    echo "<br><br>";
    function remove_duplicates2($arr_nums){
        $array_nums =array_values( array_unique($arr_nums));
        return $array_nums;
    }

    $result2 = remove_duplicates2($arr);
    print_r($result2);



    echo"<br><br> Logical Statements and Operators  <br>";
    echo"<br><br> Question 1   <br>";

    
    function sum_check($nums) {
        // Check if the sum of the specified keys equals 30
        if ($nums["firstInteger"] + $nums["secondInteger"] == 30) {
            echo ($nums["firstInteger"] + $nums["secondInteger"]); // Output the sum
        } else {
            return false; // Return false if the sum is not 30
        }
    }
    
    // Example input as an associative array
    $num = ["firstInteger" => 10, "secondInteger" => 20]; // Change to 10, 20 to get a sum of 30
    $result = sum_check($num);
    if ($result === false) {
        echo "The sum does not equal 30."; // Optional handling of the false return
    }

    echo"<br><br> Question 2   <br>";

    function is_mlultiple_of3($num){
        if ($num % 3 == 0 ){
            echo " the number is multiple of 3 ";
        }else {
            echo " the number isnt multiple of 3 ";
        }
    }
    is_mlultiple_of3(20);

    echo"<br><br> Question 3 <br>";
    function in_range ($number , $min , $max ){
        $range = range($min , $max);

        if (in_array($number , $range)){
            echo " yes the number is on the range ";
        }else {
            echo " yes the number is on the range ";
        }
    }
    
    in_range(50 , 20 , 50);

    echo"<br><br> Question 4 <br>";

    function largest_number( $num1 , $num2 , $num3){
        if ($num1 > $num2 && $num1 > $num3  ){
            return $num1;
        }else if ($num2 > $num1 && $num2 > $num3){
            return $num2;
        }else {
            return $num3;
        }
    }

    $largest = largest_number(1,5,9);
    echo $largest;

    echo"<br><br> Question 5 <br>";

    function calculateElectricityBill($units) {
        $bill = 0;

        // Calculate the bill based on the number of units
        if ($units <= 50) {
            $bill = $units * 2.50;
        } elseif ($units <= 150) { // Next 100 units (51 to 150)
            $bill = (50 * 2.50) + (($units - 50) * 5.00);
        } elseif ($units <= 250) { // Next 100 units (151 to 250)
            $bill = (50 * 2.50) + (100 * 5.00) + (($units - 150) * 6.20);
        } else { // Units above 250
            $bill = (50 * 2.50) + (100 * 5.00) + (100 * 6.20) + (($units - 250) * 7.50);
        }

        return $bill;
    }

    // Example usage
    $unitsConsumed = 300; // Change this value to test with different units
    $monthlyBill = calculateElectricityBill($unitsConsumed);
    echo "The monthly electricity bill for $unitsConsumed units is: " . number_format($monthlyBill, 2) . " JOD.";


    echo"<br><br> Question 6 <br>";
    function calculator ($num1 , $num2 , $operation ){
        $sum = 0;
        switch ($operation) {
            case '+':
                $sum = $num1 + $num2;
                break;
            
            case '-':
                $sum = $num1 - $num2;
                break;
    
            case '*':
                $sum = $num1 * $num2;
                break;
            case '/':
                $sum = $num1 / $num2;
                break;
    
            default:
                return false;
                break;
        }
        return $sum;

    }

    $operation_result = calculator (10 , 20 , '*');
    echo  $operation_result;

    echo"<br><br> Question 7 <br>";

    function legibility_to_vote ( $age ){
        if ($age >= 18){
            echo " you can vote ";
        }else {
            echo " you cant vote ";
        }

    }


    legibility_to_vote(15);

    echo"<br><br> Question 8 <br>";
    

    function check_number_sign($num){
        if ( $num ==0){
            echo " the number is zero";
        }elseif ($num >0){
            echo " the number is positive";
        }else {
            echo " the number is negative ";
        }

    }

    check_number_sign(10);

    echo"<br><br> Question 9 <br>";

    function student_grades ($grades ){

        $sum = 0 ;
        foreach($grades as $grade){
            $sum += $grade;
        }
        $avg = $sum /count($grades);

        switch ($avg){
            case $avg < 60 :
                echo "F";
                break;
            case $avg < 70 :
                echo "D";
                break;
            case $avg < 80 :
                echo "C";
                break;
            case $avg < 90 :
                echo "B";
                break;
            case $avg < 100 :
                echo "A";
                break;
            default:
                return $avg ;
                break;
        }
    }

    $grades =[60,86,95,63,55,74,79,62,50] ;
    student_grades ($grades);



  echo"<br><br> Loops <br>";
  echo"<br><br> Question 1  <br>";

  function number_dash ($num){
    $nums = range(1,$num);
    foreach($nums as $key =>$num ){
        echo $num;
        $count = count($nums);
        if( $key != $count-1){
            echo "-";

        }
    }
  }
  number_dash(10);

  echo"<br><br> Question 2 <br>";
  function display_nums(){
    $numbers= range (0,30);
    $sum = 0;
    foreach($numbers as $number ){
        echo "<br>".$number ;
        $sum +=$number ;

    }
    echo" <br>the summation from 0 to 30 is ". $sum;
  }

  display_nums();

  echo"<br><br> Question 3 <br>";

//   it draws the rows and moves between them 
    for ( $i = 0 ; $i < 5 ; $i++){
        // it drows the cols and move between them 
        for ( $j = 0 ; $j < 5 ; $j++){
            if ( $j < 4 - $i){
                echo "A ";
            }else {
                echo chr(65 + $i) . " ";
            }
        }
        echo "<br>";
        
    }
 
    echo"<br><br> Question 4 <br>";

    for ( $i = 0 ; $i < 5 ; $i++){
        // it drows the cols and move between them 
        for ( $j = 0 ; $j < 5 ; $j++){
            if ( $j < 4 - $i){
                echo "1 ";
            }else {
                echo 1+ $i . " ";
            }
        }
        echo "<br>";
        
    }

    echo"<br><br> Question 5 <br>";

    for ($i = 0 ; $i < 5 ; $i++){
        for ($j = 0 ; $j < 5 ; $j++){
           if($j == $i ){

               echo $i +1;
           }else {
            echo 0 ;
           }
        }
        echo "<br>";
    }


    echo"<br><br> Question 6 <br>";

    function factorial ( $num ){

        $fact = 1;
        for ($i = 1 ; $i <= $num ; $i++){
            $fact *= $i;
        }
        return $fact;
    }


    $fact = factorial(5);
    echo $fact;

    echo"<br><br> Question 7 <br>";




    ?>


    <table border = 1 >
        <?php
        echo"<br><br> Question 8<br>";
        for ($i = 1 ; $i <= 6 ; $i++){
            echo "<tr> ";

            for ($j = 1 ; $j <= 5 ; $j ++){
                echo '<td style="padding: 3px;">' . "$i * $j = " . ($i * $j) . '</td>';
                
            }



            echo "</tr>";
        }



        ?>
    </table>


    <?php
    echo"<br><br> PHP String and String Functions  <br>";
    echo"<br><br> Question 1<br>";

    $str = "hello world";

    echo " to upper case string = ".strtoupper($str). " <br>";
    echo " to lower case string = ".strtolower($str). " <br>";
    $str = strtoupper($str[0]).substr($str, 1);
    echo "the first letter upper case ".$str."<br>";
    $splitted_str = explode(" ", $str);

    foreach ($splitted_str as $value) {
        // Capitalize the first letter and concatenate with the rest of the string
        $capitalized_value = strtoupper($value[0]) . substr($value, 1);
        echo $capitalized_value . " "; // Print each capitalized word
    }
    
    echo"<br><br> Question 2<br>";
    $time =  '085119' ;
    $hrs = substr($time , 0 ,2);
    $mins = substr($time , 2 ,2);
    $sec = substr($time , 4 ,2);

    $time_details = $hrs.':'.$mins.':'.$sec;
    echo $time_details;

    echo"<br><br> Question 3<br>";

    $input = "I am a full stack developer at orange coding academy";
    $to_find ="Orange";

    function find_word ($str , $word){
        $word = strtolower($word);
        if (str_contains($str , $word)){
            echo " the word is in the string";
        }else {
            echo " the word is not in the string ";
        }

    }
    find_word($input , $to_find);

    echo"<br><br> Question 4<br>";
    $url_before = "www.orange.com/index.php";

    function extract_url ($url){
        $url_arr = explode( "/" , $url );
        return $url_arr[1];
    }

    $url_after = extract_url($url_before);
    echo " url after extraction is : ". $url_after;

    echo"<br><br> Question 5<br>";
    $user_name_before = "info@orange.com";

    function extract_user_name ($url){
        $url_arr = explode( "@" , $url );
        return $url_arr[0];
    }

    $user_name_after = extract_user_name($user_name_before);
    echo " username after extraction is : ". $user_name_after;

    echo"<br><br> Question 6<br>";
    $last_theree_before = "info@orange.com";

    function extract_last_three ($url){
        $url_arr = explode( "." , $url );
        return $url_arr[1];
    }

    $last_three_after = extract_last_three($last_theree_before);
    echo " last three characters after extraction are: ". $last_three_after;

    echo"<br><br> Question 7<br>";
   
    function generateRandomPassword($length = 8, $characters = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz') {
        $charactersArray = str_split($characters); // Convert string to an array
        $charactersCount = count($charactersArray); // Count of characters
        $randomPassword = '';

        // Shuffle the characters array
        shuffle($charactersArray);

        // Create a random password by selecting characters
        for ($i = 0; $i < $length; $i++) {
            // Select a character from the shuffled array
            $randomPassword .= $charactersArray[$i % $charactersCount];
        }

        return $randomPassword;
    }

    // Example usage
    $password = generateRandomPassword(8); // Change the length as needed
    echo "Random Password: " . $password . "<br>"; // Output: e.g., 254ABCc or h242sfeDAFEe32


    echo"<br><br> Question 8<br>";

    function replace_first_word($str , $word){
        $str = explode(" ", $str);

        $str[0]= $word;
        
        $str = implode(" ", $str);
        return $str;
    }

    $stri = "That new trainee is so genius";
    $wor = "Our";
    $new_str = replace_first_word($stri , $wor);
    echo $new_str. " <br>"; 
  
?>


   

    
</body>
</html>
