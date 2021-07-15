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
			$fullname = $_POST['fullname'];
			$password = md5($_POST['password']);


			if ($tutor_obj->check_email($email)) {
				return displayWarning($email.' has already been registered. Try a unique one');
			}
			if ($tutor_obj->register_tutor($email,$fullname,$password)) {
				$tutor = $tutor_obj->fetch_tutor($email);
				$session->create_session('elearn_tutor',$tutor);
				return 1;
			}
			else{
				return displayWarning('Error With Server! Try again.');
			}
		}
	}
?>