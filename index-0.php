<?php
require('top-0.php');
require('Header.php');
?>
<style>
    #product .pro a i:hover {
        color: red;
    }
</style>
    
<section id="banner-1">
    
    <h4>Trade-In-Offer</h4>
    <h2>Value For Money Deals</h2>
    <h1>For All Products</h1>
    <p>Save more with coupons & up to 70% off!</p>
    <button onclick="window.location.href='Search.php'">Shop Now</button>
</section>

<section id="features" class="section-p1">
    <div class="fe-box">
        <img src="./Images/features/f1.png" alt="">
        <h6>Free Shipping</h6>
    </div>
    <div class="fe-box">
        <img src="./Images/features/f2.png" alt="">
        <h6>Online Order</h6>
    </div>
    <div class="fe-box">
        <img src="./Images/features/f3.png" alt="">
        <h6>Save Money</h6>
    </div>
    <div class="fe-box">
        <img src="./Images/features/f4.png" alt="">
        <h6>Promotions</h6>
    </div>
    <div class="fe-box">
        <img src="./Images/features/f5.png" alt="">
        <h6>Happy Sell</h6>
    </div>
    <div class="fe-box">
        <img src="./Images/features/f6.png" alt="">
        <h6>F24/7 Support</h6>
    </div>
</section>

<section style="padding-top: 0px;" id="product" class="section-p1">
    <h2>Featured Products</h2>
    <p>Lorem ipsum dolor sit amet.</p>
    <div class="pro-container">
        <?php
        $get_product = get_product($con, 8);
        foreach ($get_product as $list) {
        ?>
            <div class="pro">
                <a href="single_product.php?id=<?php echo $list['id'] ?>">
                    <img src="<?php echo "./Media/Product/" . $list['image'] ?>" alt="Product Image">
                </a>
                <div class="des">
                    <span><a style="text-decoration:none; color:#606063;" href="single_product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></span>
                    <h5><a style="text-decoration:none; color:#000;" href="single_product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><s><?php echo "₹" . $list['mrp'] ?></s></h4>
                    <h4 style="padding-top: 2px;" class="price"><?php echo "₹" . $list['price'] ?></h4>
                </div>
                <!-- <a href="javascript:void(0)" style="color: #e3e6f6;" onclick="manage_cart('<?php echo $list['id'] ?>','add')"><i style="position: absolute; bottom: 75px; right: 10px; font-size: 25px; transition: 0.5s ease;" class="fa-solid fa-cart-shopping"></i></a> -->
                <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')" style="color: red;"><i style="position: absolute; bottom: 23px; right: 20px; font-size: 25px; transition: 0.5s ease;" class="fa-solid fa-heart"></i></a>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section id="banner-2" class="section-m1">
    <h4>Repair Services</h4>
    <h2>Up to <span>70% Off</span> - All t-Shirts & Accessories</h2>
    <button class="normal">Explore More</button>
</section>

<section id="product" class="section-p1">
    <h2>Best Sellers</h2>
    <p>Lorem ipsum dolor sit amet.</p>
    <div class="pro-container">
        <?php
        $best_seller = best_seller($con);
        foreach ($best_seller as $list) {
        ?>
            <div class="pro" style="height: 490px;" >
                <a href="single_product.php?id=<?php echo $list['id'] ?>">
                    <img height="350px" src="<?php echo "./Media/Product/" . $list['image'] ?>" alt="Product Image">
                </a>
                <div class="des">
                    <span><a style="text-decoration:none; color:#606063;" href="single_product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></span>
                    <h5><a style="text-decoration:none; color:#000;" href="single_product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><s><?php echo "₹" . $list['mrp'] ?></s></h4>
                    <h4 style="padding-top: 2px;" class="price"><?php echo "₹" . $list['price'] ?></h4>
                </div>
                <!-- <a href="javascript:void(0)" style="color: #e3e6f6;" onclick="manage_cart('<?php echo $list['id'] ?>','add')"><i style="position: absolute; bottom: 75px; right: 10px; font-size: 25px; transition: 0.5s ease;" class="fa-solid fa-cart-shopping"></i></a> -->
                <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')" style="color: red;"><i style="position: absolute; bottom: 23px; right: 20px; font-size: 25px; transition: 0.5s ease;" class="fa-solid fa-heart"></i></a>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section class="section-p2" id="banner-3">
    <div class="banner-box box-1">
        <h4>Crazy Deals</h4>
        <h2>Buy 1 Get 1 Free</h2>
        <span>The Best Classic Dress Is On Sale At Cara</span>
        <button class="white">Learn More</button>
    </div>
    <div class="banner-box box-2">
        <h4>Spring Sales</h4>
        <h2>Upcoming Season Sales</h2>
        <span>The Best Classic Dress Is On Sale At Cara</span>
        <button class="white">Collection</button>
    </div>
</section>

<section id="banner-4">
    <div class="banner-box box-1">
        <h2>Seasonal Sales</h2>
        <h3>Winter Collection - 50% Off</h3>
    </div>
    <div class="banner-box box-2">
        <h2>New Footwear Collection</h2>
        <h3>Winter Collection - 50% Off</h3>
    </div>
    <div class="banner-box box-3">
        <h2>Seasonal Sales</h2>
        <h3>Winter Collection - 50% Off</h3>
    </div>
</section>
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
    // function manage_cart(pid, type) {
    //     if (type == 'update') {
    //         var qty = jQuery("#" + pid + "qty").val();
    //     }
    //     jQuery.ajax({
    //         url: 'Manage_cart.php',
    //         type: 'post',
    //         data: 'pid=' + pid + '&qty=' + 1 + '&type=' + type,
    //         success: function(result) {
    //             if (type == 'update' || type == 'remove') {
    //                 window.location.href = 'Cart.php';
    //             }
    //             jQuery('.cart-total').html(result);
    //         }
    //     });
    // }

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
</script>


<?php
require('footer-0.php');
?>