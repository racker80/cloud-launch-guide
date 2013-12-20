<?php

$message = "The following information was submitted from the form on your website:\n\nWhat could we do? ".$_POST["feedbackwhat"]."\n\nHow might this help you? ".$_POST["feedbackhow"]."\n\nEmail address: ".$_POST["feedbackEmail"];
$email = $_POST["feedbackEmail"];

$to = "jonathan@jonathanstovall.com";
$subject = "Cloud Launch Guides Feedback";
$message = "$message";
$headers = "From: $email";

mail($to,$subject,$message,$headers);

?>