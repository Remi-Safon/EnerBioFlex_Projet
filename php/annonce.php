<?php

function write_article( $id_article, $titre, $prix, $description, $region, $departement, $ville, $photo){
	if ( isset($id_article) && isset($titre) && isset($prix) && isset($description) && isset($region) || isset($photo_link) ){
		
		$titre = htmlspecialchars($titre);
		$prix = htmlspecialchars($prix);
		$description = htmlspecialchars($description);
		$region = htmlspecialchars($region);
		$departement = htmlspecialchars($departement);
		$ville = htmlspecialchars($ville);
		$photo = htmlspecialchars($photo);
		
		// Annonce
		echo '<center><div id="annonce">';
		
			// titre
			echo '<div id="title">';
			echo $titre;
			echo '</div>';
			
			// Contenu
			echo '<table><tr><td id="minitureTd">';
			
				// Photo
				if ( isset($photo) && trim( $photo ) != null){
				//if ( isset($photo)){
					echo '<img src="'.$photo.'" id="miniature"/>';
				}
				else{
					echo '<img src="$photo" id="miniature"/>';
				}
				
				// Texte
				echo '</td><td>';
				
					// Prix
					echo '<div style="margin-bottom: 20px;"><div style="display:inline-block; font-weight:bold;">Prix:</div>';
					echo '<div id="prix">'.$prix.'€</div></div>';
					
					// Addresse
					echo '<div style="margin-bottom: 20px;"><div class="ligne" style="display:inline-block;font-weight:bold;">Situé à: </div>';
					echo'<div style="display:inline-block;margin-left:20px;">'.$region.', '. $departement . ', '. $ville . '</div></div>';
					
					// Description
					echo $description;
				
			
			echo '</td></tr></table>';
			// Fin Contenu
			
			// Détails
			echo '<a id="button" href="details.php?id_article='.$id_article.'"> Détails >></a>';
		
		//Fin Annonce
		echo '</div></center>';
	}
	else{
		throw("Erreur: les informations passées à write_article() sont incomplètes");
	}
}

function write_article_modif( $id_article, $titre, $prix, $description, $region, $departement, $ville, $photo){
	if ( isset($id_article) && isset($titre) && isset($prix) && isset($description) && isset($region) || isset($photo_link) ){
		
		$titre = htmlspecialchars($titre);
		$prix = htmlspecialchars($prix);
		$description = htmlspecialchars($description);
		$region = htmlspecialchars($region);
		$departement = htmlspecialchars($departement);
		$ville = htmlspecialchars($ville);
		$photo = htmlspecialchars($photo);
		
		// Annonce
		echo '<center><div id="annonce">';
		
			// titre
			echo '<div id="title">';
			echo $titre;
			echo '</div>';
			
			// Contenu
			echo '<table><tr><td id="minitureTd">';
			
				// Photo
				if ( isset($photo) && trim( $photo ) != null){
				//if ( isset($photo)){
					echo '<img src="'.$photo.'" id="miniature"/>';
				}
				else{
					echo '<img src="$photo" id="miniature"/>';
				}
				
				// Texte
				echo '</td><td>';
				
					// Prix
					echo '<div style="margin-bottom: 20px;"><div style="display:inline-block; font-weight:bold;">Prix:</div>';
					echo '<div id="prix">'.$prix.'€</div></div>';
					
					// Addresse
					echo '<div style="margin-bottom: 20px;"><div class="ligne" style="display:inline-block;font-weight:bold;">Situé à: </div>';
					echo'<div style="display:inline-block;margin-left:20px;">'.$region.', '. $departement . ', '. $ville . '</div></div>';
					
					// Description
					echo $description;
				
			
			echo '</td></tr></table>';
			// Fin Contenu
			
			// Détails
			echo '<a id="button" href="modif_article.php?id_article='.$id_article.'"> Modifier >></a>';
		
		//Fin Annonce
		echo '</div></center>';
	}
	else{
		throw("Erreur: les informations passées à write_article() sont incomplètes");
	}
}


?>