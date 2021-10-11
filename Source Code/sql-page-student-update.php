<?php
$id = $_GET['id'];
$ic = $_POST['stdic'];
$name = $_POST['stdname'];
$sex = $_POST['stdgender'];
$school = $_POST['stdschoolname'];
$address = $_POST['stdaddress'];
$category = $_POST['stdcategory'];
$email = $_POST['stdemail'];
$phone = $_POST['stdphone'];
$parentPhone = $_POST['stdtel'];


	include "dbconnect.php";
		
	$sql = "UPDATE student SET stu_ic = :stu_ic, stu_name = :stu_name, stu_email= :stu_email, stu_gender= :stu_gender, stu_telnum= :stu_telnum, stu_address= :stu_address, stu_parentnum= :stu_parentnum, stu_category= :stu_category, stu_schoolname= :stu_schoolname WHERE stu_id = :stu_id";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':stu_id',$id);
	oci_bind_by_name($result,':stu_name',$name);
	oci_bind_by_name($result,':stu_ic',$ic);
	oci_bind_by_name($result,':stu_email',$email);
	oci_bind_by_name($result,':stu_gender',$sex);
	oci_bind_by_name($result,':stu_telnum',$phone);
	oci_bind_by_name($result,':stu_address',$address);
	oci_bind_by_name($result,':stu_parentnum',$parentPhone);
	oci_bind_by_name($result,':stu_category',$category);
	oci_bind_by_name($result,':stu_schoolname',$school);
    oci_execute($result, OCI_COMMIT_ON_SUCCESS);

	   if($result)
	   {
		oci_commit($c);
		print '<script>alert("Your data had been update!");</script>';
		print '<script>window.location.assign("page-student-details.php?id='.$id.'");</script>';
		}
		else
		{
			oci_rollback($c);
			print '<script>alert("Data is Invalid , No Record Been Updated !");</script>';
			print '<script>window.location.assign("page-student-details.php?id='.$id.'");</script>';
	    }
?>

