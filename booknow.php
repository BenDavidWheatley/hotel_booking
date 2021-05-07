<?php session_start();
include('function.php')?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Hotel Compare</title>
  </head>
  
    <?php include('header.php'); ?>

<body class='body'>
    <div class="informationContainer">
        <div id="emailSent" class="selectedInformation">
            <h1>Booking Confirmation</h1><br>
            <p>Thank you <span><?php $newBooking->getFullname();?></span> for booking with us.</P>
            <?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
 /* $mail->SMTPDebug = SMTP::DEBUG_SERVER;       */               // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'b2d7d1788a8c08';                       // SMTP username
    $mail->Password   = 'de45537a61dbc0';                       // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 2525;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
 
    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('from@example.com','Mailer');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@wheatleystudios.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); 

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Thank you for your booking';
    $mail->Body    = 'Thank you';   
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 

    $mail->send();
    echo 'An email of confirmation has been sent to';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} ?>
            <span><?php $newBooking->getEmail()?></span>
            <p>We hope you enjoy your stay</p><br>
            <p>Hotel -  <span><?php $newBooking->getFinalHotelSelection(); ?></span></p>
            <p>checkin - <span><?php $newBooking->getCheckIn();?></span></p>
            <p>checkout - <span><?php $newBooking->getCheckOut();?></span></p>
            <p><span><?php $newBooking->getNumOfAdults();?></span> adults and <span><?php $newBooking->getNumOfChildren();?></span> children</p><br>
            <p> Total Cost = <span>R<?php $newBooking->getFinalCost()?></span></p><br>      
            <button id="confirmedBookingButton" onClick="window.location='index.php';">Back to Home</button>
        </div>
    </div>
</body>

<div id="bookingFooter">
    <?php include("footer.php") ?>
</div>
  
<script src="script/script.js" type="text/javascript"></script>