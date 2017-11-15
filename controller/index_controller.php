<?php 

	include_once '../model/db.php';


	function get_students_details(){
		$conn = db_connect();
		return select("*","`students`","1",$conn);
	}

	function get_student_mark($student_id){
		$conn = db_connect();
		$student_id = sanitize($student_id, $conn);
		$where = "`student_id` = ".$student_id;
		return select("*","`marks`",$where,$conn);
	}