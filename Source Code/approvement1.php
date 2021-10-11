<?php  
	$id = $_GET['id'];
	$idd = $_GET['idd'];
	$approvement = '1';

	include "dbconnect.php";
		
	$sql = "UPDATE staff SET sta_approvement = :sta_approvement WHERE sta_id = :sta_id";
	
	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sta_id',$idd);
	oci_bind_by_name($result,':sta_approvement',$approvement);
    oci_execute($result, OCI_COMMIT_ON_SUCCESS);

	if ($result) {
		oci_commit($c);

		$sql2="SELECT * FROM staff s JOIN teacher t ON (t.sta_id = s.sta_id)  WHERE t.sta_id =:sta_id ";
		$result2 = oci_parse($c,$sql2);
		oci_bind_by_name($result2,':sta_id',$idd);
		oci_execute($result2);
		if($result){
			$row = oci_fetch_array($result2);
			$to = $row['STA_EMAIL'];
			$subject = "Registration Success";
			$tname=$row['STA_NAME'];
			$tid=$row['STA_ID'];
			$message = "
								 
				Thanks for signing up!
				Your account has been created, you can login with the following credentials.
								 
				------------------------
				Teacher Name : $tname
				Teacher ID   : $tid
				------------------------
								
			";
			$headers = "From: noreply@Pusat_Tuisyen_Anjung_Firasat.com";
			mail($to,$subject,$message,$headers);

		print '<script>alert("Teacher had been approved!");</script>';
		print '<script>window.location.assign("page-admin-teacher-update.php?id='.$id.'&idd='.$idd.'");</script>';
		}
		else{
		
			oci_rollback($c);
			print '<script>alert("Error! Teacher is not being registered");</script>';
			print '<script>window.location.assign("page-admin-teacher-approvement-form.php?id='.$id.'&idd='.$idd.'");</script>';
			}
	}
?>