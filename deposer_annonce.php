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
			//Barre
			bar('DEPOSER ANNONCE');
			
			// REQUETE DES RESSOURCES
			$req=$bdd->prepare('SELECT ressource FROM ressource WHERE 1');
			$req->execute();
				
			// REQUETE 
			$req4=$bdd->prepare('SELECT DISTINCT type FROM type WHERE 1');
			$req4->execute();
			
			//FORM IF NO email OR mot_de_passe
			
			if(!( isset($_POST['email']) && isset($_POST['mot_de_passe']) )){
		?>
	
		<h1>Déposer une annonce</h1>
		<div id="box">
			<form action="inscription.php" method="post">
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
							echo '<option selected>Type de ressource</option>';
							while($resultat_ressource=$req->fetch()){  // ALIMENTATION DES LISTE DEROULANTE AVEC LES RESSOURCES DE LA BASE
								echo '<option>'.$resultat_ressource['ressource'].'</option>';
							}
						echo '</select>';
				?></p>
				
				<p>Photo de l'annonce
				<input style="margin-left: 10px;" type="file" name="photo" size="chars"></p>
				
				<p>Description
				<input type="text-area" name="description" onfocus="if (this.value=='Description') this.value = ''"  value="Description"/></p>
				
				<p>Prénom
				<input type="text" name="prenom" onfocus="if (this.value=='Prenom') this.value = ''"  value="Prenom"/></p>
				
				<p>Date de naissance
				<input type="text" class="date" name="date_de_naissance"/>
				</p>
				
				<p>Adresse
				<input type="text" name="voie" onfocus="if (this.value=='Adresse') this.value = ''"  value="Adresse"/></p>
				
				<p>Ville</br>
				<input type="text" style="width:60%; display:inline;"name="ville" onfocus="if (this.value=='Ville') this.value = ''"  value="Ville"/>
				<input type="text" style="width:30%; display: inline;" name="code_postal" onfocus="if (this.value=='Code Postal') this.value = ''"  value="Code Postal"/>
				</p>
				
				<p>Numéro de téléphone
				<input type="text" name="numero_telephone" onfocus="if (this.value=='Téléphone') this.value = ''"  value="Téléphone"/></p>
				
				<p>Vous êtes?
				<SELECT name="pro_particulier" size="1">
				<OPTION>Professionnel
				<OPTION>Particulier
				</SELECT></p>
				
				<p>Profession
				<SELECT name="profession" size="1">
				<OPTION>QQch
				<OPTION>QQch d'autre
				<OPTION>il faut une requete sql
				</SELECT></p>
				
				<p><input type="checkbox" name="souvenir_moi" value="true"/><a href="CGU.php">J'accepte les Conditions Générales d'Utilisation</a></p>
				
				<p class="texte-centre"><input type="submit" name="valider" value="S'inscrire"/></p>
			</form>
		</div>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('.date').datepicker({ dateFormat: "yy-mm-dd"});
			});
		</script>
		
		<?php
			}
		?>
	</body>
</html>