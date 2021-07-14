<?php
    include_once 'db.class.php';

    class courses extends DB{

        function add_course($tutor_id,$course_title,$course_description,$course_image,$course_duration){
            return DB::execute("INSERT INTO courses(tutor_id,course_title,course_description,course_image,course_duration) VALUES(?,?,?,?,?)", [$tutor_id,$course_title,$course_description,$course_image,$course_duration]);
        }        
        function fetch_courses($order_by){
            return DB::fetchAll("SELECT *,courses.id FROM courses 
            JOIN tutors on tutors.id = courses.tutor_id
            ORDER BY $order_by",[]);
        }

        function fetch_limited_courses($order_by,$limit){
            return DB::fetchAll("SELECT *,courses.id FROM courses 
            JOIN tutors on tutors.id = courses.tutor_id
            ORDER BY $order_by LIMIT $limit",[]);
        }

        function fetch_course($id){
            return DB::fetch("SELECT *,courses.id FROM courses 
            JOIN tutors on tutors.id = courses.tutor_id
            WHERE id = ? OR id = ?",[$id] );
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
            return DB::fetchAll("SELECT *,course_courses.id FROM courses
            JOIN courses on courses.id = course_courses.course_id
            WHERE course_courses.course_id = ?
            ORDER BY course_courses.id DESC ",[$course_id]);
        }

        function course_courses_num($course_id){
            return DB::num_row("SELECT course_courses.id FROM courses WHERE course_courses.course_id = ? ",[$course_id]);
        }
    }
?>