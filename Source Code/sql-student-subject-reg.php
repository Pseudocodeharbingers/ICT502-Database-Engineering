<?php
	$id = $_GET['id'];
	$subject = $_POST['subject'];

	include "dbconnect.php";

	$sql = "INSERT INTO learn(stu_id, sub_code) VALUES (:stu_id,:sub_code) ";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':stu_id',$id);
	oci_bind_by_name($result,':sub_code',$subject);
    oci_execute($result, OCI_COMMIT_ON_SUCCESS);

	if($result)
	   {
		oci_commit($c);
		print '<script>alert("You had register your subject!");</script>';
		print '<script>window.location.assign("page-student-subject-reg.php?id='.$id.'");</script>';
		}
		else
		{
			oci_rollback($c);
			print '<script>alert("Data is Invalid , Cannot Register Subject !");</script>';
			print '<script>window.location.assign("page-student-subject-reg.php?id='.$id.'");</script>';
	    }
?>