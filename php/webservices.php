<?php

	search_articles($egalites){ // Tableau associatif : attribut => valeur
		$requete = "SELECT * FROM article ";
		
		if (isset $egalites['id_utilisateur']){
			$requete = $requete." join utilisateur on article.id_article = utilisateur.:id_utilisateur ";
		}
		
		$statement = $bdd->prepare($requete);
		
		if (isset $egalites['id_utilisateur']){
			$statement->bindValue(':id_utilisateur',$egalites['id_utilisateur']);
		}
		
		/*$statement->bindValue(':nom','Tarantino');
		$statement->bindValue(':prenom','Quentin');*/

		$statement->execute();
		
		return $statement;
	}

?>