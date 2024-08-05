<?php
require('top-0.php');
require('Header.php');


?>
<section id="shop-banner">
    <h2>#StayHome</h2>
    <p>Search The Products</p>
</section>
<div class="path">
<h4>><a href="index-0.php">Home</a>/<a href="Search.php">Search</a>
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
<section id="news-letter" style="background:#e3e6f6; display:flex; justify-content:center; align-items:center;" class="section-p1 section-m1">
    <div class="form">
        <form action="search_product.php" method="get" style="display:flex; flex-direction:row;">
            <input autocomplete="off" style="width:386px;" type="text" placeholder="Enter The Product Name" name="str" id="">
            <button class="normal">Search</button>
        </form>
    </div>
</section>
<div class="topic" style="display:flex; justify-content:center; align-items:center;">
    <h2>Categories</h2>
</div>
<section style="padding-top:10px;" id="product" class="section-p1">
    <div class="pro-container">
        <?php
        foreach ($cat_arr as $list) {
        ?>
            <div class="pro">
                <a href="Shop.php?id=<?php echo $list['id'] ?>">
                <div class="des">
                    <span>Category</span>
                    <h5><?php echo $list['categories'] ?></h5>
                </div></a>
            </div>
        <?php } ?>
    </div>
</section>
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