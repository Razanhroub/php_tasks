<?php
require('database.php');

?>
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
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM `users` WHERE `id` = :id";
    $statement = $conn->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        echo "User not found.";
        exit();
    }
}

// Updating user details
if(isset($_POST['update_user'])){
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type']; // Adding user_type here

    $updateQuery = "UPDATE `users` SET `full_name` = :full_name, `email` = :email, `phone_number` = :mobile, `password` = :password, `user_type` = :user_type WHERE `id` = :id"; // Including user_type in the update query
    $updateStatement = $conn->prepare($updateQuery);
    $updateStatement->bindParam(':full_name', $fname);
    $updateStatement->bindParam(':email', $email);
    $updateStatement->bindParam(':mobile', $mobile);
    $updateStatement->bindParam(':password', $password);
    $updateStatement->bindParam(':user_type', $user_type); // Binding user_type parameter
    $updateStatement->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($updateStatement->execute()) {
        echo "User updated successfully.";
    } else {
        echo "Failed to update user.";
    }
}
    ?>
    
    <div class="container mt-5">
        <form action="update_page.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="fname">User Name</label>
                <input type="text" class="form-control" name="fname" id="fname" value="<?php echo htmlspecialchars($user['full_name']); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
            </div>
            <div class="form-group">
                <label for="mobile">User Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo htmlspecialchars($user['phone_number']); ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>">
            </div>
            <!-- Adding user_type field with check if it's set -->
            <div class="form-group">
                <label for="user_type">User Type</label>
                <select class="form-control" id="user_type" name="user_type">
                    <option value="user" <?php echo (isset($user['user_type']) && $user['user_type'] === 'user') ? 'selected' : ''; ?>>User</option>
                    <option value="admin" <?php echo (isset($user['user_type']) && $user['user_type'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success" name="update_user" value="UPDATE">
        </form>
    </div>
</body>
</html>
