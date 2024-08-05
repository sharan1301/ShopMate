<?php
require('top-0.php');
require('Header.php');
$res = mysqli_query($con, 'select * from orders ORDER BY id DESC LIMIT 1');
$row = mysqli_fetch_assoc($res);
// prx($row);

$id=$row['id'];
$res1=mysqli_query($con, "update orders set payment_status='success' where id='$id'");
$amt = $row['total_price'];
$id = $row['user_id'];
$sql = "select * from users where id='$id'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
?>
<style>
    .razor-pay {
        position: relative;
        display: flex;
        flex-direction: row;
        margin: 60px;
    }
    .content{
        text-align: justify;
        margin-right: 40px;
    }
    .flow{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 300px;
        width: 100%;
    }
    .pay-form{
        margin-top: 30px;
        position: absolute;
        bottom: -15px;
        left: 500px;
    }
</style>
<div class="razor-pay">
    <div class="content">
        <h2>RazorPay</h2>
        <p>For a long time, we have felt that enabling frictionless transactions is a major problem and nobody seems to be doing it right. We decided to tackle it ourselves. Founded by IIT Roorkee alumni, Razorpay aims to revolutionize money management for online businesses by providing clean, developer-friendly APIs and hassle-free integration. We offer a fast, affordable and secure way for merchants, schools, ecommerce and other companies to accept and disburse payments online, own a fully-functional current account and avail working capital loans.</p>
    </div>
    <div class="flow">
        <marquee behavior="" direction="up"><img src="https://razorpay.com/build/browser/static/merchants.9edaff14.png" height="1261px" width="480px" alt="Home"></marquee>
    </div>
    <div class="pay-form">
            <form>
                <button type="button" onclick="pay_now()" class="normal">Pay With RazorPay</button>
            </form>
        </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function pay_now() {
        var name = '<?php echo $row['name'] ?>';
        var email = '<?php echo $row['email'] ?>';
        var mobile = '<?php echo $row['mobile'] ?>';
        var amount = '<?php echo $amt ?>';

        jQuery.ajax({
            success: function(result) {
                var options = {
                    "key": "rzp_test_4an13tcj0w62KA",
                    "amount": amount * 100,
                    "currency": "INR",
                    "name": "ShopMate",
                    "description": "Purchase Of Products",
                    "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                    "theme": {
                        "color": "#e3e6f6"
                    },
                    "prefill": {
                        "name": name,
                        "email": email,
                        "contact": mobile
                    },
                    "handler": function(response) {
                        jQuery.ajax({
                            type: 'post',
                            url: 'payment_process.php',
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function(result) {
                                window.location.href = "thankyou.php";
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });


    }
</script>

<?php
require('footer-0.php');
?>