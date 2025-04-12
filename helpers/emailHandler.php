<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";
// $newMail = new PHPMailer(true);
class EmailHandler {
    public static $mail;
    function __construct() {
        // Step 1: Read the file contents
        $json = file_get_contents(__DIR__ .'/config.json');

        // Step 2: Decode JSON to PHP associative array
        $emailConfig = json_decode($json, true);
        self::$mail = new PHPMailer(true);
        self::$mail->isSMTP();
        self::$mail->Host = $emailConfig['smtpHost'];
        self::$mail->Port = $emailConfig['smtpPort'];
        self::$mail->SMTPAuth = true;
        self::$mail->Username = $emailConfig['appUserName']; // your Gmail
        self:: $mail->Password = $emailConfig['appSecret']; // Gmail App Password
        self::$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        self::$mail->addAddress($emailConfig['recieverMail'], $emailConfig['recieverName']);
    }



    // Sending mail
    function sendMail($mailData){
        self::$mail->isHTML(true);
        self::$mail->From = $mailData['from'];
        self::$mail->addEmbeddedImage('./img/logo.png', 'logo');
        self::$mail->addEmbeddedImage('./img/logo2.png', 'logo2');
        self::$mail->FromName = $mailData['name'];
        self::$mail->Subject = $mailData['subject'];
        self::$mail->Body = $mailData['body'];
        if(isset($mailData['attachments']))
            self::$mail->addAttachment($mailData['attachments']);
        try {
            self::$mail->send();
            header("Location: success");
            echo "Message has been sent successfully";
            exit();
        } catch (Exception $e) {
            // header("Location: index.html");
            echo "Mailer Error: " . self::$mail->ErrorInfo;
        }
    }
}










