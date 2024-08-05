<?php
require('top-0.php');
require('Header.php');
if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($con, $_GET['id']);
    if ($product_id > 0) {
        $get_product = get_product($con, '', '', $product_id);
    } else {
?>
        <script>
            window.location.href = 'index.php';
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}

if (isset($_POST['review_submit'])) {
    $rating = get_safe_value($con, $_POST['rating']);
    $review = get_safe_value($con, $_POST['review']);

    $added_on = date('Y-m-d h:i:s');
    mysqli_query($con, "insert into product_review(product_id,user_id,rating,review,status,added_on) values('$product_id','" . $_SESSION['USER_ID'] . "','$rating','$review','1','$added_on')");

?>
    <script>
        window.location.href = window.location.href;
    </script>
<?php
    die();
}


$product_review_res = mysqli_query($con, "select users.name,product_review.id,product_review.rating,product_review.review,product_review.added_on from users,product_review where product_review.status=1 and product_review.user_id=users.id and product_review.product_id='$product_id' order by product_review.added_on desc");
?>

<section class="section-p1" id="product-details">
    <div class="single-pro-img">
        <img src="<?php echo './Media/Product/' . $get_product['0']['image'] ?>" id="main-img" width="100%" alt="">
    </div>
    <div class="single-pro-details">
        <h6><a href="index-0.php">Home</a>/<a href="Shop.php?id=<?php echo $get_product[0]['categories_id'] ?>"><?php echo $get_product[0]['categories'] ?></a>/<?php echo $get_product['0']['name'] ?></h6>
        <h4><?php echo $get_product['0']['name'] ?></h4>
        <h2><s>₹<?php echo $get_product['0']['mrp'] ?></s></h2>
        <h2>₹<?php echo $get_product['0']['price'] ?></h2>
        <!-- <select name="" id="">
                <option value="">Select Size</option>
                <option value="">XL</option>
                <option value="">XXl</option>
                <option value="">Small</option>
                <option value="">Large</option>
            </select> -->
        <div id="stock">
            <?php
            $productSoldQtyByProductId = productSoldQtyByProductId($con, $get_product['0']['id']);
            $productQuantity = productQtyByProductId($con, $get_product['0']['id']);
            $pending_qty = $productQuantity - $productSoldQtyByProductId;
            $cart_show = '';
            if ($get_product['0']['qty'] > $productSoldQtyByProductId) {
                $stock = 'In Stock';
                $cart_show = 'yes';
            } else {
                $stock = 'Out Of Stock';
            }
            ?>
            <b>Availability</b> : <?php echo $stock ?>
        </div>
        <?php
        if ($cart_show != '') {
        ?>
            <input autocomplete="off" type="number" name="" id="qty" value="1">
            <button class="normal" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add')">Add To Cart</button>
            <span id='error-cart'></span><br>
            <button class="normal" style="margin-top: 20px;" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add','yes')">Buy Now</button>
        <?php
        }
        ?>
        <h3 style="padding-top: 15px;">Share</h3>
        <div class="social-share-box">
            <style>
                .social-share-box {
                    font-size: 40px;
                    display: flex;
                    flex-direction: row;
                    margin-top: 15px;
                }

                .social-share-box i {
                    padding-right: 10px;
                }
            </style>
            <a target="_blank" href="https://facebook.com/share.php?u=<?php echo $url ?>"><i style="color:#1877f2;" class="fa-brands fa-facebook"></i></a>
            <a target="_blank" href="https://api.whatsapp.com/send?text=<?php echo urlencode($get_product['0']['name']) ?><?php echo ' http://' . $url ?>"><i style="color:green;" class="fa-brands fa-whatsapp"></i></a>
            <a target="_blank" href="https://twitter.com/share?text=<?php echo $get_product['0']['name'] ?>&url=<?php echo $url ?>"><i style="color:skyblue;" class="fa-brands fa-twitter"></i></a>
        </div>
        <h4 style="padding-top: 15px;">Product Details</h4>
        <span><?php echo $get_product['0']['description'] ?></span>
    </div>
</section>

