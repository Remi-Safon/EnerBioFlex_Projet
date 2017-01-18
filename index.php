<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Plateforme d'échange</title>
		<link rel="shortcut icon" href="img/logo.png">
		<link rel="stylesheet" href="css/base.css"/>
		<link rel="stylesheet" href="css/annonce.css"/>
		
		<?php 
			require 'php/annonce.php';
			require 'php/connection_BDD.php';
			include 'php/recherche.php';
		?>
		
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
	</head>
	<body>
	
	
	
	<?php
	
	// CONNECTION BDD
	$bdd = connect_database('localhost', "bdd_enerbioflex", 'utf8', 'root', '');
	
	?>	
	
			<?php
			
				
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