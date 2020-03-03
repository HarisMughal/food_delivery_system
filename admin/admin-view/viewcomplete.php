<?php

    require_once('../../model/conn.php');
    include('../admin-controller.php');

?>

<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   Complete Orders
</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>Order Id</th>
           <th>Customer Id</th>
           <th>Total Bill</th>
      </tr>
    </thead>
    <tbody>
        
        <?php

          $control = new Controller();
          $control->view_complete();  

        
          
        ?>


    </tbody>
</table>
</div>