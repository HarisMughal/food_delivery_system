<?php
include('header.php');
include('customer-controller.php');
require_once('../model/conn.php');
?>

<?php
session_start();

    if(!isset($_SESSION['ccid']))
    {
        header('location: customer-signin.php');
    }
    
?>
        <?php include('customer-header.php'); ?>
        <div class="row ml-5">
            <?php
                $control = new Controller();
                $control->get_dish();
            ?>
            
        </div>


</body>
</html>
