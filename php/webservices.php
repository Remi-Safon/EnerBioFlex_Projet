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
		article.ville,
		article.departement,
		article.region,
		article.photo,
		article.prix,
		article.date_publication,
		article.ville,
		article.departement,
		article.region,
		article.ressource,
		article.type 
		FROM article ";
		
		//On vérifie si on a entré un paramètre de recherche
		$parametre_present = $titre != '' || $ressource != '' || $region != '' || $departement != '';
		
		//Ajout du where en fonction des paramètres renseignés
		if ($parametre_present){
			$first = true;
			if ($type != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'article.type = :type ';
				$first = false;
			}
			if ($ressource != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'article.ressource = :ressource ';
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
				$requete .= 'article.region = :region ';
				$first = false;
			}
			if ($departement != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'article.departement = :departement ';
				$first = false;
			}
			if ($ville != ''){
				if ($first) $requete .= 'WHERE ';
				else $requete .= 'AND ';
				$requete .= 'article.ville LIKE :ville ';
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
	
	
	function search_mes_articles($bdd, $id_utilisateur){	
		
		$requete = "SELECT 
		article.id_article,
		article.titre,
		article.description,
		article.voie,
		article.ville,
		article.departement,
		article.region,
		article.photo,
		article.prix,
		article.date_publication,
		article.ville,
		article.departement,
		article.region,
		article.ressource,
		article.type 
		FROM article 
		WHERE article.id_utilisateur = :id
		ORDER BY article.date_publication DESC;";
	
		
		try{
			//Preparation de la requete
			$statement = $bdd->prepare($requete);
			
			//remplissage de l'id
			$statement->bindValue(':id',$id_utilisateur);
			
			//Exécution de la requête
			$statement->execute();
			
		}
		catch (PDOException $e){
			die('<p>Erreur Requete SQL: '.$e->getMessage().'</p>');
		}
		
		return $statement;
	}
	
	
function insert_article($bdd, $id_utilisateur, $type, $ressource, $titre, $region, $departement, $ville, $voie, $prix, $description, $photo){
	
	$req_article = 'INSERT INTO article 
	(titre, description, voie, prix, date_publication, date_peremption, id_utilisateur, ville, departement, region, ressource, id_statistique, type, photo) 
	VALUES (:titre, :description, :voie, :prix, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 15 DAY), :id_utilisateur, :ville, :departement, :region, :ressource, 1, :type, :photo)';
	
	
	try{
		$statement = $bdd->prepare($req_article);
		$statement->bindValue(':titre', $titre);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':voie', $voie);
		$statement->bindValue(':prix', $prix);
		$statement->bindValue(':id_utilisateur', $id_utilisateur);
		$statement->bindValue(':ville', $ville);
		$statement->bindValue(':departement', $departement);
		$statement->bindValue(':region', $region);
		$statement->bindValue(':ressource', $ressource);
		$statement->bindValue(':type', $type);
		$statement->bindValue(':photo', $photo);
		
		$statement->execute();
	}
	catch(PDOException $e){
		die ('Erreur insertion article dans la base de données.</br>'.$e);
	}
}



function update_article($bdd, $id_article, $type, $ressource, $titre, $region, $departement, $ville, $voie, $prix, $description){
	
	$req_article = 'UPDATE article
	
	SET titre = :titre,
		description = :description,
		voie = :voie,
		ville = :ville,
		departement = :departement,
		region = :region,
		ressource = :ressource,
		type = :type,
		prix = :prix
	WHERE id_article=:id_article;
	';
	
	
	try{
		$statement = $bdd->prepare($req_article);
		$statement->bindValue(':titre', $titre);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':voie', $voie);
		$statement->bindValue(':prix', $prix);
		$statement->bindValue(':ville', $ville);
		$statement->bindValue(':departement', $departement);
		$statement->bindValue(':region', $region);
		$statement->bindValue(':ressource', $ressource);
		$statement->bindValue(':type', $type);
		$statement->bindValue(':id_article', $id_article);
		
		$statement->execute();
	}
	catch(PDOException $e){
		die ('Erreur de mise à jour article dans la base de données.</br>'.$e);
	}
}

	function envoieMail($destinataire, $objet, $message_txt, $message_html){
	
	

		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $destinataire)) // On filtre les serveurs qui rencontrent des bogues.
		{
			$passage_ligne = "\r\n";
		}
		else
		{
			$passage_ligne = "\n";
		}


		//=====Création de la boundary
		$boundary = "-----=".md5(rand());
		//==========

		 
		//=====Création du header de l'e-mail.
		$header = "From: \"EnerBioFlex\"<enerbioflex@ovh.net>".$passage_ligne;
		$header.= "Reply-to: \"EnerBioFlex\" <enerbioflex@ovh.net>".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		//==========
		 
		//=====Création du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format texte.
		$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_txt.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format HTML
		$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_html.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		//==========
		 
		//=====Envoi de l'e-mail.
		mail($destinataire,$objet,$message,$header);
		//==========

}


?>