<?php

	// On se connecte à MySQL
	
	
	
	// Récupération détails article
	try{
			// En cas d'erreur, on affiche un message et on arrête tout
			$requete = $bdd->query("SELECT id_article, titre, date_publication, prix, voie, description, photo, region, departement, ville 
									FROM article 
									JOIN region USING(id_region) 
									JOIN departement USING(id_departement)
									JOIN ville USING(id_ville) 
									JOIN ressource USING(id_ressource) 								
									WHERE id_article =".$_GET['id_article']);

		while ($articles = $requete->fetch()) {
			if ($articles['id_article'] == $_GET['id_article']) {
				$user = $bdd->query('select * from utilisateur join article using(id_utilisateur) where id_article='.$_GET['id_article']);
				$user = $user->fetch();
				echo "<body id='details_annonces'>
				<div id='box'>
					<form method='' action='x'>
						
						
						<img src='".$articles['photo']."' title='1' width=420 />";
				echo "	
						<p id='description'>
							<strong style='font-size:160%;'>Description : </strong></br><br>
							Ex his quidam aeternitati se commendari posse per statuas aestimantes eas ardenter adfectant quasi plus praemii de figmentis aereis sensu carentibus adepturi, quam ex conscientia honeste recteque factorum, easque auro curant inbracteari, quod Acilio Glabrioni delatum est primo, cum consiliis armisque regem superasset Antiochum. quam autem sit pulchrum exigua haec spernentem et minima ad ascensus verae gloriae tendere longos et arduos, ut memorat vates Ascraeus, Censorius Cato monstravit. qui interrogatus quam ob rem inter multos... statuam non haberet malo inquit ambigere bonos quam ob rem id non meruerim, quam quod est gravius cur inpetraverim mussitare.
							Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis, amicitias esse expetendas; itaque, ut quisque minimum firmitatis haberet minimumque virium, ita amicitias appetere maxime; ex eo fieri ut mulierculae magis amicitiarum praesidia quaerant quam viri et inopes quam opulenti et calamitosi quam ii qui putentur beati.
							Vita est illis semper in fuga uxoresque mercenariae conductae ad tempus ex pacto atque, ut sit species matrimonii, dotis nomine futura coniunx hastam et tabernaculum offert marito, post statum diem si id elegerit discessura, et incredibile est quo ardore apud eos in venerem uterque solvitur sexus.
							</p></br></br>
							<h2 id='titre_annonce'>".ucfirst($articles['titre'])."</h2></br></br></br>
							<input type='submit' value='CONTACTER' name ='contacter'></input><br><br>	
							
							<button class=button_details type=button data-hover='".$user['numeros_telephone']."'data-active=I'M ACTIVE><span>VOIR NUMERO</span></button><br><br>";
				  echo "<p>Mise en ligne le ".str_replace('-', '.', $articles['date_publication']).'</p>';
				  echo "<p>par <a class ='user'href='#'>".$user['nom']."</a></p><hr >";
				  echo "<h3><strong>Prix : </strong>".$articles['prix']." € </h3><hr>";
				  echo "<h3></strong>Ville : </strong>".$articles['ville'].", ".$articles['departement']."</strong></h3>		
				  </form>
				</div>
				</body>";
			}
		}

	} catch (PDOException $e){

		die('<p>Erreur requête : '.$e->getMessage()."</p>");
	}


?>