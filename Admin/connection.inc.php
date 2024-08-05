<?php
session_start();
$con=mysqli_connect('localhost','root','','ecom');
define('SERVER_PATH',$_SERVER["DOCUMENT_ROOT"].'/Xampp/htdocs/E-Commerce/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'Media/Product/');
define('PRODUCT_IMAGE_SITE_PATH','../Media/Product/');
?>