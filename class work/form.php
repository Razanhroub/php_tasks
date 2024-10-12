<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Initialize the users session variable if it doesn't exist
        if (!isset($_SESSION["users"])) {
            $_SESSION['users'] = [];
        }

        // Create a new user array
        $newUser = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
        ];

        // Add the new user to the session users array
        $_SESSION["users"][] = $newUser;
    }
    ?>

    <form method="POST">
        Name: <input type="text" name="name" required><br>
        E-mail: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Submit">
        <button type="button" id="show">Show Table</button> <!-- Change to type="button" -->
    </form>

    <h2>Users:</h2>
    <table id="userTable" style="display: none;"> <!-- Hide table by default -->
        <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Password</th>
        </tr>
        <?php
        // Display the users stored in the session in a table
        if (isset($_SESSION["users"]) && count($_SESSION["users"]) > 0) {
            foreach ($_SESSION["users"] as $user) {
                echo "<tr>";
                echo "<td>" . ($user['email']) . "</td>";
                echo "<td>" . ($user['name']) . "</td>";
                echo "<td>" . ($user['password']) . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <script>
        document.getElementById("show").addEventListener("click", function() {
            var table = document.getElementById("userTable");
            if (table.rows.length > 1) { // Check if there are any user rows
                table.style.display = table.style.display === "none" ? "table" : "none"; // Toggle visibility
            } else {
                alert("No users to display."); // Alert if no users
            }
        });
    </script>
</body>

</html>
