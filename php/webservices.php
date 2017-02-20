<?php

//	include "connection_BDD.php";

	function search_articles($bdd, $ressource, $titre, $region, $departement){
		
		$titre = "%".$titre."%";
		
		$requete = "SELECT 
		article.id_article,
		article.titre,
		article.description,
		article.voie,
		article.photo,
		article.prix,
		article.date_publication,
		region.region,
		departement.departement,
		ressource.ressource,
		ville.ville,
		ville.code_postal
		 FROM article 
		JOIN lieu USING (id_ville, id_departement, id_region) 
		JOIN region USING (id_region)
		JOIN departement USING (id_departement)
		JOIN ville USING (id_ville)
		JOIN ressource USING (id_ressource) ";
		
		//On vérifie si on a entré un paramètre de recherche
		$parametre_present = $titre != '' || $ressource != '' || $region != '' || $departement != '';
		
		//Ajout du where en fonction des paramètres renseignés
		if ($parametre_present){
			$first = true;
			if ($ressource != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'ressource.ressource = :ressource ';
				$first = false;
			}
			if ($titre != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'article.titre LIKE :titre ';
				$first = false;
			}
			if ($region != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'region.region = :region ';
				$first = false;
			}
			if ($departement != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'departement.departement = :departement ';
				$first = false;
			}
		}
		$requete .= "ORDER BY article.date_publication DESC;";
		
		try{
			//Preparation de la requete
			$statement = $bdd->prepare($requete);
			
			//remplissage des valeurs
			if ($titre != '') $statement->bindValue(':titre',$titre);
			if ($ressource != '') $statement->bindValue(':ressource',$ressource);
			if ($region != '') $statement->bindValue(':region',$region);
			if ($departement != '') $statement->bindValue(':departement',$departement);
			
			//Exécution de la requête
			$statement->execute();
			
		}
		catch (PDOException $e){
			die('<p>Erreur Requete SQL: '.$e->getMessage().'</p>');
		}
		
		return $statement;
	}

/*	A LAISSER EN COMMENTAIRE, CEST UN CODE DE TEST!!

	$statement = search_articles($bdd, "", "", "", "");
			
	echo '
	<style>
		div.content-requete{
			display: block;
			width: 100%;
			padding: 30px;
		}
		table.requete{
			border-collapse: collapse;
			margin-left: auto;
			margin-right: auto;
		}
		table.requete td, table.requete tr{
			border: 1px Solid black;
		}
		table.requete td, table.requete th{
			padding: 15px;
			min-width: 75px;
		}
	</style>
	';
	
	$ligne = $statement->fetch(PDO::FETCH_ASSOC);
	
	if ( $ligne ){
		echo '<div class="content-requete"><table class="requete">';
		echo '<tr>';
		foreach ( $ligne as $titre=>$value ){
			echo '<th>'.$titre.'</th>';
		}
		echo '</tr>';
		do{
			echo '<tr>';
			foreach ( $ligne as $value ){
				echo '<td>'.$value.'</td>';
			}
			echo '</tr>';
		}while ($ligne = $statement->fetch(PDO::FETCH_ASSOC));
		echo '</table></div>';
	}
*/

?>