<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css"> <!-- Adjust this if necessary -->
    <title>User Dashboard</title>
</head>
<body>
    <?php
        session_start();

        // Enable error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include("database.php");
        
        // Check if the user is logged in and is a regular user
        if (!isset($_SESSION["user"]) || $_SESSION["user_type"] != "user") {
            header("Location: advanced_task.php"); // Redirect to login/signup page if not a regular user
            exit();
        }
    ?>
    
    <div>
        <h1>Welcome to your dashboard</h1>
        <!-- User-specific features can be added here -->
        
        <!-- Link for logging out -->
        <a href="logout.php" class="btn btn-warning">Logout</a> 
    </div>
</body>
</html>
