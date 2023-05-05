
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
                <li>Register Account</li>
            </ul>
        </div>

        <div class="col-md-3">
        <?php 
        include("includes/sidebar.php");
        ?>
        </div>
        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>Register a new account</h2>
                        <p class="text-muted"></p>
                    </center>

                    <form action="customer_register.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label > Name</label>
                            <input type="text" class="form-control" name="c_name" required>
                        </div>
                        <div class="form-group">
                            <label > Email</label>
                            <input type="text" class="form-control" name="c_email" required>
                        </div>
                        <div class="form-group">
                            <label > Password</label>
                            <input type="password" class="form-control" name="c_password" required>
                        </div>
                        <div class="form-group">
                            <label >City</label>
                            <input type="text" class="form-control" name="c_city" required>
                        </div>
                        <div class="form-group">
                            <label > contact</label>
                            <input type="text" class="form-control" name="c_contact" required>
                        </div>
                        <div class="form-group">
                            <label > Address</label>
                            <input type="text" class="form-control" name="c_address" required>
                        </div>
                        <div class="form-group">
                            <label > Profile</label>
                            <input type="file" class="form-control" form-height="custom" name="c_profile" >
                        </div>
                        
                        
                        <div class="text-center">
                            <button type="submit" name="register"class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<script src="js/jquery-331.min.js"> </script>
<script src="js/bootstrap-337.min.js"> </script>
</body>
</html>



<?php 

if(isset($_POST['register'])){
    $c_name = $_POST['c_name'];

    $c_email = $_POST['c_email'];

    $c_password = $_POST['c_password'];

    $c_city = $_POST['c_city'];

    $c_contact = $_POST['c_contact'];

    $c_address = $_POST['c_address'];

    $c_profile = $_FILES['c_profile']['name'];

    $c_profile_tmp = $_FILES['c_profile']['tmp_name'];

    $c_ip=getIpUser();

    move_uploaded_file($c_profile_tmp,"customer/register-image/$c_profile");

    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_city,customer_contact,customer_address,customer_image,customer_ip) 
    values ('$c_name','$c_email','$c_password','$c_city','$c_contact','$c_address','$c_profile','$c_ip')";

    $run_customer = mysqli_query($con,$insert_customer);

    $sel_cart="select * from cart where ip_add='$c_ip' ";

    $run_cart = mysqli_query($con,$sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if( $check_cart>0){
        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('You have been Registered Successfully')</script>";

        echo "<script>window.open('checkout.php','_self')</script>";
    }else{


        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('You have been Registered Successfully')</script>";

        echo "<script>window.open('index.php','_self')</script>";
    }

}

?>