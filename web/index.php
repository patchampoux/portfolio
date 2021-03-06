<?php
require_once 'includes/functions.php';

$section = 'index';

if(isset($_POST['contact-submit'])) {
	require "Class/gump.class.php";
	require "Class/phpmailer.class.php";

	$msg = contactform();
}

include '_header.php';
?>
<div id="realisations" class="portfolio list">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<article class="item">
					<img src="images/spacer.gif" alt="" height="1" width="1">
					<span class="img" style="background-image:url('images/portfolio/secondaire-en-spectacle.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Secondaire en spectacle<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript, Bootstrap, jQuery, Sass et&nbsp;Git</p>
										<a href="http://www.secondaireenspectacle.qc.ca/" target="_blank"><i class="icon-export"></i></a>
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
					<span class="img" style="background-image:url('images/portfolio/st-helie-de-caxton.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Municipalité de<br>
											Saint-Élie-de-Caxton<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript, Bootstrap, jQuery, Sass et&nbsp;Git</p>
										<a href="http://www.st-elie-de-caxton.ca/" target="_blank"><i class="icon-export"></i></a>
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
					<span class="img" style="background-image:url('images/portfolio/dumoulin-competition.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Dumoulin Compétition<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript, Bootstrap, jQuery, Sass et&nbsp;Git</p>
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
										<p class="text-center">HTML, CSS, JavaScript et&nbsp;jQuery</p>
										<a href="http://www.32mars.com/" target="_blank"><i class="icon-export"></i></a>
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
					<span class="img" style="background-image:url('images/portfolio/elvis-experience.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Elvis Experience<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript, Bootstrap, jQuery, PHP et&nbsp;Wordpress</p>
										<a href="http://elvisexperience.com/" target="_blank"><i class="icon-export"></i></a>
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
					<span class="img" style="background-image:url('images/portfolio/trop-mignon.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Trop Mignon Photographie<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript, jQuery et&nbsp;Sass</p>
										<a href="http://tropmignonphotographie.com/" target="_blank"><i class="icon-export"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 hidden-xs hidden-sm hidden-md">
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
										<p class="text-center">HTML, CSS, JavaScript et&nbsp;jQuery</p>
										<a href="https://www.sushitaxi.net/" target="_blank"><i class="icon-export"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 hidden-xs hidden-sm hidden-md">
				<article class="item">
					<img src="images/spacer.gif" alt="" height="1" width="1">
					<span class="img" style="background-image:url('images/portfolio/multi-caisses.jpg');"></span>
					<span class="gradient"></span>
					<div class="flipper">
						<div class="front"></div>
						<div class="description">
							<div class="dt">
								<div class="dtr">
									<div class="dtc">
										<h2 class="text-center">Multi-Caisses<span class="purple-triangle"></span><span class="turquoise-triangle"></span></h2>
										<p class="text-center">HTML, CSS, JavaScript, PHP, jQuery, Sass,&nbsp;Git</p>
										<a href="http://www.multi-caisses.com/" target="_blank"><i class="icon-export"></i></a>
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
				<p>Mon nom est Patrick Champoux, amoureux de musique métal en tout genre, de bière de microbrasserie, de vélo de montagne et guitariste à mes heures, je serai capable d’emmener vos projets à destination et plus loin encore grâce à une expérience solide de plus de 5 ans dans le domaine du Web. Ayant un grand souci du détail, l’expérience utilisateur et la performance de votre site Internet comme obsession, il est important pour moi qu’à la livraison de mon travail, votre entière satisfaction soit&nbsp;atteinte.</p>
				<br class="visible-xs visible-sm">
			</div>
			<div class="col-xs-12 col-md-6">
				<h2>... de ma formation</h2>
				<p>Je suis diplômé d'un AEC en Développement Web du Cégep de Trois-Rivières. Cette formation m’a permise d’acquérir les compétences nécessaires afin de concevoir, de développer, d’intégrer et de maintenir des applications et des services Web de façon professionnelle depuis 2010. Le fait d’avoir travaillé en agence pendant plus de cinq années m’a permis d’aiguiser mes connaissances techniques et mon esprit d’équipe. Vous pourrez aussi comprendre en regardant mes certifications récentes que l’apprentissage fait partie inhérente de mon style de&nbsp;vie.</p>
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
					<h3>Comprendre le web</h3>
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
				<p class="reverse text-center">Parlez-moi d'une histoire de contrat, d'un site Internet, comprenant beaucoup d'HTML sémantique, de CSS élégant, peut-être même de fonctionnalités PHP ou même de Wordpress. J'attends de vos&nbsp;nouvelles!</p>
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
			<div class="robotic">
				<div class="form-group">
					<label for="contact-hp" class="sr-only">Si vous êtes humain, ne remplissez pas ce champs</label>
					<input type="text" name="contact-hp" id="contact-hp" class="form-control" placeholder="Si vous êtes humain, ne remplissez pas ce champs">
				</div>
			</div>
			<div class="actions text-center">
				<?php if(isset($msg)) : ?>
					<span class="error-msg"><i class="icon-info"></i>&nbsp;&nbsp;<?=$msg['message']?></span>
				<?php endif; ?>

				<?php if(isset($msg) && $msg['status'] === 'success') : ?>
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