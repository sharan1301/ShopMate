<?php
require('top-0.php');
if (!isset($_GET['id']) && $_GET['id'] != '') {
?>
    <script>
        window.location.href = 'index-0.php';
    </script>

<?php
}
$cat_id = mysqli_real_escape_string($con, $_GET['id']);

$price_high_selected = "";
$price_low_selected = "";
$new_selected = "";
$old_selected = "";
$sort_order = "";
if (isset($_GET['sort'])) {
    $sort = mysqli_real_escape_string($con, $_GET['sort']);
    if ($sort == "price_high") {
        $sort_order = " order by product.price desc ";
        $price_high_selected = "selected";
    }
    if ($sort == "price_low") {
        $sort_order = " order by product.price asc ";
        $price_low_selected = "selected";
    }
    if ($sort == "new") {
        $sort_order = " order by product.id desc ";
        $new_selected = "selected";
    }
    if ($sort == "old") {
        $sort_order = " order by product.id asc ";
        $old_selected = "selected";
    }
}
if ($cat_id > 0) {
    $get_product = get_product($con, '', $cat_id, '', '', $sort_order);
    
    $no=count($get_product);
} else {
?>
    <script>
        window.location.href = 'index-0.php';
    </script>
<?php
}
?>

<?php
require('Header.php');
?>

<section id="shop-banner">
    <h2>#StayHome</h2>
    <p>Save more with coupons & up to 70% off!</p>
</section>

<div class="path">
    <h4>> <a href="index-0.php">Home</a> / <a href="Shop.php?id=<?php echo $get_product[0]['categories_id'] ?>"><?php echo $get_product[0]['categories'] ?></a></h2>
    <style>
        .path h4{
            font-size: 15px;
            color: #000;
            font-family: 'Roboto', sans-serif;
            font-weight: normal;
            text-decoration: underline;
            margin: 15px 0 0 15px;
            letter-spacing: 0.3px;
        }
        .path h4 a {
            color: #000;
        }
    </style>
</div>

<div style="margin:30px 30px 0px 30px" class="dropdown">
    <select style="border-radius:5px; height:40px; width:150px; color:#088178; font-weight:600;" name="" id="sort_product_id" onchange="sort_product_drop('<?php echo $cat_id ?>')">
        <option value="">Default</option>
        <option <?php echo $price_low_selected ?> value="price_low">Price Low To High</option>
        <option <?php echo $price_high_selected ?> value="price_high">Price High To Low</option>
        <option <?php echo $new_selected ?> value="new">Latest</option>
        <option <?php echo $old_selected ?> value="old">Oldest</option>
    </select>
</div>
<p style="margin-bottom: 0px;" class="list-count"><?php echo $no.' ' ?>Products Found For <?php echo $get_product[0]['categories'] ?></p>
<style>
    .list-count {
        margin-left: 35px;
        font-weight: bold;
        color: #000;
    }
</style>
<section style="padding-top: 0px;" id="product" class="section-p1">
    <?php
        if (count($get_product) > 0) { ?>
        <div class="pro-container">
            <?php
            foreach ($get_product as $list) {
            ?>
                <div class="pro">
                    <a href="Single_Product.php?id=<?php echo $list['id'] ?>"><img src="<?php echo "./Media/Product/" . $list['image'] ?>" alt=""></a>
                    <div class="des">
                        <span>lorem</span>
                        <h5><?php echo $list['name'] ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4><s>₹<?php echo $list['mrp'] ?></s></h4>
                        <h4>₹<?php echo $list['price'] ?></h4>
                    </div>
                    <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')" style="color: red;"><i style="position: absolute; bottom: 23px; right: 10px; font-size: 25px; transition: 0.5s ease;" class="fa-solid fa-heart"></i></a>
                </div>
            <?php } ?>
        </div>
    <?php
    } else {
        echo "Data not found";
    } ?>
</section>

<section class="section-p1" id="pagination">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fa-solid fa-arrow-right-long"></i></a>
</section>

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
        <img class="logo" height="100px"  src="./Images/lg.png" alt="Logo">
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
        <a href="#">About Us</a>
        <a href="#">Deliery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">Contact Us</a>
    </div>
    <div class="col">
        <h4>My Account</h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
    </div>
    <div class="col install">
        <h4>Install App</h4>
        <p>From App Store or Google Play</p>
        <div class="row">
            <img src="./Images/pay/app.jpg" alt="">
            <img src="./Images/pay/play.jpg" alt="">
        </div>
        <p>Secured Payment Gateways</p>
        <img src="./Images/pay/pay.png" alt="">
    </div>
    <div class="end">
        <p>Copyright &copy; 2022 CEG CSE Students And Designed by <a href="https://ceg.annauniv.edu">CEG
                Students</a></p>
    </div>
</footer>
<script src="js/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!-- Waypoints.min.js. -->
<script src="js/waypoints.min.js"></script>
<script src="js/custom.js"></script>

<script>
    function wishlist_manage(pid, type) {
        jQuery.ajax({
            url: 'wishlist_manage.php',
            type: 'post',
            data: 'pid=' + pid + '&type=' + type,
            success: function(result) {
                if (result == 'not_login') {
                    window.location.href = 'Form.php';
                } else {
                    jQuery('.htc__wishlist').html(result);
                }
            }
        });
    }

    const bar = document.getElementById('bar');
    const navbar = document.getElementById('navbar');
    const close = document.getElementById('close');

    if (bar) {
        bar.addEventListener('click', () => {
            navbar.classList.add('active');
        })
    }
    if (close) {
        close.addEventListener('click', () => {
            navbar.classList.remove('active');
        })
    }

    function sort_product_drop(cat_id, site_path) {
        var sort_product_id = jQuery('#sort_product_id').val();
        window.location.href = 'Shop.php?id=' + cat_id + "&sort=" + sort_product_id;
    }
</script>

</body>

</html>