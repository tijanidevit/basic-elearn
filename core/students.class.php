<?php
    include_once 'db.class.php';

    class students extends DB{

        function register_student($email,$fullname,$password){
            return DB::execute("INSERT INTO students(email,fullname,password) VALUES(?,?,?)", [$email,$fullname,$password]);
        }        
        function fetch_students(){
            return DB::fetchAll("SELECT * FROM students ORDER BY fullname ASC",[]);
        }
        function fetch_student($email){
            return DB::fetch("SELECT * FROM students WHERE email = ? OR id = ?",[$email,$email] );
        }
        function fetch_student_rating($id){
            return DB::fetch("SELECT student_rating FROM students WHERE id = ? ",[$id] );
        }
        function update_student($fullname,$id){
            return DB::execute("UPDATE students SET fullname =? WHERE id = ? ", [$fullname,$id]);
        }
        function update_password($password,$id){
            return DB::execute("UPDATE students SET password =? WHERE id = ? ", [$password,$id]);
        }
        function students_num(){
            return DB::num_row("SELECT id FROM students ", []);
        }

        function check_email($email){
            return DB::num_row("SELECT id FROM students WHERE email = ? ", [$email]);
        }
        function student_login($email,$password){
            if (DB::num_row("SELECT id FROM students WHERE email = ?  AND password = ? ", [$email,$password]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }

        ###### student's courses
        function fetch_student_courses($student_id){
            return DB::fetchAll("SELECT *,student_courses.id FROM student_courses
            JOIN courses on courses.id = student_courses.course_id
            JOIN tutors on tutors.id = courses.tutor_id
            WHERE student_courses.student_id = ?
            ORDER BY student_courses.id DESC ",[$student_id]);
        }


        function add_student_courses($student_id,$course_id){
            return DB::execute("INSERT INTO student_courses(student_id,course_id) VALUES(?,?) ",[$student_id,$course_id]);
        }

        function check_student_courses($student_id,$course_id){
            return DB::num_row("SELECT id FROM student_courses WHERE student_id = ? AND course_id = ? ",[$student_id,$course_id]);
        }

        function student_courses_num($student_id){
            return DB::num_row("SELECT id FROM student_courses WHERE student_id = ? ",[$student_id]);
        }
    }
?>