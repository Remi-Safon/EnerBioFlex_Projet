<?php

	// Affichage détail article si redirection via annonce
	if(isset($_GET['id_article'])){
		
		
		require 'php/head.php';
		require 'php/bar.php'; 

		// Entete
		head_html( 'Détail article n°'.$_GET['id_article'], "img/logo.png", array( "css/details.css",
		"media/FR_regnew_js/cmap/style.css",
		"vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
		"vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"
		));

		//Barre
		bar('OFFRES');

		// Chargement détails article (photo(s), prix etc.)
		include('php/detailArticle.php');		
			
	}



	else{

	header("Location: index.php"); // Redirection vers acceuil

	}



	
?>
</html>