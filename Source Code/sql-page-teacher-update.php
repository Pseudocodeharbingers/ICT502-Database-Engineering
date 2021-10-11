<?php
	$id = $_GET['id'];
	$name = $_POST['stname'];
	$ic = $_POST['stic'];
	$email = $_POST['stemail'];
	$address = $_POST['staddress'];
	$phone = $_POST['stphone'];
	$schoolname = $_POST['tcrschoolname'];
	$certificate = $_POST['tcrcertid'];


	include "dbconnect.php";
		
	$sql = "UPDATE staff SET sta_ic = :sta_ic, sta_name = :sta_name, sta_email= :sta_email, sta_telnum= :sta_telnum, sta_address= :sta_address WHERE sta_id = :sta_id";
	

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sta_id',$id);
	oci_bind_by_name($result,':sta_name',$name);
	oci_bind_by_name($result,':sta_ic',$ic);
	oci_bind_by_name($result,':sta_email',$email);
	oci_bind_by_name($result,':sta_telnum',$phone);
	oci_bind_by_name($result,':sta_address',$address);
    oci_execute($result, OCI_COMMIT_ON_SUCCESS);

    $sql1 = "UPDATE teacher SET tea_school = :tea_school, tea_cert = :tea_cert  WHERE sta_id = :sta_id";
    $result1 = oci_parse($c,$sql1);
    oci_bind_by_name($result1,':sta_id',$id);
	oci_bind_by_name($result1,':tea_cert',$certificate);
	oci_bind_by_name($result1,':tea_school',$schoolname);
    oci_execute($result1, OCI_COMMIT_ON_SUCCESS);

	   if($result && $result1)
	   {
		oci_commit($c);
		print '<script>alert("Your data had been update!");</script>';
		print '<script>window.location.assign("page-teacher-details.php?id='.$id.'");</script>';
		}
		else
		{
			oci_rollback($c);
			print '<script>alert("Data is Invalid , No Record Been Updated !");</script>';
			print '<script>window.location.assign("page-teacher-details.php?id='.$id.'");</script>';
	    }
?>

