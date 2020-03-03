<?php
include('header.php');
include('chef-controller.php');

session_start();

    if(!isset($_SESSION['cid']))
    {
        header('location: chef-signin.php');
    }
    
?>


<?php
    include('chef-header.php');;
?>


<div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Add Dish</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="form-control input--style-2" type="text" placeholder="Name" name="name" required>
                        </div>

                        <div class="form-group">
                            <!-- <label for="category-name">Categories </label> -->
                            <select class="form-control" name="cat_id" required>
                                <option selected>Select Category*</option>  
                                <?php
                                    $control = new Controller();
                                    $control->get_cat();
                                ?>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Rs</span>
                            </div>
                            <input type="text" class="form-control" name="price" placeholder="Price" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="form-group">
                            <label for="comment">Description</label>
                            <textarea class="form-control" rows="5"  name="desc"></textarea>
                        </div>
                                                
                        
                        
                        <div class="p-t-30">
                            <button name="adddish" class="btn btn--radius btn--green" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php

    if(isset($_POST['adddish']))
    {
        $control = new Controller();
        $control->add_dish();
    }

    // if(isset($_POST[$row['id']]))
    // {
    //     $query = "DELET FROM dish"
    // }

    ?>






















    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
</html>