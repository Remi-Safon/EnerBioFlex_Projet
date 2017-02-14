<?php 
	require 'php/functions.inc.php';
	
	
	head_html( 'Connexion', "img/logo.png", array( "css/base.css", 
	"css/contenu-box.css" , 
	"media/FR_regnew_js/cmap/style.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"
	) ,''
	);
?>
	
	<body>
		
		
		<?php
			// Barre
			bar('SE CONNECTER');

		?>
		
		<h1> Connexion </h1>
		
		<div id="box">
			<form action="connexion.php" method="post">
				<p>E-mail
				<input type="text" name="email" onfocus="if (this.value=='E-Mail') this.value = ''"  value="E-Mail"/></p>
				
				<p>Mot de passe
				<input type="password" name="mot_de_passe" onfocus="if (this.value=='Mot de passe') this.value = ''"  value="Mot de passe"/></p>
				
				<p><input type="checkbox" name="souvenir_moi" value="true"/>Se souvenir de moi</p>
				
				<p class="texte-centre"><input type="submit" name="valider" value="Se connecter"/></p>
				<p class="texte-centre">Pas encore inscrit(e)? <a href="inscription.php">S'inscrire</a></p>
				<p class="texte-centre"><a href="mdp_oublie.php">Mot de passe oublié?</a></p>
			</form>
		</div>
	

		
		<?php
			
			// CONNECTION BDD
			include 'php/connection_BDD.php';
		
			// Demarrage d'une session
			session_start();
			
			
			if (isset($_POST['email']) AND isset($_POST['mot_de_passe'])){
			
			// PREPARATION DE LA REQUETE
				$req=$bdd->prepare('SELECT id_utilisateur, prenom FROM utilisateur
					WHERE email=? AND mot_de_passe=?;');
			
			// EXECUTION DE LA REQUETE
				$req->execute(array($_POST['email'], $_POST['mot_de_passe']));
			
			
				$resultat=$req->fetch();
				
				if(!$resultat){
					echo '<p class="texte-centre">Aucun compte ne correspond à ces identifiants</p>';			
				}
				else {
					$_SESSION['prenom'] = $resultat['prenom'];
					$_SESSION['email'] = $_POST['email'];
					
					echo '<p class="texte-centre">Vous êtes connecté '.$_SESSION['prenom']. '</p>';
				}
				
			}
		?>

	</body>
</html>

<?php
	//session_destroy();
?>
		
