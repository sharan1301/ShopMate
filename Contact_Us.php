<?php
require('top-0.php');
require('Header.php');
?>

<section id="contact-banner">
    <h2 style="color:aliceblue">#Let's_Talk</h2>
    <p style="color: rgb(245, 198, 255);">LEAVE A MESSAGE . We love to hear from you &lt;3 </p>
</section>

<style>
    li a {
        text-decoration: none;
        color: #465b52;
    }

    li i {
        color: #000000;
    }
</style>

<section id="contact-details" class="section-p1">
    <div class="details">
        <span>GET IN TOUCH</span>
        <h2>Visit one of our Agency locations and contact us today</h2>
        <h3>Head Office</h3>

        <div>
            <li>
                <a href="https://www.google.com/maps/dir//Anna+University,+12,+Sardar+Patel+Rd,+Anna+University,+Guindy,+Chennai,+Tamil+Nadu+600025/@13.0117697,80.2373015,18z/data=!4m9!4m8!1m0!1m5!1m1!1s0x3a52679fd80e657f:0x9727dde0ba49c84e!2m2!1d80.2364113!2d13.0123116!3e0" target="_blank"><i class="fa fa-map"></i></a>
                <p><a href="https://www.google.com/maps/dir//Anna+University,+12,+Sardar+Patel+Rd,+Anna+University,+Guindy,+Chennai,+Tamil+Nadu+600025/@13.0117697,80.2373015,18z/data=!4m9!4m8!1m0!1m5!1m1!1s0x3a52679fd80e657f:0x9727dde0ba49c84e!2m2!1d80.2364113!2d13.0123116!3e0" target="_blank">266P+952, Anna University, Guindy, Chennai, Tamil Nadu 600025</a></p>
            </li>
            <li>
                <a href="mailto: ekilli2003@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>
                <p><a href="mailto: ekilli2003@gmail.com" target="_blank">Email Will Be Updated Later</a></p>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <p> 9003630973</p>
            </li>
            <li>
                <i class="fa fa-clock"></i>
                <p> Monday to Saturday 10:00 to 18:00</p>
            </li>
        </div>
    </div>
    <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3887.3882194167536!2d80.235275!3d13.010932!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9727dde0ba49c84e!2sAnna%20University!5e0!3m2!1sen!2sin!4v1656247762285!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<section id="form-details">
    <form action="" method="post">
        <span>LEAVE AMESSAGE</span>
        <h2>We love to hear from you</h2>
        <input type="text" name="Name" id="name" placeholder="Enter Your Name">
        <input type="text" name="Email" id="email" placeholder="Enter Your Email">
        <input type="text" name="Mobile No" id="phone" placeholder="Enter Your Mobile No">
        <textarea name="Query" id="query" placeholder="Your Query/Message" cols="30" rows="10"></textarea>
        <button class="normal" id="btn" name="submit" onclick="send_message()" type="submit">Submit</button>
    </form>

    <div class="people">
        <div>
            <img src="./Images/saha.jpg" style="border-radius: 50%;" alt="people1">
            <p><span>Parithi M</span> Frontend Developer <br> Contact: +91 9361868813<br>
                Email:parithi@gmail.com
            </p>
        </div>
        <div>
            <img src="./Images/WhatsApp Image 2023-05-27 at 17.34.10.jpg" style="border-radius: 50%;" alt="people1">
            <p><span>Killivalavan E </span> Backend Developer <br> Contact: +91 9444916919<br>
                Email:killi@gmail.com
            </p>
        </div>
        <div>
            <img src="./Images/WhatsApp Image 2023-05-27 at 17.34.11.jpg" style="border-radius: 50%;" alt="people1">
            <p><span>Kesavaraja Manikandan K</span> Frontend Developer <br> Contact: +91 9360247658<br>
                Email:kesav@gmail.com
            </p>
        </div>
    </div>
</section>
<?php
require('footer-0.php');
?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>

<!-- XqOjMEzc9WENOlIlo AKNtocQAy4IAksgjbYulj  -->

<script src="js/vendor/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/waypoints.min.js"></script>

<script>
    function send_message() {
        var name = jQuery("#name").val();
        var email = jQuery("#email").val();
        var mobile = jQuery("#phone").val();
        var message = jQuery("#query").val();

        if (name == "") {
            alert('Please enter name');
        } else if (email == "") {
            alert('Please enter email');
        } else if (mobile == "") {
            alert('Please enter mobile');
        } else if (message == "") {
            alert('Please enter message');
        } else {
            jQuery.ajax({
                url: 'Contact.php',
                type: 'post',
                data: 'name=' + name + '&email=' + email + '&phone=' + mobile + '&query=' + message,
                success: function(result) {
                    alert(result);
                }
            });
        }
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