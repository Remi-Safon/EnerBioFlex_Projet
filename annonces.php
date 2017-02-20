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
		// BARRE
		bar('ANNONCES');
		
		// CONNECTION BDD 
		require 'php/connection_BDD.php';
		
		
		// Récupération de données GET
		$ressource='';
		$region='';
		$departement='';
		$titre='';
		$advanced=false;
		$ville = '';
		$prix_min = '';
		$prix_max = '';
		
		if (isset($_GET['ressource']) && $_GET['ressource'] != "Type de ressource"){
			$ressource=$_GET['ressource'];
		}
		if(isset($_GET['region']) && $_GET['region'] != "Région"){
			$region=$_GET['region'];
		}
		if (isset($_GET['departement']) && $_GET['departement'] != "Département"){
			$departement=$_GET['departement'];
		}
		if (isset($_GET['titre'])){
			$titre=$_GET['titre'];
		}
		if (isset($_GET['advanced']) && $_GET['advanced'] != ''){
			$advanced=$_GET['advanced'];
		}
		if (isset($_GET['ville'])){
			$ville=$_GET['ville'];
		}
		if (isset($_GET['prix_min'])){
			$prix_min=$_GET['prix_min'];
		}
		if (isset($_GET['prix_max'])){
			$prix_max=$_GET['prix_max'];
		}
		
		
		// barre de recherche
		if ($advanced){ // avancée
			search_bar_advanced($bdd, $advanced );
		}
		else{ // simple
			search_bar($bdd, $advanced );
		}
		// recherche d'annonces
		$req = search_articles($bdd, $ressource, $titre, $region, $departement, $ville, $prix_min, $prix_max);
		
		
		

		while($resultat = $req->fetch(PDO::FETCH_ASSOC)){
			write_article($resultat['id_article'],$resultat['titre'],$resultat['prix'], $resultat['description'], $resultat['region'], $resultat['departement'], $resultat['ville'], $resultat['photo']);
		}

	
	?>
	</body>
</html>