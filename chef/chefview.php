<?php
include('header.php');
include('chef-controller.php');
require_once('../model/conn.php');
?>

<?php
session_start();

    if(!isset($_SESSION['cid']))
    {
        header('location: chef-signin.php');
    }
    
?>
        <?php include('chef-header.php'); ?>
        <div class="row ml-5">
            <?php
                $control = new Controller();
                $control->get_dish();
            ?>
            
        </div>

        <?php
            if(isset($_GET['chef_id']) )
            {
                if(isset($_GET['dish_id']) )
                {
                    $con = new Model();
             
                    $query = "DELETE FROM chef_dish WHERE chef_id='{$_GET['chef_id']}' AND dish_id='{$_GET['dish_id']}'";
                    $run_query = mysqli_query($con->getConn(),$query);

                }

                                
            }


        ?>
    

</body>
</html>
