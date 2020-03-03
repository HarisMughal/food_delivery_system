
<?php 
    require_once('../../model/conn.php');
    include('../admin-controller.php');
   
?>

<h1 class="page-header">
  Add a new category

</h1>

<div class="col-md-4">
    
    <form method="post">
    
        <div class="form-group">
            <label for="category-name">Category Name</label>
            <input type="text" class="form-control" name="catName" required>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="addcat" value="Add Category" required>
        </div>      


    </form>


</div>

</div>

<?php
        if(isset($_POST['addcat']))
        {
            $control = new Controller();
                $control->add_category();


        }
        
    ?>

