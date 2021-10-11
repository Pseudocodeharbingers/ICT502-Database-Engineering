.<?php  
	
	$id = $_GET['id'];
	$code = $_GET['code'];

	include "dbconnect.php";

	$sql = "DELETE FROM  subject  WHERE  sub_code =:sub_code";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sub_code',$code);
	oci_execute($result);

	$descriptions = "Delete subject code:".$code;
	$sql2 = "INSERT INTO log (log_id , log_description , adm_id) VALUES (log_id_seq.NEXTVAL , :log_description , :adm_id)";
	$result2 = oci_parse($c,$sql2);

	oci_bind_by_name($result2,':log_description',$descriptions);
	oci_bind_by_name($result2,':adm_id',$id);

	oci_execute($result2, OCI_COMMIT_ON_SUCCESS);

	if ($result) {
		oci_commit($c);
		print '<script>alert("Successfully deleting subject!");</script>';
		print '<script>window.location.assign("page-admin-viewsubject.php?id='.$id.'");</script>';}
		else{
			oci_rollback($c);
			print '<script>alert("Error! There some issue during deleting subject");</script>';
			print '<script>window.location.assign("page-admin-viewsubject.php?id='.$id.'");</script>';
		}

	
?>