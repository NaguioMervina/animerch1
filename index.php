
<?php 



include("includes/header.php");
?>




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





<div class="container" id="slider">

    <div class="col-md-12">
        <div class="carousel slide" id="mycarousel" data-ride="carousel">

        <ol class="carousel-indicators">
            <li class="active" data-target="#mycarousel" data-slide-to="0"></li>
            <li data-target="#mycarousel" data-slide-to="1"></li>
            <li data-target="#mycarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <?php 
            $get_slides ="select * from slider LIMIT 0,1";
            $run_slider = mysqli_query($con,$get_slides);
            while($row_slides=mysqli_fetch_array($run_slider)){
                $slide_name= $row_slides['slide_name'];
                $slide_image= $row_slides['slide_image'];

                echo "
                <div class='item active'>
                
                <img src='images/$slide_image'>
                
                
                </div>
                
                ";
            }

            $get_slides ="select * from slider LIMIT 1,3";
            $run_slider = mysqli_query($con,$get_slides);
            while($row_slides=mysqli_fetch_array($run_slider)){
                $slide_name= $row_slides['slide_name'];
                $slide_image= $row_slides['slide_image'];

                echo "
                <div class='item '>
                
                <img src='images/$slide_image'>
                
                
                </div>
                
                ";
            }
            ?>
        </div>

        <a href="#mycarousel" class="left carousel-control" data-slide="prev">

        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>


        </a>
        <a href="#mycarousel" class="right carousel-control" data-slide="next">

        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>

        </a>
        
    </div>

    </div>

</div>





<div id="hot">
<div class="box">
    
    <div class="container">
        <div class="col-md-12">
            <h2>
               Animerch Latest Products
            </h2>
        </div>
    </div>

</div>
</div>


<div id="content" class="container">
    <div class="row">
    
       <?php 
       
       getPro();
       
       ?>
    
    </div>
      
</div>


<?php 
include("includes/footer.php");
?>






<script src="js/jquery-331.min.js"> </script>
<script src="js/bootstrap-337.min.js"> </script>
</body>
</html>