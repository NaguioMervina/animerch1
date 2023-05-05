
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
                <li>Checkout</li>
            </ul>
        </div>

        
        <div class="col-md-9">
       
        <?php
        
        if(!isset($_SESSION['customer_email'])){
            
            include("customer_login.php");

        }else{
            include("payment_options.php"); 
        }
        
        ?>
         
        </div>

        
         
    </div>
</div>





<script src="js/jquery-331.min.js"> </script>
<script src="js/bootstrap-337.min.js"> </script>
</body>
</html>


