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


<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   Incomplete Orders
</h1>
</div>

<div class="row">
<table class="table table-striped table-hover">
    <thead>

      <tr>
           <th>Order Id</th>
           <th>Total Bill</th>
      </tr>
    </thead>
    <tbody>
        
        <?php

          $control = new Controller();
          $control->view_incomplete();  

        if(isset($_POST['deliver']))
        {
            $con = new Model();

            $deliver = mysqli_real_escape_string($con->getConn(),$_POST['deliver']);
            $query = "UPDATE orders SET status = 1 WHERE id='{$_POST['deliver']}'";
            $run_query = mysqli_query($con->getConn(), $query); 
            ?>
            
            
                <script>
                    window.open('admin-index.php?viewinc','_self');
                </script>

            <?php
         
        }
          
        ?>


    </tbody>
</table>
</div>

</body>
</html>
