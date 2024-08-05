<?php
require('Admin\connection.inc.php');
require('Admin\functions.inc.php');
require('functions.inc.php');
require('Add_to_cart.inc.php');
$cat_res = mysqli_query($con, "select * from categories where status=1 order by categories asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row;
}
$sql1 = "select product_id from order_detail";
$res = mysqli_query($con, $sql1);
$a = array();
while ($row = mysqli_fetch_assoc($res)) {
    // print_r($row['product_id']);
    $a[] = $row['product_id'];
}
$a = array_count_values($a);
// print_r($a);
foreach ($a as $key => $val) {
    $q = "select * from best_seller where product_id='$key'";
    $res = mysqli_query($con, $q);
    // print_r(mysqli_num_rows($res));
    if (mysqli_num_rows($res) > 0) {
        $q1 = "update best_seller set order_times='$val' where product_id='$key'";
        mysqli_query($con, $q1);
    } else {
        $q2 = "insert into best_seller(product_id,order_times) values($key,$val)";
        $res = mysqli_query($con, $q2);
    }
}

$script_name = $_SERVER['SCRIPT_NAME'];
$script_name_arr = explode('/', $script_name);
$mypage = $script_name_arr[count($script_name_arr) - 1];


$meta_title = "";
$meta_desc = "ShopMate | Ultimate Shopping Website";
$meta_keyword = "ShopMate | Ultimate Shopping Website";
$url = "";
$img = "";

if ($mypage == 'Single_Product.php') {
    $product_id = get_safe_value($con, $_GET['id']);
    $product_meta = mysqli_fetch_assoc(mysqli_query($con, "select * from product where id='$product_id'"));
    $meta_title = $product_meta['meta_title'] . " | ";
    $meta_desc = $product_meta['meta_desc'];
    $meta_keyword = $product_meta['meta_keyword'];
    $url = "localhost/E-Commerce/Single_Product.php?id=" . $product_id;
    $img = "localhost/E-Commerce//Media/Product/" . $product_meta['image'];
}
if ($mypage == 'Contact_Us.php') {
    $meta_title = 'Contact Us | ';
}
if ($mypage == 'pay.php') {
    $meta_title = 'Payment Page | ';
}
if ($mypage == 'About.php') {
    $meta_title = 'About Us | ';
}
if ($mypage == 'Cart.php') {
    $meta_title = 'Cart Page | ';
}
if ($mypage == 'Checkout.php') {
    $meta_title = 'Checkout Page | ';
}
if ($mypage == 'thankyou.php') {
    $meta_title = 'Payment Successful | ';
}
if ($mypage == 'Blog.php') {
    $meta_title = 'Blog | ';
}
if ($mypage == 'Shop.php') {
    $meta_title = 'Shop | ';
}
if ($mypage == 'Search.php') {
    $meta_title = 'Search | ';
}
if ($mypage == 'team.php') {
    $meta_title = 'Our Team | ';
}
$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();
if (isset($_SESSION['USER_LOGIN'])) {
    $uid = $_SESSION['USER_ID'];

    if (isset($_GET['wishlist_id'])) {
        $wid = get_safe_value($con, $_GET['wishlist_id']);
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
    <meta name="description" content="<?php echo $meta_desc ?>">
    <meta name="keywords" content="<?php echo $meta_keyword ?>">
    <meta property="og:title" content="<?php echo $meta_title ?>">
    <meta property="og:image" content="<?php echo $img ?>">
    <meta property="og:url" content="<?php echo $url ?>">
    <meta property="og:site_name" content="localhost/E-Commerce/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="manifest" href="/site.webmanifest">
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
        .price {
            position: absolute;
            top: 91px;
            left: 70px;
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
                right: 110px;
                top: 21px;
            }

            .htc__wishlist {
                right: 155px;
                top: 20px;
            }

            /* Cart */

            #close {
                display: initial;
                position: absolute;
                top: -390px;
                left: 22px;
                color: #222;
                font-size: 24px;
            }
        }

        #navbar li:after {
            content: "";
            position: absolute;
            background-color: #088178;
            height: 3px;
            width: 0;
            left: 20px;
            bottom: -8px;
            transition: 0.3s;
        }

        #navbar li:hover {
            color: #088178;
        }

        #navbar li:hover:after {
            width: 60%;
        }

        a {
            text-decoration: none;
        }
    </style>
    <script src="https://kit.fontawesome.com/5a29577bff.js" crossorigin="anonymous"></script>
    <title><?php echo $meta_title ?>ShopMate | Ultimate Shopping Website</title>
</head>