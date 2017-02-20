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
	
	<script type="text/javascript">
            function notif() {
                $.ajax({
                    url: "req_ajax/nbr_tt.php",
                    ifModified:true,
                    async: false,
                    success: function(content){
                         
                        remp(content);
                                                         
                        $('#affiche').html('<input type="text" value="'+content+'" >');
 
                    }
                });
                setTimeout(notif, 3000);
 
            }
 
            notif();
            function remp(data){
                var g2         
                window.onload = function(){
                    g2= new JustGage({
                        id: "gauge",
                        value:data,
                        min: 0,
                        max: 100,
                        title: "Nombre total des visiteurs",
                        label: "",
                        levelColorsGradient: true
                    });
                    setInterval(function() {g2.refresh(data);}, 2500);
                }
            }
 
    </script>
	
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
		
		if (isset($_GET['ressource'])){
			$ressource=$_GET['ressource'];
		}
		if(isset($_GET['region'])){
			$region=$_GET['region'];
		}
		if (isset($_GET['departement'])){
			$departement=$_GET['departement'];
		}
		if (isset($_GET['titre'])){
			$titre=$_GET['titre'];
		}
		
		
		
		
		// barre de recherche
		search_bar($bdd);
		
		// recherche d'annonces
		$req = search_articles($bdd, $ressource, $titre, $region, $departement);

		while($resultat = $req->fetch(PDO::FETCH_ASSOC)){
			write_article($resultat['id_article'],$resultat['titre'],$resultat['prix'], $resultat['description'], $resultat['region'], $resultat['departement'], $resultat['ville'], $resultat['photo']);
		}

	
	?>
	</body>
</html>