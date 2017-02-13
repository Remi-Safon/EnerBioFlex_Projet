<?php 
	require 'php/head.php';
	require 'php/bar.php';
	
	head_html( 'Inscription', "img/logo.png", array( "css/base.css", 
	"css/contenu-box.css" , 
	"media/FR_regnew_js/cmap/style.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"
	) 
	);
?>

	<body>
		
		<?php
			//Barre
			bar('S\'INSCRIRE');
			
			
			//FORM IF NO email OR mot_de_passe
			
			if(!( isset($_POST['email']) && isset($_POST['mot_de_passe']) )){
		?>
	
		<h1>Inscription</h1>
		<div id="box">
			<form action="inscription.php" method="post">
				<p>E-mail
				<input type="text" name="email" onfocus="if (this.value=='E-Mail') this.value = ''"  value="E-Mail"/></p>
				
				<p>Mot de passe
				<input type="password" name="mot_de_passe" onfocus="if (this.value=='Mot de passe') this.value = ''"  value="Mot de passe"/></p>
				
				<p>Confirmer le mot de passe
				<input type="password" name="mot_de_passe_confirme" onfocus="if (this.value=='Mot de passe') this.value = ''"  value="Mot de passe"/></p>
				
				<p>Nom
				<input type="text" name="nom" onfocus="if (this.value=='Nom') this.value = ''"  value="Nom"/></p>
				
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
				
				<p>Photo de profil
				<input style="margin-left: 10px;" type="file" name="profil_pic" size="chars"></p>
				
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