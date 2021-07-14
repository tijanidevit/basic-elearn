<?php
    include_once 'db.class.php';

    class tutors extends DB{

        function register_tutor($email,$fullname,$password){
            return DB::execute("INSERT INTO tutors(email,fullname,password) VALUES(?,?,?)", [$email,$fullname,$password]);
        }        
        function fetch_tutors(){
            return DB::fetchAll("SELECT * FROM tutors ORDER BY fullname ASC",[]);
        }
        function fetch_tutor($email){
            return DB::fetch("SELECT * FROM tutors WHERE email = ? OR id = ?",[$email,$email] );
        }
        function fetch_tutor_rating($id){
            return DB::fetch("SELECT tutor_rating FROM tutors WHERE id = ? ",[$id] );
        }
        function update_tutor($fullname,$id){
            return DB::execute("UPDATE tutors SET fullname =? WHERE id = ? ", [$fullname,$id]);
        }
        function update_password($password,$id){
            return DB::execute("UPDATE tutors SET password =? WHERE id = ? ", [$password,$id]);
        }
        function tutors_num(){
            return DB::num_row("SELECT id FROM tutors ", []);
        }

        function check_email($email){
            return DB::num_row("SELECT id FROM tutors WHERE email = ? ", [$email]);
        }
        function tutor_login($email,$password){
            if (DB::num_row("SELECT id FROM tutors WHERE email = ?  AND password = ? ", [$email,$password]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }

        ###### tutor's courses
        function fetch_tutor_courses($tutor_id){
            return DB::fetchAll("SELECT * FROM courses WHERE tutor_id = ? ORDER BY id DESC ",[$tutor_id]);
        }

        function tutor_courses_num($tutor_id){
            return DB::num_row("SELECT id FROM courses WHERE tutor_id = ? ",[$tutor_id]);
        }
    }
?>