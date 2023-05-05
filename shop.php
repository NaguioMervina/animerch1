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

    </div>

</div>



    <div class="content">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Home</a>

                </li>
                <li>Shop</li>
            </ul>
        </div>

       
        
        <center>

        <div class="col-md-12">

        <?php

        if(!isset($_GET['p_cat'])){

            if(!isset($_GET['cat'])){

        echo "
            <div class='box'>
                <h1>Animerch Shop</h1>
                
            </div>
            ";
                }
            }
            ?>


            <div class="row">
           
            <?php

            
        if(!isset($_GET['p_cat'])){

            if(!isset($_GET['cat'])){

                $per_page=6;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];

                }else{
                        $page=1;
                    
                    }
                    $start_from=($page-1) * $per_page;

                    $get_products="select * from products order by 8 DESC LIMIT $start_from,$per_page";

                    $run_products= mysqli_query($con,$get_products);

                    while($row_products=mysqli_fetch_array($run_products)){
                        $pro_id =$row_products['product_id'];
                        $pro_title = $row_products['product_title'];
                        $pro_price = $row_products['product_price'];
                        $pro_img1 = $row_products['product_img1'];

                        echo"
                        
                        <div class='col-md-4 col-sm-6 center-responsive'>
                        <div class='product'>
                                <a href='details.php?pro_id=$pro_id'>
                                
                                <img class='img-responsive' src='product_images/$pro_img1'>
                                
                                </a>

                        <div class='text'>
                        
                        <h3>
                        <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                        </h3>

                        <p class='price'>
                        
                        ₱$pro_price
                        </p>

                        <p class='buttons'>
                        
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                        
                        View Details
                        </a>

                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                        
                        <i class='fa fa-shopping-cart'></i> Add to Cart
                        </a>
                        </p>
                        
                        </div>
                        
                        </div>
                        
                        </div>
                        
                        ";
                    
                }

         
            ?>
            </div>
                
            <center>
                <ul class="pagination">
                   <?php 
                   
                $query= "select * from products";
                $result= mysqli_query($con, $query);
                $total_records= mysqli_num_rows($result);
                $total_pages= ceil($total_records/$per_page);

                    echo "
                    
                    <li>
                    <a href='shop.php?page=1'>".'First Page'."</a>
                    
                    </li>
                    
                    
                    ";

                    for($i=1; $i<=$total_pages; $i++){

                        echo "
                    
                        <li>
                        <a href='shop.php?page=".$i."'>".$i."</a>
                        
                        </li>
                        
                        
                        ";

                    };

                    echo "
                    
                    <li>
                    <a href='shop.php?page=$total_pages'>".'Last Page'."</a>
                    
                    </li>
                    
                    
                    ";


                     }
                 }
                   ?>

                </ul>
            </center>

                 
                     <?php getpcatpro();?>
                 
            </div>
        </div>
    </div>

    </center>









<script src="js/jquery-331.min.js"> </script>
<script src="js/bootstrap-337.min.js"> </script>
</body>
</html>