<?php

function bar ($active){
	
	$MENU = array( 'ACCUEIL'=>'../index.php',
		'ANNONCES'=>'annonces.php',
		'DEPOSER ANNONCE'=>'deposer_annonce.php',
		'GERER ANNONCES'=>'gerer_annonce.php',
		'GERER ALERTES'=>''
		);
		
	$COMPTE_MENU = array( 'S\'INSCRIRE'=>'inscription.php',
		'SE CONNECTER'=>'connexion.php'
		);
	$COMPTE = array('PROFIL' => 'profil.php',
		'DECONNEXION' => 'deconnect.php'
	);
		
		
		echo'<nav class="navbar navbar-default" style="margin-bottom: 0">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="'.$MENU['ACCUEIL'].'"><img src="../media/logo.jpeg" style="margin-top:-10px;"/> </a>
			</div>
			<ul class="nav navbar-nav">';
				
				Foreach( $MENU as $partie=>$fichier ){
					echo '<li ';
					if ( $partie == $active ) echo 'class="active"';
					echo '><a href="'.$fichier.'">'.$partie.'</a></li>';
				}
			
			echo '</ul>
			<ul class="nav navbar-nav navbar-right">';
				if (isset($_SESSION['id_utilisateur'])){
					Foreach( $COMPTE as $partie=>$fichier ){
						echo '<li ';
						if ( $partie == $active ) echo 'class="active"';
						echo '><a href="'.$fichier.'"><span class="glyphicon glyphicon-user"></span> ';
						if ($partie == 'PROFIL') echo $_SESSION['nom'].' '.$_SESSION['prenom'];
						else echo $partie;
						echo '</a></li>';
					}
				}
				else{
					Foreach( $COMPTE_MENU as $partie=>$fichier ){
						echo '<li ';
						if ( $partie == $active ) echo 'class="active"';
						echo '><a href="'.$fichier.'"><span class="glyphicon glyphicon-user"></span> '.$partie.'</a></li>';
					}
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
		$req2=$bdd->prepare('SELECT DISTINCT region FROM lieux WHERE 1');
					
		// EXECUTION DE LA REQUETE
		$req2->execute();
			
		// PREPARATION DE LA REQUETE
		$req4=$bdd->prepare('SELECT DISTINCT type FROM type WHERE 1');
					
		// EXECUTION DE LA REQUETE
		$req4->execute();
		
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
				// formulaire
				echo'<form class="navbar-form navbar-left inline-form" action="annonces.php" method="get" style="width:100%;">';
					echo'<div class="form-group">';
					
						// Zone de recherche
						echo'<input type="search" class="input-sm form-control" placeholder="Recherche" name="titre">';
						
						
						// Barre de selection de type d'offre
						echo '<select name="type"  size="1">';	
						if(isset ($_GET['type']) && $_GET['type'] != ''){
							
							while($resultat=$req4->fetch()){
								if($_GET['type']==$resultat['type']){
									echo '<option selected>'. $resultat['type'].'</option>';
								}else{
									echo '<option>'.$resultat['type'].'</option>';
								}
							}
							
						}
						else{
							while($resultat=$req4->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								echo '<option>'.$resultat['type'].'</option>';
							}
						}
						echo '</select>';
						
						
						
						// Barre de selection de type de ressource
						echo '<select name="ressource"  size="1">';	
						if(isset ($_GET['ressource']) && $_GET['ressource'] != ''){ // SI LE NOM DE LA RESSOURCE A DEJA ETE SELECTIONNEE UNE PREMIERE FOIS
							echo '<option>Type de ressource</option>';
							
							while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								if($_GET['ressource']==$resultat_ressource['ressource']){
									echo '<option selected>'. $resultat_ressource['ressource'].'</option>';
								}else{
									echo '<option>'.$resultat_ressource['ressource'].'</option>';
								}
							}
							
						}
						else{
							echo '<option selected>Type de ressource</option>';
							while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								echo '<option>'.$resultat_ressource['ressource'].'</option>';
							}
						}
						echo '</select>';
						
						
						// Barre de selection de region
						echo '<select name="region" size="1">';
						if(isset($_GET['region'])){ // SI LE NOM DE LA REGION A DEJA ETE SELECTIONNER UNE PREMIERE FOIS
						echo '<option>Région</option>';
							while($resultat_region=$req2->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES REGIONS DE LA BASE
								if($_GET['region']==$resultat_region['region']){echo '<option selected>'. $resultat_region['region'].'</option>';}
								else{echo '<option>'. $resultat_region['region'].'</option>';}
							}	
						}
						else{
						echo '<option selected>Région</option>';
							while($resultat_region=$req2->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES REGIONS DE LA BASE
								echo '<option>'.$resultat_region['region'].'</option>';
							}
						}
						echo '</select>';
						
						
						
						
						echo'<button type="submit" name="Ajouter" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>';
						echo '<a href="annonces.php?advanced=true" style="color:white;text-decoration:none;">Affiner Recherche</a>'; // LIEN AFFINER RECHERCHE
					echo'</div>';
				echo'</form>';
			echo'</div>';
		echo'</nav>';
	}
	
