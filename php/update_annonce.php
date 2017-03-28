<?php 
	require 'functions.inc.php';
	require "connection_BDD.php";
	require 'webservices.php';
	
	head_html( 'Deposer une annonce', "../img/logo.png", array( "../css/base.css", 
	"../css/contenu-box.css" , 
	"../media/FR_regnew_js/cmap/style.css",
	"../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
	"../vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"
	) ,''
	);
?>

	<body>
		
		<?php
			session_start();
			
			//Barre
			bar('DEPOSER ANNONCE');
			
			if ( isset($_SESSION['id_utilisateur'])){
				if (isset($_GET['id_article']) && isset($_POST['titre']) && $_POST['titre']!='' &&
					isset($_POST['prix']) && $_POST['prix']!='' &&
					isset($_POST['type']) && $_POST['type']!='' &&
					isset($_POST['ressource']) && $_POST['ressource']!='' && $_POST['ressource'] != 'Catégorie d\'énergie' &&
					isset($_POST['description']) && $_POST['description']!='' &&
					isset($_POST['ville']) && $_POST['ville']!='' &&
					isset($_POST['departement']) && $_POST['departement']!='' && $_POST['departement']!='Département' &&
					isset($_POST['region']) && $_POST['region']!='' && $_POST['region']!='Région' &&
					isset($_POST['voie']) && $_POST['voie']!=''){
					update_article($bdd, $_GET['id_article'], $_POST['type'], $_POST['ressource'], $_POST['titre'], $_POST['region'], $_POST['departement'], $_POST['ville'], $_POST['voie'], $_POST['prix'], $_POST['description']);
					
						echo'<div id="box">';
							echo'<p class="texte-centre" style="color:green;">Annonce modifié avec succès.</p>';
							echo'<p class="texte-centre"><a href="gerer_annonce.php">Retour à mes annonces.</a></p>';
						echo'</div>	';					
					
					}
					else{
						echo'<div id="box">';
							echo'<p class="texte-centre" style="color:red;">Toutes les donn&eacutees d\'insertion d\'annonce n\'ont pas &eacutet&eacute saisies.</p>';
							echo'<p class="texte-centre"><a href="deposer_annonce.php?id_article='.$_GET['id_article'].'">Retour au formulaire.</a></p>';
						echo'</div>	';
					}
				
			}
			else{
				echo'<div id="box">';
					echo'<p class="texte-centre" style="color:red;">Une connexion est requise pour poster une annonce.</p>';
					echo'<p class="texte-centre"><a href="connexion.php">Retour à la page de connexion.</a></p>';
				echo'</div>	';
			}
		?>
	</body>
</html>