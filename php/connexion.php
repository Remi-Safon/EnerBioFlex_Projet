<?php 
	require 'functions.inc.php';
	
	
	head_html( 'Connexion', "../img/logo.png", array( "../css/base.css", 
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

			// Barre
			bar('SE CONNECTER');
			
		
			// CONNECTION BDD
			include 'connection_BDD.php';
			
			if (! isset($_SESSION['id_utilisateur'])){
		?>
		
		<h1> Connexion </h1>
		
		<div id="box">
			<form action="connexion_authen.php" method="post">
				<p>E-mail
				<input type="text" name="email" placeholder="E-Mail"/></p>
				
				<p>Mot de passe
				<input type="password" name="mot_de_passe" placeholder="Mot de passe"/></p>
				
				<p><input type="checkbox" name="souvenir_moi" value="true"/>Se souvenir de moi</p>
				
				<p class="texte-centre"><input type="submit" name="valider" value="Se connecter"/></p>
				<p class="texte-centre">Pas encore inscrit(e)? <a href="inscription.php">S'inscrire</a></p>
				<p class="texte-centre"><a href="mdp_oublie.php">Mot de passe oublié?</a></p>
			</form>
		</div>
		
		<?php
		
			} // Fin formulaire
			else{
				echo'<div id="box">';
					echo'<p class="texte-centre" style="color:green;">Vous êtes connecté M(me) '.$_SESSION['nom'].' '.$_SESSION['prenom'].'</p>';
				echo'</div>	';
			}
		?>

	</body>
</html>

<?php
	//session_destroy();
?>
		
