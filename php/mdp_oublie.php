<?php 
	require 'functions.inc.php';
	require 'webservices.php';
	
	head_html( 'Mot de passe oublié', "../img/logo.png", array( "../css/base.css", 
	"../css/contenu-box.css" , 
	"../media/FR_regnew_js/cmap/style.css",
	"../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
	"../vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"
	) ,''
	);
	
	// CONNECTION BDD
	include 'connection_BDD.php';
		
	// Demarrage d'une session
	session_start();
	
	// Barre
		bar('SE CONNECTER');
?>
<div id="box">
	<h4 class="texte-centre"> Saisissez l'adresse e-mail associée à votre compte. </h4>
	<h5 class="texte-centre"> Vous recevrez un e-mail vous permettant de vous connecter. </h5>
</div>

<div id="box">
	<form action="mdp_oublie.php" method="post">
		<p>E-mail
		<input type="text" name="email" placeholder="E-Mail"/></p>
		<p class="texte-centre"><input type="submit" name="valider" value="Envoyer"/></p>
	</form>
</div>


<?php

if (isset($_POST['email'])){
			
			// PREPARATION DE LA REQUETE
				$req=$bdd->prepare('SELECT id_utilisateur, nom,  prenom, mot_de_passe FROM utilisateur
					WHERE email=?;');
			
			// EXECUTION DE LA REQUETE
				$req->execute(array($_POST['email']));
			
			
				$resultat=$req->fetch();
				
				if(!$resultat){
					echo '<p class="texte-centre">Aucun compte ne correspond à cette adresse e-mail</p>';			
				}
				else {
					
					$destinataire=$_POST['email'];
					$nom=$resultat['nom'];
					$login=$resultat['mot_de_passe'];
					$sujet='[ENERBIOFLEX] Votre mot de passe';
					$message='Mr/Mme ' . $nom . ',
					
					Voici votre mot de passe EnerBioFlex : ' . $login . '
					Nous vous conseillons, pour des questions de sécurité, de modifier votre mot de passe
					depuis votre profil.
					
					Cordialement,
					
					EnerBioFlex';
					
					$message_html='<p>Mr/Mme ' . $nom . ',</p>
					
					<p>Voici votre mot de passe EnerBioFlex : ' . $login . '
					Nous vous conseillons, pour des questions de sécurité, de modifier votre mot de passe
					depuis votre profil.</p>
					
					<p>Cordialement,</p>
					
					<p>EnerBioFlex</p>';
					
					
					envoieMail($destinataire, $sujet, $message, $message_html);
					
					
					//CREATION DU Mail
					
					/*
					require 'C:/wamp64/www/PHPMailer-FE_v4.11/_lib/class.phpmailer.php';
					$mail = new PHPmailer();
					$mail->IsSMTP();
					$mail->Host='hote_smtp';
					$mail->From='administration@enerbioflex.fr';
					$mail->AddAddress($destinataire);
					$mail->AddReplyTo('administration@enerbioflex.fr');     
					$mail->Subject=$sujet;
					$mail->Body=$message;
					if(!$mail->Send()){ //Teste le return code de la fonction
					  echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7)
					}
					else{     
					  echo '<p class="texte-centre"> Un code vous à été envoyé à l\'adresse : ' . $_POST['email'];
					}
					$mail->SmtpClose();
					unset($mail);
					*/
					echo '<p class="texte-centre"> <a href="connexion.php">Retourner à la connexion</a></p>';
					
					
					
				}
				
			}
			
?>