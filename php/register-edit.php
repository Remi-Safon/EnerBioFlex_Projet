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

		if(isset($_SESSION['id_utilisateur'])){
			if(isset($_POST['email']) && trim($_POST['email'])!="" &&
				isset($_POST['nom']) && trim($_POST['nom'])!="" &&
				isset($_POST['prenom']) && trim($_POST['prenom'])!="" &&
				isset($_POST['mot_de_passe']) && trim($_POST['mot_de_passe'])!="" &&
				isset($_POST['mot_de_passe_confirme']) && trim($_POST['mot_de_passe_confirme'])!="" &&
				isset($_POST['date_de_naissance']) && trim($_POST['date_de_naissance'])!="" &&
				isset($_POST['voie']) && trim($_POST['voie'])!="" &&
				isset($_POST['ville']) && trim($_POST['ville'])!="" &&
				isset($_POST['voie']) && trim($_POST['voie'])!="" &&
				isset($_POST['numero_telephone']) && trim($_POST['numero_telephone'])!="" &&
				isset($_POST['type']) && trim($_POST['type'])!="" &&
				isset($_POST['profession']) && trim($_POST['profession'])!=""){
			
			
			
			
			
			
			if($_POST['mot_de_passe'] === $_POST['mot_de_passe_confirme']){
				try{
					$query = $bdd->prepare('UPDATE utilisateur
											SET nom=:nom,
												prenom=:prenom,
												email=:email,
												mot_de_passe=:mdp,
												date_de_naissance=:dtn,
												voie=:voie,
												ville=:ville,
												numeros_telephone=:numtel,
												type=:type,
												profession=:profession
												
											WHERE id_utilisateur=:id;');
	           		$query->execute([
						':id' => $_SESSION['id_utilisateur'],
		                ':nom' => $_POST['nom'],
		                ':prenom' => $_POST['prenom'],
		                ':email' => $_POST['email'],
			            ':mdp' => hash('sha512', $_POST['mot_de_passe']),
						':dtn' => $_POST['date_de_naissance'],
			            ':type' => $_POST['type'],
			            ':numtel' => $_POST['numero_telephone'],
			            ':voie' => $_POST['voie'],
			            ':ville' => $_POST['ville'],
						':profession' => $_POST['profession']
	            	]); 

					}catch(PDOException $e){
						die('<p>Erreur inscription à la plateforme. : '.$e->getMessage().'</p>');
					}

					echo'<div id="box">';
						echo'<p class="texte-centre" style="color:green;">Modification réussi !</p>';
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
			
			else{
				echo'<div id="box">';
					echo'<p class="texte-centre" style="color:red;">Vous n\'avez pas renseigné tout les champs </p>';
					echo'<p class="texte-centre"><a href="profil.php">Retour à votre profil.</a></p>';
				echo'</div>	';
			}
			
				
		}
		else {
			
			
			echo'<div id="box">';
			echo'<p class="texte-centre" style="color:red;">Vous n\'êtes pas connecté</p>';
			echo'<p class="texte-centre"><a href="connexion.php">Retour à la page de connexion.</a></p>';
			echo'</div>	';
			
			
			
		}

?>