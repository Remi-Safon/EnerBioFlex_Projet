<?php


	// Récupération détails article
	try{
			// En cas d'erreur, on affiche un message et on arrête tout
			$requete = $bdd->query("SELECT * 
									FROM article  								
									WHERE id_article =".$_GET['id_article']);

		while ($articles = $requete->fetch()) {
			if ($articles['id_article'] == $_GET['id_article']) {
				$user = $bdd->query('select * from utilisateur join article using(id_utilisateur) where id_article='.$_GET['id_article']);
				$user = $user->fetch();
				echo "<body id='details_annonces'>
				<div id='box'>
					<form method='POST' action='contact.php'>
						
						
						<img src='".$articles['photo']."' title='1' width=420 />";
				echo "	
						<p id='description'>
							<strong style='font-size:160%;'>Description : </strong></br><br>".
							$articles['description']
							."</p></br></br>
							<h2 id='titre_annonce'>".ucfirst($articles['titre'])."</h2></br></br></br>
							<input type='submit' value ='CONTACTER' name ='contacter'></input><br><br>	
							
							<button class=button_details type=button data-hover='".$user['numeros_telephone']."'data-active=I'M ACTIVE><span>VOIR NUMERO</span></button><br><br>";
				  echo "<p>Mise en ligne le ".str_replace('-', '.', $articles['date_publication']).'</p>';
				  echo "<p>par <a class ='user'href='#'>".$user['nom']."</a></p><hr >";
				  echo "<h3><strong>Prix : </strong>".$articles['prix']." € </h3><hr>";
				  echo "<h3><strong>Ville : </strong>".$articles['ville'].", ".$articles['departement']."</strong></h3>		
				  </form>
				</div><br><br>
				</body>";

			}
		}

	} catch (PDOException $e){

		die('<p>Erreur requête : '.$e->getMessage()."</p>");
	}

?>