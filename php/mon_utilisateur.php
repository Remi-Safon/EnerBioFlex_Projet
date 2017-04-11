<?php
	session_start();
	
	require 'functions.inc.php';
	
	
	// Affichage détail article si redirection via annonce
	if(isset($_SESSION['id_utilisateur'])){
		
		//HEAD
		

		// Entete
		head_html( 'Détail article n°'.$_GET['id_article'], "../img/logo.png", array( "../css/details.css",
		"../media/FR_regnew_js/cmap/style.css",
		"../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
		"../vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css",
		"../css/button_details.css",
		"../css/footer.css"
		),'');

		// Connexion BDD

		include('connection_BDD.php');
		

		//Barre
		bar('ANNONCES');

		// barre de recherche
		search_bar($bdd);
	
		
		
	}



	else{

		header("Location: ../index.php"); // Redirection vers acceuil

	}



	include('footer.php');
?>
</html>