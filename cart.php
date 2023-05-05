

<?php 
include("includes/header.php");
?>






        <div class="navbar-collapse collapse right">
             <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                <span class="sr-only">Toggle Search</span>
                <i class="fa fa-search"></i>
             </button>
        </div>

        <div class="collapse clearfix" id="search">
            <form method="get"action="results.php" class="navbar-form">

            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                <span class="input-group-btn">
                <button type="submit" name="search" value="search"class="btn btn-primary">
                <i class="fa fa-search"></i>
                </button>
                </span>
            </div>
            </form>
        </div>


 <div id="content">
    <div class="content">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Home</a>

                </li>
                <li>Cart</li>
            </ul>
        </div>

        <div id="cart" class="col-md-9">
            <div class="box">
                 <form action="cart.php" method="post" enctype="multipart/form-data">
                    
                  <h1>Shopping Cart</h1>

                  <?php
        
                    $ip_add = getIpUser();

                    $select_cart = "select * from cart where ip_add='$ip_add'";

                    $run_cart= mysqli_query($con,$select_cart);

                    $count = mysqli_num_rows($run_cart);
        
                 ?>




                  <p class="text-muted">You currently have <?php echo $count; ?> items in your cart</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                 <tr>
                                     <th colspan="2">Product</th>
                                     <th>Quantity</th>
                                     <th>Unit Price</th>
                                     <th>Size</th>
                                     <th colspan="1">Delete</th>
                                     <th colspan="2">Cash on delivery</th>
                                    
                                     
                                 </tr>
                            </thead>
                            <tbody>

                            <?php 
                        
                                $total = 0;
                                while($row_cart = mysqli_fetch_array($run_cart)){
                                    $pro_id =$row_cart ['p_id'];

                                    $pro_size =$row_cart ['size'];
                                    
                                    $pro_qty =$row_cart ['qty'];

                                    $get_products = "select * from products where product_id='$pro_id'";

                                    $run_products = mysqli_query($con,$get_products);

                                    while($row_products=mysqli_fetch_array($run_products)){
                                        
                                        $product_title =  $row_products['product_title'];

                                        $product_img1 =  $row_products['product_img1'];

                                        $only_price =  $row_products['product_price'];

                                        $sub_total =  $row_products['product_price']* $pro_qty ;
                                        
                                        $total +=   $sub_total;
                                        
                                        
                                       
                                       

                                      
                            ?>



                                <tr>
                                <td>
                                    <img class="img-responsive" src="product_images/<?php echo $product_img1;?>" alt="">
                                </td>
                                <td>
                                       <a href="details.php?pro_id=<?php echo $pro_id;?>"><?php echo $product_title;?></a>
                                </td>
                                <td>
                                   <?php echo $pro_qty;?>
                                </td>
                                <td>
                                <?php  echo $only_price;?>
                                </td>
                                <td>
                                <?php echo  $pro_size;?>
                                </td>
                                <td>
                                    <input type="checkbox"name="remove[]" value="<?php  echo  $pro_id;?>">
                                </td>
                                <td>
                                <?php echo $sub_total;?>
                                </td>
                                </tr>

                                <?php }
                                
                                    }
                                ?>
                            </tbody>
                            
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th colspan="2">₱ <?php echo $total;?></th>
                                </tr>
                            </tfoot>
                            
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="index.php" class="btn btn-default">
                                <i class="fa fa-chevron-left">Continue Shopping</i>
                            </a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" name="update" value="Update Cart"class="btn btn-default">
                                <i class="fa fa-refresh"> Update Cart</i>
                            </button>
                            
                        </div>
                    </div>
                 </form>
            </div>
        </div>

        <?php 

            function update_cart(){
                 global $con;
                 
                 if(isset($_POST['update'])){  
                    foreach($_POST['remove'] as $remove_id){

                        $delete_product = "delete from cart where p_id='$remove_id'";

                        $run_delete  = mysqli_query($con, $delete_product);

                        if($run_delete){
                            echo "<script>windom.open('cart.php','_self')</script>";
                        }
                    }   
                 }
            }

            echo @$up_cart = update_cart();
        
        ?>

        <div class="col-md-3">
            <div id="order-summary" class="box">
                <div class="box-header">
                    <h3>Checkout / Summary Order</h3>
                </div>
                <p class="text-muted">
                    Shipping and additional cost are calculated based on value you have entered
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Order Sub-total</td>
                                <th>₱ <?php echo $total;?></th>
                            </tr>

                            <tr>
                                <td>Cash on delivery</td>
                                <td>100</td>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <td>₱ <?php echo   $total ;?></td>
                            </tr>
                        </tbody>
                        
                    </table>
                    <a href="checkout.php" class="btn btn-primary">
                   Confirm Process <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>



    </div>

</div>

























<script src="js/jquery-331.min.js"> </script>
<script src="js/bootstrap-337.min.js"> </script>
</body>
</html>