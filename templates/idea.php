<?php

$message = "The following information was submitted to on your website:\n\n";
$message .= "What would you like to see in this guide? ".$_POST["csWhat"]."\n\n";
$message .= "Email address: ".$_POST["csEmail"];
$email = $_POST["csEmail"];

$to = "cloudlaunchguide@rackspace.com";
$subject = "Cloud Launch Guide Idea";
$message = "$message";
$headers = "From:" . "$email";

mail($to,$subject,$message,$headers);

?>