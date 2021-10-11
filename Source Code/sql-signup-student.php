<?php  
	$pass = $_POST['stdpass'];
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

	$sql = "INSERT INTO student(stu_id, stu_name,stu_ic,stu_email,stu_gender,stu_telnum,stu_address,stu_parentnum,stu_category,stu_schoolname,stu_password) VALUES (stu_id_seq.NEXTVAL,:stu_name,:stu_ic,:stu_email,:stu_gender, :stu_telnum, :stu_address, :stu_parentnum,:stu_category,:stu_schoolname,:stu_password)";

	$result = oci_parse($c,$sql);
	oci_bind_by_name($result,':stu_name',$name);
	oci_bind_by_name($result,':stu_ic',$ic);
	oci_bind_by_name($result,':stu_email',$email);
	oci_bind_by_name($result,':stu_gender',$sex);
	oci_bind_by_name($result,':stu_telnum',$phone);
	oci_bind_by_name($result,':stu_address',$address);
	oci_bind_by_name($result,':stu_parentnum',$parentPhone);
	oci_bind_by_name($result,':stu_category',$category);
	oci_bind_by_name($result,':stu_schoolname',$school);
	oci_bind_by_name($result,':stu_password',$pass);
	oci_execute($result);

	if ($result) {
		oci_commit($c);
		$sql2="SELECT stu_id FROM student WHERE ROWNUM <= 1 ORDER BY stu_id DESC";
		$result2=oci_parse($c,$sql2);
		oci_execute($result2);
		if($result2){
			$row = oci_fetch_array($result2);
			$to = $email;
			$subject = "Signup | Registration";
			$sname=$name;
			$sid=$row[0];
			$message = "
								 
				Thanks for signing up!
				Your account has been created, you can login with the following credentials.
								 
				------------------------
				Student Name : $sname
				Student ID   : $sid
				------------------------
								
			";
			$headers = "From: noreply@Pusat_Tuisyen_Anjung_Firasat.com";
			mail($to,$subject,$message,$headers);

			print '<script>alert("You are successfully registered as student! Please Check Your Email for the Student ID");</script>';
			print '<script>window.location.assign("login-student.php");</script>';
		}else{
			oci_rollback($c);
			print '<script>alert("Error! There some issue when delivering email");</script>';
			print '<script>window.location.assign("signup-student.php");</script>';
		}
		print '<script>window.location.assign("login-student.php");</script>';}
	else{
		
		oci_rollback($c);
		print '<script>alert("Error! There some issue during registration");</script>';
		print '<script>window.location.assign("signup-student.php");</script>';
	}

	
?>