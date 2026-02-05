<?php
session_start();
include "config/db.php";



// user must be logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}


$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];



// check if product already exists in cart
$check = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
$stmt = $conn->prepare($check);
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // product exists → increase quantity
    $update = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($update);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
} else {
    // add new product
    $insert = "INSERT INTO cart (user_id, product_id, product_name, product_price, product_image, quantity)
               VALUES (?, ?, ?, ?, ?, 1)";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param(
        "iisds",
        $user_id,
        $product_id,
        $_POST['product_name'],
        $_POST['product_price'],
        $_POST['product_image']
    );
    $stmt->execute();
}

// go to cart page
header("Location: cart.php");
exit;
