<?php session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="language-menu.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="footer.css">
    
    

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
<!-- Sidebar Menu Items -->
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
           <p><a href="signin.php">Hello, Sign in</a></p>
           <h1>Account & Lists <img src="./assets/dropdown_icon.png" width="8px" alt=""></h1> 
        </div>
       <a href="your_orders.php" class="nav-text">
    <p>Returns</p>
    <h1>& Orders</h1>
</a>

         <a href="signin.php" class="mobile-user-icon" style="display: none;">
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
    <p class="breadcrum">Video Games > PC > Accessories</p>

   <div class="product-display">
    <div class="product-d-image"> 
        <div class="product-icons">
            <img src="./assets/product_img.jpg" alt="" width="60">
            <img src="./assets/product_img.jpg" alt="" width="60">
            <img src="./assets/product_img.jpg" alt="" width="60">
            <img src="./assets/product_img.jpg" alt="" width="60">
            <img src="./assets/product_img.jpg" alt="" width="60">
        </div>
        <div class="product-main-image">
            <img src="./assets/product_img.jpg" alt="" width="400">
        </div>
    </div>
    <div class="product-d-details"> 
        <p class="product-title">
            BENGOO G9000 Stereo Gaming Headset for PC, PS4, Xbox One, PS4 PC Xbox One PS5
            Controller,Noise Cancelling Over Ear Headphones with Microphone, LED Light,
            Bass Surround,Soft Memory Earmufs (Blue)
        </p>  
        <p class="brand-store">Visit the BENGOO store</p>
        <div class="product-rating">
            <div>
                <div>4.3<img src="./assets/rating_img.png" height="20px"></div>
                <p>104,185 ratings | Search this page</p>
            </div>
            <p><span>#1 Best Seller</span> in PC Game Headsets</p>
            <h5>10K+ bought in past month</h5>
            <hr>  
        </div>
        <div class="product-d-price">
            <div>
                <p>-35%</p>
                <h1>$<span>25</span>.99</h1>
            </div>
            <h5>List Price: <span>$39.99</span></h5>
            <p>Get Fast, <b>Free shipping with</b> <span>Amazon Prime</span></p>
            <p><span>FREE Returns</span></p>
            <p><span>Join Prime to buy this item at $22.99</span></p>
            <p>Available at a lower price from <span>other sellers </span>that may not 
             offer free Prime shipping.</p>
        </div>
        <div class="product-color-selection">
            <p>Color:<b>Blue</b></p>
            <div class="product-color-options">
                <div class="option">
                    <img src="./assets/product_img.jpg" alt="" width="30px">
                    <p>Black</p>
                </div>
                 <div class="option">
                    <img src="./assets/product_img.jpg" alt="" width="30px">
                    <p>Green</p>
                </div>
                 <div class="option">
                    <img src="./assets/product_img.jpg" alt="" width="30px">
                    <p>Pink</p>
                </div>
                 <div class="option">
                    <img src="./assets/product_img.jpg" alt="" width="30px">
                    <p>Blue</p>
                </div>
                 <div class="option">
                    <img src="./assets/product_img.jpg" alt="" width="30px">
                    <p>Purple</p>
                </div>
                 <div class="option">
                    <img src="./assets/product_img.jpg" alt="" width="30px">
                    <p>Red</p>
                </div>
            </div>
        </div>
<div class="product-info">
    <p><b>Brand</b></p> <p>BENGOO</p>
    <p><b>Model Name</b></p> <p>G9000</p>
    <p><b>Color</b></p> <p>Blue</p>
    <p><b>Form Factor</b></p> <p>Over Ear</p>
    <p><b>Connectivity Technology</b></p> <p>Wired</p>
