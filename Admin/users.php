<?php
    require('top.inc.php');
    if(isset($_GET['type']) && $_GET['type']!=''){
        $type=get_safe_value($con,$_GET['type']);
        
        if($type=='delete'){
            $id=get_safe_value($con,$_GET['id']);
            $delete="delete from users where id='$id'";
            mysqli_query($con,$delete);
        }
    }
    $sql="select * from users order by id desc";
    $res=mysqli_query($con,$sql);
?>

<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Users </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">S.No</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)){ ?>
                                    <tr>
                                        <td class="serial"><?php echo $i?>.</td>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['mobile'] ?></td>
                                        <td><?php echo $row['added_on'] ?></td>
                                        <td>
                                            <?php 
                                                echo '&nbsp;<span class="badge" style="background-color:rgba(255,0,0,0.7);"><a style="color:#fff;" href="?type=delete&id='.$row['id'].'">Delete</a></span>';
                                            ?>
                                        </td>
                                    </tr>
                                    <?php $i+=1; } ?>
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

