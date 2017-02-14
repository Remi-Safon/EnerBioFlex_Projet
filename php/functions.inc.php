<?php

function bar ($active){
	
	$MENU = array( 'ACCUEIL'=>'index.php',
		'OFFRES'=>'offres.php',
		'DEMANDES'=>'',
		'DEPOSER ANNONCE'=>'',
		'GERER ANNONCES'=>'',
		'GERER ALERTES'=>''
		);
		
	$COMPTE_MENU = array( 'S\'INSCRIRE'=>'inscription.php',
		'SE CONNECTER'=>'connexion.php'
		);
		
		
		echo'<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="'.$MENU['ACCUEIL'].'"><img src="media/logo.png"> </a>
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