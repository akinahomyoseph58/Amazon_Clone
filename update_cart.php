<?php
session_start();
include "config/db.php";

// must be logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

if (!isset($_POST['cart_id'], $_POST['quantity'])) {
    header("Location: cart.php");
    exit;
}

$cart_id = $_POST['cart_id'];
$quantity = (int)$_POST['quantity'];
$user_id = $_SESSION['user_id'];

// update quantity
$query = "UPDATE cart SET quantity = ? WHERE cart_id = ? AND user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $quantity, $cart_id, $user_id);
$stmt->execute();

header("Location: cart.php");
exit;
