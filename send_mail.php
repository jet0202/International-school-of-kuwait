<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

require 'Config.php';


if (isset($_POST['submit_inquiry'])) {

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // var_dump($firstname);
    // var_dump($lastname);
    

    // exit ();

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $usernm;                     // SMTP username
        $mail->Password   = $pw;                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('alekhlasholding@alekhlas.education', 'International School of Kuwait');
        //$mail->addAddress('mr.farnum@gmail.com');     // Add a recipient
        $mail->addAddress('alekhlasholding@alekhlas.education');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        // $mail->addBCC('bcc    @example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'ISK Inquiry';
        $mail->Body    = '<h3>From: ' .$firstname.'  '.$lastname.'</h3> <br><h3>Email Address: ' . $email . '</h3> <br><h4> Message: ' . $message . '</h4>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
        header("Location:contactus.html?msg=Email sent successfully!");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location:contactus.html?msg=Something went wrong! Please try again!");
    }
} else if (isset($_POST['request_info'])) {



    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['num'];
    $message = $_POST['message'];
    $check1 = "init";
    $check2 = "init";
    if (isset($_POST['Check1'])) {
        $check1 = $_POST['Check1'];        
    }
    if(isset($_POST['Check2'])){
        $check2 = $_POST['Check2'];
    }

    // var_dump($check1);
    // var_dump($check2);
    // exit;


    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $usernm;                     // SMTP username
        $mail->Password   = $pw;                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('alekhlasholding@alekhlas.education', 'International School of Kuwait');
        // $mail->addAddress('j_ethompson18@live.com');     // Add a recipient
        $mail->addAddress('alekhlasholding@alekhlas.education');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        // $mail->addBCC('bcc    @example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'ISK Request Information';
        $mail->Body    = '<h3>From: ' .$firstname.'  '.$lastname.'</h3> <br><h3>Email Address: ' . $email . '</h3> <br><h3>Phone number: ' . $phone . '<h3> <br><h4> Message: ' . $message . '</h4> <br><h4>I would like to be contacted via: ' . $check1.' '.$check2.'</h4>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
        header("Location:admissions.html?msg=Email sent successfully!");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

       header("Location:admissions.html?msg=Something went wrong! Please try again!");
    }
}
