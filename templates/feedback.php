<?php

$message = "The following information was submitted from the form on your website:\n";
$message = "What could we do? ".$_POST["feedbackwhat"]."\n\n";
$message = "How might this help you? ".$_POST["feedbackhow"]."\n\n";
$message = "Email address: ".$_POST["email"]."\n\n";

$to = "jonathan@jonathanstovall.com";
$subject = "Cloud Launch Guides Feedback";
$message = "$message";
$headers = "From: $email";

mail($to,$subject,$message,$headers);

?>