<?php
	
	include('functions.inc.php');
	
	// Entete
		head_html( 'Inscription', "../img/logo.png", array( "../css/details.css",
		"../media/FR_regnew_js/cmap/style.css",
		"../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
		"../vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css",
		"../css/button_details.css",
		"../css/footer.css"
		),'');

	session_start();
		
		// BARRE
		bar('S\'INSCRIRE');
		
		include('connection_BDD.php');

		if(isset($_POST['valider'])){

			
			if(isset($_POST['email']) && isset($_POST['mot_de_passe']) && isset($_POST['mot_de_passe_confirme']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['type']) && isset($_POST['ville']) && isset($_POST['voie']) && isset($_POST['code_postal']))
				
				if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_POST['mot_de_passe'] === $_POST['mot_de_passe_confirme']){
					
					if (isset($_POST['date_de_naissance'])) {
						try{
						$query = $bdd->prepare('INSERT INTO utilisateur(nom, prenom, email, mot_de_passe, date_de_naissance, type, numeros_telephone, voie, ville) SELECT :nom, :prenom, :email, :mot_de_passe, :date_de_naissance, :type, :numeros_telephone, :voie, :ville');
	            		$query->execute([
			                ':nom' => $_POST['nom'],
			                ':prenom' => $_POST['prenom'],
			                ':email' => $_POST['email'],
			                ':mot_de_passe' => hash('sha512', $_POST['mot_de_passe']),
			                ':date_de_naissance' => date('Y-m-d', strtotime($_POST['date_de_naissance']) ),
			                ':type' => $_POST['type'],
			                ':numeros_telephone' => $_POST['numero_telephone'],
			                ':voie' => $_POST['voie'],
			                ':ville' => $_POST['ville']
	            		]); 

						}catch(PDOException $e){
							die('<p>Erreur inscription à la plateforme. : '.$e->getMessage().'</p>');
						}
					}

					else{
						
						try{
							$query = $bdd->prepare('INSERT INTO utilisateur(nom, prenom, email, mot_de_passe, type, numeros_telephone, voie, ville) SELECT :nom, :prenom, :email, :mot_de_passe, :type, :numeros_telephone, :voie, :ville');
		            		$query->execute([
				                ':nom' => $_POST['nom'],
				                ':prenom' => $_POST['prenom'],
				                ':email' => $_POST['email'],
				                ':mot_de_passe' => hash('sha512', $_POST['mot_de_passe']),
				                ':type' => $_POST['type'],
				                ':numeros_telephone' => $_POST['numero_telephone'],
				                ':voie' => $_POST['voie'],
				                ':ville' => $_POST['ville']
		            		]); 

						}catch(PDOException $e){
							die('<p>Erreur inscription à la plateforme. : '.$e->getMessage().'</p>');
						}
					}
					// ################################### ENVOIE DU MAIL
					// ###################################
					
					
					
					$destinataire=$_POST['email'];
					$nom=$_POST['nom'];
					$sujet='[ENERBIOFLEX] Création de votre compte';
					$message='Mr/Mme ' . $nom . ',
					
					Vous êtes inscrit avec succès !
					
					L\'ensemble de l\'équipe EnerBioFlex vous remercie pour votre confiance et espère que notre site répondra à votre besoin.
					Vous pouvez changer à tout moment vos informations utilisateur en cliquant sur votre nom en haut à droite de la page dès lors que vous êtes connecté.
					Pour tout complément d\'information, n\'hésitez pas à nous contacter au 06 87 38 54 53 ou 06 80 45 39 59.
					
					Cordialement,
					
					EnerBioFlex';
					
					$message_html='<p>Mr/Mme ' . $nom . ',</p>
					
					<p>Vous êtes inscrit avec succès !</p>
					<p>L\'ensemble de l\'équipe EnerBioFlex vous remercie pour votre confiance et espère que notre site répondra à votre besoin.</p>
					<p>Vous pouvez changer à tout moment vos informations utilisateur en cliquant sur votre nom en haut à droite de la page dès lors que vous êtes connecté.</p>
					<p>Pour tout complément d\'information, n\'hésitez pas à nous contacter au 06 87 38 54 53 ou 06 80 45 39 59.</p>
					
					<p>Cordialement,</p>
					
					<p>EnerBioFlex</p>';
					
					
					envoieMail($destinataire, $sujet, $message, $message_html);
					
					
					
					// ################################### FIN ENVOIE DU MAIL
					
					echo'<div id="box">';
						echo'<p class="texte-centre" style="color:green;">Inscription réussi !</p>';
						echo'<p class="texte-centre"><a href="../index.php">Retour à la page d\'acceuil.</a></p>';
					echo'</div>	';
				}


				else {

						echo'<div id="box">';
						echo'<p class="texte-centre" style="color:red;">Mot de passe saisies différents ou email incorrect !</p>';
						echo'<p class="texte-centre"><a href="inscription.php">Retour à la page d\'inscription.</a></p>';
					echo'</div>	';
				}
				
		}

		else
		{

			header("Location : inscription.php");

		}

?>