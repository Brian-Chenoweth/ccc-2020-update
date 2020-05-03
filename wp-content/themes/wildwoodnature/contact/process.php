<?php

$name = $_POST["user_name"];
$email = $_POST["user_email"];
$details = $_POST["user_details"];

echo "<pre>";
$email_body = "";
$email_body .= "Name " . $name . "\n";
$email_body .= "Email " . $email . "\n";
$email_body .= "Details " . $details . "\n";
echo $email_body;
echo "</pre>";

//To Do: Send email
header("location:thanks.php");
?>