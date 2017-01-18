

<?php 
	include 'connection_BDD.php';
	
	$bdd = connect_database('localhost', 'bdd_enerbioflex', 'utf-8', 'root', '');

	// PREPARATION DE LA REQUETE
	$req=$bdd->prepare('SELECT ressource FROM ressource WHERE 1');
			
	// EXECUTION DE LA REQUETE
	$req->execute();
	
	// PREPARATION DE LA REQUETE
	$req2=$bdd->prepare('SELECT region FROM region WHERE 1');
			
	// EXECUTION DE LA REQUETE
	$req2->execute();
	
?>

<form action="ajouter.php" method="get">
		

	<p><input type="text" name="nom" value="Recherche"/></p>
	<SELECT name="type_ressource"  size="1">
<?php	
	while($resultat_ressource=$req->fetch()){
		echo '<OPTION>'.$resultat_ressource['ressource']; 
	}
?>
	</SELECT>
	<SELECT name="Département" size="1">
<?php	
	while($resultat_region=$req2->fetch()){
		echo '<OPTION>'.$resultat_region['region']; 
	}
?>
	</SELECT>

	
	<p>  <input type="submit" name="Ajouter" value="Rechercher"/></p>
</form>



