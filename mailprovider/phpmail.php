<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$names = $_POST['names'];
	$emails = $_POST['emails'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	if (empty($names)) 
        echo "Please enter your name";
    elseif(empty($emails))
        echo "Please enter your email";
	elseif(empty($subject))
        echo "Please enter the subject";
	else{
		$mail = new PHPMailer(true);

		//Enable SMTP debugging.
		$mail->SMTPDebug = 0;                               
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();            
		//Set SMTP host name                          
		$mail->Host = "smtp.gmail.com";
		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;                          
		//Provide username and password     
		$mail->Username = "wilsonomwitsa98@gmail.com";                 
		$mail->Password = "wwvbyytjkgtytroc";                           
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "tls";                           
		//Set TCP port to connect to
		$mail->Port = 587;                                   

		$mail->From = "wilsonomwitsa98@gmail.com";
		$mail->FromName = "Wilson Omwitsa";

		$mail->addAddress("omwitsawilson@yahoo.com", "Newtech Softwares");

		$mail->isHTML(true);
		
		$mail->Subject = "Web lead: $subject";
		$mail->Body = "<i>Name: $names; Email: $emails; Subject: $subject; Message: $message</i>";
		$mail->AltBody = "";

		try {
			$mail->send();
			echo "Submitted successfully";
			header("Location: http://localhost:88/NewtechWebsite/index.html");
		} catch (Exception $e) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
	}
}