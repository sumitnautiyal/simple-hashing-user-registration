<?php
//mail('example@example.com', 'Confirm Email Signup', 'Please complete the signup process', 'sumit.nautiyal54@gmail.com')
//WARNING: This is not a secure way to send emails 
$emailTo="receriverEmail@gmail.com";
$subject="Confirm Email Signup";
$body="Please complete the signup process";
$headers="From:sumit.nautiyal54@gmail.com";
if (mail ($emailTo,$body,$subject,$headers)) {
	echo "Mail Sent to your email successfully. Check your Inbox";
} else {
	echo "Mail not sent";
}


<?