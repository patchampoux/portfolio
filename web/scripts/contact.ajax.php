<?php

require "../Class/gump.class.php";
require "../Class/phpmailer.class.php";

$validator = new GUMP();

$name = htmlspecialchars($_POST['contact-name']);
$email = htmlspecialchars($_POST['contact-email']);
$message = htmlspecialchars($_POST['contact-message']);
$hp = htmlspecialchars($_POST['contact-hp']);

// Set the data
$_POST = array(
	'contact-name' 	  	=> $name,
	'contact-email' 	=> $email,
	'contact-message'	=> $message,
	'contact-hp'		=> $hp
);

$_POST = $validator->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

// Let's define the rules and filters
$rules = array(
	'contact-name' 		=> 'required',
	'contact-email'		=> 'required|valid_email',
	'contact-message'	=> 'required',
	'contact-hp'		=> 'max_len,0'
);

$filters = array(
	'contact-name'		=> 'trim|sanitize_string',
	'contact-email'		=> 'trim|sanitize_email',
	'contact-message'	=> 'trim|sanitize_string'
);

$_POST = $validator->filter($_POST, $filters);

// You can run filter() or validate() first
$validated = $validator->validate(
	$_POST, $rules
);

if($validated === TRUE)
{
	$body = $name."\n".$email."\n\n".$message;
	$mail = new PHPMailer;
	$mail->From = $email;
	$mail->FromName = $name;
	$mail->Subject = "pat.champoux : Formulaire de contact";
	$mail->Body = $body;
	$mail->AddAddress('champoux.patrick@gmail.com', 'Patrick Champoux');

	if(!$mail->send()) {
		$msg = array('status' => 'error','message'=> 'Le message n\'a pas pu être envoyé.');
	} else {
		$msg = array('status' => 'success','message'=> 'Le message a bien été envoyé.');
	}
}
else
{
	foreach($validated as $v) {
		switch($v['field']) {
			case 'contact-email':
				$msg = array('status' => 'error','message'=> 'Veuillez entrer une adresse courriel valide.');
				break;
			case 'contact-hp':
				$msg = array('status' => 'error','message'=> '');
				break;
			default:
				$msg = array('status' => 'error','message'=> 'Veuillez remplir tous les champs.');
		}
	}
}

$json = array();

array_push($json, $msg);

$jsonstring = json_encode($json);

echo $jsonstring;

die();