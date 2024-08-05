<?php
require('Admin/connection.inc.php');
require('Admin/functions.inc.php');
date_default_timezone_set("Asia/Calcutta");
$name = get_safe_value($con, $_POST['name']);
$email = get_safe_value($con, $_POST['email']);
$mobile = get_safe_value($con, $_POST['phone']);
$query = get_safe_value($con, $_POST['query']);
$time = date('F d,Y h:i:s a');
$sql_query = "insert into contact_us(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$query','$time')";
mysqli_query($con, $sql_query);
echo 'Thank You';
?>
