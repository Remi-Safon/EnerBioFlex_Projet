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

				if($_POST['mot_de_passe'] === $_POST['mot_de_passe_confirme']){
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

					echo'<div id="box">';
						echo'<p class="texte-centre" style="color:green;">Inscription réussi !</p>';
						echo'<p class="texte-centre"><a href="../index.php">Retour à la page d\'acceuil.</a></p>';
					echo'</div>	';
				}


				else {

						echo'<div id="box">';
						echo'<p class="texte-centre" style="color:red;">Mot de passe saisies différents !</p>';
						echo'<p class="texte-centre"><a href="inscription.php">Retour à la page d\'inscription.</a></p>';
					echo'</div>	';
				}
				
		}

		else
		{

			header("Location : inscription.php");

		}

?>