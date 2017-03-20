<?php 
	require 'php/functions.inc.php';
	require 'php/annonce.php';
	require 'php/webservices.php';
	
	head_html( 'Offres', "img/logo.png", array( "css/base.css", 
	"css/annonce.css" , 
	"media/FR_regnew_js/cmap/style.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"
	) ,''
	);
?>


	<body>
	

	
		<?php  
		session_start();
		
		// BARRE
		bar('ANNONCES');
		
		// CONNECTION BDD 
		require 'php/connection_BDD.php';
		
		// recherche de mes annonces
		$req = search_mes_articles($bdd, $_SESSION['id_utilisateur']);
		
		
		

		while($resultat = $req->fetch(PDO::FETCH_ASSOC)){
			write_article($resultat['id_article'],$resultat['titre'],$resultat['prix'], $resultat['description'], $resultat['region'], $resultat['departement'], $resultat['ville'], $resultat['photo']);
		}

	
	?>
	</body>
</html>