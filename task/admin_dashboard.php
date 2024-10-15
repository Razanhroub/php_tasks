<?php
require('database.php');
session_start();

// Enable error reporting only in development environment
if ($_SERVER['SERVER_NAME'] === 'localhost') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Check if the user is logged in and is an admin
if (!isset($_SESSION["user"]) || $_SESSION["user_type"] != "admin") {
    header("Location: advanced_task.php"); // Redirect to login/signup page if not admin
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css"> <!-- Adjust this if necessary -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>
    <div>
        <h1>Welcome, Admin, to the dashboard</h1>
        <!-- Admin-specific features can be added here -->
        
        <!-- Link for logging out -->
        <a href="logout.php" class="btn btn-warning">Logout</a> 
    </div>
    
    <?php
    if (isset($_GET['message'])) {
        echo '<h6 class="container">'.htmlspecialchars($_GET['message']).'</h6>';
    }
    ?>

    <div class="container mt-5">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New User
        </button>
    </div>

    <div class="container mt-5">
        <table class="table table-striped table-hover table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">User name</th>
                    <th scope="col">User Email</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `users`";
                $users = $conn->query($query);
              
                if ($users->rowCount() == 0) {
                    echo "<tr><td colspan='5' class='text-center'>Empty table</td></tr>";
                } else {
                    foreach ($users as $user) {
                        echo "<tr>
                            <td>{$user['id']}</td>
                            <td>{$user['full_name']}</td>
                            <td>{$user['email']}</td>
                            <td><a href='update_page.php?id={$user['id']}' class='btn btn-primary'>Edit</a></td>
                            <td><a href='delete.php?id={$user['id']}' class='btn btn-danger'>Delete</a></td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <form action="index.php" method="post"> <!-- Change the action to post to the same page -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="fname">First name</label>
                            <input type="text" placeholder="Enter your name" name="fname" class="form-control" required>
                            <label for="email">User Email</label>
                            <input type="email" placeholder="Enter user email" name="email" class="form-control" required>
                            <label for="mobile">User Mobile</label>
                            <input type="text" placeholder="Enter user mobile" name="mobile" class="form-control" required>
                            <label for="password">User Password</label>
                            <input type="password" placeholder="Enter user password" name="password" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="add_student" value="Add">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    // Handle adding new user
    if (isset($_POST['add_student'])) {
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL query to insert the new user
        $query = "INSERT INTO `users`(`full_name`, `email`, `phone_number`, `password`) VALUES (:full_name, :email, :phone_number, :password)";
        $statement = $conn->prepare($query);
        
        // Create an associative array with the data
        $data = [
            'full_name' => $fname,
            'email' => $email,
            'phone_number' => $mobile,
            'password' => $hashedPassword
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
</body>
</html>
