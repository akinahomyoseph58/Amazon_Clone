<?php
include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Basic validation
    if (empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters!";
    } else {
        // Check for duplicate email
        $checkEmail = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $checkEmail);

        if (mysqli_num_rows($result) > 0) {
            $error = "This email is already registered!";
        } else {
            // Hash the password and insert user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

            if (mysqli_query($conn, $sql)) {
                // Redirect to signin.php with success message
                header("Location: signin.php?signup=success");
                exit();
            } else {
                $error = "Something went wrong. Please try again!";
            }
        }
    }

    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="amazon-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="signin.css">
</head>
<body>
    <a href="index.php"><img class="logo" src="./assets/amazon_logo_dark.png" alt="" width="100px"></a>
<div class="signin-container">
    <h1 class="signin-title">Sign up</h1>

    <form method="POST">
        <?php if(isset($error)): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

        <h5 class="input-label">Your name</h5>
        <input type="text" name="name" placeholder="First and last name">

        <h5 class="input-label">Email</h5>
        <input type="email" name="email">

        <h5 class="input-label">Password</h5>
        <input type="password" name="password" placeholder="At least 6 characters">

        <button type="submit">Continue</button>
    </form>

    <p class="signin-condition">
        By continuing, you agree to Amazon's 
        <span>Conditions of Use</span> and 
        <span>Privacy Notice.</span>
    </p>

    <p class="signin-help">&#9656 <span>Need help</span></p>
    <hr>

    <h4>Buying for work?</h4>
    <p class="signin-business"><span>Shop on Amazon Business</span></p>
</div>

<div class="signin-bottom">
    <hr>
    <p>Have an Account?</p>
    <hr>
</div>
<button 
  class="signin-signup-btn"
  onclick="window.location.href='signin.php'">
  Login with Amazon account
</button>


<footer>
    <div class="footer-links">
        <a href="#">Conditions of Use</a>
        <a href="#">Privacy Notice</a>
        <a href="#">Help</a>
    </div>
    <p class="footer-copyright">© 1996-2024, Amazon.com, Inc. or its affiliates</p>
</footer>
     
    
</body>
</html>