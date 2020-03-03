<?php
    require_once('../model/conn.php');
?>



<?php

class Controller
{

  function chef_signup()
    {
        $con = new Model();
        $flagname=true;
        $passlen=true;
        
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
                            window.open("chef-signup.php","_self")
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
                                    window.open("chef-signin.php","_self")
                                </script>
                            <?php
                        }
                    }

                    else
                    {
                        ?>
                        <script>
                            alert("Email already exist");
                            window.open("chef-signup.php","_self")
                        </script>
                        <?php
                    }
                }

                else
                {
                    ?>
                    <script>
                        alert("Password should be at least 6 characters long");
                        window.open("chef-signup.php","_self")
                    </script>
                <?php
                }

                
            }


        }

        else
        {
            ?>
                <script>
                    alert("Invalid name entered");
                    window.open("chef-signup.php","_self")
                </script>
            <?php
        }
        

            
    }

    function chef_signin()
    {

        $con = new Model();
        $email = mysqli_real_escape_string($con->getConn(),$_POST['email']);
        $password = mysqli_real_escape_string($con->getConn(),$_POST['pass']);

       // $password1 = md5($password);

        $query = "SELECT * FROM chef WHERE email = '$email' && password='$password'";
        $run_query = mysqli_query($con->getConn(), $query);

        if(mysqli_num_rows($run_query) < 1)
        {
        
                echo 
                "<script>
                    alert('Username or password incorrect!!');
                    window.open('chef-signin.php','_self');
                </script>";
    
        }
        else
        {
            $data = mysqli_fetch_assoc($run_query);
            $name = $data['name'];			
            $_SESSION['cid'] = $data['id'];
            $_SESSION['cname'] = $name;
            header('location: chefview.php');
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

    function add_dish()
    {
        $con = new Model();

        $name = mysqli_real_escape_string($con->getConn(),$_POST['name']);
        $cat_id = mysqli_real_escape_string($con->getConn(),$_POST['cat_id']);
        $price = mysqli_real_escape_string($con->getConn(),$_POST['price']);
        if (preg_match("/^[0-9]+(\.[0-9]{2})?$/", $price))
        {
            $description = mysqli_real_escape_string($con->getConn(),$_POST['desc']);

            $f_query = "SELECT * FROM dish WHERE name='$name' AND category_id='$cat_id'";
            $run_f_query = mysqli_query($con->getConn(),$f_query);

            if(mysqli_num_rows($run_f_query) == 0 )
            {
                $query = "INSERT INTO dish(name,category_id,price,description) VALUES('$name', '$cat_id', '$price', '$description')";
                $run_query = mysqli_query($con->getConn(),$query);
        
                if($run_query)
                {
                    $query2 = "SELECT * FROM dish WHERE id = (SELECT MAX(id) FROM dish)";
                    $run_query2 = mysqli_query($con->getConn(),$query2);
                    $row = mysqli_fetch_assoc($run_query2);
                    
                    $cid = $_SESSION['cid'];
                    $id = $row['id'];
                    $cat_id = $row['category_id']; 

                    
                        $query4 = "INSERT INTO chef_dish(chef_id, dish_id, cat_id) VALUES('$cid', '$id', '$cat_id')";
                        $run_query4 = mysqli_query($con->getConn(),$query4);

                        echo 
                        "<script>
                            alert('Dish Added Successfully');

                            window.open('adddish.php','_self');
                        </script>";
                }
        
            }
            

            else
            {
                // $cid = $_SESSION['cid'];
                // $query3 = "SELECT * FROM chef_dish WHERE chef_id='$cid' AND dish_id='$id' AND cat_id='$cat_id'";
                // $run_query3 = mysqli_query($con->getConn(),$query3);
                    
                // if(mysqli_num_rows($run_query3) == 0)
                // {
                //     echo 
                //     "<script>
                //         alert('Dish Already Added');
                //         window.open('adddish.php','_self');
                //     </script>";
                // }
                
            
            }
        }

        else
        {
            ?>

                <script>
                    alert("Enter valid price");
                    window.open('adddish.php','_self');
                </script>
                <?php
        }
        
    }
    function get_dish()
    {

        $con = new Model();
        $query ="SELECT * FROM chef_dish WHERE chef_id = {$_SESSION['cid']}";
        $run_query = mysqli_query($con->getConn(),$query);
        
    
        while($row = mysqli_fetch_assoc($run_query))
        {
            $chef_id = $row['chef_id'];
            $dish_id = $row['dish_id'];
            $cat_id = $row['cat_id'];
            
            $query1 = "SELECT d.description AS minus, d.id AS zero,c.name AS first, d.name AS second, d.price AS third, ca.name AS fourth FROM chef c, dish d,category ca WHERE c.id = $chef_id AND d.id=$dish_id AND ca.id = $cat_id";
            $run_query1 = mysqli_query($con->getConn(), $query1);
            $row1 = mysqli_fetch_assoc($run_query1);
            echo"<div class='column mt-4 ml-4'>
                    <div class='card' style='width: 20rem;'>
                        <img class='card-img-top' src='../images/1.jpg' alt='Card image cap'>
                        <div class='card-body'>
                            <h3 class='card-title text-danger text-center'>{$row1['second']}</h3>
                            <h3 class='card-title text-danger text-center'><span>Rs </span>{$row1['third']}</h3>
                            <h3 class='card-title text-danger text-center'><span>Category: </span>{$row1['fourth']}</h3>
                            <h5 class='card-text mb-2' >{$row1['minus']}</h5>
                            
                            <a href='chefview.php?chef_id={$chef_id}&dish_id={$dish_id}' class='btn btn-outline-danger text-primary'>Delete</a>
                        </div>
                    </div>
                </div>";

            
        }

    }

    function sales()
    {
        $con = new Model();

        $query = "SELECT * FROM chef_dish WHERE chef_id='{$_SESSION['cid']}'";
        $run_query = mysqli_query($con->getConn(), $query);

        while($row = mysqli_fetch_assoc($run_query))
        {
            $query1 = "SELECT * FROM order_dish WHERE dish_id = '{$row['dish_id']}'";
            $run_query1 = mysqli_query($con->getConn(), $query1);

            if(mysqli_num_rows($run_query1) > 0)
            {
                $row1 = mysqli_fetch_assoc($run_query1);
                $query2 = "SELECT * FROM orders WHERE id = '{$row1['order_id']}'";
                $run_query2 = mysqli_query($con->getConn(), $query2);
                $row2 = mysqli_fetch_assoc($run_query2);
                if($row2['status'] == 1)
                {
                    $query3 = "SELECT * FROM dish WHERE id = '{$row['dish_id']}'";
                    $run_query3 = mysqli_query($con->getConn(), $query3);

                    while($row3 = mysqli_fetch_assoc($run_query3))
                    {
                        echo 
                        "<tr>
                            <td>{$row3['name']}</td>
                            <td>{$row3['price']}</td>
                            
                        </tr>";

                    }
                }
                
            }

            else
            {
                ?>

                <script>
                    alert("No Orders yet");
                    window.open('chefview.php','_self');
                </script>
                <?php
            }
            

        }


    }

}    

?>