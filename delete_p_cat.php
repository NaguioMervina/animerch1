
<?php 


include("includes/admindb.php");

    if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('adminlogin.php','_self')</script>";
    }else{

    

?>





<?php 

if(isset($_GET['delete_p_cat'])){
    $delete_p_id = $_GET['delete_p_cat'];
    $delete_p_cat = "delete from product_categories where p_cat_id=' $delete_p_id '";
    $run_delete = mysqli_query($con,$delete_p_cat);
    if($run_delete){
        echo "<script>alert('Product has been deleted.')</script>";
        echo "<script>window.open('admin.php?view_p_cat','_self')</script>";
    }
}



?>







<?php }?>