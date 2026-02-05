<?php
session_start();
include "config/db.php";

/* Amazon logic: must be logged in */
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php?redirect=checkout.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['place_order'])) {

    // 1️⃣ Copy cart items into orders
    $insert = $conn->prepare("
        INSERT INTO orders (user_id, product_name, product_price, product_image, quantity)
        SELECT user_id, product_name, product_price, product_image, quantity
        FROM cart
        WHERE user_id = ?
    ");
    $insert->bind_param("i", $user_id);
    $insert->execute();

    // 2️⃣ Clear the cart
    $clear = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
    $clear->bind_param("i", $user_id);
    $clear->execute();

    // 3️⃣ Redirect to Orders page
    header("Location: your_orders.php");
    exit;
}

/* Get cart items */
$query = "SELECT * FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$items = $stmt->get_result();

$total = 0;
$itemCount = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure checkout</title>
     <link rel="stylesheet" href="footer.css">
     <link rel="stylesheet" href="checkout.css">
</head>
<body class="checkout-page">


<!-- ===== HEADER ===== -->
<header class="checkout-header">
    <div class="checkout-header-left">
        <a href="index.php">
        <img src="assets/amazon_logo.png" alt="Amazon"> 
        </a>
    </div>

    <div class="checkout-header-center">
        Secure checkout
    </div>

    <div class="checkout-header-right">
        <a href="cart.php">
        <img src="assets/cart_icon.png" class="cart-icon"></a>
        <span>Cart</span>
    </div>
</header>  

<!-- ===== MAIN CONTENT ===== -->
<div class="checkout-main">

    <!-- LEFT -->
    <div class="checkout-left">

        <!-- DIGITAL DELIVERY -->
        <div class="checkout-section">
            <h3>Digital delivery</h3>
            <p>See details in ‘shipping options’ section below.</p>
        </div>

        <!-- PAYMENT METHOD -->
        <div class="checkout-section">
            <h3>Payment method</h3>

            <div class="payment-box">
                <p class="payment-title">Your available balance</p>

                <div class="promo">
                    <input type="text" placeholder="Enter Code">
                    <button>Apply</button>
                </div>

                <hr>

                <p class="payment-title">Your credit and debit cards</p>
                <p class="link">+ Add a credit or debit card</p>

                <hr>

                <p class="payment-title">Other payment methods</p>
                <p class="link">+ Learn more about Amazon Store Card</p>
                <p class="link">+ Add an OTC Benefits card</p>
            </div>
        </div>

        <!-- REVIEW ITEMS -->
        <div class="checkout-section">
            <h3>Review items and shipping</h3>

            <?php while ($item = $items->fetch_assoc()): ?>
                <?php
                    $itemCount += $item['quantity'];
                    $total += $item['product_price'] * $item['quantity'];
                ?>
                <div class="review-item">
                    <img src="<?= $item['product_image'] ?>">
                    <div>
                        <p class="item-name"><?= $item['product_name'] ?></p>
                        <p class="item-price">$<?= number_format($item['product_price'], 2) ?></p>
                        <p>Qty: <?= $item['quantity'] ?></p>
                        <p class="green">In Stock</p>
                        <p class="link">FREE Returns</p>
                    </div>
                </div>
            <?php endwhile; ?>

            <div class="help-links">
                <p>Why has sales tax been applied? <span>See tax and seller information</span></p>
                <p>Do you need help? <span>Explore our Help pages or contact us</span></p>
                <p><span>Back to cart</span></p>
            </div>
        </div>

    </div>

    <!-- RIGHT -->
    <div class="checkout-right">
        <form method="post">
    <button class="use-payment" name="place_order">
        Use this payment method
    </button>
</form>


        <div class="summary">
            <p>Items (<?= $itemCount ?>): <span>$<?= number_format($total, 2) ?></span></p>
            <p>Shipping & handling: <span>—</span></p>
            <p>Estimated tax to be collected: <span>—</span></p>
            <hr>
            <h3>Order total: $<?= number_format($total, 2) ?></h3>
        </div>
    </div>

</div>

 <div class="back">
    back to top
</div>

 <div class="footer-bottom">

    <div class="footer-logo">
        <img src="assets/amazon_logo.png" alt="Amazon logo">
    </div>

    <div class="footer-lang">
        🌐 English
    </div>

    <div class="footer-countries">
        <span>Australia</span>
        <span>Brazil</span>
        <span>Canada</span>
        <span>China</span>
        <span>France</span>
        <span>Germany</span>
        <span>Italy</span>
        <span>Japan</span>
        <span>Mexico</span>
        <span>Netherlands</span>
        <span>Poland</span>
        <span>Singapore</span>
        <span>Spain</span>
        <span>Turkey</span>
        <span>United Arab Emirates</span>
        <span>United States</span>
        <span>Ethiopia</span>
    </div>

    <script>
        const scrollContainer = document.querySelectorAll('.products');
for(const item of scrollContainer){
    item.addEventListener('wheel', (evt)=>{
        evt.preventDefault();
        item.scrollLeft += evt.deltaY;
    });
}
    </script>
    <script>
document.querySelector('.back').onclick = () => {
    window.scrollTo({top:0, behavior:"smooth"});
}
</script>

</body>
</html>


