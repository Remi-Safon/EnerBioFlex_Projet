<?php 

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
	echo '<select name="type_ressource"  size="1">';
	
	
	if(isset($_GET['type_ressource'])){ // SI LE NOM DE LA RESSOURCE A DEJA ETE SELECTIONNER UNE PREMIERE FOIS
		
		
		while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
		
		
			if($_GET['type_ressource']==$resultat_ressource['ressource']){echo '<option selected>'. $resultat_ressource['ressource'].'</option>';}
			else{echo '<option>'.$resultat_ressource['ressource'].'</option>';}
		 
		}
	}
	else{
		while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
		echo '<option>'.$resultat_ressource['ressource'].'</option>';
		}
	}
	echo '</select>';
	
	
	echo '<select name="region" size="1">';

	
	if(isset($_GET['region'])){ // SI LE NOM DE LA REGION A DEJA ETE SELECTIONNER UNE PREMIERE FOIS
		while($resultat_region=$req2->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES REGIONS DE LA BASE
			if($_GET['region']==$resultat_region['region']){echo '<option selected>'. $resultat_region['region'].'</option>';}
			else{echo '<option>'. $resultat_region['region'].'</option>';}
		}	
	}
	else{
		while($resultat_region=$req2->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES REGIONS DE LA BASE
			echo '<option>'.$resultat_region['region'].'</option>';
		}
	}
	
	echo '</select>';
	echo '<p> <input type="submit" name="Ajouter" value="Rechercher"/></p>';
	echo '</form>';
			
	echo '<a href="">OpenClassrooms</a>'; // LIEN AFFINER RECHERCHE
	

	echo '</br>';
	
	
			
			
?>
