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

<div id="content">
    <div class="content">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Home</a>

                </li>
                <li>Shop</li>

                <li>

                <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                </li>

                <li><?php echo $pro_title; ?></li>

            </ul>
        </div>

       


        <div class="col-md-12">
            <div id="productMain" class="row">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li  data-slide-to="0"data-target="#myCarousel" class="active"></li>
                                <li  data-slide-to="1"data-target="#myCarousel"></li>
                                <li  data-slide-to="2"data-target="#myCarousel"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <center><img class="img-responsive" src="product_images/<?php echo$pro_img1; ?>" alt=""></center>
                                </div>
                                <div class="item">
                                    <center><img class="img-responsive"src="product_images/<?php echo$pro_img2; ?>"alt=""></center>
                                </div>
                                <div class="item">
                                    <center><img class="img-responsive" src="product_images/<?php echo$pro_img3; ?>" alt=""></center>
                                </div>
                            </div>

                            <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a> 
                            <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center"><?php echo $pro_title; ?></h1>
                        <?php add_cart();?>
                        <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">
                            <div class="form-group"><label for="" class="col-md-5 control-label">Products Quantity</label>
                            
                            <div class="col-md-7">
                                <select name="product_qty" id="" class="form-control">
                                    <option >1</option>
                                    <option >2</option>
                                    <option >3</option>
                                    <option >4</option>
                                    <option >5</option>
                                    <option >6</option>
                                    <option >7</option>
                                    <option >8</option>
                                    <option >9</option>
                                    <option >10</option>
                               
                                </select>
                            </div>
                        </div>

                       <div class="form-group">
                           <label class="col-md-5 control-label">Product Size</label>

                           <div class="col-md-7">
                               <select name="product_size" class="form-control" required oniput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')" >
                                    <option disabled selected >Select a size</option>
                                    <option >Small</option>
                                    <option >Medium</option>
                                    <option >Large</option>
                                    <option >Extra Large</option>
                               </select>
                           </div>
                           
                       </div>

                        <p class="price">₱<?php echo $pro_price;?></p>
                        <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to Cart</button></p>   

                        </form>
                                    
                    </div>
                
                
                    <div class="row" id="thumbs">
                        <div class="col-xs-4">
                        <a data-target="#myCarousel" data-slide-to="0"href="#" class="thumb">
                        <img src="product_images/<?php echo$pro_img1; ?>" alt="" class="img-responsive"></a></div>

                        <div class="col-xs-4">
                        <a data-target="#myCarousel" data-slide-to="1"href="#" class="thumb">
                        <img src="product_images/<?php echo$pro_img2; ?>" alt="" class="img-responsive"></a></div>

                        <div class="col-xs-4">
                        <a data-target="#myCarousel" data-slide-to="2"href="#" class="thumb">
                        <img src="product_images/<?php echo$pro_img3; ?>" alt="" class="img-responsive"></a></div>
                    </div>
               
               
                </div>

                




            </div>

             <div class="box" id="details">
                    
                 <h4>Product Details</h4>
                 <p>
                     <?php echo $pro_desc;?>
                 </p>
                 
        </div>
    </div>
</div>



<script src="js/jquery-331.min.js"> </script>
<script src="js/bootstrap-337.min.js"> </script>
</body>
</html>