<?php 
	// CONNECTION DATABASE
	$bdd = connect_database('localhost', 'bdd_enerbioflex', 'utf8', 'root', '');
	
	// PREPARATION DE LA REQUETE
	$req=$bdd->prepare('SELECT ressource FROM ressource WHERE 1');
				
	// EXECUTION DE LA REQUETE
	$req->execute();
		
	// PREPARATION DE LA REQUETE
	$req2=$bdd->prepare('SELECT region FROM region WHERE 1');
				
	// EXECUTION DE LA REQUETE
	$req2->execute();
		
	

echo '<form action="'.$_SERVER['PHP_SELF'].'" method="get">'; // FORMULAIRE
		
	echo '<label> Recherche </label><p><input type="text" name="nomArticle"/></p>';
	echo '<SELECT name="type_ressource"  size="1">';
	
	
	if(isset($laRessource)){ // SI LE NOM DE LA RESSOURCE A DEJA ETE SELECTIONNER UNE PREMIERE FOIS
		
		
		while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
		echo '<OPTION>'.$resultat_ressource['ressource']; 
		}
	}
	else{
		while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
		echo '<OPTION>'.$resultat_ressource['ressource']; 
		}
	}
	

	echo '</SELECT>';
	echo '<SELECT name="departement" size="1">';

	
	if(isset($laRegion)){ // SI LE NOM DE LA REGION A DEJA ETE SELECTIONNER UNE PREMIERE FOIS
		while($resultat_region=$req2->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES REGIONS DE LA BASE
			
			if($laRegion=$resultat_region['region']){echo '<OPTION selected="selected">'. $resultat_region['region'];}
			else{echo '<OPTION>'. $resultat_region['region'];}
		}	
	}
	else{
		while($resultat_region=$req2->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES REGIONS DE LA BASE
			echo '<OPTION>'.$resultat_region['region'];
		}
	}
?>
	</SELECT>
	
	<p>  <input type="submit" name="Ajouter" value="Rechercher"/></p>
</form>



