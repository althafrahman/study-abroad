<?php

	require_once('helpers/emailHandler.php');

	// template file
	// Form Data
    // $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    $program = $_REQUEST['program'];
	// Logo URL
    $link = 'https://www.internationalacademy.in/study-in-australia/';

	// Body HTML
	$body = "<!DOCTYPE html>
	<html lang='en'>
	<head>
	  <meta charset='UTF-8'>
	  <title>Express Mail</title>
	</head>
	<body>
	  <table width='100%' cellpadding='0' cellspacing='0' border='0' style='border:1px solid #ccc; border-radius: 6px'>
		<tr>
		  <td colspan='2' align='center'>
			<table width='100%' cellpadding='0' cellspacing='0' border='0'>
			  <tr style='background: #f0f0f0'>
				<td align='left' style='padding: 10px;'>
				  <a href='{$link}'><img src='cid:logo' alt='Logo 1' style='max-height: 50px; display: block;'></a>
				</td>
				<td align='right' style='padding: 10px;'>
				  <a href='{$link}'><img src='cid:logo2' alt='Logo 2' style='max-height: 50px; display: block;'></a>
				</td>
			  </tr>
			</table>
		  </td>
		</tr>
	
		<tr>
		  <td colspan='2' style='padding: 10px;'>
			<strong>Name:</strong> {$name}
		  </td>
		</tr>
	
		<tr>
		  <td colspan='2' style='padding: 10px;'>
			<strong>Email:</strong> {$phone}
		  </td>
		</tr>
	
		<tr>
		  <td colspan='2' style='padding: 10px;'>
		  <strong>Program: </strong>{$program}
		  </td>
		</tr>
	  </table>
	</body>
	</html>";
	// $body = '';
	// if(file_exists($template))
	// 	$body  = file_get_contents($template);

	// $body  = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">';
    // $body .= '<title>Email</title>';
	// 	$body .= '</head>';
	// 	$body .= '<body style="width: 100%;display: flex;justify-content: center;">';
	// 	$body .= '<div style="width: 50%;">';
    //     $body .= '<div style="display: flex;flex-direction: column;justify-content: center;align-items: center;background: #fff;border-radius: 5px;>';
	// 		$body .= '<img style="display: flex;align-items: center;justify-content: start;width: 100px;" src="./img/logo.png" />';
	// 		$body .= "<div style='font-weight: bold;font-size: 18px;'>Name: {$name}</div>";
	// 		$body .= "<div  style='font-weight: bold;font-size: 18px;'>Email: {$email}</div>";
	// 		$body .= "<div  style='font-weight: bold;font-size: 18px;'>Subject: {$subject}</div>";
	// 		$body .= "<div  style='font-weight: bold;font-size: 18px;'>Comments: {$cmessage}</div>";
    //     $body .= "</div>";
	// 	$body .= "</div>";
	// 	$body .= "</body>";
	// 	$body .= "</html>";


	$mailData = array(
		'from' => '',
		'name' => $name,
		'subject' => 'Enquiry',
		'body' => $body
	);
	
	$mail = new EmailHandler();
	$mail->sendMail($mailData)

?>