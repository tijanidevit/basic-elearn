<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/tutors.class.php';
	include_once '../../core/core.function.php';
	echo register();
	function register()
	{
		$session = new Session();
		$tutor_obj = new tutors();
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$password = md5($_POST['password']);


			if (! $tutor_obj->check_email($email)) {
				return displayWarning('Email address not found!');
			}
			if ($tutor_obj->tutor_login($email,$password)) {
				$tutor = $tutor_obj->fetch_tutor($email);
				$session->create_session('elearn_tutor',$tutor);
				return 1;
			}
			else{
				return displayWarning('Invalid Login Credentials.');
			}
		}
	}
?>