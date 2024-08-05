<?php
require('top-0.php');
require('Header.php');
?>

<section id="blog-banner">
    <h2>#ReadMore</h2>
    <p>Read all case studies about our products..!!</p>
</section>
<section id="blog">
    <div class="blog-box">
        <div class="blog-img">
            <img src="./Images/blog/b1.jpg" alt="">
        </div>
        <div class="blog-details">
            <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, qui.</h4>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. At necessitatibus omnis quod veritatis
                suscipit mollitia aliquam alias qui atque numquam.
            </p>
            <a href="#">CONTINUE READING ------</a>
        </div>
        <h1>13/01</h1>
    </div>
    <div class="blog-box">
        <div class="blog-img">
            <img src="./Images/blog/b2.jpg" alt="">
        </div>
        <div class="blog-details">
            <h4>Navigating the Challenges of Digital Payment</h4>
            <p>
            Digital payment methods have undoubtedly brought convenience and efficiency to the realm of commerce, but they are not without their hardships. One challenge is the potential for security breaches and fraudulent activities, putting consumers' sensitive financial information at risk.
            </p>
            <a href="#">CONTINUE READING ------</a>
        </div>
        <h1>13/02</h1>
    </div>
    <div class="blog-box">
        <div class="blog-img">
            <img src="./Images/blog/b3.jpg" alt="">
        </div>
        <div class="blog-details">
            <h4>The Evolution of E-Commerce Websites: Transforming the Way We Shop</h4>
            <p>
            E-commerce websites have revolutionized the way we shop by providing convenience and accessibility to consumers worldwide. With user-friendly interfaces, comprehensive product catalogs, and secure payment gateways
            </p>
            <a href="#">CONTINUE READING ------</a>
        </div>
        <h1>13/03</h1>
    </div>
    <div class="blog-box">
        <div class="blog-img">
            <img src="./Images/blog/b4.jpg" alt="">
        </div>
        <div class="blog-details">
            <h4>Exploring the Benefits and Challenges of Personalized Online Shopping Experiences</h4>
            <p>
            Online shopping has transformed the way we shop, offering a seamless and convenient experience. With just a few clicks, consumers can explore an extensive range of products, compare prices, and make purchases from the comfort of their own homes. The ability to shop anytime, anywhere has made online shopping a preferred choice for many, providing a hassle-free and personalized retail experience.
            </p>
            <a href="#">CONTINUE READING ------</a>
        </div>
        <h1>13/04</h1>
    </div>
    <div class="blog-box">
        <div class="blog-img">
            <img src="./Images/blog/b5.jpg" alt="">
        </div>
        <div class="blog-details">
            <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, qui.</h4>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. At necessitatibus omnis quod veritatis
                suscipit mollitia aliquam alias qui atque numquam.
            </p>
            <a href="#">CONTINUE READING ------</a>
        </div>
        <h1>13/05</h1>
    </div>
</section>

<section class="section-p1" id="pagination">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fa-solid fa-arrow-right-long"></i></a>
</section>

<?php
require('footer-0.php');
?>

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

</body>

</html>