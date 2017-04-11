<?php 
	require 'functions.inc.php';
	require "connection_BDD.php";
	require 'webservices.php';
	
	head_html( 'Deposer une annonce', "../img/logo.png", array( "../css/base.css", 
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
			
			//Barre
			bar('DEPOSER ANNONCE');
			
			if ( isset($_SESSION['id_utilisateur'])){
				if (isset($_POST['titre']) && $_POST['titre']!='' &&
					isset($_POST['prix']) && $_POST['prix']!='' &&
					isset($_POST['type']) && $_POST['type']!='' &&
					isset($_POST['ressource']) && $_POST['ressource']!='' && $_POST['ressource'] != 'Catégorie d\'énergie' &&
					isset($_POST['description']) && $_POST['description']!='' &&
					isset($_POST['ville']) && $_POST['ville']!='' &&
					isset($_POST['departement']) && $_POST['departement']!='' && $_POST['departement']!='Département' &&
					isset($_POST['region']) && $_POST['region']!='' && $_POST['region']!='Région' &&
					isset($_POST['voie']) && $_POST['voie']!=''){
						if (!isset($_FILES["photo"]["name"]) || $_FILES["photo"]["name"] == ''){
							
							$_POST['photo'] = '';
						}
						else{
						//###################### UPLOAD IMAGE
						//######################

						$target_dir = "../uploads/img/articles/";
						$target_file = $target_dir . basename($_FILES["photo"]["name"]); //$target_file = $target_dir . basename($_FILES["photo"]["name"]); 
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if image file is a actual image or fake image
						if(isset($_POST["valider"])) {
							$check = getimagesize($_FILES["photo"]["tmp_name"]);
							if($check !== false) {
								echo "File is an image - " . $check["mime"] . ".";
								$uploadOk = 1;
							} else {
								echo "File is not an image.";
								$uploadOk = 0;
							}
						}
						// Check if file already exists
						if (file_exists($target_file)) {
							echo "Sorry, file already exists.";
							$uploadOk = 0;
						}
						// Check file size
						if ($_FILES["photo"]["size"] > 500000) {
							echo "Sorry, your file is too large.";
							$uploadOk = 0;
						}
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
							echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							$uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
								echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
							$_POST['photo']=$target_file;
						}




						//###################### FIN UPLOAD IMAGE						
							
						}
					insert_article($bdd, $_SESSION['id_utilisateur'], $_POST['type'], $_POST['ressource'], $_POST['titre'], $_POST['region'], $_POST['departement'], $_POST['ville'], $_POST['voie'], $_POST['prix'], $_POST['description'], $_POST['photo']);
					
					echo'<div id="box">';
						echo'<p class="texte-centre" style="color:green;">Votre annonce à été créée</p>';
						echo'<p class="texte-centre"><a href="annonces.php">Retour au annonces.</a></p>';
					echo'</div>	';
					
					}
					else{
						echo'<div id="box">';
							echo'<p class="texte-centre" style="color:red;">Toutes les donn&eacutees d\'insertion d\'annonce n\'ont pas &eacutet&eacute saisies.</p>';
							echo'<p class="texte-centre"><a href="deposer_annonce.php">Retour au formulaire.</a></p>';
						echo'</div>	';
					}
				
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