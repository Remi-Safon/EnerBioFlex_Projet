<?php 
	require 'php/functions.inc.php';
	require "php/connection_BDD.php";
	
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
				if (isset())
				
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