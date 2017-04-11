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
<div id='box'>
	<div class="row workDetails">
	        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
	          <div class="workYear">Cooronnées</div>
	        </div>
	 </div>
	 <div class="my-data">
      <div class="key">Civilité : </div>
          <div class="value" id="my-data-element_0">Aucune valeur n'a été renseignée</div>
                <div class="clear"></div>
        <div class="key">Nom : </div>
          <div class="value" id="my-data-element_1">Nouss976</div>
                <div class="clear"></div>
        <div class="key">Prénom : </div>
          <div class="value" id="my-data-element_2"></div>
                <div class="clear"></div>
        <div class="key">Pseudonyme : </div>
          <div class="value" id="my-data-element_3">Nouss976</div>
                <div class="clear"></div>
        <div class="key">Catégorie Socioprofessionnelle : </div>
          <div class="value" id="my-data-element_4">Aucune catégorie n'a été renseignée</div>
                <div class="clear"></div>
        <div class="key">Centres d'intérêt : </div>
          <div class="value" id="my-data-element_5">Aucun centre d'intérêt n'a été renseigné</div>
                <div class="clear"></div>
        <div class="key">Région : </div>
          <div class="value" id="my-data-element_6">Ile-de-France</div>
                <div class="clear"></div>
        <div class="key">Département : </div>
          <div class="value" id="my-data-element_7">Val-d'Oise</div>
                <div class="clear"></div>
        <div class="key">Adresse : </div>
              <div class="value_bis" id="my-data-element_8"></div>
            <div class="clear"></div>
        <div class="key">Code Postal : </div>
          <div class="value" id="my-data-element_9">95360</div>
                <div class="clear"></div>
        <div class="key">Ville : </div>
          <div class="value" id="my-data-element_10">Montmagny</div>
                <div class="clear"></div>
        <div class="key">Téléphone : </div>
          <div class="value" id="my-data-element_11">0651535804</div>
                <div class="clear"></div>
        <div class="key">Date de naissance : </div>
                <div class="value" id="my-data-element_12">Aucune date de naissance n'a été renseignée</div>
        <div class="clear"></div>
  </div>

<<<<<<< HEAD
  <div class="row workDetails">
	        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
	          <div class="workYear">E-mail</div>
	        </div>
	 </div>
<div class="row workDetails">
	        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
	          <div class="workYear">Mot de passex</div>
	        </div>
	 </div>
</div>

<style type="text/css">.workDetails .rightArea{
	border-left: solid 1px #eaeaea;
	padding-bottom:47px;
}
.workDetails:last-child .rightArea{
	padding-bottom:0px;
}
.workYear{
	font-size:17px;
	color:#fff;
	background-color : #96b24c;
	text-align:center;
	width:120px;
	height:120px;
	padding:40px 0 40px 0;
	
	-webkit-border-radius: 50%;
    border-radius: 50%;
}


}</style>
=======
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

?>
>>>>>>> 1d7889e7a595502493bcc1593b09d5f029dbc6a2
