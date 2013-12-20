<?php

$message = "The following information was submitted from the form on your website:\n\nWhat could we do? ".$_REQUEST["feedbackwhat"]."\n\nHow might this help you? ".$_REQUEST["feedbackhow"]."\n\nEmail address: ".$_REQUEST["feedbackEmail"];
$email = $_REQUEST["feedbackEmail"];

$to = "jonathan@jonathanstovall.com";
$subject = "Cloud Launch Guides Feedback";
$message = "$message";
$headers = "From:" . $email;

mail($to,$subject,$message,$headers);

?>