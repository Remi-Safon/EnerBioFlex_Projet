<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/contenu.css">
		<title> Un page php de test </title>
	</head>
	
	<body>
		<?php
			if(!isset($_POST['email'])OR !isset($_POST['mot_de_passe'])){
		?>
		<div id="box">
		
			<form action="connexion.php" method="post">
				<input type="text" name="email"> <label for="email">Email</label>
				<br>
				<input type="password" name="mot_de_passe"> <label for="mot_de_passe">Mot de passe</label>
				<br>
				<input type="submit" name="valider">
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
	session_destroy();
?>
		
