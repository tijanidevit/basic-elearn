<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/students.class.php';
	include_once '../../core/core.function.php';
	echo register();
	function register()
	{
		$session = new Session();
		$student_obj = new Students();
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$password = md5($_POST['password']);


			if (! $student_obj->check_email($email)) {
				return displayWarning('Email address not found!');
			}
			if ($student_obj->student_login($email,$password)) {
				$student = $student_obj->fetch_student($email);
				$session->create_session('elearn_student',$student);
				return 1;
			}
			else{
				return displayWarning('Invalid Login Credentials.');
			}
		}
	}
?>