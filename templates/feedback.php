<?php

$message = "The following information was submitted to on your website:\n\n";
$message .= "What could we do? ".$_POST["feedbackwhat"]."\n\n";
$message .= "How might this help you? ".$_POST["feedbackhow"]."\n\n";
$message .= "Email address: ".$_POST["feedbackEmail"];
$email = $_POST["feedbackEmail"];

$to = "jonathan@jonathanstovall.com";
$subject = "Cloud Launch Guides Feedback";
$message = "$message";
$headers = "From:" . "$email";

mail($to,$subject,$message,$headers);

?>