<?php  
		include "dbconnect.php";
		$sql="SELECT sta_id FROM staff WHERE ROWNUM <= 1 ORDER BY sta_id DESC";
		$result=oci_parse($c,$sql);
		oci_execute($result);
		$row = oci_fetch_array($result);
		$id = $row["STA_ID"];


	$sql = "INSERT INTO admin(sta_id) VALUES (:sta_id)";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sta_id',$id);
	oci_execute($result);

	if ($result) {
		oci_commit($c);
			print '<script>alert("You are succesfully sign up!");</script>';
			print '<script>window.location.assign("login-admin.php");</script>';
	}
	else{
		
		oci_rollback($c);
		print '<script>window.location.assign("login-admin.php");</script>';
	}
?>