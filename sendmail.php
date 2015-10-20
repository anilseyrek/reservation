<?php
	require 'PHPMailerAutoload.php';
	
	function sendMail($mailtxt){
		$receiver1 = 'example@example.com';

		$mail             = new PHPMailer();
		$body             = $mailtxt;

		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "mail.example.com"; // SMTP server
		//$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		//$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		$mail->Host       = "mail.example.com";      // sets as the SMTP server
		$mail->Port       = 587;                   // set the SMTP port for theserver
		$mail->Username   = "example@example.com";  // username
		$mail->Password   = "password";            // password

		$mail->CharSet = 'UTF-8';

		$from_bufk  = "Example From";
		$tr_e = array("ð", "þ", "ý", "Þ", "Ý", "Ð");
		$tr_y = array("ğ","ş","ı","Ş","İ","Ğ");
		$new_from = str_replace($tr_e, $tr_y, $from_bufk);

		$mail->SetFrom("example@example.edu.tr", "BÜFK");

		$mail->AddReplyTo("example@example.edu.tr", $new_from);

		$mail->Subject    = "Reservation";

		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($mailtxt);

		$mail->AddAddress($receiver1);

		if(!$mail->Send()) {
          header("Location: http://www.anilseyrek.com/reservation/");
          exit;
		  echo '<div style="text-align:center; max-width:30%; margin-left:35%; margin-right:35%"><h2 style="font-family:Arial; text-align:center"><span style="font-weight:bold">:(</span><br> Bir şeyler ters gitti!<br>Lütfen tekrar deneyiniz.</h2></div>';
		  //echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  echo '<div style="text-align:center; max-width:30%; margin-left:35%; margin-right:35%; @media all and (max-width: 600px) { h2 {max-width:60%; margin-left:20%; margin-right:20%;} }"><h2 style="font-family:Arial; text-align:center">Teşekkürler!<br>En kısa zamanda sizinle iletişime geçeceğiz.</h2></div>';
		}
	}
    
	
?>