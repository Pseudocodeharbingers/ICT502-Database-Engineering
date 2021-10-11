<?php  
	session_start();
	$id = $_POST['id'];
	$pass = $_POST['pass'];

	include "dbconnect.php";

	$sql = "SELECT stu_id FROM student WHERE stu_id =:stu_id AND stu_password=:stu_password";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':stu_id',$id);
	oci_bind_by_name($result,':stu_password',$pass);

	oci_execute($result);
	$row = oci_fetch_array($result);
	if ($row) {
		oci_commit($c);
		$_SESSION['id']=$_POST['id'];
		oci_free_statement($result);
		oci_close($c);
			print '<script>alert("Succesfully login!");</script>';
			print '<script>window.location.assign("page-student-details.php?id='.$row[0].'");</script>';
		
	}
	else{
		
		oci_rollback($c);
		print '<script>alert("Wrong id and password!");</script>';
		print '<script>window.location.assign("login-student.php");</script>';
	}
?>