<?php
session_start();
include "config/db.php";

// Must be logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Get orders for this user
$query = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$orders = $stmt->get_result();
?>
<!-- This is the Your Orders page where users can view their past orders, return items, and buy again. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Orders</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="language-menu.css">
</head>
<body>

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


        <div class="nav-text">
           <p>Return</p>
           <h1>& Orders</h1> 
        </div>
       <a href="/signin.php" class="mobile-user-icon" style="display: none;">
            <img src="assets/user.png" alt="">
        </a>
        <a href="cart.php" class="nav-cart">
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

    <div style="padding: 30px; background: #fff; margin: 30px;">
    <h1>Your Orders</h1>

    <?php if ($orders->num_rows == 0): ?>
        <p>Looks like you haven’t placed any orders yet.</p>
    <?php else: ?>
        <?php while ($order = $orders->fetch_assoc()): ?>
            <div style="display:flex; gap:20px; margin-top:20px;">
                <img src="<?= $order['product_image'] ?>" width="120">

                <div>
                    <p><strong><?= $order['product_name'] ?></strong></p>
                    <p>Price: $<?= number_format($order['product_price'], 2) ?></p>
                    <p>Quantity: <?= $order['quantity'] ?></p>
                    <p>Ordered on: <?= date("M d, Y", strtotime($order['order_date'])) ?></p>

                    <button>Return item</button>
                    <button>Buy again</button>
                </div>
            </div>
            <hr>
        <?php endwhile; ?>
    <?php endif; ?>
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


<script>
document.querySelector('.back').onclick = () => {
    window.scrollTo({top:0, behavior:"smooth"});
}
</script>
<script src="script.js"></script>
<script src="language-menu.js"></script>
</body>
</html>