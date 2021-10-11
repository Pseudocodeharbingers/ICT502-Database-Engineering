<?php  
	
	$id = $_GET['id'];
	$code = $_GET['code'];

	include "dbconnect.php";

	$sql = "DELETE FROM learn WHERE stu_id=:stu_id AND sub_code=:sub_code";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':stu_id',$id);
	oci_bind_by_name($result,':sub_code',$code);
    oci_execute($result, OCI_COMMIT_ON_SUCCESS);

	if($result)
	   {
		oci_commit($c);
		print '<script>alert("Succesfully drop subject!");</script>';
		print '<script>window.location.assign("page-student-subject-reg.php?id='.$id.'");</script>';
		}
		else
		{
			oci_rollback($c);
			print '<script>alert("Data is Invalid , Cannot Register Subject !");</script>';
			print '<script>window.location.assign("page-student-subject-reg.php?id='.$id.'");</script>';
	    }

	
?>