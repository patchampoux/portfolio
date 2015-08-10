<?php
require_once 'includes/functions.php';

$section = 'index';

if(isset($_POST['contact-submit'])) {
	require "Class/gump.class.php";
	require "Class/phpmailer.class.php";

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
		$body = htmlentities($_POST['contact-name'])."\n".htmlentities($_POST['contact-email'])."\n\n".htmlentities($_POST['contact-message']);
		$mail = new PHPMailer;
		$mail->From = htmlentities($_POST['contact-email']);
		$mail->FromName = htmlentities($_POST['contact-name']);
		$mail->Subject = "pat.champoux : Formulaire de contact";
		$mail->Body = $body;
		$mail->AddAddress('champoux.patrick@gmail.com', 'Patrick Champoux');

		if(!$mail->send()) {
			$msg = 'Le message n\'a pas pu être envoyé.';
		} else {
			$msg = 'Le message a bien été envoyé.';
			$success = true;
		}
	}
	else
	{
		foreach($validated as $v) {
			switch($v['field']) {
				case 'contact-email':
					$msg = 'Veuillez entrer une adresse courriel valide.';
					break;
				default:
					$msg = 'Veuillez remplir tous les champs.';
			}
		}
	}
}

include '_header.php';
?>
<div id="realisations" class="portfolio list">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<article class="item">
					<img src="images/spacer.gif" alt="" height="1" width="1">
					<span class="img" style="background-image:url('images/portfolio/dumoulin-competition.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Dumoulin Compétition<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript, Bootstrap, jQuery, Sass,&nbsp;Git</p>
										<a href="http://www.dumoulincompetition.com/" target="_blank"><i class="icon-export"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<article class="item">
					<img src="images/spacer.gif" alt="" height="1" width="1">
					<span class="img" style="background-image:url('images/portfolio/32-mars.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">32 MARS<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript,&nbsp;jQuery</p>
										<a href="http://www.32mars.com/" target="_blank"><i class="icon-export"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<article class="item">
					<img src="images/spacer.gif" alt="" height="1" width="1">
					<span class="img" style="background-image:url('images/portfolio/elvis-experience.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Elvis Experience<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript, Bootstrap, jQuery, PHP,&nbsp;Wordpress</p>
										<a href="http://elvisexperience.com/" target="_blank"><i class="icon-export"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<article class="item">
					<img src="images/spacer.gif" alt="" height="1" width="1">
					<span class="img" style="background-image:url('images/portfolio/trop-mignon.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Trop Mignon Photographie<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript, jQuery,&nbsp;Sass</p>
										<a href="http://tropmignonphotographie.com/" target="_blank"><i class="icon-export"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 hidden-xs">
				<article class="item">
					<img src="images/spacer.gif" alt="" height="1" width="1">
					<span class="img" style="background-image:url('images/portfolio/sushi-taxi.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Sushi Taxi<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript, jQuery</p>
										<a href="https://www.sushitaxi.net/" target="_blank"><i class="icon-export"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 hidden-xs">
				<article class="item">
					<img src="images/spacer.gif" alt="" height="1" width="1">
					<span class="img" style="background-image:url('images/portfolio/loud-lary-adjust.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Loud Lary Ajust<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS</p>
										<a href="http://www.loudlaryajust.com/" target="_blank"><i class="icon-export"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</div>
