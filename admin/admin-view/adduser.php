<?php 
    require_once('../../config/conn.php');
    include('../admin-controller.php');
   
?>
  
<h1 class="page-header">
  Add a user

</h1>


<div class="col-md-4">
    
    <form method="post">
    
        <div class="form-group">
            <label for="user-name">Full Name</label>
            <input type="text" class="form-control" name="userName" required>
        </div>
        
        <div class="form-group">
            <label for="user-address">Address</label>
            <input type="text" class="form-control" name="userAddress" required>
        </div>
        
        <div class="form-group">
            <label for="user-phone">Phone</label>
            <input type="text" class="form-control" name="userPhone" required>
        </div>
        
        <div class="form-group">
            <label for="user-email">Email</label>
            <input type="email" class="form-control" name="userEmail" required>
        </div>
        
        <div class="form-group">
            <label for="user-password">Password</label>
            <input type="password" class="form-control" name="userPassword" required>
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="adduser" value="Add User">
        </div>      


    </form>

   <?php
        if(isset($_POST['adduser']))
        {
            addUser();
        }
    ?>

</div>

</div>

