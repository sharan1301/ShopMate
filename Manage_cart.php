<?php
require('Admin/connection.inc.php');
require('Admin/functions.inc.php');
require('functions.inc.php');
require('Add_to_cart.inc.php');

$pid = get_safe_value($con, $_POST['pid']);
$qty = get_safe_value($con, $_POST['qty']);
$type = get_safe_value($con, $_POST['type']);
$productSoldQtyByProductId = productSoldQtyByProductId($con, $pid);
$productQuantity = productQtyByProductId($con, $pid);

$pending_qty = $productQuantity - $productSoldQtyByProductId;


if ($qty>0 && $qty > $pending_qty && !($type == 'update' || $type == 'remove')) {
	echo 'not_available';
	die();
}


if($qty>0 && $qty<=$pending_qty && $type=='add'){
	

	$obj=new add_to_cart();
	
	if($type=='add'){
		$obj->addProduct($pid,$qty);
	}
	
	if($type=='remove'){
		$obj->removeProduct($pid);
	}
	
	if($type=='update'){
		$obj->updateProduct($pid,$qty);
	}
	
	echo $obj->totalProduct();
	}
	

if ($qty>0 && $qty > $pending_qty && ($type == 'remove')) {


	$obj = new add_to_cart();

	if ($type == 'add') {
		$obj->addProduct($pid, $qty);
	}

	if ($type == 'remove') {
		$obj->removeProduct($pid);
	}

	if ($type == 'update') {
		$obj->updateProduct($pid, $qty);
	}

	echo $obj->totalProduct();
}


if ($qty <= $pending_qty && ($type == 'update')) {


	$obj = new add_to_cart();

	if ($type == 'add') {
		$obj->addProduct($pid, $qty);
	}

	if ($type == 'remove') {
		$obj->removeProduct($pid);
	}

	if ($type == 'update') {
		$obj->updateProduct($pid, $qty);
	}

	echo $obj->totalProduct();
}

if($qty<0){
	echo 'negative';
}

?>