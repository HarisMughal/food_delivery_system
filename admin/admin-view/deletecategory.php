
<?php
    require_once('../../model/conn.php');
    include('../admin-controller.php');
?>
<h1 class="page-header">
  Delete Category

</h1>


<div class="col-md-4">
    
    <form method="post">
    
        <div class="form-group">
            <label for="category-name">Category Names </label>
            <select name="cat_name" required>
                <option selected>Select Category*</option>  
                <?php
                    $control = new Controller();
                    $control->get_cat();
                ?>
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" name="delcat">Delete Category</button>
        </div>      

    </form>

   <?php
        if(isset($_POST['delcat']) && $_POST['cat_name'] != "Select Category*")
        {
            $control = new Controller();
            $control->del_cat();
        
            
        }
    ?>

</div>

</div>

