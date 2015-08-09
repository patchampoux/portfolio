<?php

require "../Class/gump.class.php";
require "../Class/phpmailer.class.php";

$validator = new GUMP();

// Set the data
$_POST = array(
	'contact-name' 	  	=> $_POST['contact-name'],
	'contact-email' 	=> $_POST['contact-email'],
	'contact-message'	=> $_POST['contact-message']
);

$_POST = $validator->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

// Let's define the rules and filters
$rules = array(
	'contact-name' 		=> 'required',
	'contact-email'		=> 'required|valid_email',
	'contact-message'	=> 'required'
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
	$mail = new PHPMailer;
	$mail->From = htmlentities($_POST['contact-email']);
	$mail->FromName = htmlentities($_POST['contact-name']);
	$mail->Subject = "pat.champoux : Formulaire de contact";
	$mail->Body = htmlentities($_POST['contact-name']).'<br/>'.htmlentities($_POST['contact-email']).'<br/><br/>'.htmlentities($_POST['contact-message']);
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