<?php
session_start();
include "config/db.php";

// Get form data
$email = trim($_POST['email']);
$password = $_POST['password'];

// Redirect destination
$redirect = $_POST['redirect'] ?? 'index.php';

// Check user by email
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// ❌ Email not registered
if ($result->num_rows === 0) {
    header("Location: signin.php?error=email");
    exit;
}

// Fetch user
$user = $result->fetch_assoc();

// ❌ Incorrect password
if (!password_verify($password, $user['password'])) {
    header("Location: signin.php?error=password");
    exit;
}

// ✅ Login success
$_SESSION['user_id'] = $user['id'];      // change if column name differs
$_SESSION['user_name'] = $user['name'];  // change if column name differs

header("Location: $redirect");
exit; // ensure no further code is executed after redirection
