<?php 
	require 'php/head.php';
	head_html( 'Connection', "img/logo.png", array( "css/base.css", "css/contenu-box.css" ) );
?>
	
	<body>
		<?php
			if(!isset($_POST['email'])OR !isset($_POST['mot_de_passe'])){
		?>
		
		<h1> Connection </h1>
		
		<div id="box">
			<form action="connexion.php" method="post">
				<p><input type="text" name="email" onfocus="if (this.value=='E-Mail') this.value = ''"  value="E-Mail"/></p>
				<p class="texte-centre"><input type="password" name="mot_de_passe" onfocus="if (this.value=='Mot de passe') this.value = ''"  value="Mot de passe"/></p>
				<p><input type="checkbox" name="souvenir_moi" value="true"/>Se souvenir de moi</p>
				<p class="texte-centre"><input type="submit" name="valider" value="Se connecter"/></p>
				<p class="texte-centre">Pas encore inscrit(e)? <a href="inscription.php">S'inscrire</a></p>
			</form>
		</div>
	
		<?php
			}
		?>
		
		<?php
			// Demarrage d'une session
			;session_start();
			// CONNECTION BDD
			
			try{
				$bdd=new PDO('mysql:host=localhost;dbname=bdd_enerbioflex;charset=utf8','root', '');
			}
			catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
				
			}
			
			if (isset($_POST['email']) AND isset($_POST['mot_de_passe'])){
			
			// PREPARATION DE LA REQUETE
				$req=$bdd->prepare('SELECT id_utilisateur, prenom FROM utilisateur
					WHERE email=? AND mot_de_passe=?;');
			
			// EXECUTION DE LA REQUETE
				$req->execute(array($_POST['email'], $_POST['mot_de_passe']));
			
			
				$resultat=$req->fetch();
				
				if(!$resultat){
					echo "MAUVAIS IDENTIFIANT!";			
				}
				else {
					$_SESSION['prenom'] = $resultat['prenom'];
					$_SESSION['email'] = $_POST['email'];
					echo "VOUS ÊTES CONNECTE ".$_SESSION['prenom']." !";
				}
				
			}
		?>

	</body>
</html>

<?php
	//session_destroy();
?>
		
