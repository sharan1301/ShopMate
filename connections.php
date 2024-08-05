<?php
require('Admin\connection.inc.php');
require('functions.inc.php');
$cat_res = mysqli_query($con, "select * from categories order by categories asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
	$cat_arr[] = $row;
}
?>

