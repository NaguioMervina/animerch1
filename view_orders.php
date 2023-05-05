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
                    <i class="fa fa-tags"></i> Animerch Orders
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No:</th>
                                <th>Customer Email:</th>
                                <th>Contact :</th>
                                <th>Product Name:</th>
                                <th>Product Qty:</th>
                                <th>Product Size:</th>
                               
                                <th>Order Date:</th>
                                <th>
                                    Status
                            </th>
                                <th>Total Amount:</th> 
                                <th>Delete:</th>
                                <th>Confirm</th>
                            </tr>
                          
                        </thead>
                        <tbody>
                            <?php 

                                $i=0;
                            
                                $get_orders="select * from pending_order";
                                $run_orders = mysqli_query($con,$get_orders);
                                while($row_orders=mysqli_fetch_array( $run_orders)){
                                    $orders_id = $row_orders['order_id'];
                                    $c_id = $row_orders['customer_id'];
                                 
                                    $invoice_no = $row_orders['invoice_no'];
                                    $product_id = $row_orders['product_id'];
                                    $qty = $row_orders['qty'];
                                    $size = $row_orders['size'];
                                    $orders_status = $row_orders['order_status'];

                                    $get_product= "select * from products where product_id='$product_id'";
                                    $run_product=mysqli_query($con, $get_product);
                                    $row_product=mysqli_fetch_array($run_product);
                                    $product_title = $row_product['product_title'];

                                    $get_customer="select * from customers where customer_id='$c_id'";
                                    $run_customer=mysqli_query($con,$get_customer);
                                    $row_customer=mysqli_fetch_array($run_customer);
                                    $customer_email= $row_customer['customer_email'];
                                    $customer_contact= $row_customer['customer_contact'];

                                    
                                

                                    $get_c_order= "select * from customer_orders where order_id='$orders_id'";
                                    $run_c_order= mysqli_query($con, $get_c_order);
                                    $row_c_order= mysqli_fetch_array( $run_c_order);
                                    $order_date=$row_c_order['order_date'];
                                    $order_amount=$row_c_order['due_amount'];


                                    $i++;
                               
                            
                            
                            ?>

                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo  $customer_email;?></td>
                                <td><?php echo      $customer_contact;?></td>
                                <td><?php echo $product_title;?></td>
                                <td><?php echo $qty ;?></td>
                                <td><?php echo $size;?></td>
                              
                                <td><?php echo $order_date;?></td>
                                <td>
                                    <?php
                                    
                                    if($orders_status=='Pending'){
                                        echo $orders_status='Pending';
                                    }
                                    else{
                                        echo $orders_status='Deliver';
                                    }   
                                    
                                    
                                    ?>
                                </td>
                                <td><?php echo $order_amount;?></td>
                                
                                <td>
                                    <a href="admin.php?delete_order=<?php echo $orders_id;?>">
                                        <i class="fa fa-trash-o"></i> Delete
                                     </a>
                                </td>
                                <td><a href="view_status.php?order_id=<?php echo  $orders_id; ?>" class="btn btn-primary btn-sm">Confirm</a></td></td></td>
                           
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