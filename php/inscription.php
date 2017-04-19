<?php 
	require 'functions.inc.php';
	
	head_html( 'Inscription', "../img/logo.png", array( "../css/base.css", 
	"../css/contenu-box.css" , 
	"../media/FR_regnew_js/cmap/style.css",
	"../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
	"../vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css",
	"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css",
	"/resources/demos/style.css"
	) ,''
	);
?>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#format" ).on( "change", function() {
      $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
    });
  } );
  </script>
</head>

 
	<body>
		
		<?php
			session_start();
		
			//Barre
			bar('S\'INSCRIRE');

		?>
	
		<h1>Inscription</h1>
		<div id="box">
			<form action="register.php" method="post">
				<p> E-mail *
				<input type="email" name="email" placeholder="E-Mail" required="required"/></p>
				
				<p>Mot de passe *
				<input type="password" name="mot_de_passe" placeholder="Mot de passe" required="required"/></p>
				
				<p>Confirmer le mot de passe *
				<input type="password" name="mot_de_passe_confirme" placeholder="Confirmation du mot de passe" required="required"/></p>
				
				<p>Nom *
				<input type="text" name="nom" placeholder="Nom" required="required"/></p>
				
				<p>Prénom *
				<input type="text" name="prenom" placeholder="Prenom" required="required"/></p>
				
				<p>Date de naissance
				<input type="date" name ='date_de_naissance' id="datepicker" size="30">
				</p>
				
				<p>Adresse *
				<input type="text" name="voie" placeholder="Voie" required="required"/></p>
				
				<input type="text" style="width:60%; display:inline;"name="ville" placeholder="Ville" required="required"/>
				<input type="text" style="width:30%; display: inline;" name="code_postal" placeholder="Code Postal" required="required"pattern="[0-9]{5}" maxlength="5"/>
				</p>
				
				<p>Numéro de téléphone
				<input type="tel" name="numero_telephone" placeholder="Téléphone" required="required" maxlength="10" pattern="[0-9]{10}"/></p>
				
				<p>Vous êtes? *
				<SELECT name="type" size="1" required="required">
				<OPTION>Professionnel
				<OPTION>Particulier
				</SELECT></p>
				
				<p>Profession
				<input type="text" name="profession" placeholder="Profession" /></p>
				
				<p>Photo de profil
				<input style="margin-left: 10px;" type="file" name="profil_pic" id="profil_pic" size="chars"></p>
				
				<p><input type="checkbox" name="souvenir_moi" value="true"/><a href="CGU.php">J'accepte les Conditions Générales d'Utilisation</a></p>
				
				<p class="texte-centre"><input type="submit" name="valider" value="S'inscrire"/></p>
			</form>
		</div>
	</body>
</html>