<?php
	if(!isset($_SESSION['user_id']) || $_SESSION['rollID'] != 3){
		header('location:../admin%20panel/login.php'); 
	}
?>
