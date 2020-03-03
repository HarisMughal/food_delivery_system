
<h1 class="page-header">
  Delete User

</h1>


<div class="col-md-4">
    
    <form method="post">
    
        <div class="form-group">
            <label for="user-name">User Names </label>
            <select name="user_name" required>
                <option selected>Select User*</option>  
                <?php
                    get_user();
                ?>
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" name="deluser">Delete User</button>
        </div>      

    </form>

   <?php
        if(isset($_POST['deluser']) && $_POST['user_name'] != "Select User*")
        {
           delUser();
        }
    ?>

</div>

</div>

