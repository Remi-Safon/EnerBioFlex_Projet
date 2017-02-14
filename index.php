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
				window.location = "./offres.php?region=" + region;
		    }
		});
	});
	</script>'
	);
?>

	<body>

	
	
	<?php
	bar('ACCUEIL');
	?>

	<h1>Carte de selection</h1>
	
    <!--Map-->
	<div id="francemap" style="margin-top: 50px; width: 100%; max-width: 800px; height: 600px; margin-left: auto; margin-right: auto;"></div>	
    
	
    </body>
</html>