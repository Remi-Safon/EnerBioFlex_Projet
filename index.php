<?php 
	require 'php/functions.inc.php';
	
	head_html( 'Accueil', "img/logo.png", array( "css/base.css",
	"media/FR_regnew_js/cmap/style.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"
	) ,
	'<link href="js/france_region_jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="js/france_region_jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="js/france_region_jqvmap/jquery.vmap.france.js" type="text/javascript"></script>
	<script src="js/france_region_jqvmap/jquery.vmap.colorsFrance.js" type="text/javascript"></script>
    
	<script type="text/javascript">
	$(document).ready(function() {
		$("#francemap").vectorMap({
		    map: "france_fr",
			hoverOpacity: 0.5,
			hoverColor: "#469A38",
			backgroundColor: "#ffffff",
			color: "#BCDF60",
			borderColor: "#000000",
			selectedColor: "#4D4D4D",
			enableZoom: true,
			showTooltip: true,
		    onRegionClick: function(element, code, region)
		    {
				window.location = "./php/annonces.php?region=" + region;
		    }
		});
	});
	</script>'
	);
?>

	<body>

	
	
	<nav class="navbar navbar-default" style="margin-bottom: 0">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php"><img src="media/logo.jpeg" style="margin-top:-10px;"> </a>
			</div>
			<ul class="nav navbar-nav"><li class="active"><a href="index.php">ACCUEIL</a></li><li><a href="php/annonces.php">ANNONCES</a></li><li><a href="php/deposer_annonce.php">DEPOSER ANNONCE</a></li><li><a href="php/gerer_annonce.php">GERER ANNONCES</a></li><li><a href="">GERER ALERTES</a></li></ul>
			
			<?php 

			$COMPTE_MENU = array( 'S\'INSCRIRE'=>'php/inscription.php',
			'SE CONNECTER'=>'php/connexion.php'
			);
			$COMPTE = array('PROFIL' => 'php/profil.php',
		'DECONNEXION' => 'php/deconnect.php');

			session_start();
				echo '</ul>
			<ul class="nav navbar-nav navbar-right">';
				if (isset($_SESSION['id_utilisateur'])){
					Foreach( $COMPTE as $partie=>$fichier ){
						echo '<li ';
						if ( $partie == 'ACCUEIL' ) echo 'class="active"';
						echo '><a href="'.$fichier.'"><span class="glyphicon glyphicon-user"></span> ';
						if ($partie == 'PROFIL') echo $_SESSION['nom'].' '.$_SESSION['prenom'];
						else echo $partie;
						echo '</a></li>';
					}
				}
				else{
					Foreach( $COMPTE_MENU as $partie=>$fichier ){
						echo '<li ';
						if ( $partie == 'ACCUEIL' ) echo 'class="active"';
						echo '><a href="'.$fichier.'"><span class="glyphicon glyphicon-user"></span> '.$partie.'</a></li>';
					}
				}
				
			echo'</ul>
		</div>
	</nav>';
	?>

	<h1>Carte de selection</h1>
	
    <!--Map-->
	<div id="francemap" style="margin-top: 50px; width: 100%; max-width: 800px; height: 600px; margin-left: auto; margin-right: auto;"></div>	
    
	
    </body>
</html>