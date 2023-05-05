<?php 



session_start();

if(!isset($_SESSION['customer_email'])){
    echo"<script>window.open('checkout.php','_self')</script>";
}else{



include("includes/db.php");
include("function/function.php");


if(isset($_GET['order_id'])){
    $order_id= $_GET['order_id'];
     
}




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

<div class="col-md-13">
    <div class="box">
        <h1 align="center">Confirm Status</h1>
        <form action="confirm.php?update_id=<?php echo $order_id;?>" method="post" enctype="multipart/form-data">
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
            <button class="btn btn-primary btn-lg" name="confirm_payment">
                <i class="fa fa-user-md"> Confirm Status</i>
            </button>
        </div>
     </form>
        
        <?php 
        
        if(isset($_POST['confirm_payment'])){
            $update_id = $_GET['update_id'];
            $payment_mode = $_POST['payment_mode'];
            $payment_date  = $_POST['date'];
            
            $complete="Complete";

            $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,payment_date) 
            values (' $invoice_no',' $amount ','$payment_mode ','  $ref_no','$payment_date ')";

            $run_payment = mysqli_query($con,$insert_payment);
            $update_customer_order = "update customer_orders set order_status=' $complete' where order_id='$update_id'";
            $run_customer_order = mysqli_query($con, $update_customer_order);
            $update_pending_order = "update pending_order set order_status=' $complete' where order_id='$update_id'";
            $run_pending_order = mysqli_query($con,$update_pending_order);

            if($run_pending_order){
                echo "<script>alert('Thankyou for purchasing, your orders..')</script>";
                echo "<script>window.open('admin.php?view_orders','_self')</script>";
            }


        }
        
        ?>

    </div>
</div>





<script src="js/jquery-331.min.js"> </script>
<script src="js/bootstrap-337.min.js"> </script>
</body>
</html>


<?php } ?>