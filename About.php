<?php
require('top-0.php');
require('Header.php');
?>

<section id="about-banner">
    <h2 style="color:aliceblue">#KnowUs</h2>
    <p style="color:">Read all case studies about our products..!!</p>
</section>
<section id="about-head" class="section-p1">
    <img src="./Images/about/a6.jpg" alt="img">
    <div>
        <h2>Who We are?</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus sequi natus laboriosam officia optio
            pariatur consequuntur iure id similique, voluptas, accusantium alias velit a deleniti, excepturi
            quibusdam commodi recusandae rerum omnis laudantium quas nesciunt nulla. Labore obcaecati eos rerum
            dolorem illo accusantium voluptatum ab quis minima expedita, odio, nisi inventore! Lorem ipsum dolor sit
            amet consectetur adipisicing elit. Maxime quia quaerat sint error eaque illum impedit! Sed in
            accusantium veniam.
        </p>
        <abbr title="ABOUT">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem at dolorum placeat
            perspiciatis. Mollitia laboriosam architecto vel amet deleniti magnam.
        </abbr>
        <br><br>
        <marquee bgcolor="#ccc" width="100%" loop="-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo
            saepe eum voluptate voluptas nihil commodi.
        </marquee>
    </div>
</section>
<section id="about-app" class="section-p1">
    <h1 style="text-align: center;">Download Our <a href="">App</a> </h1>
    <div id="video"> <video autoplay muted loop src="./Images/about/1.mp4"></video></div>
</section>

<iframe src="" name="box" frameborder="0"></iframe>

<!-- <section class="section-p1" id="pagination">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa-solid fa-arrow-right-long"></i></a>
    </section> -->

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
        <img class="logo" width="100px" height="60px" src="./Images/lg.png" alt="Logo">
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