<div class="col-md-9">

    <?php 
    
    $session_email =$_SESSION['customer_email'];

    $select_customer ="select * from customers where customer_email='$session_email'";

    $run_customer = mysqli_query($con, $select_customer);

    $row_customer = mysqli_fetch_array( $run_customer);

    $customer_id =  $row_customer['customer_id'];
    
    
    ?>


    <h1 class="text-center">Thankyou for purchasing Animerch Items!!</h1>
    <p class="lead text-center">

    
        <a href="order.php?c_id=<?php echo $customer_id ?>" class="btn btn-primary">
                    Your orders <i class="fa fa-chevron-right"></i>
                    </a>
    </p>

    
</div>