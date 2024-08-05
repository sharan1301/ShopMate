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
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'index-0.php';
    </script>
<?php
}

$script_name = $_SERVER['SCRIPT_NAME'];
$script_name_arr = explode('/', $script_name);
$mypage = $script_name_arr[count($script_name_arr) - 1];

if ($mypage == 'Wishlist.php') {
    $meta_title = 'My Wishlist';
}
$uid = $_SESSION['USER_ID'];
$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();
if (isset($_SESSION['USER_LOGIN'])) {
    $uid = $_SESSION['USER_ID'];

    if (isset($_GET['id'])) {
        $wid = get_safe_value($con, $_GET['id']);
        mysqli_query($con, "delete from wishlist where id='$wid' and user_id='$uid'");
    }

    $wishlist_count = mysqli_num_rows(mysqli_query($con, "select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}
$res = mysqli_query($con, "select wishlist.product_id,product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");
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
    <title><?php echo $meta_title . ' | ' ?> ShopMate | Ultimate Shopping Website </title>
</head>

<?php
require('Header.php');
?>

<section id="contact-banner">
    <h2 style="color:aliceblue; font-family: 'Poppins', sans-serif; font-weight:500;">#YourWishlist</h2>
    <p style="color: rgb(245, 198, 255); font-family: 'Poppins', sans-serif;">Add Your Favorite Products</p>
</section>

<div class="wishlist-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Products</th>
                                        <th class="product-name">Name Of The Product</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="Single_Product.php?id=<?php echo $row['product_id'] ?>"><img src="<?php echo './Media/Product/' . $row['image'] ?>" /></a></td>
                                            <td class="product-name"><a href="Single_Product.php?id=<?php echo $row['product_id'] ?>"><?php echo $row['name'] ?></a>
                                                <ul class="pro__prize">
                                                    <ul style="margin-right: 20px; color: rgba(255,0,0,0.75);" class="old__prize"><s>₹<?php echo $row['mrp'] ?></s></ul>
                                                    <ul style="color: #088178;">₹<?php echo $row['price'] ?></ul>
                                                </ul>
                                            </td>
                                            <td class="product-remove"><a href="Wishlist.php?id=<?php echo $row['id'] ?>"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="buttons-cart--inner">
                                    <div style="margin-left: 945px;" class="buttons-cart">
                                        <a href="<?php echo "index-0.php" ?>">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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