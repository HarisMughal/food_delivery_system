<?php require_once('../model/conn.php'); 
    
    
	session_start();

?>

<?php 

if(isset($_GET['add'])){

        $_SESSION['product_' . $_GET['add']]++;
        header("Location: cart.php");
  }

  if(isset($_GET['remove'])){

    $_SESSION['product_' . $_GET['remove']]--;

    if($_SESSION['product_' . $_GET['remove']] < 1){
      unset($_SESSION['item_total']);
      unset($_SESSION['item_quantity']);
      header("Location: cart.php");
    }
    else{ 
      header("Location: cart.php");
    }
  }

  if(isset($_GET['delete'])){
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    header("Location: cart.php");
  }


  function cart(){

      $con = new Model();
      
    $total = 0;
    $item_quantity = 0;

    foreach ($_SESSION as $name => $value) {
      
      if($value > 0){  

        if(substr($name, 0, 8) == "product_"){

          $length = strlen($name)-8;

          $id = substr($name, 8, $length);

          $query1 = "SELECT * FROM dish WHERE id = '$id'";
          $run_query = mysqli_query($con->getConn(),$query1);
            
            
          while($row = mysqli_fetch_assoc($run_query)){

            $sub = $row['price'] * $value;
            $item_quantity += $value;

$product = <<<DELIMETER

<tr>
  <td>{$row['name']}</td>
  <td>&#36;{$row['price']}</td>
  <td>{$value}</td>
  <td>&#36;{$sub}</td>
  <td>
    <a href='cartValidate.php?add={$id}' style='border:1px solid green' class='btn' href=''><i class='fas fa-plus'></i></a>
    <a href='cartValidate.php?remove={$id}' style='border:1px solid yellow' class='btn' href=''><i class='fas fa-minus'></i></a>
    <a href='cartValidate.php?delete={$id}' style='border:1px solid red' class='btn' href=''><i class='fas fa-times'></i></a>
  </td>
</tr>

DELIMETER;

          echo $product;
        }

        $_SESSION['item_total'] = $total += $sub;
        $_SESSION['item_quantity'] = $item_quantity;
      }
    }
  }
      
}


  
?>













