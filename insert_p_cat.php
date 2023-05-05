
<?php 


include("includes/admindb.php");

    if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('adminlogin.php','_self')</script>";
    }else{

    

?>


<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard /Insert Product Categories
            </li>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>Insert Product Categories
                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Product Catergory Title </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="p_cat_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Product Description </label>
                        <div class="col-md-6">
                          <textarea type='text'name="p_cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> </label>
                        <div class="col-md-6">
                         <input value ="Submit"name="submit" type="submit" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 

if(isset($_POST['submit'])){
    $p_cat_title = $_POST['p_cat_title'];
    $p_cat_desc = $_POST['p_cat_desc'];
    $insert_p_cat = "insert into product_categories(p_cat_title,p_cat_desc) values('$p_cat_title', '$p_cat_desc')";

    $run_p_cat = mysqli_query($con,$insert_p_cat);

    if( $run_p_cat){
        echo "<script>alert('New Product Category has been Insert')</script>";
        echo "<script>window.open('admin.php?view_p_cat','_self')</script>";
    }
}

?>






<?php }?>