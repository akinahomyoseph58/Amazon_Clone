<?php
session_start();
include "config/db.php";

// must be logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

if (!isset($_POST['cart_id'])) {
    header("Location: cart.php");
    exit;
}

$cart_id = $_POST['cart_id'];
$user_id = $_SESSION['user_id'];

// delete ONLY this user's item
$query = "DELETE FROM cart WHERE cart_id = ? AND user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $cart_id, $user_id);
$stmt->execute();

header("Location: cart.php");
exit;
