<?php

    session_start();
	session_destroy();
	header("Location: customer-signin.php");
?>