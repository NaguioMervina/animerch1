<?php 

session_start();


    if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('adminlogin.php','_self')</script>";
    }else{
        
        include("includes/admindb.php");
        include("function/function.php");


        if(isset($_GET['order_id'])){
            $orders_id= $_GET['order_id'];
             
        }

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
                    <i class="fa fa-tags"></i> Animerch Payment
                </h3>
            </div>


            <div class="col-md-9">
    <d class="box">
        <h1 align="center">Please confirm your payment</h1>
        <form action="view_confirm.php?update_id=<?php echo $orders_id;?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Select Payment Method:</label>
            <select name="payment_mode" class="form-control">
                <option>Cash on Delivery</option>

            </select>
        </div>
      
        <div class="form-group">
            <label>Payment Date:</label>
            <input type="date" class="form-control" name="date" required>
        </div>
        
        <div class="text-center">
            <button class="btn btn-primary btn-lg" name="confirm_payments">
                <i class="fa fa-user-md"> Confirm Payment</i>
            </button>
        </div>
     </form>





<?php }?>