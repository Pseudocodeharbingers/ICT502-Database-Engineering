<?php  
	$id = $_GET['id'];
	$code = $_POST['subcode'];
	$module=$_POST['submodule'];
	$name=$_POST['subname'];
	$price=$_POST['subprice'];

	include "dbconnect.php";

	$sql = "UPDATE  subject  SET sub_module =:sub_module, sub_name =:sub_name, sub_price =: sub_price WHERE  sub_code =:sub_code";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sub_code',$code);
	oci_bind_by_name($result,':sub_module',$module);
	oci_bind_by_name($result,':sub_name',$name);
	oci_bind_by_name($result,':sub_price',$price);
    oci_execute($result, OCI_COMMIT_ON_SUCCESS);

    $descriptions = "Update subject code:".$code;
	$sql2 = "INSERT INTO log (log_id , log_description , adm_id) VALUES (log_id_seq.NEXTVAL , :log_description , :adm_id)";
	$result2 = oci_parse($c,$sql2);

	oci_bind_by_name($result2,':log_description',$descriptions);
	oci_bind_by_name($result2,':adm_id',$id);

	oci_execute($result2, OCI_COMMIT_ON_SUCCESS);

	if ($result) {
		oci_commit($c);
		print '<script>alert("Successfully updating subject!");</script>';
		print '<script>window.location.assign("page-admin-viewsubject.php?id='.$id.'");</script>';
		}
		else{
		
			oci_rollback($c);
			print '<script>alert("Error! There some issue during updating subject");</script>';
			print '<script>window.location.assign("page-admin-updatesubject.php?id='.$id.'");</script>';
			}

	
?>