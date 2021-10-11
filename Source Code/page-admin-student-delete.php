<?php  
 $id = $_GET['id'];
 $idd = $_GET['idd'];

 include "dbconnect.php";

	$sql = "DELETE FROM  student  WHERE  stu_id = :stu_id";
	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':stU_id',$idd);
    oci_execute($result);

	if ($result) {
		oci_commit($c);
		print '<script>alert("Student deleted!");</script>';
		//header("location: index.html");}
		print '<script>window.location.assign("page-admin-student.php?id='.$id.'");</script>';}
		else{
		
			oci_rollback($c);
			print '<script>alert("Error! There some issue during deleting student");</script>';
			print '<script>window.location.assign("page-admin-student.php?id='.$id.'");</script>';
			}
?>