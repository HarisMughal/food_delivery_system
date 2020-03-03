<?php
  require_once('../../model/conn.php');
  include('../admin-controller.php');

?>
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
           <th>Id</th>
           <th>Name</th>
           <th>Email</th>
           <th>Phone</th>
           <th>Address</th>
           <th>Password</th>
      </tr>
    </thead>
    <tbody>
        
        <?php
          $control = new Controller();
          $control->view_user();  

          if(isset($_POST['del_button1']))
          {
                $con = new Model();

                $del = mysqli_real_escape_string($con->getConn(),$_POST['del_button1']);
                $query = "DELETE FROM customer WHERE id='$del'";

                $run_query = mysqli_query($con->getConn(), $query); 
          }
        ?>


    </tbody>
</table>
</div>