<?php 


include("includes/admindb.php");

    if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('adminlogin.php','_self')</script>";
    }else{

    

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
                    <i class="fa fa-tags"></i> Animerch Customers
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No:</th>
                                <th>Name:</th>
                                <th>Image:</th>
                                <th>Email:</th>
                                <th>City:</th>
                                <th>Address:</th>
                                <th>Contact:</th>
                                <th>Delete:</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $i=0;
                            
                                $get_c="select * from customers";
                                $run_c = mysqli_query($con,$get_c);
                                while($row_c=mysqli_fetch_array( $run_c)){
                                    $c_id = $row_c['customer_id'];
                                    $c_name = $row_c['customer_name'];
                                    $c_img = $row_c['customer_image'];
                                    $c_email= $row_c['customer_email'];
                                    $c_city = $row_c['customer_city'];
                                    $c_add= $row_c['customer_address'];
                                    $c_contact= $row_c['customer_contact'];
                                   

                                    $i++;
                               
                            
                            
                            ?>

                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo  $c_name ;?></td>
                                <td><img src="customer/register-image/<?php echo $c_img;?>" width="80" height="60"></td>
                                <td><?php echo $c_email;?></td>
                                <td><?php echo  $c_city ;?></td>
                                <td><?php echo  $c_add;?></td>
                                <td><?php echo   $c_contact;?></td>
                                <td>
                                    <a href="admin.php?delete_customer=<?php echo $c_id;?>">
                                        <i class="fa fa-trash-o"></i> Delete
                                     </a>
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