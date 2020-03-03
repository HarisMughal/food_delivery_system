<?php
    require_once('../model/conn.php');
?>



<?php

class Controller
{

  function customer_signup()
  {
        $con = new Model();
        $flagname = true;
        $passlen = true;
        
        $name = mysqli_real_escape_string($con->getConn(),$_POST['name']);
        if (!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $flagname=false;
        }

        if($flagname)
        {
            $email = mysqli_real_escape_string($con->getConn(),$_POST['email']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                ?>
                        <script>
                            alert("Invalid email");
                            window.open("customer-signup.php","_self")
                        </script>
                    <?php
            }
            else
            {
                $phone = mysqli_real_escape_string($con->getConn(),$_POST['phone']);
                $address = mysqli_real_escape_string($con->getConn(),$_POST['address']);
                $cat_id = mysqli_real_escape_string($con->getConn(),$_POST['cat_id']);
                $password = mysqli_real_escape_string($con->getConn(),$_POST['password']);

                if(strlen($passsword) < 6)
                {
                    $passlen = false;
                }

                if($passlen)
                {
                    $password1 = md5($password);

                    $check_query = "SELECT * FROM customer WHERE email = '$email'";
                    $run_check_query = mysqli_query($con->getConn(), $check_query);

                    if(mysqli_num_rows($run_check_query) == 0)
                    {
                        $query = "INSERT INTO customer(name,email,phone,address,password) VALUES('$name','$email','$phone','$address', '$password1')";
                        $run_query = mysqli_query($con->getConn(), $query);

                        if($run_query)
                        {
                            ?>
                                <script>
                                    alert("Sign Up Successfully");
                                    window.open("customer-signin.php","_self")
                                </script>
                            <?php
                        }
                    }

                    else
                    {
                        ?>
                        <script>
                            alert("Email already exist");
                            window.open("customer-signup.php","_self")
                        </script>
                    <?php
                    }
                }
                else
                {
                    $password1 = md5($password);

                $check_query = "SELECT * FROM customer WHERE email = '$email'";
                $run_check_query = mysqli_query($con->getConn(), $check_query);

                if(mysqli_num_rows($run_check_query) == 0)
                {
                    $query = "INSERT INTO customer(name,email,phone,address,password) VALUES('$name','$email','$phone','$address', '$password1')";
                    $run_query = mysqli_query($con->getConn(), $query);

                    if($run_query)
                    {
                        ?>
                            <script>
                                alert("Sign Up Successfully");
                                window.open("customer-signin.php","_self")
                            </script>
                        <?php
                    }
                }

                else
                {
                    ?>
                    <script>
                        alert("Password should be at least 6 characters long");
                        window.open("customer-signup.php","_self")
                    </script>
                <?php
                }
                }

                
            }
        } 
        
        else
        {
            ?>
                <script>
                    alert("Invalid name entered");
                    window.open("customer-signup.php","_self")
                </script>
            <?php
        }
    }