function search_bar_advanced($bdd){
		// PREPARATION DE LA REQUETE
		$req=$bdd->prepare('SELECT DISTINCT ressource FROM ressource WHERE 1');
					
		// EXECUTION DE LA REQUETE
		$req->execute();
			
		// PREPARATION DE LA REQUETE
		$req2=$bdd->prepare('SELECT DISTINCT region FROM lieux WHERE 1');
					
		// EXECUTION DE LA REQUETE
		$req2->execute();
			
		// PREPARATION DE LA REQUETE
		$pre_req3 = "";
		$region_renseignee=isset($_GET['region']);
		
		/*if ($region_renseignee) $pre_req3 = "SELECT DISTINCT departement FROM departement JOIN lieu USING (id_departement) 
		JOIN region USING (id_region) WHERE region.region = :region ; ";
		else */
		$pre_req3 = "SELECT DISTINCT departement FROM lieux ; ";
		
		$req3=$bdd->prepare($pre_req3);
		
		//if ($region_renseignee) $req3->bindValue(":region", $_GET['region']);
					
		// EXECUTION DE LA REQUETE
		$req3->execute();
			
		// PREPARATION DE LA REQUETE
		$req4=$bdd->prepare('SELECT DISTINCT type FROM type WHERE 1');
					
		// EXECUTION DE LA REQUETE
		$req4->execute();
		
		
		
		
		
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
				// formulaire
				echo'<form class="navbar-form navbar-left inline-form" action="annonces.php" method="get" style="width:100%;">';
					echo'<div class="form-group">';
						
						// pour que le formulaire avancé reste
						echo'<input type="hidden" name="advanced" value="true"/>';
						
						// Zone de recherche
						echo'<input type="search" class="input-sm form-control" placeholder="Recherche" name="titre">';
						
						
						
						
						// Barre de selection de type d'offre
						echo '<select name="type"  size="1">';	
						if(isset ($_GET['type']) && $_GET['type'] != ''){
							
							while($resultat=$req4->fetch()){
								if($_GET['type']==$resultat['type']){
									echo '<option selected>'. $resultat['type'].'</option>';
								}else{
									echo '<option>'.$resultat['type'].'</option>';
								}
							}
							
						}
						else{
							while($resultat=$req4->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								echo '<option>'.$resultat['type'].'</option>';
							}
						}
						echo '</select>';
						
						
						// Barre de selection de type de ressource
						echo '<select name="ressource"  size="1">';	
						if(isset ($_GET['ressource']) && $_GET['ressource'] != ''){ // SI LE NOM DE LA RESSOURCE A DEJA ETE SELECTIONNEE UNE PREMIERE FOIS
							echo '<option>Type de ressource</option>';
							
							while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								if($_GET['ressource']==$resultat_ressource['ressource']){
									echo '<option selected>'. $resultat_ressource['ressource'].'</option>';
								}else{
									echo '<option>'.$resultat_ressource['ressource'].'</option>';
								}
							}
							
						}
						else{
							echo '<option selected>Type de ressource</option>';
							while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								echo '<option>'.$resultat_ressource['ressource'].'</option>';
							}
						}
						echo '</select>';
						
						
						
						// Zone de recherche de ville
						echo'<input type="search" class="input-sm form-control" placeholder="Ville" name="ville">';
						
						
						
						// Barre de selection de region
						echo '<select name="region" size="1">';
						if(isset($_GET['region'])){ // SI LE NOM DE LA REGION A DEJA ETE SELECTIONNER UNE PREMIERE FOIS
						echo '<option>Région</option>';
							while($resultat_region=$req2->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES REGIONS DE LA BASE
								if($_GET['region']==$resultat_region['region']){echo '<option selected>'. $resultat_region['region'].'</option>';}
								else{echo '<option>'. $resultat_region['region'].'</option>';}
							}	
						}
						else{
						echo '<option selected>Région</option>';
							while($resultat_region=$req2->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES REGIONS DE LA BASE
								echo '<option>'.$resultat_region['region'].'</option>';
							}
						}
						echo '</select>';
						
						
						// Barre de selection de departement
						echo '<select name="departement" size="1">';
						if(isset($_GET['departement'])){ // SI LE NOM DU DEPARTEMENT A DEJA ETE SELECTIONNER UNE PREMIERE FOIS
							echo '<option>Département</option>';
							while($resultat_region=$req3->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES DEPARTEMENTS DE LA BASE
								if($_GET['departement']==$resultat_region['departement']){echo '<option selected>'. $resultat_region['departement'].'</option>';}
								else{echo '<option>'. $resultat_region['departement'].'</option>';}
							}	
						}
						else{
							echo '<option selected>Département</option>';
							while($resultat_region=$req3->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES departementsS DE LA BASE
								echo '<option>'.$resultat_region['departement'].'</option>';
							}
						}
						echo '</select>';
						
						
						
						// Prix Minimum
						echo'<input type="search" class="input-sm form-control" placeholder="Prix minimum" name="prix_min">';
						
						
						// Prix Maximum
						echo'<input type="search" class="input-sm form-control" placeholder="Prix maximum" name="prix_max">';
						
						
						echo'<button type="submit" name="Ajouter" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>';
						echo '<a href="annonces.php?" style="color:white;text-decoration:none;">Recherche simple</a>'; // LIEN AFFINER RECHERCHE
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
	
	function decrypt_hash($hash_crypte)
{
	// Enlever le sel du début et de fin
	$hash_crypte = str_replace(SEL_DEBUT, '', $hash_crypte);
	$hash_crypte = str_replace(SEL_FIN, '', $hash_crypte);
	
	// Enlever le sel du milieu
	$hash = preg_replace('#('.SEPARATEUR_DEBUT.'[a-z0-9]+'.SEPARATEUR_FIN.')#', '', $hash_crypte);
	
	return $hash;
}
	




?>