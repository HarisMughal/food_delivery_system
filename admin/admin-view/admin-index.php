<?php include("../admin_header.php");  ?>
 <?php
    session_start();

    if(!isset($_SESSION['aid']))
    {
        
        header('location: ../admin_signin.php');     
    }


?>


<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    
    <!--Top Items -->
    <?php include("../top_nav.php"); ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include("../side_nav.php"); ?>

</nav>
<h3 class="text-center bg-warning"><?php echo "Welcome"; ?></h3>

<div id="page-wrapper">

    <div class="container-fluid">

            <?php 
        
                if(isset($_GET['addcategory'])){

                  include("addcategory.php");  

                }

                if(isset($_GET['deletecategory'])){

                  include("deletecategory.php");  

                }

                if(isset($_GET['viewuser'])){

                  include("viewuser.php");  

                }
                if(isset($_GET['viewchef'])){

                  include("viewchef.php");  

                }

                if(isset($_GET['viewinc'])){

                  include("viewincomplete.php");  

                }

                if(isset($_GET['viewcomp'])){

                  include("viewcomplete.php");  

                }
        
            ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("../footer.php"); ?>


</body>
</html>