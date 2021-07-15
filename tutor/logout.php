<?php 
	session_start();
	unset($_SESSION['elearn_student']);

	header('location: ./');
?>