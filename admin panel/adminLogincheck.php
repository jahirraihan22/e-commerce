<?php
	if(!isset($_SESSION['user_id']) || $_SESSION['rollID'] != 2){
		header('location:../admin%20panel/login.php'); 
	}
?>