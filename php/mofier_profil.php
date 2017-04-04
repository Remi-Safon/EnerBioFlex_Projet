<?php
	include('functions.inc.php');
	
	// Entete
		head_html( 'Mon profil', "../img/logo.png", array( "../css/details.css",
		"../css/base.css",
		"../css/contenu-box.css" ,
		"../media/FR_regnew_js/cmap/style.css",
		"../vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
		"../vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css",
		"../css/button_details.css",
		"../css/footer.css"
		),'');

		session_start();
		
			//Barre
			bar('PROFIL');

	// Affichage mon utilisateur
	if(isset($_SESSION['id_utilisateur'])){

		// Connexion BDD
		include('connection_BDD.php');
		
		$req='SELECT
				nom,
				prenom,
				mot_de_passe,
				email,
				date_de_naissance,
				numeros_telephone,
				type,
				profession,
				voie,
				ville,
				departement,
				region
			FROM utilisateur
			WHERE id_utilisateur = :id';
			
		$stmt=$bdd->prepare($req);
		$stmt->bindvalue(':id',$_SESSION['id_utilisateur']);
		$stmt->execute();
		$resultat_utilisateur=$stmt->fetch(PDO::FETCH_ASSOC);
		
		$nom=$resultat_utilisateur['nom'];
		$prenom=$resultat_utilisateur['prenom'];
		$date_naissance=$resultat_utilisateur['date_de_naissance'];
		$mot_de_passe=$resultat_utilisateur['mot_de_passe'];
		$adressemail=$resultat_utilisateur['email'];
		$telephone=$resultat_utilisateur['numeros_telephone'];
		$type=$resultat_utilisateur['type'];
		$profession=$resultat_utilisateur['profession'];
		$voie=$resultat_utilisateur['voie'];
		$ville=$resultat_utilisateur['ville'];
		$departement=$resultat_utilisateur['departement'];
		$region=$resultat_utilisateur['region'];
		
		
		
		
?>
		
				<h1>Modifier mon profil</h1>
		<div id="box">
			<form action="register-edit.php" method="post">
				<p>E-mail *
				<input type="email" name="email" placeholder="E-Mail" required="required" value="<?php echo $adressemail; ?>" /></p>
				
				<p>Mot de passe *
				<input type="password" name="mot_de_passe" placeholder="Mot de passe"required="required" value="<?php echo $mot_de_passe; ?>"/></p>
				
				<p>Confirmer le mot de passe *
				<input type="password" name="mot_de_passe_confirme" placeholder="Confirmation du mot de passe" required="required" value="<?php echo $mot_de_passe; ?>"/></p>
				
				<p>Nom *
				<input type="text" name="nom" placeholder="Nom" required="required" value="<?php echo $nom; ?>"/></p>
				
				<p>Prénom *
				<input type="text" name="prenom" placeholder="Prenom" required="required" value="<?php echo $prenom; ?>"/></p>
				
				<p>Date de naissance
				<input type="date" class="date" name="date_de_naissance" value="<?php echo $date_naissance; ?>"/>
				</p>
				
				<p>Adresse *
				<input type="text" name="voie" placeholder="N° Voie" required="required" value="<?php echo $voie; ?>"/></p>
				
				<input type="text" style="width:60%; display:inline;"name="ville" placeholder="Ville" required="required" value="<?php echo $ville; ?>"/>
				</p>
				
				<p>Numéro de téléphone
				<input type="tel" name="numero_telephone" placeholder="Téléphone" required="required" value="<?php echo $telephone; ?>"/></p>
				
				<p>Vous êtes? *
				<SELECT name="type" size="1" required="required" value="<?php echo $type; ?>">
				<OPTION>Professionnel
				<OPTION>Particulier
				</SELECT></p>
				
				<p>Profession
				<input type="text" name="profession" placeholder="Profession" required="required" value="<?php echo $profession; ?>"/></p>
			
	
				<p class="texte-centre"><input type="submit" name="valider" value="Modifier"/></p>
			</form>
		</div>
	
	
<?php	
	
	}

	else{
		header("Location: ../index.php"); // Redirection vers acceuil
	}



	include('footer.php');
?>
</html>

?>