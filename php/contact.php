<?php

$errorMsg = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required! ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["mail"])) {
    $errorMSG .= "Email is required ";
} else {
    $mail = $_POST["mail"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = nl2br($_POST['message']);
}

// Change to your E-mail && Subject
$EmailTo = "info@example.com"; // change to your E-mail here
$Subject = "Marqa-website";     // change to the subject you want

// prepare email body text
$Body = '<b>Name:</b> '.$name.' <br><b>E-mail</b> '.$mail.' <p>' .$message.'</p>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: ' . $mail . "\r\n";

// send email
$success = mail($EmailTo, $Subject, $Body, $headers);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>