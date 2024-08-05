<?php
require('Admin\connection.inc.php');
require_once('functions.inc.php');
include_once('Add_to_cart.inc.php');
include_once('Admin\functions.inc.php');
date_default_timezone_set("Asia/Calcutta");
$total = 0;
$cat_res = mysqli_query($con, "select * from categories where status=1 order by categories asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row;
}


if (isset($_SESSION['USER_LOGIN'])) {
    $uid = $_SESSION['USER_ID'];

    if (isset($_GET['wishlist_id'])) {
        $wid = get_safe_value($con, $_GET['wishlist_id']);
        mysqli_query($con, "delete from wishlist where id='$wid' and user_id='$uid'");
    }
    $wishlist_count = mysqli_num_rows(mysqli_query($con, "select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}

$script_name = $_SERVER['SCRIPT_NAME'];
$script_name_arr = explode('/', $script_name);
$mypage = $script_name_arr[count($script_name_arr) - 1];


$meta_title = "";


if ($mypage == 'Checkout.php') {
    $meta_title = 'Checkout Page | ';
}

$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
    <script>
        window.location.href = 'Cart.php';
    </script>
    <?php
}
$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$txn_id = substr(str_shuffle($str_result), 0, 20);
$str = rand();
$pay_id = md5($str);

if (isset($_POST['submit'])) {
    $address = get_safe_value($con, $_POST['address']);
    $block_no = get_safe_value($con, $_POST['block_no']);
    $city = get_safe_value($con, $_POST['city']);
    $state = get_safe_value($con, $_POST['state']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $payment_type = get_safe_value($con, $_POST['payment_type']);
    $user_id = $_SESSION['USER_ID'];
    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
        $total = $total + ($price * $qty);
    }
    $tax = ($total * 9) / 100;
    $total_price = $total + $tax;
    $payment_status = 'pending';
    if ($payment_type == 'COD') {
        $payment_status = 'success';
        $order_status = '1';
        $added_on = date('F d,Y h:i:s a');
        mysqli_query($con, "insert into orders(user_id,address,block_no,city,state,pincode,payment_type,payment_status,order_status,pay_id,txn_id,added_on,total_price) values('$user_id','$address','$block_no','$city','$state','$pincode','$payment_type','$payment_status','$order_status','$pay_id','$txn_id','$added_on','$total_price')");

        $order_id = mysqli_insert_id($con);

        foreach ($_SESSION['cart'] as $key => $val) {
            $productArr = get_product($con, '', '', $key);
            $price = $productArr[0]['price'];
            $qty = $val['qty'];

            mysqli_query($con, "insert into order_detail(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
        }
        unset($_SESSION['cart']);
    ?>
        <script>
            window.location.href = 'thankyou.php';
        </script>
    <?php
    } else {
        $payment_status = 'pending';
        $order_status = '1';
        $added_on = date('F d,Y h:i:s a');
        mysqli_query($con, "insert into orders(user_id,address,block_no,city,state,pincode,payment_type,payment_status,order_status,pay_id,txn_id,added_on,total_price) values('$user_id','$address','$block_no','$city','$state','$pincode','$payment_type','$payment_status','$order_status','$pay_id','$txn_id','$added_on','$total_price')");

        $order_id = mysqli_insert_id($con);

        foreach ($_SESSION['cart'] as $key => $val) {
            $productArr = get_product($con, '', '', $key);
            $price = $productArr[0]['price'];
            $qty = $val['qty'];

            mysqli_query($con, "insert into order_detail(order_id,product_id,qty,price,added_on) values('$order_id','$key','$qty','$price','$added_on')");
        }
    ?>
        <script>
            window.location.href = 'pay.php';
        </script>
<?php
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="./Style.css" type="text/css">
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/62b332a7b0d10b6f3e78ca52/1g666rjs1';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <style>
        .logo {
            height: 60px;
            width: 90px;
        }

        .cart-total {
            background-color: #088178;
            border-radius: 100%;
            color: #fff;
            font-size: 9px;
            height: 17px;
            line-height: 19px;
            position: absolute;
            right: 9px;
            text-align: center;
            top: -4px;
            width: 17px;
        }
        
        .htc__wishlist {
            background: #088178;
            border-radius: 100%;
            color: #fff;
            font-size: 9px;
            height: 17px;
            line-height: 19px;
            position: absolute;
            right: 9px;
            text-align: center;
            top: -5px;
            width: 17px;
        }

        @media (max-width:477px) {
            /* Cart */

            .cart-total {
                right: 60px;
                top: 4px;
            }

            /* Cart */
        }

        @media (max-width:799px) {
            /* Cart */

            .cart-total {
                right: 113px;
                top: 20px;
            }

            /* Cart */
        }

        li:after {
            content: "";
            position: absolute;
            background-color: #088178;
            height: 3px;
            width: 0;
            left: 20px;
            bottom: -8px;
            transition: 0.3s;
        }

        li:hover {
            color: #088178;
        }

        li:hover:after {
            width: 60%;
        }

        a {
            text-decoration: none;
        }
    </style>
    <script src="https://kit.fontawesome.com/5a29577bff.js" crossorigin="anonymous"></script>
    <title><?php echo $meta_title ?>Zebra.com </title>
</head>

<?php
require('Header.php');
?>

<section id="contact-banner">
    <h2 style="color:aliceblue; font-family: 'Poppins', sans-serif; font-weight:500;">#Safe_Delivery</h2>
    <p style="color: rgb(245, 198, 255); font-family: 'Poppins', sans-serif;">Delivery At Your Doorstep </p>
</section>

<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <?php
                            $accordion_class = 'accordion__title';
                            if (!isset($_SESSION['USER_LOGIN'])) {
                                $accordion_class = 'accordion__hide';
                            ?>
                                <div class="accordion__title">
                                    Checkout Method
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form action="" method="POST" id="sign-in">
                                                        <h5 class="checkout-method__title">Login</h5>
                                                        <div class="single-input">
                                                            <input type="text" name="login_email" id="login_email" placeholder="Your Email" style="width:100%">
                                                            <span class="field_error" id="login_email_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="password" name="login_pass" id="login_password" placeholder="Your Password" style="width:100%">
                                                            <span class="field_error" id="login_password_error"></span>
                                                        </div>
                                                        <div class="dark-btn">
                                                            <button type="button" style="margin-bottom:10px;" class="normal" name="login" value="login" onclick="userLogin()">Login</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form action="" method="POST" id="sign-up">
                                                        <h5 class="checkout-method__title">Register</h5>
                                                        <div class="single-input">
                                                            <input type="text" name="name" id="name" placeholder="Your Name" style="width:100%;">
                                                            <span class="field_error" id="name_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="text" name="email" id="email" placeholder="Your Email" style="width:100%;">
                                                            <span class="field_error" id="email_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="text" style="display: block; width:100%;" name="mobile" id="mobile_no" placeholder="Your Mobile">
                                                            <span class="field_error" id="mobile_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="password" name="pass" id="pass" placeholder="Your Password" style="width:100%;">
                                                            <span class="field_error" id="pass_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" style="width:100%;">
                                                            <span class="field_error" id="cpass_error"></span>
                                                        </div>
                                                        <div class="dark-btn">
                                                            <button type="button" class="normal" onclick="userRegister()" name="sign-up" value="sign-up">Sign Up</button><br>
                                                            <span class="register_msg"></span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <form method="POST" action="Checkout.php">
                                <div class="<?php echo $accordion_class; ?>">
                                    Address Information
                                </div>
                                <div class="accordion__body">
                                    <div class="bilinfo">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" autocomplete="off" placeholder="Street Address" name="address" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" autocomplete="off" placeholder="Apartment/Block/House" name="block_no" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" autocomplete="off" placeholder="City" name="city" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" autocomplete="off" placeholder="State" name="state" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" autocomplete="off" placeholder="Pin code" name="pincode" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="<?php echo $accordion_class; ?>">
                                    payment information
                                </div>
                                <div class="accordion__body">
                                    <div class="paymentinfo">
                                        <div class="single-method">
                                            <input type="radio" name="payment_type" disabled autocomplete="off" value="COD" /> COD
                                            &nbsp;&nbsp;<input type="radio" name="payment_type" value="razorpay" required /> Other Payment Method
                                            <pre style="border: none;"><p><i style="color:red;" class="fa-solid fa-exclamation"></i> <b> Currently COD Is Not Available</b></p></pre>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submit" value="submit" class="normal">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $key => $val) {
                            $productArr = get_product($con, '', '', $key);
                            $pname = $productArr[0]['name'];
                            $price = $productArr[0]['price'];
                            $image = $productArr[0]['image'];
                            $qty = $val['qty'];
                            $total += $price * $qty;
                        ?>
                            <div class="single-item">
                                <div class="single-item__thumb">
                                    <img src="<?php echo './Media/Product/' . $image ?>">
                                </div>
                                <div class="single-item__content">
                                    <a href="#"><?php echo $pname ?></a>
                                    <span id="price">₹<?php echo $price ?></span>
                                </div>
                                <div class="single-item__remove">
                                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i class="far fa-times-circle"></i></a>
                                </div>
                            </div>
                        <?php }
                        $tax = ($total * 9) / 100;
                        ?>
                    </div>
                    <div class="order-details__count">
                        <div class="order-details__count__single">
                            <h5>Sub Total</h5>
                            <span id="price">₹<?php echo $total ?></span>
                        </div>
                        <div class="order-details__count__single">
                            <h5>Tax</h5>
                            <span id="price">₹<?php echo $tax ?></span>
                        </div>
                    </div>
                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span id="price">₹<?php echo $tax + $total ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jquery latest version -->
<script src="js/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!-- Waypoints.min.js. -->
<script src="js/waypoints.min.js"></script>

<script>
    function userRegister() {
        jQuery('.field_error').html('');
        var name = jQuery("#name").val();
        var email = jQuery("#email").val();
        var mobile = jQuery("#mobile_no").val();
        var pass = jQuery("#pass").val();
        var cpass = jQuery("#cpass").val();
        var is_error = '';
        if (name == "") {
            jQuery('#name_error').html('Please enter name');
            is_error = 'yes';
        }
        if (email == "") {
            jQuery('#email_error').html('Please enter email');
            is_error = 'yes';
        }
        if (mobile == "") {
            jQuery('#mobile_error').html('Please enter mobile');
            is_error = 'yes';
        }
        if (pass == "") {
            jQuery('#pass_error').html('Please enter password');
            is_error = 'yes';
        }
        if (cpass != '') {
            if (cpass !== pass) {
                jQuery('#cpass_error').html('Password did not match');
                is_error = 'yes';
            }
        }
        if (is_error == '') {
            jQuery.ajax({
                url: 'SignUp.php',
                type: 'post',
                data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&pass=' + pass,
                success: function(result) {
                    if (result == 'email') {
                        jQuery('#email_error').html('Email id already present');
                    }
                    if (result == 'insert') {
                        jQuery('.register_msg').html('ThankYou For Registering');
                        window.location.href = window.location.href;
                    }
                }
            });
        }

    }

    function userLogin() {
        jQuery('.field_error').html('');
        var email = jQuery("#login_email").val();
        var password = jQuery("#login_password").val();
        var is_error = '';
        if (email == "") {
            jQuery('#login_email_error').html('Please enter email');
            is_error = 'yes';
        }
        if (password == "") {
            jQuery('#login_password_error').html('Please enter password');
            is_error = 'yes';
        }
        if (is_error == '') {
            jQuery.ajax({
                url: 'SignIn.php',
                type: 'post',
                data: 'email=' + email + '&password=' + password,
                success: function(result) {
                    if (result == 'wrong') {
                        jQuery('.login_msg').html('Please enter valid login details');
                    }
                    if (result == 'valid') {
                        window.location.href = window.location.href;
                    }
                }
            });
        }
    }

    function emeAccordion() {
        $('.accordion__title')
            .siblings('.accordion__title').removeClass('active')
            .first().addClass('active');
        $('.accordion__body')
            .siblings('.accordion__body').slideUp()
            .first().slideDown();
        $('.accordion').on('click', '.accordion__title', function() {
            $(this).addClass('active').siblings('.accordion__title').removeClass('active');
            $(this).next('.accordion__body').slideDown().siblings('.accordion__body').slideUp();
        });
    };
    emeAccordion();

    function manage_cart(pid, type) {
        if (type == 'update') {
            var qty = jQuery("#" + pid + "qty").val();
        } else {
            var qty = jQuery("#qty").val();
        }
        jQuery.ajax({
            url: 'Manage_cart.php',
            type: 'post',
            data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
            success: function(result) {
                if (type == 'update' || type == 'remove') {
                    window.location.href = window.location.href;
                }
                jQuery('.cart-total').html(result);
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