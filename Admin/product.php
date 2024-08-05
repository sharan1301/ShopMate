<?php
require('top.inc.php');
require('../functions.inc.php');
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);
        if ($operation == 'active') {
            $status = 1;
        } else {
            $status = 0;
        }
        $update_status = "update product set status='$status' where id='$id'";
        mysqli_query($con, $update_status);
    }
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete = "delete from product where id='$id'";
        mysqli_query($con, $delete);
    }
}
$sql = "select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res = mysqli_query($con, $sql);
?>

<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Products </h4>
                        <h4 class="box-link"><a href="manage_products.php">Add Products</a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">S.No</th>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>MRP</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) { 
                                    $productSoldQtyByProductId = productSoldQtyByProductId($con, $row['id']);
                                    $productQuantity = productQtyByProductId($con, $row['id']);
                                    $pending_qty = $productQuantity - $productSoldQtyByProductId;?>
                                        <tr>
                                            <td class="serial"><?php echo $i ?>.</td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['categories'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><img src="<?php echo
                                                            PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" /></td>
                                            <td><?php echo $row['mrp'] ?></td>
                                            <td><?php echo $row['price'] ?></td>
                                            <td><?php echo $row['qty'] ?></br>Pending Qty : <?php echo $pending_qty ?></td>
                                            <td>
                                                <?php
                                                if ($row['status'] == 1) {
                                                    echo '<span class="badge badge-complete"><a style="color:#fff;" href="?type=status&operation=deactive&id=' . $row['id'] . '">Active</a></span>&nbsp;';
                                                } else {
                                                    echo '<span class="badge badge-pending"><a style="color:#fff;" href="?type=status&operation=active&id=' . $row['id'] . '">Deactive</a></span>&nbsp;';
                                                }
                                                echo '<span class="badge" style="background-color:rgba(0,0,255,0.7);"><a style="color:#fff;"href="manage_products.php?id=' . $row['id'] . '">Edit</a></span>';
                                                echo '&nbsp;<span class="badge" style="background-color:rgba(255,0,0,0.7);"><a style="color:#fff;" href="?type=delete&id=' . $row['id'] . '">Delete</a></span>';
                                                ?>
                                            </td>
                                        </tr>
                                    <?php $i += 1;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('footer.inc.php');
?>