<?php
require('database.php');

if(isset($_POST['add_student'])){
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Prepare the SQL query to insert the new student
    $query = "INSERT INTO `users`(`full_name`, `email`, `phone_number`, `password`) VALUES (:full_name, :email, :phone_number, :password)";
    $statement = $conn->prepare($query);
    
    // Create an associative array with the data
    $data = [
        'full_name' => $fname,
        'email' => $email,
        'phone_number' => $mobile,
        'password' => $password
    ];

    // Execute the statement with the provided data
    if ($statement->execute($data)) {
        header('Location: index.php?message=user added successfully');
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "Failed to add user.";
    }
}
?>
