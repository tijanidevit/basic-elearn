<?php 
	session_start();
	unset($_SESSION['elearn_tutor']);

	header('location: ./');
?>