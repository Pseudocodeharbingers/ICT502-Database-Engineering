<?php  

	$id = $_GET['id'];
	$idd = $_GET['idd'];

	include "dbconnect.php";

	$sql = "DELETE FROM staff WHERE sta_id = : sta_id";
	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sta_id',$idd);
    oci_execute($result, OCI_COMMIT_ON_SUCCESS);

	if ($result) {
		oci_commit($c);
		print '<script>alert("Application had been disapprove!");</script>';
		print '<script>window.location.assign("page-admin-teacher-approvement-form.php?id='.$id.'");</script>';
		
		}
		else{
		
			oci_rollback($c);
			print '<script>alert("Error! There some issue during disapprove");</script>';
			print '<script>window.location.assign("page-admin-teacher-approvement-form.php?id='.$id.'");</script>';
			}

	
?>
