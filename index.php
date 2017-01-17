<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Plateforme d'échange</title>
		<link rel="shortcut icon" href="img/logo.png">
		<link rel="stylesheet" href="css/base.css"/>
		<link rel="stylesheet" href="css/annonce.css"/>
		
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
	</head>
	<body>
	
	
	
<?php 
	require('php\annonce.php');

// CONNECTION BDD
	try{
		$bdd=new PDO('mysql:host=localhost;dbname=db_enerbioflex;charset=utf8','root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());		
	}
?>	
	
			<?php
				include('recherche.php');
			// PREPARATION DE LA REQUETE
				$req=$bdd->prepare('SELECT id_article, titre, prix, description, voie, photo, region, departement, ville FROM article 
				JOIN region USING(id_region)
				JOIN departement USING(id_departement)
				JOIN ville USING(id_ville)
				WHERE 1;');
			
			// EXECUTION DE LA REQUETE
				$req->execute();
			
				while($resultat=$req->fetch()){
					write_article($resultat['id_article'],$resultat['titre'],$resultat['prix'], $resultat['description'], $resultat['region'], $resultat['departement'], $resultat['ville'], $resultat['photo']);
				}

		
			?>
			

	
		
	</body>
</html>