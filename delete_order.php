<?php 


include("includes/admindb.php");

    if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('adminlogin.php','_self')</script>";
    }else{

    

?>


<?php 

if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];
    $delete_order = "delete from pending_order where order_id=' $delete_id'";
    $run_delete = mysqli_query($con,$delete_order);
    if($run_delete){
        echo "<script>alert('Order has been deleted.')</script>";
        echo "<script>window.open('admin.php?view_orders','_self')</script>";
    }
}



?>











<?php } ?>