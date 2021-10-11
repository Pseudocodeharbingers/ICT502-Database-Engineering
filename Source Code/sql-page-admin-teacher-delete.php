<?php  
 $id = $_GET['id'];
 $idd = $_GET['idd'];

 include "dbconnect.php";

	$sql = "DELETE FROM  staff  WHERE  sta_id = :sta_id";
	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sta_id',$idd);

	oci_execute($result);;

	$descriptions = "Delete teacher id:".$idd;
	$sql2 = "INSERT INTO log (log_id , log_description , adm_id) VALUES (log_id_seq.NEXTVAL , :log_description , :adm_id)";
	$result2 = oci_parse($c,$sql2);

	oci_bind_by_name($result2,':log_description',$descriptions);
	oci_bind_by_name($result2,':adm_id',$id);

	oci_execute($result2, OCI_COMMIT_ON_SUCCESS);

	if ($result) {
		oci_commit($c);
		print '<script>alert("Teacher deleted!");</script>';
		print '<script>window.location.assign("page-admin-teacher.php?id='.$id.'");</script>';}
		else{
		
			oci_rollback($c);
			print '<script>alert("Error! There some issue during deleting teacher");</script>';
			print '<script>window.location.assign("page-admin-teacher.php?id='.$id.'");</script>';
			}
?>