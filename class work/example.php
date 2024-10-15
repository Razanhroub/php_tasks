<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!isset($_SESSION["users"])){
            $_SESSION["users"]=[];
        }
        // Create a new user array
        $newUser = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            ];

        $_SESSION["users"][]=$newUser;

    }
   



    ?>
    <form method="POST">
        <label for="name">name</label>
        <input type="text" name="name" id="name" required><br>
        <label for="email">email</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">password</label>
        <input type="password" name="password" id="password"required><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>