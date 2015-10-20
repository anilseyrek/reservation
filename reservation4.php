<?php
	include 'reservation3.php';
	include 'sendmail.php';
	
	if(!$_POST){
		
	}
	else{
		doDB();
		
		mysqli_set_charset($mysqli,"utf8");
		
		$name = mysqli_real_escape_string($mysqli, $_POST['name']);
		$surname = mysqli_real_escape_string($mysqli, $_POST['surname']);
		$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
		$showdate = mysqli_real_escape_string($mysqli, $_POST['showdate']);
		$numof_full = mysqli_real_escape_string($mysqli, $_POST['numof_full']);
		$numof_student = mysqli_real_escape_string($mysqli, $_POST['numof_student']);
		
		$sql = "INSERT INTO reservations (date, time, name, surname, phone, email, showdate, numof_full, numof_student) VALUES ( CURDATE(), CURTIME(), '".$name."', '".$surname."', '".$phone."', '".$email."', '".$showdate."', '".$numof_full."','".$numof_student."')";
		
		if (!mysqli_query($mysqli,$sql)) {
			die('Error: ' . mysqli_error($connection));
		}
		
		mysqli_close($mysqli);
		
		$newShowDate = date("d-m-Y", strtotime($showdate));
		
		$mailtxt = '<strong>İsim: </strong>'.$name.'<br><strong>Soyisim: </strong> '.$surname.'<br><strong>Email: </strong> <a href="mailto:'.$email.'">'.$email.'</a><br><strong>Telefon: </strong><a href="tel:'.$phone.'">'.$phone.'</a><br><strong>Gösteri Tarihi: </strong>'.$newShowDate.'<br><strong>Tam Bilet: </strong>'.$numof_full.'<br><strong>Öğrenci Bileti: </strong>'.$numof_student;
		
		sendMail($mailtxt);
	}
?>