</div>
<hr>
<div class="product-description">
    <h1>About this item</h1>
    <ul>
        <li>Multi-Platform Compatible Support Playstation 4, New 
            box One, PC, Nintendo 3Ds, Laptop, PSP, Tablet, iPad,
            Computer, Mobile Phone. Please note you need an extra
            Microsoft Adapter(Not included) when connect with an old
            version Xbox One controller.
        </li>
           <li>Surrounding Stereo Subwoofer Clear sound operating
            strong brass splendid ambient noise isolation and high 
            precision 40 mm magnetic neodymium driver, acoustic
            positioning precision enhance the sensitivity of the speaker
            unit, bringing you vivid sound field, sound clarity, shock
            feeling sound. Perfect for various games like Halo 5 
            Guardians, Metal Gear Solid,Call of Duty, Star Wars
            Battlefront, Overwatch, World of Warcraft Legion,etc.
        </li>
           <li>Noise Isolating Microphone Headset integrated 
            onmi-directional microphone can transmits high quality
            communication with its premium noise-canceling feature,
            can pick up sounds with great sensitivity and remove the
            noise, which enables you clearly deliver or recieve
            messages while you are in a game. Long flexible mic
            design very convienient to adjust angle of the microphone.
        </li>
           <li>Great Humanized Design Superior comfortable and 
            good air permeability protein over-ear pads,Muti-Points
            headbum,acord with human body engineering specification
            can reduce hearing impairement and heat sweat. Skin 
            friendly leather material for a longer period of wearing.
            Glaring LED lights designed on the earcups to highlight
            game atmosphere.
        </li>
           <li>Effortlessly Volume Control High Tensile strength,
            anti-winding braided USB cable with rotary Volume
            controller and key microphone mute effectively prevents 
            the 49-inches long cable from twining and allows you to
            control the volume easily and mute the mic as Effortless
            volume control one key mute.
        </li> 
    </ul>
</div>
    </div>
    <div class="product-d-purchase">
        <div class="title">
            <h3>Buy new:</h3> <img src="./assets/circle_icon.png" alt="" width="20px">
        </div>
        <h1 class="price">$<span>25</span>.99</h1>
        <div class="gap">
            <p>Get <b>Fast, Free shipping</b> with <span>Amazon Prime</span></p>
            <p><span>FREE Returns</span></P>
        </div>
                <div class="gap">
           <p><span>FREE delivery</span> <b>Saturday</b>,</p>
           <p><b>January 27</b> on orders shipped by Amazon over $35</p>
        </div>
                <div class="gap">
            <p>Or fastest delivery<b>Tomorrow</b>, <b>January 23</b>. Order within
                <span>10 hrs 56 mins</span></p>
        </div>
        <div class="delivery-location">
            <img src="./assets/location_icon_dark.png" alt="" width="20px">
            <p><span>Deliver to New York 10014</span></p>
        </div>
        <h2 class="product-stock"> In Stock</h2>
        <select class="product-quantity">
            <option value="1">Quantity: 1</option>
            <option value="2">Quantity: 2</option>
            <option value="3">Quantity: 3</option>
        </select>

        <form method="post" action="add_to_cart.php">

    <input type="hidden" name="product_id" value="1">
    <input type="hidden" name="product_name" value="BENGOO G9000 Gaming Headset">
    <input type="hidden" name="product_price" value="25.99">
    <input type="hidden" name="product_image" value="assets/product_img.jpg">

    <button class="btn" type="submit">Add to Cart</button>
</form>

        <button class="btn product-buy" >Buy Now</button>
        <div class="product-seller-info">
            <p>Ships from</p> <p><span>Amazon</span></p>
            <p>Sold by</p> <p><span>Bengoo Inc.</span></p>
            <p>Returns</p> <p><span>Eligible for Return, Refund or 
            Replacement within 30 days of receipt.</span></p>
            <p>Payment</p> <p><span>Secure Transaction</span></p>
        </div>
        <hr>
        <button class="product-add-list">Add to List</button>
    </div>
   </div>
  
   <div class="product-slider-with-price">
    <h2>Related Products</h2>
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
<script src="script.js"></script>
<script src="language-menu.js"></script>
</body>
</html>