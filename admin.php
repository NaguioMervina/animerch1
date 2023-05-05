

<?php 

session_start();
include("includes/admindb.php");

    if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('adminlogin.php','_self')</script>";
    }else{
    
        $admin_session = $_SESSION['admin_email'];

        $get_admin= "select * from admin where admin_email='$admin_session'";
        $run_admin = mysqli_query($con, $get_admin);
        $row_admin = mysqli_fetch_array($run_admin);
        $admin_id = $row_admin['admin_id'];
        $admin_name =$row_admin['admin_name'];
        $get_products= "select * from products";
        $run_products= mysqli_query($con,$get_products);
        $count_products= mysqli_num_rows($run_products);
        $get_customers= "select * from customers";
        $run_customers= mysqli_query($con,$get_customers);
        $count_customers=mysqli_num_rows($run_customers);
        $get_p_categories ="select * from product_categories";
        $run_p_categories = mysqli_query($con,$get_p_categories);
        $count_p_categories = mysqli_num_rows($run_p_categories);
        $get_pending_orders="select * from pending_order";
        $run_pending_orders = mysqli_query($con,$get_pending_orders);
        $count_pending_orders=mysqli_num_rows($run_pending_orders);

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Animerch</title>
    <link rel="stylesheet" href="admin.css" type="text/css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <?php include("includes/adminSidebar.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php 
                if(isset($_GET['dashboard'])){
                    include("dashboard.php");
                } if(isset($_GET['insert_product'])){
                    include("insert_product.php");
                }if(isset($_GET['view_product'])){
                    include("view_product.php");
                }if(isset($_GET['delete_product'])){
                    include("delete_product.php");
                }
                if(isset($_GET['edit_product'])){
                    include("edit_product.php");
                }
                if(isset($_GET['view_p_cat'])){
                    include("view_p_cat.php");
                }
                if(isset($_GET['insert_p_cat'])){
                    include("insert_p_cat.php");
                }   
                if(isset($_GET['delete_p_cat'])){
                    include("delete_p_cat.php");
                } 
                if(isset($_GET['edit_p_cat'])){
                    include("edit_p_cat.php");
                } 
                if(isset($_GET['view_customers'])){
                    include("view_customers.php");
                } 
                if(isset($_GET['delete_customer'])){
                    include("delete_customer.php");
                } 
                if(isset($_GET['view_orders'])){
                    include("view_orders.php");
                } 
                if(isset($_GET['delete_order'])){
                    include("delete_order.php");
                } 
                if(isset($_GET['view_payments'])){
                    include("view_payments.php");
                } 
                if(isset($_GET['delete_payment'])){
                    include("delete_payment.php");
                } 
                if(isset($_GET['view_user'])){
                    include("view_user.php");
                }
                if(isset($_GET['view_confirm'])){
                    include("view_confirm.php");
                } 
                if(isset($_GET['edit'])){
                    include("view_edit.php");
                } 
                if(isset($_GET['view_status'])){
                    include("view_status.php");
                } 
                ?>
        </div>
    </div>
</div>







<script src="js/jquery-331.min.js"> </script>
<script src="js/bootstrap-337.min.js"> </script>    
</body>
</html>


<?php 
}
?>