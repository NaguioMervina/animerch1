<?php 
$condition='';
$condition1='';

include("includes/admindb.php");

    if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('adminlogin.php','_self')</script>";
    }
    
        if(isset($_GET['type']) && $_GET['type']!=''){
            $type=get_safe_value($con,$_GET['type']);
            if($type=='status'){
                $operation=get_safe_value($con,$_GET['operation']);
                $id=get_safe_value($con,$_GET['id']);
                if($operation=='active'){
                    $status='1';
                }else{
                    $status='0';
                }
                $update_status_sql="update products set status='$status' $condition1 where id='$id'";
                mysqli_query($con,$update_status_sql);
            }
            
            if($type=='delete'){
                $id=get_safe_value($con,$_GET['id']);
                $delete_sql="delete from products where id='$id' $condition1";
                mysqli_query($con,$delete_sql);
            }
        
     
$sql="select products.*,categories.categories from products,categories where products.categories_id=categories.id $condition order by products.id desc";
$res=mysqli_query($con,$sql);
        ?>


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Products
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> View Products
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Product ID:</th>
                                <th>Product Title:</th>
                                <th>Product Image:</th>
                                <th>Product Price:</th>
                                <th>Product Sold:</th>
                                <th>Product Keywords:</th>
                                <th>Product Date:</th>
                                <th>Product Delete:</th>
                                <th>Product Edit:</th>
                                <th>Product Status:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $i=0;
                            
                                $get_pro="select * from products";
                                $run_pro = mysqli_query($con,$get_pro);
                                while($row_pro=mysqli_fetch_array( $run_pro)){
                                    $pro_id = $row_pro['product_id'];
                                    $pro_title = $row_pro['product_title'];
                                    $pro_img1 = $row_pro['product_img1'];
                                    $pro_price = $row_pro['product_price'];
                                    $pro_keywords = $row_pro['product_keywords'];
                                    $pro_date= $row_pro['date'];

                                    $i++;
                               
                            
                            
                            ?>

                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $pro_title ;?></td>
                                <td><img src="product_images/<?php echo $pro_img1;?>" width="60" height="60"></td>
                                <td><?php echo $pro_price;?></td>
                                <td>
                                    <?php 
                                        $get_sold = "select * from pending_order where product_id='$pro_id '";
                                        $run_sold = mysqli_query($con,$get_sold);
                                        $count = mysqli_num_rows($run_sold);
                                        echo $count;
                                    ?>
                                </td>
                                <td><?php echo $pro_keywords;?></td>
                                <td><?php echo  $pro_date;?></td>
                                <td>
                                    <a href="admin.php?delete_product=<?php echo $pro_id;?>">
                                        <i class="fa fa-trash-o"></i> Delete
                                     </a>
                                </td>
                                <td>
                                     <a href="admin.php?edit_product=<?php echo $pro_id;?>">
                                        <i class="fa fa-pencil"></i> Edit 
                                     </a>
                                </td>

                                <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
                            </tr>

                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>






























<?php }?>