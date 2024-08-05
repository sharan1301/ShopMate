<?php
require('Admin/connection.inc.php');
require('Admin/functions.inc.php');
$name = get_safe_value($con, $_POST['name']);
$pass = get_safe_value($con, $_POST['pass']);
$email = get_safe_value($con, $_POST['email']);
$mobile = get_safe_value($con, $_POST['mobile']);
$time = date('F d,Y g:i:s a');
$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
if($check_user>0){
    echo "email";
}
else{
    $res=mysqli_query($con,"insert into users(name,email,mobile,password,added_on) values('$name','$email','$mobile','$pass','$time')");
    echo "insert";
}