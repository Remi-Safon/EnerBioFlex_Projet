<?php
	include('functions.inc.php');
	
	// Entete
		head_html( 'Mon rofil', "../img/logo.png", array( "../css/details.css",
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
?>



<?php
	// Affichage mon utilisateur
	if(isset($_SESSION['id_utilisateur'])){

		// Connexion BDD
		include('connection_BDD.php');
		
		
		$req='SELECT
				nom,
				prenom,
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
		
	
		echo'</br>';
		echo'</br>';
		echo'<div id="box">';							
			echo "<h2><strong>Nom : </strong>".$resultat_utilisateur['nom']."</h2><hr>";
			echo "<h2><strong>Prénom : </strong>".$resultat_utilisateur['prenom']."</h2><hr>";
			echo "<h3><strong>Adresse e-mail : </strong>".$resultat_utilisateur['email']."</h3><hr>";
			echo "<h3><strong>Date de naissance : </strong>".$resultat_utilisateur['date_de_naissance']."</h3><hr>";
			echo "<h3><strong>Téléphone : </strong>".$resultat_utilisateur['numeros_telephone']."</h3><hr>";
			echo "<h3><strong>Compte : </strong>".$resultat_utilisateur['type']."</h3><hr>";
			echo "<h3><strong>Profession : </strong>".$resultat_utilisateur['profession']."</h3><hr>";
			echo "<h3><strong>Adresse : </strong>".$resultat_utilisateur['voie'].', '.$resultat_utilisateur['ville'].', '.$resultat_utilisateur['departement'].', '.$resultat_utilisateur['region']."</h3><hr>";
			echo '<form action="mofier_profil.php" method="post">';
				echo '<p class="texte-centre"><input type="submit" name="valider" value="Modifier profil >>"/></p>';
			echo '</form>';
		echo'</div>	';
		echo'</br>';
		echo'</br>';
		
	
	
	
	
	}

	else{
		header("Location: ../index.php"); // Redirection vers acceuil
	}



	include('/../footer.php');
?>
</html>


