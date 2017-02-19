<?php

function bar ($active){
	
	$MENU = array( 'ACCUEIL'=>'index.php',
		'ANNONCES'=>'annonces.php',
		'DEPOSER ANNONCE'=>'',
		'GERER ANNONCES'=>'',
		'GERER ALERTES'=>''
		);
		
	$COMPTE_MENU = array( 'S\'INSCRIRE'=>'inscription.php',
		'SE CONNECTER'=>'connexion.php'
		);
		
		
		echo'<nav class="navbar navbar-default" style="margin-bottom: 0">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="'.$MENU['ACCUEIL'].'"><img src="media/logo.png" style="vertical-align: middle;" > </a>
			</div>
			<ul class="nav navbar-nav">';
				
				Foreach( $MENU as $partie=>$fichier ){
					echo '<li ';
					if ( $partie == $active ) echo 'class="active"';
					echo '><a href="'.$fichier.'">'.$partie.'</a></li>';
				}
			
			echo '</ul>
			<ul class="nav navbar-nav navbar-right">';
				
				Foreach( $COMPTE_MENU as $partie=>$fichier ){
					echo '<li ';
					if ( $partie == $active ) echo 'class="active"';
					echo '><a href="'.$fichier.'"><span class="glyphicon glyphicon-user"></span> '.$partie.'</a></li>';
				}
				
			echo'</ul>
		</div>
	</nav>';
	
}

	function search_bar($bdd){
		// PREPARATION DE LA REQUETE
		$req=$bdd->prepare('SELECT ressource FROM ressource WHERE 1');
					
		// EXECUTION DE LA REQUETE
		$req->execute();
			
		// PREPARATION DE LA REQUETE
		$req2=$bdd->prepare('SELECT region FROM region WHERE 1');
					
		// EXECUTION DE LA REQUETE
		$req2->execute();
		
		//Bootstrap search bar
		echo'<style>
			form[class="navbar-form navbar-left inline-form"] div.form-group input,
			form[class="navbar-form navbar-left inline-form"] div.form-group select,
			form[class="navbar-form navbar-left inline-form"] div.form-group button,
			form[class="navbar-form navbar-left inline-form"] div.form-group a{
				margin-top: 5px;
				margin-left: 10px;
				height: 30px;
				vertical-align: middle;

			}
		</style>';
		echo'<nav class="navbar navbar-inverse" style="border-radius: 0;">';
			echo'<div class="container-fluid">';
				echo'<form class="navbar-form navbar-left inline-form" action="'.$_SERVER['PHP_SELF'].'" method="get" style="width:100%;">';
					echo'<div class="form-group">';
						echo'<input type="search" class="input-sm form-control" placeholder="Recherche" name="nomArticle">';
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
						
						echo'<button type="submit" name="Ajouter" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>';
						echo '<a href="#" style="color:white;text-decoration:none;">Affiner Recherche</a>'; // LIEN AFFINER RECHERCHE
					echo'</div>';
				echo'</form>';
			echo'</div>';
		echo'</nav>';
	}

	function head_html( $title, $icon, $css_files , $add){ // add contient d'autres types de données à rajouter au head
		echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
		<html lang="en" ng-app="bflex">
			<head>';
				echo '<title>'.$title.'</title>';
				echo '<link rel="shortcut icon" href="'.$icon.'">';
				
				$i = 0;
				if ( isset( $css_files )){
					if ( is_array($css_files) ){
						foreach ( $css_files as $css_file ){
							echo '<link rel="stylesheet" href="'.$css_file.'"/>';
						}
					}
					else{
						echo '<link rel="stylesheet" type="text/css" href="'.$css_files.'"/>';
					}
				}
				echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
				//echo '<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
				
				echo $add;
				
			echo '</head>';
	}
	
	

?>