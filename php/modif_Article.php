<?php 

	require 'functions.inc.php';
	require "connection_BDD.php";
	
	head_html( 'Deposer une annonce', "img/logo.png", array( "../css/base.css", 
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
			bar('GERER ANNONCES');
			
			if ( isset($_SESSION['id_utilisateur'])){
			
				// REQUETE DES RESSOURCES
				$req=$bdd->prepare('SELECT ressource FROM ressource WHERE 1');
				$req->execute();
					
				// REQUETE DES TYPES D'ANNONCE
				$req4=$bdd->prepare('SELECT DISTINCT type FROM type WHERE 1');
				$req4->execute();
				
				// REQUETE REGION
				$req2=$bdd->prepare('SELECT DISTINCT region FROM lieux WHERE 1');
				$req2->execute();
					
				// REQUETE DEPARTEMENT
				$pre_req3 = "SELECT DISTINCT departement FROM lieux WHERE 1 ; ";
				$req3=$bdd->prepare($pre_req3);
				$req3->execute();
				
				
				if(isset($_GET['id_article'])){
				
					$req_annonce = "SELECT * FROM article WHERE id_article = :id_article ;";
					$info_annonce=$bdd->prepare($req_annonce);
					$info_annonce->bindValue(':id_article',$_GET['id_article']);
					$info_annonce->execute();
					$annonce = $info_annonce->fetch(PDO::FETCH_ASSOC);
					
					$titre=$annonce['titre'];
					$prix=$annonce['prix'];
					$type=$annonce['type'];
					$ressource=$annonce['ressource'];
					$description=$annonce['description'];
					$voie=$annonce['voie'];
					$ville=$annonce['ville'];
					$departement=$annonce['departement'];
					$region=$annonce['region'];
					$photo=$annonce['photo'];
					

		?>
	
		<h1>Modifier mon annonce</h1>
		<div id="box">
			<form action="update_annonce.php?id_article=<?php echo $_GET['id_article']?>" method="post" id="depose_annonce" enctype="multipart/form-data">
				<p>Titre d'annonce
				<input type="text" name="titre" placeholder="Titre d'annonce" value="<?php echo $titre; ?>"/></p>
				
				<p><p>Prix</p>
				<input type="text" name="prix" placeholder="Prix" value="<?php echo $prix; ?>"/></p>
				
				<p>Type d'annonce
				
				<?php
					// Barre de selection de type d'annonce
						echo '<select name="type"  size="1">';
						echo '<option selected>'.$type.'</option>';
							while($resultat=$req4->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								echo '<option>'.$resultat['type'].'</option>';
							}
						echo '</select>';
				?></p>
				
				<p>Catégorie d'énergie
				
				<?php
					// Barre de selection de type de ressource
						echo '<select name="ressource"  size="1">';
							echo '<option selected>'.$ressource.'</option>';
							while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								echo '<option>'.$resultat_ressource['ressource'].'</option>';
							}
						echo '</select>';
				?></p>
				
				
				<p>Description
				<textarea name="description" form="depose_annonce" placeholder="Description" ><?php echo $description; ?></textarea></p>
		
				<p>Voie
				<input type="text" name="voie" placeholder="Voie" value="<?php echo $voie; ?>"/></p>
				
				<p>Ville</p>
				<input type="text" name="ville" placeholder="Ville" value="<?php echo $ville; ?>"/>
				
				<p>Département
				<?php
					// Barre de selection de departement
						echo '<select name="departement" size="1">';
							echo '<option selected>'.$departement.'</option>';
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
					echo '<option selected>'.$region.'</option>';
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
				else{
					echo'<div id="box">';
					echo'<p class="texte-centre" style="color:red;">Aucune annonces selectionnées</p>';
					echo'<p class="texte-centre"><a href="gerer_annonce.php">Retour à mes annonces.</a></p>';
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