
<?php 


include("includes/admindb.php");

    if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('adminlogin.php','_self')</script>";
    }else{

    

?>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
           <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
       </button>

     <a href="admin.php?dashboard" class="navbar-brand">Admin Animerch</a>
    </div>

    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php  echo $admin_name; ?>   <b class ="caret"></b>
            </a>

            <ul class="dropdown-menu">
                
                <li>
                    <a href="admin.php?view_product">
                        <i class="fa fa-fw fa-envelope"></i> Products
                        <span class="badge"><?php echo $count_products;?></span>
                    </a>
                </li>
                <li>
                    <a href="admin.php?view_customers">
                        <i class="fa fa-fw fa-users"></i> Animerch Customers
                        <span class="badge"><?php echo$count_customers;?></span>
                    </a>
                </li>
                <li>
                    <a href="admin.php?view_p_cat">
                        <i class="fa fa-fw fa-gear"></i> Product Categories
                        <span class="badge"><?php echo$count_p_categories;?></span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="adminlogout.php">
                        <i class="fa fa-fw fa-power-off"></i>Logout
                       
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                 <a href="admin.php?dashboard">
                 <i class="fa fa-fw fa-dashboard"></i> Dashboard
                 </a>
            </li>
            <li>
                 <a href="#"data-toggle="collapse" data-target="#products">
                 <i class="fa fa-fw fa-tag"></i> Products
                 <i class="fa fa-fw fa-caret-down"></i> 
                 </a>

                <ul id="products" class="collapse">
                    <li>
                        <a href="admin.php?insert_product"> Insert Product</a>
                    </li>
                    <li>
                        <a href="admin.php?view_product"> View Products</a>
                    </li>
                </ul>
            </li>

            <li>
                 <a href="#"data-toggle="collapse" data-target="#p_cat">
                 <i class="fa fa-fw fa-edit"></i> Product Categories
                 <i class="fa fa-fw fa-caret-down"></i>
                 </a>

                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="admin.php?insert_p_cat"> Insert Product Categories</a>
                    </li>
                    <li>
                        <a href="admin.php?view_p_cat"> View Product Categories</a>
                    </li>
                </ul>
            </li>   
            
            <li>
                <a href="admin.php?view_customers"><i class="fa fa-fw fa-users"></i> View Customer</a>
            </li>
            <li>
                <a href="admin.php?view_orders"><i class="fa fa-fw fa-pencil"></i> View Orders</a>
            </li>
            <li>
                <a href="admin.php?view_status"><i class="fa fa-fw fa-pencil"></i> View Status</a>
            </li>
            <li>
                <a href="admin.php?view_payments"><i class="fa fa-fw fa-money"></i> View Payments</a>
            </li>
            
           
            <li>
                <a href="adminlogout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a>
            </li>
        </ul>
    </div>
</nav>

<?php 
    }
?>