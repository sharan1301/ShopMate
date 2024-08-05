<body>
    <header id="header">
        <a href="http://localhost/E-Commerce/index-0.php"><img src="./Images/lg.png" height="60px" width="90px" class="logo" alt="Logo"></a>
        <div class="">
            <ul id="navbar">
                <li class="active"><a href="index-0.php">Home</a></li>
                <li><a href="Search.php">Shop</a></li>
                <li><a href="Blog.php">Blog</a></li>
                <li><a href="About.php">About</a></li>
                <li><a href="Contact_Us.php">Contact</a></li>
                <?php if (isset($_SESSION['USER_LOGIN'])) {
                    echo '<li><a href="My_Orders.php">My Orders</a> </li><li><a href="logout.php">Logout</a></li><li><a>Welcome '.$_SESSION['USER_NAME'].'</a></li>';
                } else {
                    echo '<li><a href="Form.php">Log In/Sign Up</a></li>';
                }
                ?>
                <li id="lg-cart"><a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="Cart.php"><span class="cart-total"><?php echo $totalProduct ?></span></a>
                </li>

                <?php if (isset($_SESSION['USER_ID'])) { ?>
                    <li id="lg-cart"><a href="Wishlist.php"><i class="fa-solid fa-heart"></i></a>
                        <a href="Wishlist.php"><span class="htc__wishlist"><?php echo $wishlist_count ?></span></a>
                    </li>

                <?php } ?>
                <li><a href="#" id="close"><i class="fa-solid fa-xmark"></i></a></li>
            </ul>
        </div>
        <div id="mobile">
            <a href="Cart.php"><i class="fa-solid fa-cart-shopping"></i>
                <a href="cart.php"><span class="cart-total"><?php echo $totalProduct ?></span></a></a>
            <?php if (isset($_SESSION['USER_ID'])) { ?>
                <a href="Wishlist.php"><i class="fa-solid fa-heart"></i>
                    <a href="Wishlist.php"><span class="htc__wishlist"><?php echo $wishlist_count ?></span></a></a>


            <?php } ?>
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>
    </header>