
<?php

session_start();
include("includes/admindb.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Animerch</title>
    <link rel="stylesheet" href="adminlogin.css" type="text/css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>



<div class="container">
    <form action="" class="form-login" method="post">
        <h2 class="form-login-heading">
            Admin login
        </h2>
        <input type="text" class="form-control" placeholder="Email" name="admin_email" required>
        <input type="password" class="form-control" placeholder="Password" name="admin_pass" required>
        <button class="btn btn-lg btn-primary btn-block" name="admin_login">
            Login
        </button>   
    </form>
</div>
    
</body>
</html>

<?php 

if(isset($_POST['admin_login'])){
    $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
    $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);

    $get_admin = "select * from admin where admin_email='$admin_email' AND admin_pass='$admin_pass'";
    $run_admin= mysqli_query($con,$get_admin);

    $count= mysqli_num_rows( $run_admin);

    if($count==1 ){ 
        $_SESSION['admin_email']= $admin_email ;
        echo"<script>alert('Welcome Back Admin')</script>";
        echo "<script>window.open('admin.php?dashboard','_self')</script>";
    }else{
        echo"<script>alert('Email and Password is incorrect')</script>";
    }
}

?>





















