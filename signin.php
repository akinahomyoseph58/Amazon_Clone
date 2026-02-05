<?php
session_start(); // start session
include "config/db.php"; // database connection

if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
    echo "<script>alert('Signup successful! Please log in.');</script>";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header("Location: index.php"); // redirect to homepage after login
                exit();
            } else {
                $error = "Incorrect password!";
            }
        } else {
            $error = "No account found with that email!";
        }
    } else {
        $error = "Please fill in all fields!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In</title>
<link rel="icon" href="amazon-icon.png" type="image/x-icon">
<link rel="stylesheet" href="signin.css">
</head>
<body>
<a href="index.php"><img class="logo" src="./assets/amazon_logo_dark.png" alt="" width="100px"></a>
<div class="signin-container">
    <h1 class="signin-title">Sign in</h1>

    <?php if(!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

<?php if (isset($_GET['error'])): ?>
    <?php if ($_GET['error'] === 'email'): ?>
        <p style="color:red;">Email not registered</p>
    <?php elseif ($_GET['error'] === 'password'): ?>
        <p style="color:red;">Incorrect password</p>
    <?php endif; ?>
<?php endif; ?>

    <!-- Form starts here -->
    <form method="POST" action="process_login.php">
        <input type="hidden" name="redirect" value="<?= $_GET['redirect'] ?? 'index.php' ?>">
        <h5 class="input-label">Email </h5>
        <input type="text" name="email" placeholder="Enter your email">

        <h5 class="input-label">Password</h5>
        <input type="password" name="password" placeholder="Enter your password">

        <button type="submit">Continue</button>

    </form>
    <!-- Form ends here -->

    <p class="signin-condition">By continuing, you agree to Amazon's <span>Conditions of Use</span> and <span>Privacy Notice.</span></p>
    <p class="signin-help">&#9656 <span>Need help</span></p>
    <hr>
    <h4>Buying for work?</h4>
    <p class="signin-business"><span>Shop on Amazon Business</span></p>
</div>
<div class="signin-bottom">
    <hr>
    <p>New to Amazon?</p>
    <hr>
</div>
<a href="signup.php" class="signin-signup-btn">Create your Amazon account</a>

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