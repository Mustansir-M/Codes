<?php
// Define variables and set to empty values
$email = $password = $age = "";
$emailErr = $passwordErr = $ageErr = "";

// Function to validate email format
function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

// Function to validate password length
function validatePassword($password) {
    if (strlen($password) < 8) {
        return false;
    }
    return true;
}

// Function to validate age
function validateAge($age) {
    if (!is_numeric($age) || $age < 18) {
        return false;
    }
    return true;
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!validateEmail($email)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
        if (!validatePassword($password)) {
            $passwordErr = "Password should be at least 8 characters long";
        }
    }

    // Validate age
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = $_POST["age"];
        if (!validateAge($age)) {
            $ageErr = "You must be at least 18 years old";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>
    <h2>Form Validation</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" value="<?php echo $password; ?>">
        <span class="error"><?php echo $passwordErr; ?></span>
        <br><br>

        <label>Age:</label>
        <input type="text" name="age" value="<?php echo $age; ?>">
        <span class="error"><?php echo $ageErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>