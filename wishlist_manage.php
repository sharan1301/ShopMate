<?php
require('Admin/connection.inc.php');
require('Admin/functions.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
date_default_timezone_set("Asia/Calcutta");

$pid=get_safe_value($con,$_POST['pid']);
$type=get_safe_value($con,$_POST['type']);

if(isset($_SESSION['USER_LOGIN'])){
	$uid=$_SESSION['USER_ID'];
	if(mysqli_num_rows(mysqli_query($con,"select * from wishlist where user_id='$uid' and product_id='$pid'"))>0){
	}else{
		wishlist_add($con,$uid,$pid);
	}
	echo $total_record=mysqli_num_rows(mysqli_query($con,"select * from wishlist where user_id='$uid'"));
}else{
	$_SESSION['WISHLIST_ID']=$pid;
	echo "not_login";
}
