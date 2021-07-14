<?php
    include_once 'db.class.php';

    class courses extends DB{

        function add_course($tutor_id,$course_title,$course_description,$course_image,$course_duration){
            return DB::execute("INSERT INTO courses(tutor_id,course_title,course_description,course_image,course_duration) VALUES(?,?,?,?,?)", [$tutor_id,$course_title,$course_description,$course_image,$course_duration]);
        }        
        function fetch_courses($order_by = 'courses.id DESC'){
            return DB::fetchAll("SELECT *,courses.id FROM courses 
            JOIN tutors on tutors.id = courses.tutor_id
            ORDER BY $order_by",[]);
        }

        function fetch_limited_courses($order_by = 'courses.id DESC',$limit){
            return DB::fetchAll("SELECT *,courses.id FROM courses 
            JOIN tutors on tutors.id = courses.tutor_id
            ORDER BY $order_by LIMIT $limit",[]);
        }

        function fetch_course($id){
            return DB::fetch("SELECT *,courses.id FROM courses 
            JOIN tutors on tutors.id = courses.tutor_id
            WHERE courses.id = ?",[$id] );
        }

        function fetch_course_rating($id){
            return DB::fetch("SELECT course_rating FROM courses WHERE id = ? ",[$id] );
        }
        function update_course($course_title,$course_description,$course_image,$course_duration,$id){
            return DB::execute("UPDATE courses SET course_title =?, course_description =?, course_image =?, course_duration =? WHERE id = ? ", [$course_title,$course_description,$course_image,$course_duration,$id]);
        }

        function courses_num(){
            return DB::num_row("SELECT id FROM courses ", []);
        }

        function check_tutor_course($tutor_id,$course_title){
            return DB::num_row("SELECT id FROM courses WHERE tutor_id = ? AND course_title = ? ", [$tutor_id,$course_title]);
        }

        ###### course's students
        function fetch_course_students($id){
            return DB::fetchAll("SELECT *,student_courses.id FROM student_courses
            JOIN courses on courses.id = student_courses.course_id
            JOIN students on students.id = student_courses.course_id
            WHERE student_courses.course_id = ?
            ORDER BY student_courses.id DESC ",[$course_id]);
        }

        function student_courses_num($course_id){
            return DB::num_row("SELECT id FROM student_courses WHERE course_id = ? ",[$course_id]);
        }

        ###### course's materials
        function fetch_course_materials($course_id){
            return DB::fetchAll("SELECT * FROM course_materials
            WHERE course_id = ?
            ORDER BY id ",[$course_id]);
        }

        function course_materials_num($course_id){
            return DB::num_row("SELECT id FROM course_materials WHERE course_id = ? ",[$course_id]);
        }
    }
?>