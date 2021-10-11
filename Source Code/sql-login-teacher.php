<?php  
	session_start();
	$id = $_POST['id'];
	$pass = $_POST['pass'];

	include "dbconnect.php";

	$sql = "SELECT t.sta_id FROM staff s JOIN teacher t ON (t.sta_id = s.sta_id)  WHERE t.sta_id =:sta_id AND sta_pass=:sta_pass";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sta_id',$id);
	oci_bind_by_name($result,':sta_pass',$pass);

	oci_execute($result);
	$row = oci_fetch_array($result);
	if ($row) {
		oci_commit($c);
			print '<script>alert("Succesfully login!");</script>';
			print '<script>window.location.assign("page-teacher-details.php?id='.$row[0].'");</script>';
		
	}
	else{
		
		oci_rollback($c);
		print '<script>alert("Wrong id and password!");</script>';
		print '<script>window.location.assign("login-teacher.php");</script>';
	}
?>