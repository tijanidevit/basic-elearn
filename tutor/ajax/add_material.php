<?php 
	session_start();
	include_once '../../core/core.function.php';
	include_once '../../core/courses.class.php';

	echo add_course();
	function add_course(){
		$course_obj = new courses();

		if (!$_POST['title'] || $_POST['title']=="") {
			return  displayWarning('Material title is required and cannot be empty');
		}
		$tutor_id = $_SESSION['elearn_tutor']['id'];
		$transcript = $_POST['transcript'];
		$course_id = $_POST['course_id'];
		$title = $_POST['title'];
		$duration = $_POST['duration'];
		
		// if ($course_obj->check_tutor_course($tutor_id,$course_title)) {
		// 	return  displayWarning('You have already added this course');
		// }

		$material = upload_file($_FILES['material'],'../../uploads/course/material/');

		if ($course_obj->add_course_material($course_id,$title,$material,$transcript,$duration)){
			set_flash('success',$title.' added successfully');
			return displaySuccess($title.' added successfully');
		}
		else{
			return displayError('Unable to add');
		}
	}
?>