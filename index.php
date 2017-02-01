<?php 
	require 'php/head.php';
	head_html( 'Plateforme d\'échange', "img/logo.png", array( "css/base.css", "css/annonce.css" ) );
?>


	<body>
	
		<?php  // INCLUDES PHP 
		require 'php/annonce.php';
		require 'php/connection_BDD.php';
		include 'php/recherche.php';
		
		
		if(isset($_GET['type_ressource']) && isset($_GET['region'])){
			
			$laRessource=$_GET['type_ressource'];
			$laRegion=$_GET['region'];
			
			
			
			if(isset($_GET['nomArticle'])){
				$leArticle=$_GET['nomArticle'];
				// PREPARATION DE LA REQUETE
				$req=$bdd->prepare('SELECT id_article, titre, prix, description, voie, photo, region, departement, ville FROM article 
				JOIN region USING(id_region)
				JOIN departement USING(id_departement)
				JOIN ville USING(id_ville)
				JOIN ressource USING(id_ressource)
				WHERE ressource= ? AND region= ? AND titre LIKE ?;');
				
				// EXECUTION DE LA REQUETE
				$req->execute(array($laRessource, $laRegion, "%$leArticle%"));
			}
			else{
				// PREPARATION DE LA REQUETE
				$req=$bdd->prepare('SELECT id_article, titre, prix, description, voie, photo, region, departement, ville FROM article 
				JOIN region USING(id_region)
				JOIN departement USING(id_departement)
				JOIN ville USING(id_ville)
				JOIN ressource USING(id_ressource)
				WHERE ressource= ? AND region= ?;');
				
				// EXECUTION DE LA REQUETE
				$req->execute(array($laRessource, $laRegion));
			}
		}
	
		else{ // SI IL N'Y A PAS LES ARGUMENTS DE RECHERCHE
		
			// PREPARATION DE LA REQUETE
			$req=$bdd->prepare('SELECT id_article, titre, prix, description, voie, photo, region, departement, ville FROM article 
			JOIN region USING(id_region)
			JOIN departement USING(id_departement)
			JOIN ville USING(id_ville)
			WHERE 1;');
			
			// EXECUTION DE LA REQUETE
			$req->execute();

		}

		
		
			while($resultat=$req->fetch()){
				write_article($resultat['id_article'],$resultat['titre'],$resultat['prix'], $resultat['description'], $resultat['region'], $resultat['departement'], $resultat['ville'], $resultat['photo']);
			}

	
?>
			

	
		
	</body>
</html>