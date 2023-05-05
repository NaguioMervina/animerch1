

<?php 



session_start();

if(!isset($_SESSION['customer_email'])){
    echo"<script>window.open('checkout.php','_self')</script>";
}else{



include("includes/db.php");
include("function/function.php");







?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animerch</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>


<div id="top">

    <div class="container">

        <div class="col-md-6 offer">

        <a href="index.php" class="btn btn-success btn-sm">

        <?php 
        
        if(!isset($_SESSION['customer_email'])){
            echo "Welcome: Animerch Guest";
        }else{
            echo"Welcome: " . $_SESSION['customer_email'] . "";
        }
        
        ?>


        </a>
        <a href="checkout.php"><?php items();?> Items in your Cart | Total Price: <?php total_price()?></a>
        </div>
        
        

        <div class="col-md-6">
            <ul class="menu">
                <li>
                    <a href="customer_register.php">Register</a>
                </li>
                <li>
                <a href="my_account.php">My Account</a>
                </li>
                <li>
                    <a href="cart.php">Cart</a>
                </li>
                <li>
                    <a href="checkout.php">

                    <?php 
                    
                    if(!isset($_SESSION['customer_email'])){
                        echo "<a href='checkout.php'> Login</a>";
                    }else{
                        echo"<a href='logout.php'>Logout</a>";
                    }
                    
                    ?>

                    </a>
                </li>
                
            </ul>
        </div>
    </div>

</div>

<div id="navbar" class="navbar navbar-default">

    <div class="container">

    <div class="navbar-header">

    <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

    <span class="sr-only">Toggle Navigation</span>
    <i class="fa fa-align-justify"></i>
    </button>
    <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

    <span class="sr-only">Toggle Search</span>
    <i class="fa fa-search"></i>
     </button>

    </div>

    <div class="navbar-collapse collapse" id="navigation">
        <div class="padding-nav">
            <ul class="nav navbar-nav left">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="shop.php">Shop</a>
                </li>
                <li>
                    <?php 
                    
                    if(!isset($_SESSION['customer_email'])){
                        echo"<a href='checkout.php'>My Account</a>";
                    }else{
                        echo"<a href='my_account.php?'>My Account</a>";
                    }
                    
                    ?>
                </li>
                <li>
                    <a href="cart.php">Shopping Cart</a>
                </li>
                
            </ul>
        </div>

        <a href="cart.php" class="btn navbar-btn btn-primary right">

        <i class="fa fa-shopping-cart"></i>
            <span><?php items();?> items In your Cart</span>

        </a>





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
                <li>My Account</li>
            </ul>
        </div>

        <div class="col-md-3">


        <div class="panel panel-default slider-menu">
            <div class="panel-heading">
                <?php
                
                $customer_session= $_SESSION['customer_email'];

                $get_customer = "select * from customers where customer_email='$customer_session'";

                $run_customer = mysqli_query($con,$get_customer );

                $row_customer = mysqli_fetch_array( $run_customer);

                $customer_image = $row_customer ['customer_image'];

                $customer_name = $row_customer ['customer_name'];


                if(!isset($_SESSION['customer_email'])){

                }else{
                    echo "
                    
                        <center>

                            <img src='customer/register-image/$customer_image' class='img-responsive'>
                        </center>
                         
                        <br/>

                        <h3 class='panel-title' align='center'>
                            Name:$customer_name 
                        </h3>
                    ";
                }
                
                
                
                ?>
            </div>
            <div class="panel-body">
                <ul class="nav-pills nav-stacked nav">
                     <li class="<?php if(isset($_GET['my_orders'])){echo "active";}?>">
                         <a href="my_account.php?my_orders">
                             <i class="fa fa-list"></i> My Orders
                         </a>
                     </li>
                     <li class="<?php if(isset($_GET['pay_offline'])){echo "active";}?>">
                         <a href="my_account.php?pay_offline">
                             <i class="fa fa-bolt"></i> Payment 
                         </a>
                     </li>
                     <li class="<?php if(isset($_GET['edit_account'])){echo "active";}?>">
                         <a href="my_account.php?edit_account">
                             <i class="fa fa-pencil"></i> Edit Account
                         </a>
                     </li>
                     <li class="<?php if(isset($_GET['change_pass'])){echo "active";}?>">
                         <a href="my_account.php?change_pass">
                             <i class="fa fa-user"></i> Change Password
                         </a>
                     </li>
                     <li class="<?php if(isset($_GET['delete_account'])){echo "active";}?>">
                         <a href="my_account.php?delete_account">
                             <i class="fa fa-trash-o"></i> Delete Account
                         </a>
                     </li>
                     <li>
                         <a href="logout.php">
                             <i class="fa fa-sign-out"></i> Log out
                         </a>
                     </li>
                </ul>
            </div>
        </div>

    </div>
</div>


<div class="col-md-9">
            <div class="box">
                <?php
                    if(isset($_GET['my_orders'])){
                        include("my_orders.php");
                    }
                ?>

                <?php
                if(isset($_GET['pay_offline'])){
                    include("pay_offline.php");
                }
                ?>

                <?php
                if(isset($_GET['edit_account'])){
                    include("edit_account.php");
                }
                ?>


                 <?php
                if(isset($_GET['change_pass'])){
                    include("change_pass.php");
                }
                ?>

                <?php
                if(isset($_GET['delete_account'])){
                    include("delete_account.php");
                }
                ?>



            </div>
        </div>









<script src="js/jquery-331.min.js"> </script>
<script src="js/bootstrap-337.min.js"> </script>
</body>
</html>


<?php }?>