    function customer_signin()
    {

        $con = new Model();
        $email = mysqli_real_escape_string($con->getConn(),$_POST['email']);
        $password = mysqli_real_escape_string($con->getConn(),$_POST['pass']);

        $password1 = md5($password);

        $query = "SELECT * FROM customer WHERE email = '$email' && password='$password1'";
        $run_query = mysqli_query($con->getConn(), $query);



        if(mysqli_num_rows($run_query) < 1)
        {
        
                echo 
                "<script>
                    alert('Username or password incorrect!!');
                    window.open('customer-signin.php','_self');
                </script>";
    
        }
        else
        {
            $data = mysqli_fetch_assoc($run_query);
            $name = $data['name'];			
            $_SESSION['ccid'] = $data['id'];
            $_SESSION['ccname'] = $name;
            header('location: customerview.php');
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

    function get_dish()
    {

        $con = new Model();
        $query ="SELECT d.id AS dish_id,d.name AS dish_name, c.name AS chef_name, d.price, cd.chef_id, c.category_id, cd.dish_id, ca.name AS cat_name, cd.cat_id FROM chef_dish AS cd, dish AS d, chef AS c, category AS ca WHERE c.id = cd.chef_id AND d.id = cd.dish_id AND cd.cat_id = ca.id";
        $run_query = mysqli_query($con->getConn(),$query);
    
        while($row = mysqli_fetch_assoc($run_query))
        {
            $spec_id = $row['category_id'];
            $query1 = "SELECT name FROM category WHERE id = $spec_id";
            $run_query1 = mysqli_query($con->getConn(), $query1);
            $row1 = mysqli_fetch_assoc($run_query1);

    

            echo"<div class='column mt-4 ml-4'>
                    <div class='card' style='width: 20rem;'>
                        <img class='card-img-top' src='../images/1.jpg' alt='Card image cap'>
                        <div class='card-body'>
                            <h3 class='card-title text-danger text-center'>{$row['dish_name']}</h3>
                            <h3 class='card-title text-danger text-center'><span>Rs </span>{$row['price']}</h3>
                            <h3 class='card-text mb-2' >Chef: {$row['chef_name']}</h3>
                            <h3 class='card-text mb-2' >Category: {$row['cat_name']}</h3>
                            <h3 class='card-text mb-2' >Speciality: {$row1['name']}</h3>

                            <div class='text-center' style='border:1px solid red; border-radius:5px; background-color:black;'>
                               <h1> <a href='cartValidate.php?add={$row['dish_id']}'>Order</a><h1>
                            </div>
                            
                        </div>
                    </div>
                </div>";

            
        }

        
    }

    function checkout()
    {
        $con = new Model();

        $c_id = $_SESSION['ccid'];
        $t_bill = $_SESSION['item_total'];
        
        $query1 = "INSERT INTO orders (customer_id, total_bill) VALUES ('$c_id', '$t_bill')";
        $run_query = mysqli_query($con->getConn(),$query1);

        $query2 = "SELECT max(id) as o_id FROM orders";
        $run_query2 = mysqli_query($con->getConn(),$query2);
        $row = mysqli_fetch_assoc($run_query2);
        
        $o_id = $row['o_id'];
            
        //echo $o_id;
        
        foreach ($_SESSION as $name => $value) {
      
          if($value > 0){  

              if(substr($name, 0, 8) == "product_"){

                  $length = strlen($name)-8;

                  $id = substr($name, 8, $length);

                    $query3 = "INSERT INTO order_dish VALUES ('$o_id', '$id', '$value')";
                    $run_query = mysqli_query($con->getConn(),$query3);
        
                }
            }
        }
        
        ?>
        <script>
            window.open('customerview.php','_self');  
        </script>

        <?php
    }
    
    function add_to_cart()
    {
        $con = new Model();
 
        foreach ($_SESSION as $name => $value) 
        {
            if($value > 0)
            {  
      
              if(substr($name, 0, 8) == "product_")
              {
                        $length = strlen($name)-8;
            
                        $id = substr($name, 8, $length);

                        $query = "SELECT * FROM dish WHERE id = '$id'";
                        $run_query = mysqli_query($con->getConn(),$query);
                        $row = mysqli_fetch_assoc($run_query);
                        
                $s = $row['price']*$_SESSION['product_' . $id];
                  
                echo "                    
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['price']}</td>
                    <td>{$_SESSION['product_' . $id]}</td>
                    <td>$s</td>
                    
                    
                    <td>
                        <a href='cartValidate.php?add={$id}' style='background-color:green;' class='btn' href=''><i class=fas fa-plus'></i></a>
                        <a href='cartValidate.php?remove={$id}' style='border:1px solid yellow' class='btn' href=''><i class='fas fa-minus'></i></a>
                        <a href='cartValidate.php?delete={$id}' style='border:1px solid red' class='btn' href=''><i class='fas fa-times'></i></a>
                    </td>
                </tr> ";

                
             }

            } 

        }
        
    }

    function view_incomplete()
        {
            $con = new Model();

        	$query = "SELECT * FROM orders WHERE customer_id='{$_SESSION['ccid']}' AND status=0";
            $run_query = mysqli_query($con->getConn(), $query);          

            while($row = mysqli_fetch_assoc($run_query))
            {
                // $ord_id = $row['id'];

                // $query1 = "SELECT * FROM order_dish WHERE order_id = '$ord_id'";
                // $run_query1 = mysqli_query($con->getConn(), $query1);
                echo 
                "<tr>
                    <td>{$row['id']}</td>  
                    <td>{$row['total_bill']}</td>  
                    
                </tr>";
            }
        }

        function view_complete()
        {
            $con = new Model();

        	$query = "SELECT * FROM orders WHERE status = 1 AND customer_id='{$_SESSION['ccid']}'";
            $run_query = mysqli_query($con->getConn(), $query);
            

            while($row = mysqli_fetch_assoc($run_query))
            {
                echo 
                "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['total_bill']}</td>  

                    <form method='POST'>
                        <td><button class='btn btn-success'>Completed</button></td>
                    </form>
                    
                </tr>";
            }
        }

    
}
?>