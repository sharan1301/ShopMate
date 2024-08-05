<?php
require('Admin\connection.inc.php');
require_once('functions.inc.php');
include_once('Add_to_cart.inc.php');
include_once('Admin\functions.inc.php');
$cat_res = mysqli_query($con, "select * from categories where status=1 order by categories asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row;
}

$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();
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

if($mypage=='My_Orders.php'){
	$meta_title='My Orders';
}

if (isset($_SESSION['USER_LOGIN'])) {
    $uid = $_SESSION['USER_ID'];

    if (isset($_GET['id'])) {
        $wid = get_safe_value($con, $_GET['id']);
        mysqli_query($con, "delete from wishlist where id='$wid' and user_id='$uid'");
    }

    $wishlist_count = mysqli_num_rows(mysqli_query($con, "select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
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
            height: 40px;
            width: 140px;
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
    <title><?php echo $meta_title.' | ' ?>Zebra.com </title>
</head>

<?php
require('Header.php');
?>

<section id="contact-banner">
    <h2 style="color:aliceblue; font-family: 'Poppins', sans-serif; font-weight:500;">#YourOrders</h2>
    <p style="color: rgb(245, 198, 255); font-family: 'Poppins', sans-serif;">Your orders are our FIRST PRIORITY</p>
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
                                        <th class="product-remove"><span class="nobr">Order ID</span></th>
                                        <th class="product-name"><span class="nobr">Order Date</span></th>
                                        <th class="product-price"><span class="nobr"> Address </span></th>
                                        <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                        <th class="product-stock-stauts"><span class="nobr"> Payment Stauts </span></th>
                                        <th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $uid = $_SESSION['USER_ID'];
                                    $res = mysqli_query($con, "select orders.*,order_status.name as order_status_str from orders,order_status where orders.user_id='$uid' and order_status.id=orders.order_status");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td class="product-add-to-cart"><a href="My_Orders_Details.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a>
                                            <br><a href="order_pdf.php?id=<?php echo $row['id'] ?>">Download Order PDF</a></td>
                                            <td class="product-name"><?php echo $row['added_on'] ?></td>
                                            <td class="product-name"><?php echo ucfirst($row['block_no']) . ',' . ucfirst($row['address']) . ',' . ucfirst($row['city']) . ',' . ucfirst($row['state']) . '-' . ucfirst($row['pincode']) . '.' ?></td>
                                            <td class="product-name"><?php echo ucfirst($row['payment_type']) ?></td>
                                            <td class="product-name"><?php echo ucfirst($row['payment_status']) ?></td>
                                            <td class="product-name"><?php echo ucfirst($row['order_status_str']) ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
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
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="js/main.js"></script>

<?php
require('footer-0.php');
?>