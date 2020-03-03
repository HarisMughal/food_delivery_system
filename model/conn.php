<?php

class Model
{
    private $conn; 

    function getConn()
    {

        $conn = mysqli_connect("localhost", "root", "", "se_project");
    
        return $conn;
    }
    
}
    

?>
