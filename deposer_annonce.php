<?php 
	require 'php/functions.inc.php';
	require "php/connection_BDD.php";
	
	head_html( 'Déposer une annonce', "img/logo.png", array( "css/base.css", 
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
			
				// REQUETE DES RESSOURCES
				$req=$bdd->prepare('SELECT ressource FROM ressource WHERE 1');
				$req->execute();
					
				// REQUETE DES TYPES D'ANNONCE
				$req4=$bdd->prepare('SELECT DISTINCT type FROM type WHERE 1');
				$req4->execute();
				
				// REQUETE REGION
				$req2=$bdd->prepare('SELECT region FROM region WHERE 1');
				$req2->execute();
					
				// REQUETE DEPARTEMENT
				$pre_req3 = "SELECT departement FROM departement WHERE 1 ; ";
				$req3=$bdd->prepare($pre_req3);
				$req3->execute();
				
				//FORM IF NO email OR mot_de_passe
				
				if(!( isset($_POST['email']) && isset($_POST['mot_de_passe']) )){
		?>
	
		<h1>Déposer une annonce</h1>
		<div id="box">
			<form action="inscription.php" method="post" id="depose_annonce">
				<p>Titre d'annonce
				<input type="text" name="titre" placeholder="Titre d'annonce"/></p>
				
				<p><p>Prix</p>
				<input type="text" name="prix" placeholder="Prix"/></p>
				
				<p>Type d'annonce
				
				<?php
					// Barre de selection de type d'annonce
						echo '<select name="type"  size="1">';
							while($resultat=$req4->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								echo '<option>'.$resultat['type'].'</option>';
							}
						echo '</select>';
				?></p>
				
				<p>Catégorie d'énergie
				
				<?php
					// Barre de selection de type de ressource
						echo '<select name="ressource"  size="1">';
							echo '<option selected>Catégorie d\'énergie</option>';
							while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								echo '<option>'.$resultat_ressource['ressource'].'</option>';
							}
						echo '</select>';
				?></p>
				
				<p>Photo de l'annonce
				<input style="margin-left: 10px;" type="file" name="photo" size="chars"></p>
				
				<p>Description
				<textarea name="description" form="depose_annonce" placeholder="Description"></textarea></p>
				
				<p>Ville
				<input type="text" name="ville" placeholder="Ville"/></p>
				
				<p>Département
				<?php
					// Barre de selection de departement
						echo '<select name="departement" size="1">';
							echo '<option selected>Département</option>';
							while($resultat_region=$req3->fetch()){
								echo '<option>'.$resultat_region['departement'].'</option>';
							}
						echo '</select>';
				?>
				</p>
				
				<p>Région
				<?php
					// Barre de selection de region
					echo '<select name="region" size="1">';
					echo '<option selected>Région</option>';
					while($resultat_region=$req2->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES REGIONS DE LA BASE
						echo '<option>'.$resultat_region['region'].'</option>';
					}
					echo '</select>';
				?></p>
				
				<p class="texte-centre"><input type="submit" name="valider" value="Publier"/></p>
			</form>
		</div>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('.date').datepicker({ dateFormat: "yy-mm-dd"});
			});
		</script>
		
		<?php
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