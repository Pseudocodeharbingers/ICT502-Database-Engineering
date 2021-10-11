<?php  
	$id = $_GET['id'];
	$idd = $_GET['idd'];
	$salary = $_POST['admsalary'];
	$manager=$_POST['stamanager'];
	$task=$_POST['admtask'];

	include "dbconnect.php";

	$sql = "UPDATE  staff  SET sta_salary =:sta_salary, manager_id =:manager_id WHERE  sta_id =:sta_id";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sta_salary',$salary);
	oci_bind_by_name($result,':manager_id',$manager);
	oci_bind_by_name($result,':sta_id',$idd);
    oci_execute($result, OCI_COMMIT_ON_SUCCESS);

    	$sql1 = "UPDATE  admin  SET adm_task=:adm_task WHERE  sta_id =:sta_id";
		$result1 = oci_parse($c,$sql1);
		oci_bind_by_name($result1,':adm_task',$task);
		oci_bind_by_name($result1,':sta_id',$idd);
	    oci_execute($result1, OCI_COMMIT_ON_SUCCESS);

	    $descriptions = "Update new admin id:".$idd;
		$sql2 = "INSERT INTO log (log_id , log_description , adm_id) VALUES (log_id_seq.NEXTVAL , :log_description , :adm_id)";
		$result2 = oci_parse($c,$sql2);

		oci_bind_by_name($result2,':log_description',$descriptions);
		oci_bind_by_name($result2,':adm_id',$id);

	    oci_execute($result2, OCI_COMMIT_ON_SUCCESS);

	if ($result && $result1) {
		oci_commit($c);
		print '<script>alert("Successfully updating admin details!");</script>';
		print '<script>window.location.assign("page-admin-admin-approvement-form.php?id='.$id.'");</script>';
		}
		else{
			oci_rollback($c);
			print '<script>alert("Error! There some issue during updating admin details");</script>';
			print '<script>window.location.assign("page-admin-admin-approvement-form.php?id='.$id.'");</script>';
		}
?>