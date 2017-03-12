<?php 
	require 'php/functions.inc.php';
	require "php/connection_BDD.php";
	require 'php/webservices.php';
	
	head_html( 'Deposer une annonce', "img/logo.png", array( "css/base.css", 
	"css/contenu-box.css" , 
	"media/FR_regnew_js/cmap/style.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"
	) ,''
	);
?>

	<body>
		
		<?php
			session_start();
			
			//Barre
			bar('DEPOSER ANNONCE');
			
			if ( isset($_SESSION['id_utilisateur'])){
				if (isset($_POST['titre']) && $_POST['titre']!='' &&
					isset($_POST['prix']) && $_POST['prix']!='' &&
					isset($_POST['type']) && $_POST['type']!='' &&
					isset($_POST['ressource']) && $_POST['ressource']!='' && $_POST['ressource'] != 'Cat�gorie d\'�nergie' &&
					isset($_POST['description']) && $_POST['description']!='' &&
					isset($_POST['ville']) && $_POST['ville']!='' &&
					isset($_POST['departement']) && $_POST['departement']!='' && $_POST['departement']!='D�partement' &&
					isset($_POST['region']) && $_POST['region']!='' && $_POST['region']!='R�gion' &&
					isset($_POST['voie']) && $_POST['voie']!=''){
						if ($_POST['photo'] == '') $_POST['photo'] = '';
					insert_article($bdd, $_SESSION['id_utilisateur'], $_POST['type'], $_POST['ressource'], $_POST['titre'], $_POST['region'], $_POST['departement'], $_POST['ville'], $_POST['voie'], $_POST['prix'], $_POST['description'], $_POST['photo']);
					}
					else{
						echo'<div id="box">';
							echo'<p class="texte-centre" style="color:red;">Toutes les donn&eacutees d\'insertion d\'annonce n\'ont pas &eacutet&eacute saisies.</p>';
							echo'<p class="texte-centre"><a href="deposer_annonce.php">Retour au formulaire.</a></p>';
						echo'</div>	';
					}
				
			}
			else{
				echo'<div id="box">';
					echo'<p class="texte-centre" style="color:red;">Une connexion est requise pour poster une annonce.</p>';
					echo'<p class="texte-centre"><a href="connexion.php">Retour � la page de connexion.</a></p>';
				echo'</div>	';
			}
		?>
	</body>
</html>