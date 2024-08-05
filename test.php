<?php
require('top-0.php');
require('Header.php');
$sql1="select product_id from order_detail";
$res=mysqli_query($con,$sql1);
$a=array();
while($row=mysqli_fetch_assoc($res)){
// print_r($row['product_id']);
$a[]=$row['product_id'];
}
$a=array_count_values($a);
print_r($a);
foreach($a as $key=> $val){
    $q="select * from best_seller where product_id='$key'";
    $res=mysqli_query($con,$q);
    // print_r(mysqli_num_rows($res));
    if(mysqli_num_rows($res)>0){
        $q1="update best_seller set order_times='$val' where product_id='$key'";
        mysqli_query($con,$q1);
    }
    else{
        $q2="insert into best_seller(product_id,order_times) values($key,$val)";
        $res=mysqli_query($con,$q2);
    }
}
require('footer-0.php');
?>