<?php 
	require 'functions.inc.php';
	
	
	head_html( 'Connexion', "../img/logo.png", array( "../css/base.css", 
	"../css/contenu-box.css" , 
	"../media/FR_regnew_js/cmap/style.css",
	"../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
	"../vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"
	) ,''
	);
?>
	
	<body>
		
		
		<?php
			// Barre
			bar('SE CONNECTER');
			
			session_start();
		
			// CONNECTION BDD
			include 'connection_BDD.php';
			
			if (! isset($_SESSION['id_utilisateur'])){
				
				
				if (isset($_POST['email']) && $_POST['email']!= '' && isset($_POST['mot_de_passe']) && $_POST['mot_de_passe']!=''){
					$req=$bdd->prepare('SELECT * FROM utilisateur WHERE email= :email AND mot_de_passe= :mot_de_passe');
					$req->bindValue(':email', $_POST['email']);
					$req->bindValue(':mot_de_passe', hash('sha512',$_POST['mot_de_passe']));
					
					
					//if ( $_POST['email'] == 'remisafon@gmail.com' OR $_POST['email'] == 'sb@test.fr') {
					//	$req->bindValue(':mot_de_passe', $_POST['mot_de_passe']);
					//}
					//else{
						$req->bindValue(':mot_de_passe', hash('sha512', $_POST['mot_de_passe']));
					//}	
					$req->execute();
					$resultat = $req->fetch(PDO::FETCH_ASSOC);
					
					
					if(!$resultat){
						echo'<div id="box">';
							echo'<p class="texte-centre" style="color:red;">Aucun compte ne correspond à ces identifiants</p>';
							echo'<p class="texte-centre" style="color:red;">Vérifiez les identifiants saisis.</p>';
							echo'<p class="texte-centre"><a href="connexion.php">Retour à la page de connexion.</a></p>';
						echo'</div>	';		
					}
					else {
						//Infos compte
						$_SESSION['email'] = $resultat['email'];
						$_SESSION['id_utilisateur'] = $resultat['id_utilisateur'];
						//Infos utilisateur
						$_SESSION['nom'] = $resultat['nom'];
						$_SESSION['prenom'] = $resultat['prenom'];
						$_SESSION['date_de_naissance'] = $resultat['date_de_naissance'];
						$_SESSION['numeros_telephone'] = $resultat['numeros_telephone'];
						$_SESSION['est_pro'] = $resultat['est_pro'];
						$_SESSION['profession'] = $resultat['profession'];
						$_SESSION['nom_entreprise'] = $resultat['nom_entreprise'];
						$_SESSION['photo_profil'] = $resultat['photo_profil'];
						
						header("Location: connexion.php");
					}
					
				}
				else{
					echo'<div id="box">';
						echo'<p class="texte-centre" style="color:red;">Identifiants manquants !</p>';
						echo'<p class="texte-centre"><a href="connexion.php">Retour à la page de connexion.</a></p>';
					echo'</div>	';
				}
			} // Fin formulaire
			else{
				header("Location: connexion.php");
			}
		?>

	</body>
</html>

<?php
	//session_destroy();
?>
		
