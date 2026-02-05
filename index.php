<?php
// Start session to access logged-in user information
session_start();

// Include database connection file
include "config/db.php";
?>


<!-- This is the main landing page for the Amazon clone. It includes the header, product listings, and footer. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Clone</title>

    <link rel="icon" href="amazon-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
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
   <p>Return</p>
   <h1>& Orders</h1>
</a>

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

<div class="header-Slider">
    <a href="#" class="control_prev">&#129144</a>
    <a href="#" class="control_next">&#129146</a>
      <ul>
        <img src="./assets/header1.jpg" class="header-img" alt="">
        <img src="./assets/header2.jpg" class="header-img" alt="">
        <img src="./assets/header3.jpg" class="header-img" alt="">
        <img src="./assets/header4.jpg" class="header-img" alt="">
        <img src="./assets/header5.jpg" class="header-img" alt="">
        <img src="./assets/header6.jpg" class="header-img" alt="">
    </ul>
</div>
<div class="box-row header-box">
    <div class="box-col"> 
        <h3>Free International returns</h3>
        <img src="./assets/box1-1.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Lunar Near Year</h3>
        <img src="./assets/box1-2.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Toy Under $25</h3>
        <img src="./assets/box1-3.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Deals in PCs</h3>
        <img src="./assets/box1-4.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
</div>
<div class="box-row">
    <div class="box-col"> 
        <h3>Grooming Products</h3>
        <img src="./assets/box1-1.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Latest Devices</h3>
        <img src="./assets/box2-2.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Pets Food</h3>
        <img src="./assets/box2-3.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Fashion Mart</h3>
        <img src="./assets/box2-4.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
</div>

<div class="products-slider">
    <h2>Best Sellers in Sports & Outdoors</h2>
    <div class="products">
        <img src="./assets/product1-1.jpg" alt="">
        <img src="./assets/product1-2.jpg" alt="">
        <img src="./assets/product1-3.jpg" alt="">
        <img src="./assets/product1-4.jpg" alt="">        
        <img src="./assets/product1-5.jpg" alt="">
        <img src="./assets/product1-6.jpg" alt="">
        <img src="./assets/product1-6.jpg" alt="">
        <img src="./assets/product1-7.jpg" alt="">
        <img src="./assets/product1-8.jpg" alt="">
        <img src="./assets/product1-9.jpg" alt="">
        <img src="./assets/product1-10.jpg" alt="">
    </div>
</div>

<div class="box-row">
    <div class="box-col"> 
        <h3>Stationery</h3>
        <img src="./assets/box3-1.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Laptops for study</h3>
        <img src="./assets/box3-2.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Office Chairs</h3>
        <img src="./assets/box3-3.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Gaming Monitor</h3>
        <img src="./assets/box3-4.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
</div>

<div class="product-slider-with-price">
    <h2>Deals Under $25</h2>
    <div class="products">
        <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-1.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
             <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-2.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
             <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-3.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
             <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-4.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
             <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-5.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
             <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-6.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
             <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-7.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
             <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-8.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
             <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-9.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
             <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-10.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
             <div class="product-card">
            <div class="product-img-continer">
                <img src="./assets/product2-11.jpg" alt="">
            </div>
            <div class="product-offer">
                <p>27% off </p> <span>Deal</span>
            </div>
            <p class="product-price">$<span>14.49</span>List Price:$19.95</p>
            <h4>This product is the best for you</h4>
            </div>
         </div>
    </div>

</div>

<div class="products-slider">
    <h2>Best Sellers in Sports & Outdoors</h2>
    <div class="products">
        <a href="product.php">
            <img src="./assets/product_img.jpg" alt="">
        </a>
        <img src="./assets/product1-1.jpg" alt="">
        <img src="./assets/product1-2.jpg" alt="">
        <img src="./assets/product1-3.jpg" alt="">
        <img src="./assets/product1-4.jpg" alt="">        
        <img src="./assets/product1-5.jpg" alt="">
        <img src="./assets/product1-6.jpg" alt="">
        <img src="./assets/product1-6.jpg" alt="">
        <img src="./assets/product1-7.jpg" alt="">
        <img src="./assets/product1-8.jpg" alt="">
        <img src="./assets/product1-9.jpg" alt="">
        <img src="./assets/product1-10.jpg" alt="">
    </div>
</div>

<div class="box-row">
    <div class="box-col"> 
        <h3>Gaming Products</h3>
        <img src="./assets/box2-1.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Latest Devices</h3>
        <img src="./assets/box2-2.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Pets Food</h3>
        <img src="./assets/box2-3.jpg" alt="">
        <a href="/">Shop More</a>
    </div>
    <div class="box-col">
        <h3>Fashion Mart</h3>
        <img src="./assets/box2-4.jpg" alt="">
        <a href="/">Shop More</a>
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


<script>
document.querySelector('.back').onclick = () => {
    window.scrollTo({top:0, behavior:"smooth"});
}
</script>
<script src="language-menu.js"></script>

</body>
</html> 