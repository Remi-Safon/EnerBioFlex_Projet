<?php

function write_article( $id_article, $titre, $prix, $description, $addresse, $photo){
	if ( isset($id_article) && isset($titre) && isset($prix) && isset($description) && isset($addresse) || isset($photo_link) ){
		// Annonce
		echo '<div id="annonce">';
		
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
					echo '<img src="img\default_miniature.jpg" id="miniature"/>';
				}
				
				// Texte
				echo '</td><td>';
					// Prix
					echo '<p><div style="display:inline-block; font-weight:bold;">Prix:</div>';
					echo '<div id="prix">'.$prix.'€</div></p>';
					
					// Addresse
					echo '<p><div class="ligne" style="display:inline-block;font-weight:bold;">Situé à: </div>';
					echo'<div style="display:inline-block;padding-left:5px;">'.$addresse.'</div></p>';
					
					// Description
					echo $description;
				
			
			echo '</td></tr></table>';
			// Fin Contenu
			
			// Détails
			echo '<a id="button" href="details.php?id_article='.$id_article.'"> Détails >></a>';
		
		//Fin Annonce
		echo '</div>';
	}
	else{
		throw("Erreur: les informations passées à write_article() sont incomplètes");
	}
}

?>