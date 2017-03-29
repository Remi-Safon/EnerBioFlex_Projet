<?php
	include('functions.inc.php');
	
	// Entete
		head_html( 'Profil', "../img/logo.png", array( "../css/details.css",
		"../media/FR_regnew_js/cmap/style.css",
		"../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
		"../vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css",
		"../css/button_details.css",
		"../css/footer.css"
		),'');

		session_start();
		
			//Barre
			bar('PROFIL');

	echo "Profil à faire.";

?>