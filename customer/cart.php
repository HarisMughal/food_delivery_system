<?php
include('header.php');
include('customer-controller.php');
require_once('../model/conn.php');
require_once('cartValidate.php');
?>

<?php
    if(!isset($_SESSION['ccid']))
    {
        header('location: customer-signin.php');
    }

?>
    <?php include('customer-header.php'); ?>

    <div class="col-md-12">
        <div class="row">
            <h1 class="page-header">
                Cart
            </h1>
        </div>

        <div class="row">
            <table class="table table-striped table-dark table-hover">
                <thead>
                    <tr>
                        <th>Dish Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub-Total</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php cart(); ?>
                
                </tbody>
               
            </table>
        </div>
    </div>
    <div class="col-md-2">
        
            <h3>Total Bill: <?php if(isset($_SESSION['item_total']))
            {
                echo $_SESSION['item_total'];
            } ?></h3>
        <br>
        <div class="row">
            <form method="post"><button class="btn btn-primary" name="checkout">CheckOut</button></form>
        </div>
    </div>
    
    <?php
        if(isset($_POST['checkout']))
        {
            if(isset($_SESSION['item_quantity']))
            {
                $control = new Controller();
    	        $control->checkout();
            }
            
        }
               
    ?>

</body>
</html>