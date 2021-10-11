<?php  
	$name = $_POST['stname'];
	$ic = $_POST['stic'];
	$email = $_POST['stemail'];
	$address = $_POST['staddress'];
	$phone = $_POST['stphone'];
	$pass = $_POST['stpass'];
	$salary = 0;
	//$hiredate = "sysdate";
	$approvement = '0';
	$manager = NULL;
	
	$category = $_POST['stcategory'];

	include "dbconnect.php";

	$sql = "INSERT INTO staff(sta_id, sta_name,sta_ic,sta_email,sta_address,sta_telnum,sta_salary,sta_pass,sta_approvement,manager_id) VALUES (sta_id_seq.NEXTVAL,:sta_name,:sta_ic,:sta_email,:sta_address, :sta_telnum, :sta_salary,:sta_pass,:sta_approvement,:manager_id)";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sta_name',$name);
	oci_bind_by_name($result,':sta_ic',$ic);
	oci_bind_by_name($result,':sta_email',$email);
	oci_bind_by_name($result,':sta_address',$address);
	oci_bind_by_name($result,':sta_telnum',$phone);
	//oci_bind_by_name($result,':sta_hiredate',$hiredate);
	oci_bind_by_name($result,':sta_salary',$salary);
	oci_bind_by_name($result,':sta_pass',$pass);
	oci_bind_by_name($result,':sta_approvement',$approvement);
	oci_bind_by_name($result,':manager_id',$manager);
	oci_execute($result);

	if ($result) {
		oci_commit($c);
		if($category == "Teacher"){
			print '<script>window.location.assign("signup-teacher.php");</script>';
		}
		else if($category == "Admin"){
			print '<script>window.location.assign("sql-signup-admin.php");</script>';}
		
	}
	else{
		
		oci_rollback($c);
		print '<script>alert("Error! There some issue during registration");</script>';
		print '<script>window.location.assign("signup-staff.php");</script>';
	}
?>