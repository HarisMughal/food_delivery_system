
<?php

class Controller
{

    function admin_signin()
    {

        $con = new Model();

        $email = mysqli_real_escape_string($con->getConn(),$_POST['email']);
        $password = mysqli_real_escape_string($con->getConn(),$_POST['pass']);

        $password = md5($password);
		
			$query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
		
			$run_query = mysqli_query($con->getConn(),$query);
		
			
		
			if(mysqli_num_rows($run_query) < 1)
			{
			
					echo 
					"<script>
						alert('Username or password incorrect!!');
						window.open('admin_signin.php','_self');
					</script>";
		
			}
			else
			{
				$data = mysqli_fetch_assoc($run_query);
                $_SESSION['aname'] = $data['name'];			
				$_SESSION['aid'] = $data['id'];
				header('location: admin-view/admin-index.php');
			}
    }

  function add_category()
    {
        $con = new Model();
        
        $catName = mysqli_real_escape_string($con->getConn(),$_POST['catName']);


            $query = "INSERT INTO category(name) VALUES('$catName')";
            $run_query = mysqli_query($con->getConn(), $query);

            if($run_query)
            {
        	    ?>
                    <script>
                        alert("Category added successfully");
                        window.open("admin-index.php?addcategory","_self")
                    </script>
                <?php
            }
    }

    function get_cat()
    {
        $con = new Model();
        $query ="SELECT * FROM category";
        $run_query = mysqli_query($con->getConn(),$query);
        
    
        while($row = mysqli_fetch_assoc($run_query))
        {
            echo "<option value = " . $row['id'] . ">" . $row['name'] . "</option>";

            
        }
    }

    function del_cat()
    {
        $con = new Model();

            $delCat = mysqli_real_escape_string($con->getConn(),$_POST['cat_name']);
            $query = "DELETE FROM category WHERE id = $delCat";
            $run_query = mysqli_query($con->getConn(),$query);

            if($run_query)
            {
                echo '
                    <script>
                    alert("Category deleted successfully");
                    window.open("admin-index.php?deletecategory","_self");
                    </script>
                    ';
            } 
    }

    function view_chef()
        {
            $con = new Model();

        	$query = "SELECT * FROM chef";
            $run_query = mysqli_query($con->getConn(), $query);
            

            while($row = mysqli_fetch_assoc($run_query))
            {
                $cat_id = $row['category_id'];

                $query1 = "SELECT name FROM category WHERE id='$cat_id'";
                $run_query1= mysqli_query($con->getConn(),$query1);

                $row1 = mysqli_fetch_assoc($run_query1);
                echo 
                "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['password']}</td>
                    <td>{$row1['name']}</td>

                    <form method='POST'>
                        <td><button class='btn btn-danger' name='del_button' value = " . $row['id'] . ">Delete</button></td>
                    </form>
                    
                </tr>";
            }
        }

        function view_user()
        {
            $con = new Model();

        	$query = "SELECT * FROM customer";
            $run_query = mysqli_query($con->getConn(), $query);
            

            while($row = mysqli_fetch_assoc($run_query))
            {
               

                echo 
                "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['password']}</td>
                    

                    <form method='POST'>
                        <td><button class='btn btn-danger' name='del_button1' value = " . $row['id'] . ">Delete</button></td>
                    </form>
                    
                </tr>";
            }
        }
 
        function view_incomplete()
        {
            $con = new Model();

        	$query = "SELECT * FROM orders WHERE status = 0";
            $run_query = mysqli_query($con->getConn(), $query);
            

            while($row = mysqli_fetch_assoc($run_query))
            {
                echo 
                "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['customer_id']}</td>
                    <td>{$row['total_bill']}</td>  

                    <form method='POST'>
                        <td><button class='btn btn-success' name='deliver' value = " . $row['id'] . ">Deliver</button></td>
                    </form>
                    
                </tr>";
            }
        }

        function view_complete()
        {
            $con = new Model();

        	$query = "SELECT * FROM orders WHERE status = 1";
            $run_query = mysqli_query($con->getConn(), $query);
            

            while($row = mysqli_fetch_assoc($run_query))
            {
                echo 
                "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['customer_id']}</td>
                    <td>{$row['total_bill']}</td>  

                    <form method='POST'>
                        <td><button class='btn btn-success'>Completed</button></td>
                    </form>
                    
                </tr>";
            }
        }

}    

?>