<div class="row" style="margin: 0px 5px; border: 1px solid black;">
    <div class="col-xs-12">
        <div class="ht__pro__details__content">
            <div role="tabpanel" id="review" class="pro__single__content tab-pane fade active show">
                <h3 style="margin:5px 5px;">Reviews</h3>
                <div class="pro__tab__content__inner">
                    <?php
                    if (mysqli_num_rows($product_review_res) > 0) {
                        $i = 1;
                        while ($product_review_row = mysqli_fetch_assoc($product_review_res)) {
                    ?>
                            <article class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="panel panel-default arrow left">
                                        <div class="panel-body" style="margin:0px 5px;">
                                            <header class="text-left">
                                                <div><span class="comment-rating"> <?php echo $i . '.' . $product_review_row['rating'] ?></span> (<?php echo $product_review_row['name'] ?>)</div>
                                                <time class="comment-date">
                                                    <?php
                                                    $added_on = strtotime($product_review_row['added_on']);
                                                    echo date('d M Y', $added_on);
                                                    ?>
                                                </time>
                                            </header>
                                            <div class="comment-post">
                                                <p>
                                                    Review : <?php echo $product_review_row['review'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                    <?php
                            $i += 1;
                        }
                    } else {
                        echo "<h3 style='margin:15px 5px;' class='submit_review_hint'>No Reviews Added So Far</h3><br/>";
                    }
                    ?>

                    <h3 class="review_heading heading" style="margin:0px 5px;">Enter your review</h3><br />
                    <?php
                    if (isset($_SESSION['USER_LOGIN'])) {
                    ?>
                        <div class="row" id="post-review-box">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <select style="border-radius:5px; margin:0px 5px; height:40px; width:90%; color:#088178; font-weight:600;" class="form-control" name="rating" required>
                                        <option value="">Select Rating</option>
                                        <option>Worst</option>
                                        <option>Bad</option>
                                        <option>Good</option>
                                        <option>Very Good</option>
                                        <option>Fantastic</option>
                                    </select> <br />
                                    <textarea style="border-radius:5px; width:90%; margin:30px 5px" class="form-control" cols="50" id="new-review" name="review" placeholder="Enter your review here..." rows="5"></textarea>
                                    <div class="text-right mt10">
                                        <button style="margin:5px 5px;" class="btn btn-success btn-lg normal" style="margin:0px 5px;" type="submit" name="review_submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } else {
                        echo "<span class='submit_review_hint'>Please <a href='Form.php'>login</a> to submit your review</span>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="product" class="section-p1">
    <h2>Featured Products</h2>
    <p>Lorem ipsum dolor sit amet.</p>
    <div class="pro-container">
        <div class="pro">
            <img src="./Images/products/n1.jpg" alt="">
            <div class="des">
                <span>lorem</span>
                <h5>Lorem ipsum dolor sit.</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₹500</h4>
            </div>
        </div>
        <div class="pro">
            <img src="./Images/products/n2.jpg" alt="">
            <div class="des">
                <span>lorem</span>
                <h5>Lorem ipsum dolor sit.</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₹500</h4>
            </div>
        </div>
        <div class="pro">
            <img src="./Images/products/n3.jpg" alt="">
            <div class="des">
                <span>lorem</span>
                <h5>Lorem ipsum dolor sit.</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₹500</h4>
            </div>
        </div>
        <div class="pro">
            <img src="./Images/products/n4.jpg" alt="">
            <div class="des">
                <span>lorem</span>
                <h5>Lorem ipsum dolor sit.</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₹500</h4>
            </div>
        </div>
    </div>
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
        <img class="logo" width="140px" height="40px" src="./Images/lg.png" alt="Logo">
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
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/waypoints.min.js"></script>

<script>
    function manage_cart(pid, type, isCheckOut) {
        if (type == 'update') {
            var qty = jQuery("#" + pid + "qty").val();
        } else {
            var qty = jQuery("#qty").val();
        }
        document.getElementById('error-cart').style.color = "red";
        jQuery.ajax({
            url: 'Manage_cart.php',
            type: 'post',
            data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
            success: function(result) {
                if (type == 'update' || type == 'remove') {
                    window.location.href = 'Cart.php';
                }
                if (result == 'not_available') {
                    jQuery('#error-cart').html('Quantity Not Available.Stock Available : <?php echo $pending_qty ?>');
                }
                if (result == 'negative') {
                    jQuery('#error-cart').html('Quantity Must Be Greater Than 1');
                }
                if (result !== 'not_available' && result !== 'negative') {
                    jQuery('.cart-total').html(result);
                    jQuery('#error-cart').html('');
                    if (isCheckOut == 'yes') {
                        window.location.href = "Checkout.php";
                    }
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

</body>

</html>