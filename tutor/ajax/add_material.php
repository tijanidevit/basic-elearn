<?php 
	session_start();
	include_once '../../core/core.function.php';
	include_once '../../core/courses.class.php';

	echo add_course();
	function add_course(){
		$course_obj = new courses();

		if (!$_POST['course_title'] || $_POST['course_title']=="") {
			return  displayWarning('course course_title is required and cannot be empty');
		}
		$tutor_id = $_SESSION['elearn_tutor']['id'];
		$course_description = $_POST['course_description'];
		$course_title = $_POST['course_title'];
		$course_duration = $_POST['course_duration'];
		
		if ($course_obj->check_tutor_course($tutor_id,$course_title)) {
			return  displayWarning('You have already added this course');
		}

		$course_image = upload_file($_FILES['course_image'],'../../uploads/course/image/');

		if ($course_obj->add_course($tutor_id,$course_title,$course_description,$course_image,$course_duration)){
			set_flash('success',$course_title.' added successfully');
			return displaySuccess($course_title.' added successfully');
		}
		else{
			return displayError('Unable to add');
		}
	}
?>