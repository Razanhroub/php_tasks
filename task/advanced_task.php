<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION["user"])) {
    // Check user type and redirect accordingly
    if ($_SESSION["user_type"] == "admin") {
        header("Location: admin_dashboard.php"); 
    } else {
        header("Location: user_dashboard.php");
    }
    exit; // Ensure we stop further script execution
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/bootstrap.css">
  <title>Document</title>
  <link href="./style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
$errors = array(); // Initialize the errors array

if (isset($_POST["signup"])) {
    // Gather input
    $full_name = $_POST['name'];
    $date_of_birth = $_POST['birth'];
    $phone_number = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if any fields are missing
    if (empty($full_name) || empty($date_of_birth) || empty($phone_number) || empty($email) || empty($password) || empty($password_confirm)) {
        array_push($errors, "All fields are required");
    }

    // Validate name, passing errors array by reference
    validate_name($full_name, $errors); 
    validate_birth_date($date_of_birth, $errors);
    validate_phone_number($phone_number, $errors);
    validate_email($email, $errors);
    passowrd_validation($password, $errors);
    confirm_password_validation($password, $password_confirm, $errors);

    // Check if the email is used before so that if a new user uses the same email it won't work 
    require_once "database.php";

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row_count = $stmt->rowCount();
    
    if ($row_count > 0) {
        array_push($errors, "This email is already used");
    }

    // Check for errors and display messages
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // SQL command for inserting data into the db
        $sql = "INSERT INTO users (email, password, full_name, phone_number, date_birth) VALUES (:email, :password, :full_name, :phone_number, :date_birth)";
        
        // Prepare the statement
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password_hash);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':date_birth', $date_of_birth);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Success message
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        } else {
            die("Something went wrong.");
        }
    }
}

// Function to validate the name
function validate_name($full_name, &$errors) {
    $nameParts = explode(" ", $full_name);

    // First validation: Check if there are 4 parts
    if (count($nameParts) != 4) {
        array_push($errors, "Full name must consist of 4 sections: First name, Middle name, Last name, and Family name.");
    }

    // Second validation: Check if each part contains only alphabetic characters
    foreach ($nameParts as $part) {
        if (!ctype_alpha($part)) {
            array_push($errors, "Each part of the name should contain only alphabetic characters.");
            break; // Stop after finding the first non-alphabetic part
        }
    }
}

// Validation for the birth date
function validate_birth_date($date_of_birth, &$errors) {
    // Create a DateTime object from the provided date
    $dob = DateTime::createFromFormat('Y-m-d', $date_of_birth);

    // Check if the date is valid
    if (!$dob || $dob->format('Y-m-d') !== $date_of_birth) {
        array_push($errors, "Invalid date of birth.");
        return;
    }

    // Calculate the age based on the input date
    $current_date = new DateTime();
    $age = $current_date->diff($dob)->y; // Calculate age in years

    // Check if the user is at least 16 years old
    if ($age < 16) {
        array_push($errors, "You must be at least 16 years old to register.");
    }
}

// Validation for the phone number 
function validate_phone_number($phone_number, &$errors) {
    if (strlen($phone_number) != 14) {
        array_push($errors, "The phone number must be 14 numbers.");
    }
}

// Validation for email 
function validate_email($email, &$errors) {
    // Regex pattern for validating an email
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    // Validate email format using regex
    if (!preg_match($pattern, $email)) {
        array_push($errors, "Invalid email format.");
    }
}

function passowrd_validation($password, &$errors) {
    // Check how many characters are used in the password 
    if (strlen($password) < 8) {
        array_push($errors, "The password must be at least 8 characters.");
        // to stop further validation if this fails 
        return;
    }
    // Check for at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        array_push($errors, "Password must include at least one uppercase letter.");
    }

    // Check for at least one lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        array_push($errors, "Password must include at least one lowercase letter.");
    }

    // Check for at least one number
    if (!preg_match('/[0-9]/', $password)) {
        array_push($errors, "Password must include at least one number.");
    }

    // Check for at least one special character
    if (!preg_match('/[\W_]/', $password)) {
        array_push($errors, "Password must include at least one special character.");
    }

    // Check for spaces
    if (preg_match('/\s/', $password)) {
        array_push($errors, "Password should not contain spaces.");
    }
}

function confirm_password_validation($password, $password_confirm, &$errors) {
    if ($password_confirm != $password) {
        array_push($errors, "Both password fields must match.");
    }
}

if (isset($_POST["signin"])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    // Connect to the database
    require_once "database.php";

    // Query to fetch the user based on the email
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email_login);
    $stmt->execute();
    
    // Fetch the user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists
    if ($user) {
        // Verify the password
        if (password_verify($password_login, $user["password"])) {
            // Start the session and store the user type
            session_start();
            $_SESSION["user"] = "yes";
            $_SESSION["user_type"] = $user["user_type"]; // Store the user type in the session

            // Check if the user is an admin or a regular user
            if ($user["user_type"] == "admin") {
                // Redirect to the admin dashboard
                header("Location: admin_dashboard.php");
            } else {
                // Redirect to the regular user dashboard
                header("Location: user_dashboard.php");
            }
            exit; // Ensure further script execution stops after redirection
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
}

?>

<br><br>
<div class="cont">
    <!-- Sign In Form -->
    <form class="form sign-in" method="post" action="advanced_task.php">
        <h2>Welcome</h2>
        <label for="email">
            <span>Email</span>
            <input type="email" name="email" required />
        </label>
        <label for="password">
            <span>Password</span>
            <input type="password" name="password" required />
        </label>
        <p class="forgot-pass">Forgot password?</p>
        <button type="submit" class="submit" name="signin">Sign In</button>
    </form>

    <div class="sub-cont">
        <div class="img">
            <div class="img__text m--up">
                <h3>Don't have an account?</h3>
                <p>Sign up and discover great experiences!</p>
            </div>
            <div class="img__text m--in">
                <h3>Already have an account?</h3>
                <p>Sign in and start your journey!</p>
            </div>
            <div class="img__btn m--up">
                <span class="m--up">Sign Up</span>
                <span class="m--in">Sign In</span>
            </div>
        </div>
        <!-- Sign Up Form -->
        <form class="form sign-up" method="post" action="advanced_task.php">
            <h2>Create Account</h2>
            <label for="name">
                <span>Full Name</span>
                <input type="text" name="name" required />
            </label>
            <label for="birth">
                <span>Date of Birth</span>
                <input type="date" name="birth" required />
            </label>
            <label for="mobile">
                <span>Mobile</span>
                <input type="tel" name="mobile" required />
            </label>
            <label for="email">
                <span>Email</span>
                <input type="email" name="email" required />
            </label>
            <label for="password">
                <span>Password</span>
                <input type="password" name="password" required />
            </label>
            <label for="password_confirm">
                <span>Confirm Password</span>
                <input type="password" name="password_confirm" required />
            </label>
            <button type="submit" class="submit" name="signup">Sign Up</button>
        </form>
    </div>
</div>
<script>
    document.querySelector('.img__btn').addEventListener('click', function() {
        document.querySelector('.cont').classList.toggle('s--signup');
    });
</script>


<script src="/bootstrap.js"></script>
<script src="./script.js"></script>
</body>
</html>
