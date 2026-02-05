<?php session_start();
include "config/db.php";

if (!isset($_SESSION['user_id'])) {
    $cartItems = null;
    $total = 0;
    $itemCount = 0;
} else {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM cart WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $cartItems = $stmt->get_result();

    $total = 0;
    $itemCount = 0;
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="icon" href="amazon-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./cart.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="language-menu.css">
</head>
<body>
<!-- Sidebar Overlay -->
<div id="sidebar-overlay"></div>

<!-- Sidebar -->
<div id="sidebar">
    <div class="sidebar-header">
        <span id="close-sidebar">&times;</span>

        <h3>
    <a href="<?php echo isset($_SESSION['user_name']) ? '#' : 'signin.php'; ?>" class="sidebar-user">
        Hello,
        <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'sign in'; ?>
    </a>
</h3>

    </div>

    <ul>
    <li class="menu-header">Digital Content & Devices</li>
    <ul class="sub-items">
        <li>Prime Video</li>
        <li>Amazon Music</li>
        <li>Kindle E-readers & Books</li>
        <li>Amazon Appstore</li>
    </ul>
    <hr>

    <li class="menu-header">Shop by Department</li>
    <ul class="sub-items">
        <li>Electronics</li>
        <li>Computers</li>
        <li>Smart Home</li>
        <li>Arts & Crafts</li>
    </ul>
    <hr>
    <li class="menu-header">Programs & Features</li>
    <ul class="sub-items">
        <li>Gift Cards</li>
        <li>Shop By Interest</li>
        <li>Amazon Live</li>
        <li>International Shopping</li>
    </ul>
    <hr>
    <li class="menu-header">Help & Settings</li>
    <ul class="sub-items">
        <li>Your Account</li>   
        <li><img src="assets/globe.png" height="12" alt=""> &nbsp; English</li>
        <li><img src="assets/us_flag.png"  height="12" width="12px" alt=""> &nbsp;United States</li>
        <li>Customer Service</li>
    </ul>
</ul>
</div>

     <nav> 
        <a href="index.php">
        <img src="./assets/amazon_logo.png" width="100 " alt="Amazon Logo">
        </a>
        <div class="nav-country">
            <img src="./assets/location_icon.png" height="20" alt="">
            <div>
                <p>Deliver to</p>
                <h1>Ethiopia</h1>
            </div>
        </div>
        <div class="nav-search">
            <div class="nav-search-category">
              <p>All</p>
              <img src="./assets/dropdown_icon.png" height="12" alt="">
            </div>
            <input type="text" class="nav-search-input" placeholder="Search Amazon">
            <img src="./assets/search_icon.png" class="nav-search-icon" alt="">
        </div>
        <div class="nav-language" id="langToggle">
    <img src="./assets/us_flag.png" width="25px" alt="">
    <p><?= $_SESSION['lang'] ?? 'EN' ?></p>
    <img src="./assets/dropdown_icon.png" width="8px" alt="">
</div>
        <div class="nav-text">
    <?php if(isset($_SESSION['user_id'])): ?>
         <!-- User is logged in -->
        <p>Hello, <?php echo $_SESSION['user_name']; ?></p>
        <h1>
           
            | <a href="logout.php" style="color: inherit; text-decoration: none;">Logout</a>
            <img src="./assets/dropdown_icon.png" width="8px" alt="">
        </h1>
    <?php else: ?>
         <!-- User is not logged in -->
        <p><a href="signin.php">Hello, Sign in</a></p>
        <h1>Account & Lists <img src="./assets/dropdown_icon.png" width="8px" alt=""></h1>
    <?php endif; ?>
</div>
        <a href="your_orders.php" class="nav-text">
    <p>Returns</p>
    <h1>& Orders</h1>
</a>

         <a href="signin.php" class="mobile-user-icon" style="display: none;">
            <img src="assets/user.png" alt="">
        </a>
        <a href="" class="nav-cart">
            <img src="./assets/cart_icon.png" width="35" alt="">
            <h4>Cart</h4>
        </a>
        
    </nav>
    <div class="language-menu" id="languageMenu">
    <h4>Change language</h4>

    <form action="set_language.php" method="post">
        <label>
            <input type="radio" name="lang" value="EN" checked>
            English - EN
        </label>

        <label>
            <input type="radio" name="lang" value="ES">
            español - ES
        </label>

        <label>
            <input type="radio" name="lang" value="AR">
            العربية - AR
        </label>

        <label>
            <input type="radio" name="lang" value="DE">
            Deutsch - DE
        </label>

        <hr>

        <p class="currency">
            Change currency<br>
            <strong>$ USD - U.S. Dollar</strong>
        </p>

        <button type="submit">Save</button>
    </form>
</div>

    <div class="nav-bottom">
        <div>
            <img src="./assets/menu_icon.png" width="25px" alt="">
            <p class="nav-all" id="all-btn">All</p>
        </div>
        <p>Today's Deals</p>
        <p>Customer Service</p>
        <p>Registry</p>
        <p>Gift Cards</p>
        <p>Sell</p>
    </div> 
    <div class="cart">
        <div class="cart-left">
            <h1>Shopping Cart</h1>
            <hr>
    
<?php if ($cartItems->num_rows == 0): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <?php while ($item = $cartItems->fetch_assoc()): ?>
        <?php
            $total += $item['product_price'] * $item['quantity'];
            $itemCount += $item['quantity'];
        ?>

        <div class="product-cart-list">
            <img src="<?= $item['product_image'] ?>" alt="" width="180px">

            <div>
                <div class="product-cart-titleprice">
                    <p><?= $item['product_name'] ?></p>
                    <p><b>$<?= number_format($item['product_price'], 2) ?></b></p>
                </div>

                <p class="product-cart-stock">In Stock</p>
                <p class="product-cart-returns">FREE Returns &#11191;</p>

                <div class="cart-list-action">
                   <form method="post" action="update_cart.php" style="display:inline;">
    <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">

    <select name="quantity" onchange="this.form.submit()">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <option value="<?= $i ?>" <?= $i == $item['quantity'] ? 'selected' : '' ?>>
                Qty: <?= $i ?>
            </option>
        <?php endfor; ?>
    </select>
</form>

                    <hr>

                    <form method="post" action="remove_from_cart.php" style="display:inline;">
                        <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">
                        <button class="action-btn" type="submit">Delete</button>
                    </form>

                    <hr>
                    <p class="action-btn">Save for later</p>
                    <hr>
                    <p class="action-btn">Compare with Similar items</p>
                    <hr>
                    <p class="action-btn">Share</p>
                </div>
            </div>
        </div>
        <hr>
    <?php endwhile; ?>
<?php endif; ?>

        
            <div class="cart-list-subtotal">
                Subtotal (<?= $itemCount ?> items): <b>$<?= number_format($total, 2) ?></b>

            </div>
       </div>
       <div class="cart-right">
        <div class="cart-free-delivery">
            <p>&#x2705</p>
            <p>Your Order qualifies for FREE Shipping.<b>Choose this option
                at checkout.</b> See details </p>
        </div>
        <p class="cart-subtotal">Subtotal (<?= $itemCount ?> items): <b>$<?= number_format($total, 2) ?></b></p>
        <p class="cart-right-gift"> <input type="checkbox">This order contains a gift</p>
     <?php if (!isset($_SESSION['user_id'])): ?>
    <a href="signin.php?redirect=checkout.php">
        <button>Proceed to checkout</button>
    </a>
<?php else: ?>
    <a href="checkout.php">
        <button>Proceed to checkout</button>
    </a>
<?php endif; ?>


       </div>
    </div>

  <div class="back">
    back to top
</div>
<footer class="footer-container">
    <div>
        <div class="footer-title">Get to know us</div>
        <div>about us</div>
        <div>careers</div>
        <div>Press Releases</div>
        <div>Amazon Science</div>

    </div>
      <div>
        <div class="footer-title">Connect with us</div>
        <div>Facebook</div>
        <div>Twitter</div>
        <div>Instagram</div>
    </div>
      <div>
      <div class="footer-title">Make Money with us </div>
      <div>Sell On Amazon</div>
      <div>Sell Under Amazon Accelerator</div>
      <div>Protect and Build Your Brand</div>
      <div>Amazon Global Selling</div>
      <div>Become an Affiliate</div>
      <div>Fulfilment by Amazon</div>
      <div>Advertise Your Products</div>
      <div>Amazon Pay On Merchants</div>
    </div>
      <div>
         <div class="footer-title">Let Us help you</div>
         <div>COVID-19 and Amazon</div>
         <div>Your Account</div>
         <div>Returns Center</div>
         <div>100% Purchase Protection</div>
         <div>Amazon App Download</div>
         <div>Help</div>
    </div>
   

</div>
</footer>
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
    <script src="script.js"></script>
    <script src="language-menu.js"></script>
    
</body>
</html>