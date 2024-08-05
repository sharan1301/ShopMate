<?php
date_default_timezone_set("Asia/Calcutta");
function pr($arr)
{
	echo '<pre>';
	print_r($arr);
}
function prx($arr)
{
	echo '<pre>';
	print_r($arr);
	die();
}
function get_product($con, $limit = '', $cat_id = '', $product_id = '', $search_str = '', $sort_order = '')
{
	$sql = "select product.*,categories.categories from product,categories where product.status=1 ";
	if ($cat_id != '') {
		$sql .= " and product.categories_id=$cat_id ";
	}
	if ($product_id != '') {
		$sql .= " and product.id=$product_id ";
	}
	$sql .= " and product.categories_id=categories.id ";
	if ($search_str != '') {
		$sql .= " and (product.name like '%$search_str%' or product.description like '%$search_str%' or product.short_desc like '%$search_str%') ";
	}
	if ($sort_order != '') {
		$sql .= $sort_order;
	} else {
		$sql .= " order by product.id desc ";
	}
	if ($limit != '') {
		$sql .= " limit $limit";
	}
	//echo $sql;
	$res = mysqli_query($con, $sql);
	$data = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$data[] = $row;
	}
	return $data;
}

function wishlist_add($con, $uid, $pid)
{
	$added_on = date('Y-m-d h:i:s a');
	mysqli_query($con, "insert into wishlist(user_id,product_id,added_on) values('$uid','$pid','$added_on')");
}

function best_seller($con)
{
	$q="select product_id from best_seller";
	$limit=8;
	$sql = "select product.id,product.name,product.image,product.mrp,product.price from product,best_seller where product.id=best_seller.product_id order by best_seller.order_times desc limit $limit";
	// echo $sql;
	$res = mysqli_query($con, $sql);
	$data = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$data[] = $row;
	}
	return $data;
}

function productSoldQtyByProductId($con,$pid){
	$sql="select sum(order_detail.qty) as qty from order_detail,orders where orders.id=order_detail.order_id and order_detail.product_id=$pid and orders.order_status!=4";
	$res = mysqli_query($con, $sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}

function productQtyByProductId($con,$pid){
	$sql="select qty from product where id='$pid'";
	$res = mysqli_query($con, $sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}