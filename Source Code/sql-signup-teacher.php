<?php  
	$id = $_POST['id'];
	$schoolname = $_POST['tcrschoolname'];
	$certificate = $_POST['tcrcertid'];
	

	if(isset($_POST['bm'])){
		$bm = "1";
	}
	if(isset($_POST['bi'])){
		$bi = "1";
	}
	if(isset($_POST['sc'])){
		$sc = "1";
	}
	if(isset($_POST['mt'])){
		$mt = "1";
	}

	if(!isset($_POST['bm'])){
		$bm = "0";
	}
	if(!isset($_POST['bi'])){
		$bi = "0";
	}
	if(!isset($_POST['sc'])){
		$sc = "0";
	}
	if(!isset($_POST['mt'])){
		$mt = "0";
	}



	include "dbconnect.php";

	$sql = "INSERT INTO teacher(sta_id, tea_school,tea_cert,tea_bm,tea_bi,tea_sc,tea_mt) VALUES (:sta_id,:tea_school,:tea_cert,:tea_bm,:tea_bi,:tea_sc,:tea_mt)";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':sta_id',$id);
	oci_bind_by_name($result,':tea_school',$schoolname);
	oci_bind_by_name($result,':tea_cert',$certificate);
	oci_bind_by_name($result,':tea_bm',$bm);
	oci_bind_by_name($result,':tea_bi',$bi);
	oci_bind_by_name($result,':tea_sc',$sc);
	oci_bind_by_name($result,':tea_mt',$mt);
	
	oci_execute($result);

	if ($result) {
		oci_commit($c);
			print '<script>alert("You are succesfully sign up!");</script>';
			print '<script>window.location.assign("login-teacher.php");</script>';
	}
	else{
		
		oci_rollback($c);
		print '<script>alert("Error! There some issue during registration");</script>';
		print '<script>window.location.assign("signup-teacher.php");</script>';
	}
?>