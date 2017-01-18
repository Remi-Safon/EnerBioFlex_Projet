<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/contenu-box.css">
		<title> Connection </title>
	</head>
	
	<body>
		<?php
			if(!isset($_POST['email'])OR !isset($_POST['mot_de_passe'])){
		?>
		
		
		
		<div id="box">
		
			<form action="connexion.php" method="post">
				<p class="texte-centre"><input type="text" name="email" onfocus="if (this.value=='E-Mail') this.value = ''"  value="E-Mail"/></p>
				<p class="texte-centre"><input type="password" name="mot_de_passe" onfocus="if (this.value=='Mot de passe') this.value = ''"  value="Mot de passe"/></p>
				<p><input type="checkbox" name="souvenir_moi" />Se souvenir de moi</p>
				<p class="texte-centre"><input type="submit" name="valider" value="Se connecter"/></p>
				<p class="texte-centre"><a href="inscription.php"><input type="button" id="link">S'inscrire</button></a></p>
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
		
