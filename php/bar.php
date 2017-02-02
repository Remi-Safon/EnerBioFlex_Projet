<?php

function bar ($active){
	
	$MENU = array( 'ACCUEIL'=>'index.php',
		'OFFRES'=>'offres.php',
		'DEMANDES'=>'',
		'DEPOSER ANNONCE'=>'',
		'GERER ANNONCES'=>'',
		'GERER ALERTES'=>''
		);
		
	$COMPTE_MENU = array( 'S\'INSCRIRE'=>'inscription.php',
		'SE CONNECTER'=>'connexion.php'
		);
		
		
		
		
		
		
		
		
		
		
		echo'<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><img src="media/logo.png"> </a>
			</div>
			<ul class="nav navbar-nav">';
				
				Foreach( $MENU as $partie=>$fichier ){
					echo '<li ';
					if ( $partie == $active ) echo 'class="active"';
					echo '><a href="'.$fichier.'">'.$partie.'</a></li>';
				}
			
			echo '</ul>
			<ul class="nav navbar-nav navbar-right">';
				
				Foreach( $COMPTE_MENU as $partie=>$fichier ){
					echo '<li ';
					if ( $partie == $active ) echo 'class="active"';
					echo '><a href="'.$fichier.'"><span class="glyphicon glyphicon-user"></span> '.$partie.'</a></li>';
				}
				
			echo'</ul>
		</div>
	</nav>';
	
}


?>