<?php

/*
	The Send Mail php Script for Contact Form
	Server-side data validation is also added for good data validation.
*/

//Place your Email Here
$recipient = "info@sample.com";

$type = $_POST['form-type'];

// ------- Contact ------- //

if($type == 'contact'){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	if( $name == '' ){
		die('MF255');
	}
	else if( $email == '' ){
		die('MF255');
	}
	else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		die('MF255');
	}
	else if( $message == '' ){
		die('MF255');
	}
	else{

		$formcontent="نام: $name\nایمیل: $email\nپیام: $message";

		$mailheader = "From:$email\r\n";

		if( mail($recipient, 'پیام جدید در سایت', $formcontent, $mailheader) ){
			die('MF000');
		}
		else{
			die('MF254');
		}
	}
	
}

// ------- Subscribe ------- //

else if($type == 'subscribe'){
	
	$email = $_POST['email'];

	if( $email == '' ){
		die('MF255');
	}
	else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		die('MF255');
	}
	else{

		$formcontent="ایمیل: $email";

		$mailheader = "From:$email\r\n";

		if( mail($recipient, 'اشتراک جدید در خبرنامه سایت', $formcontent, $mailheader) ){
			die('MF000');
		}
		else{
			die('MF254');
		}
	}

}

// ------- Coming Soon Subscribe ------- //

else if($type == 'subscribe-soon'){

	$name = $_POST['name'];
	$email = $_POST['email'];

	if( $name == '' ){
		die('MF255');
	}
	else if( $email == '' ){
		die('MF255');
	}
	else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		die('MF255');
	}
	else{

		$formcontent="نام: $name\nایمیل: $email";

		$mailheader = "From:$email\r\n";

		if( mail($recipient, 'اشتراک جدید در اطلاع رسانی راه اندازی سایت', $formcontent, $mailheader) ){
			die('MF000');
		}
		else{
			die('MF254');
		}
	}

}

// ------- Other ------- //

else{
	die('MF004');
}

?>