<?php 
session_start();
if (!isset($_SESSION['elearn_student'])) {
    header('location: ../');
    exit();
}
$student_id = $_SESSION['elearn_student']['id'];
if (!isset($_GET['id'])) {
	header('location: courses');
    exit();
}
include_once '../core/students.class.php';
include_once '../core/core.function.php';
$student_obj = new students();
$course_id = $_GET['id'];
if ($student_obj->check_student_courses($student_id,$course_id) > 0) {
	set_flash('output',displayWarning('You already enrolled'));
}else{
	$student_courses = $student_obj->add_student_courses($student_id,$course_id);
}

header('location: course-class?id='.$course_id);
exit()
?>