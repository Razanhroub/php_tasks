<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php


require('database.php');


if (isset($_GET['id'])){
    $user_id=$_GET['id'];

    $query="DELETE FROM `users` WHERE `id`=:id";
    $statment=$conn->prepare($query);
    $statment->bindParam('id',$user_id,PDO::PARAM_INT);
    $statment->execute();
}
?>




    
</body>
</html>