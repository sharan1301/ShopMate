<section id="news-letter" class="section-p1 section-m1">
    <div class="news-text">
        <h4>Sign Up For Newsletters</h4>
        <p>Get E-Mail Updates About Our Latest Shop And Latest <span>Special Offers</span>.</p>
    </div>
    <div class="form">
        <input type="text" placeholder="Your Email Address" name="" id="">
        <button class="normal">Sign Up</button>
    </div>
</section>

<footer id="footer" class="section-p1">
    <div class="col">
        <img class="logo"   height="70px" width="100px"  src="./Images/lg.png" alt="Logo">
        <h4>Contact</h4>
        <p><strong>Address : </strong>266P+952, Anna University, Guindy, Chennai, Tamil Nadu 600025</p>
        <p><strong>Phone : </strong>044 - 2235 8314 / 044 - 2235 7295</p>
        <p><strong>Hours : </strong>10:00 - 18:00 Mon - Sat</p>
        <div class="follow">
            <h4>Follow Us</h4>
            <div class="icon">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>
    </div>
    <div class="col">
        <h4>About</h4>
        <a href="About.php">About Us</a>
        <a href="#">Deliery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="Contact_Us.php">Contact Us</a>
    </div>
    <div class="col">
        <h4>My Account</h4>
        <?php if (isset($_SESSION['USER_LOGIN'])) {
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="Form.html">Log In/Sign Up</a>';
        }
        ?>
        <a href="Cart.php">View Cart</a>
        <a href="wishlist.php">My Wishlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
    </div>
    <div class="col install">
        <h4>Install App</h4>
        <p>From App Store or Google Play</p>
        <div class="row">
            <a href="https://apps.apple.com/us/app/amazon-shopping/id297606951" target="_blank"><img src="./Images/pay/app.jpg" alt=""></a>
            <a href="https://play.google.com/store/apps/details?id=in.amazon.mShop.android.shopping&hl=en_IN&gl=US" target="_blank"><img src="./Images/pay/play.jpg" alt=""></a>
        </div>
        <p>Secured Payment Gateways</p>
        <img src="./Images/pay/pay.png" alt="">
    </div>
    <div class="end">
        <p>Copyright &copy; 2023 CEG CSE Students And Designed by <a href="https://ceg.annauniv.edu">CEG Students</a></p>
    </div>
</footer>

</body>

<script src="js/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!-- Waypoints.min.js. -->
<script src="js/waypoints.min.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="js/main.js"></script>

</html>