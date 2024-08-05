<?php
require('Admin/connection.inc.php');
require('Admin/functions.inc.php');
require('functions.inc.php');
$email = get_safe_value($con, $_POST['email']);
$pass = get_safe_value($con, $_POST['password']);
$res=mysqli_query($con,"select * from users where email='$email' and password='$pass'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    echo "valid";
	$row=mysqli_fetch_assoc($res);
	$_SESSION['USER_LOGIN']='yes';
	$_SESSION['USER_ID']=$row['id'];
	$_SESSION['USER_NAME']=$row['name'];
	$_SESSION['USER_EMAIL']=$email;
	if(isset($_SESSION['WISHLIST_ID']) && $_SESSION['WISHLIST_ID']!=''){
		wishlist_add($con,$_SESSION['USER_ID'],$_SESSION['WISHLIST_ID']);
		unset($_SESSION['WISHLIST_ID']);
	}
}
else{
    echo "wrong";
}
