<?php

//	include "connection_BDD.php";

	function search_articles($bdd, $type, $ressource, $titre, $region, $departement, $ville, $prix_min, $prix_max){
		
		$titre = "%".$titre."%";
		$ville = "%".$ville."%";
		
		
		
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
		JOIN ressource USING (id_ressource) 
		JOIN type USING (id_type) ";
		
		//On vérifie si on a entré un paramètre de recherche
		$parametre_present = $titre != '' || $ressource != '' || $region != '' || $departement != '';
		
		//Ajout du where en fonction des paramètres renseignés
		if ($parametre_present){
			$first = true;
			if ($type != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'type.type = :type ';
				$first = false;
			}
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
			if ($ville != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'ville.ville LIKE :ville ';
				$first = false;
			}
			if ($prix_min != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'article.prix >= :prix_min ';
				$first = false;
			}
			if ($prix_max != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'article.prix <= :prix_max ';
				$first = false;
			}
		}
		$requete .= "ORDER BY article.date_publication DESC;";
		
		try{
			//Preparation de la requete
			$statement = $bdd->prepare($requete);
			
			//remplissage des valeurs
			if ($type != '') $statement->bindValue(':type',$type);
			if ($titre != '') $statement->bindValue(':titre',$titre);
			if ($ressource != '') $statement->bindValue(':ressource',$ressource);
			if ($region != '') $statement->bindValue(':region',$region);
			if ($departement != '') $statement->bindValue(':departement',$departement);
			if ($ville != '') $statement->bindValue(':ville',$ville);
			if ($prix_min != '') $statement->bindValue(':prix_min',$prix_min);
			if ($prix_max != '') $statement->bindValue(':prix_max',$prix_max);
			
			//Exécution de la requête
			$statement->execute();
			
		}
		catch (PDOException $e){
			die('<p>Erreur Requete SQL: '.$e->getMessage().'</p>');
		}
		
		return $statement;
	}
	
	



?>