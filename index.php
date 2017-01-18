<?php 
	require 'php/head.php';
	head_html( 'Plateforme d\'échange', "img/logo.png", array( "css/base.css", "css/annonce.css" ) );
?>


	<body>
	
		<?php  // INCLUDES PHP 
		require 'php/annonce.php';
		require 'php/connection_BDD.php';
		include 'php/recherche.php';
		?>
		
		<?php
		
		// CONNECTION BDD
			$bdd = connect_database('localhost', "bdd_enerbioflex", 'utf8', 'root', '');
			
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