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


<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Users

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>Dish</th>
           <th>Price</th>
      </tr>
    </thead>
    <tbody>
        
        <?php
          
                $control = new Controller();
                $control->sales();

        ?>


    </tbody>
</table>
</div>
</body>
</html>