<?php 
	require 'php/head.php';
	head_html( 'Inscription', "img/logo.png", array( "css/base.css", "css/contenu-box.css" ) );
?>

	<body>
		
		<?php
			if(!( isset($_POST['email']) && isset($_POST['mot_de_passe']) )){
		?>
	
		<h1>Inscription</h1>
		<div id="box">
			<form action="inscription.php" method="post">
				<p><input type="text" name="email" onfocus="if (this.value=='E-Mail') this.value = ''"  value="E-Mail"/></p>
				<p class="texte-centre"><input type="password" name="mot_de_passe" onfocus="if (this.value=='Mot de passe') this.value = ''"  value="Mot de passe"/></p>
				<p class="texte-centre"><input type="password" name="mot_de_passe_confirme" onfocus="if (this.value=='Mot de passe') this.value = ''"  value="Mot de passe"/></p>
				<p class="texte-centre"><input type="text" name="nom" onfocus="if (this.value=='Nom') this.value = ''"  value="Nom"/></p>
				<p class="texte-centre"><input type="text" name="prenom" onfocus="if (this.value=='Prenom') this.value = ''"  value="Prenom"/></p>
				<p><input type="checkbox" name="souvenir_moi" value="true"/>Se souvenir de moi</p>
				<p class="texte-centre"><input type="submit" name="valider" value="Se connecter"/></p>
			</form>
		</div>
		<?php
			}
		?>
	</body>
</html>