<section id="a-propos" class="about site-padding">
	<div class="container-fluid">
		<h1 class="text-center">À propos...<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h1>
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<h2>... de moi</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed congue sem, ut mattis enim. In sit amet auctor arcu. Nullam in lorem non justo laoreet finibus vulputate vitae ex. Duis tristique ornare sem sed pellentesque. Curabitur commodo laoreet risus, vitae sollicitudin felis rutrum sed. Cras laoreet accumsan sapien quis efficitur. Nulla vitae nibh mauris. Praesent in augue rhoncus, fermentum tortor eu, euismod sem. Mauris lobortis elit in tellus semper, id semper orci molestie. Phasellus eleifend arcu ex, ut efficitur sem ultricies et. Phasellus sodales iaculis nulla, ac varius augue dignissim ac.</p>
				<br class="visible-xs visible-sm">
			</div>
			<div class="col-xs-12 col-md-6">
				<h2>... de ma formation</h2>
				<p>Je suis diplômé d'un AEC en Développement Web du Cégep de Trois-Rivières. Cette formation m’a permise d’acquérir les compétences nécessaires afin de concevoir, de développer, d’intégrer et de maintenir des applications et des services Web de façon professionnelle depuis 2010. Le fait d’avoir travaillé en agence pendant plus de cinq années m’a permis d’aiguiser mes connaissances techniques et mon esprit d’équipe. J'ai aussi toujours fait beaucoup de formation personnelle afin d’améliorer mes connaissances au niveau de l’intégration, mais aussi au niveau de la programmation Web. Vous pourrez comprendre en regardant mes certifications récentes, que pour moi, l’apprentissage fait partie intégrale de mon style de vie.</p>
				<br class="visible-xs visible-sm">
			</div>
		</div>
		<div class="certifications">
			<h2>... de mes certifications récentes</h2>
			<ul class="row list-unstyled">
				<li class="col-xs-12 col-sm-6">
					<h3>Gérer son code avec Git et GitHub</h3>
					<h4>OpenClassrooms, License 34949946</h4>
					<a href="http://openclassrooms.com/course-certificates/34949946" target="_blank"><i class="icon-export"></i></a>
					<span class="border"></span>
				</li>
				<li class="col-xs-12 col-sm-6">
					<h3>Concevez votre site web avec PHP et MySQL</h3>
					<h4>OpenClassrooms, License 895951787</h4>
					<a href="http://openclassrooms.com/course-certificates/895951787" target="_blank"><i class="icon-export"></i></a>
					<span class="border"></span>
				</li>
				<li class="col-xs-12 col-sm-6">
					<h3>Apprenez à créer votre site web avec HTML5 et CSS3</h3>
					<h4>OpenClassrooms, License 59317573</h4>
					<a href="http://openclassrooms.com/course-certificates/59317573" target="_blank"><i class="icon-export"></i></a>
					<span class="border"></span>
				</li>
				<li class="col-xs-12 col-sm-6">
					<h3>Comprende le web</h3>
					<h4>OpenClassrooms, License 10122418</h4>
					<a href="http://openclassrooms.com/course-certificates/10122418" target="_blank"><i class="icon-export"></i></a>
					<span class="border"></span>
				</li>
			</ul>
		</div>
	</div>
</section>
<section id="contact" class="contact site-padding">
	<div class="container-fluid">
		<h1 class="reverse text-center">Contact<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h1>
		<div class="row">
			<div class="col-xs-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
				<p class="reverse text-center">Parlez-moi d'une histoire de contrat, d'un site Internet, comprenant beaucoup d'HTML sémantic, de CSS élégant, peut-être même de fonctionnalités PHP ou même de Wordpress. J'attends de vos nouvelles!</p>
			</div>
		</div>
		<form id="contact-form" action="/#contact-form" method="post">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label for="contact-name" class="sr-only">Nom complet</label>
						<input type="text" name="contact-name" id="contact-name" class="form-control" placeholder="Nom complet" value="<?=keepFormValue($_POST['contact-name'])?>">
					</div>
					<div class="form-group">
						<label for="contact-email" class="sr-only">Adresse courriel</label>
						<input type="email" name="contact-email" id="contact-email" class="form-control" placeholder="Adresse courriel" value="<?=keepFormValue($_POST['contact-email'])?>">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label for="contact-message" class="sr-only">Votre message</label>
						<textarea name="contact-message" id="contact-message" class="form-control" cols="30" rows="10" placeholder="Votre message"><?=keepFormValue($_POST['contact-message'])?></textarea>
					</div>
				</div>
			</div>
			<div class="actions text-center">
				<?php if(isset($msg)) : ?>
					<span class="error-msg"><i class="icon-info"></i>&nbsp;&nbsp;<?=$msg?></span>
				<?php endif; ?>

				<?php if(isset($success) && $success === true) : ?>
					<button type="submit" class="btn btn-primary success" disabled><i class="icon-check"></i>Succès</button>
				<?php else : ?>
					<button type="submit" name="contact-submit" class="btn btn-primary"><i class="icon-forward"></i>Envoyer</button>
				<?php endif; ?>
			</div>
		</form>
	</div>
</section>
<?php
include '_footer.php';
?>