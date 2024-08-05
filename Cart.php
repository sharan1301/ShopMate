<?php
require('top-0.php');
require('Header.php');
$total = 0;
?>

<section id="contact-banner">
    <h2 style="color:aliceblue">#Let's_Talk</h2>
    <p style="color: rgb(245, 198, 255);">LEAVE A MESSAGE . We love to hear from you &lt;3 </p>
</section>

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <td>Remove</td>
                <td>Image</td>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Sub-Total</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $val) {
                    $productArr = get_product($con, '', '', $key);
                    $pname = $productArr[0]['name'];
                    $price = $productArr[0]['price'];
                    $image = $productArr[0]['image'];
                    $qty = $val['qty'];
                    $total += $price * $qty;
            ?>
                    <tr>
                        <td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i class="far fa-times-circle"></i></a></td>
                        <td><img src="<?php echo './Media/Product/' . $image ?>"></td>
                        <td><?php echo $pname ?></td>
                        <td id="price">₹<?php echo $price ?></td>
                        <td><input type="number" name="Quantity" id="<?php echo $key ?>qty" value="<?php echo $qty ?>"><br><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','update')">Update</a></td>
                        <td class="subtotal">₹<?php echo $price * $qty ?></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</section>

<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Apply Coupons</h3>
        <div>
            <input type="text" placeholder="Enter Your Coupoun">
            <button class="normal">Apply</button>
        </div>
    </div>
    <div id="subtotal">
        <h3>Cart Totals</h3>
        <table>
            <tr>
                <td>Cart Subtotal</td>
                <td>₹<?php echo $total ?></td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>₹<?php echo $total ?></strong></td>
            </tr>
        </table>
        <button onclick="window.location.href='Checkout.php'" class="normal">Proceed To Checkout</button>
    </div>
</section>

<script src="js/vendor/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/waypoints.min.js"></script>

<script>
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