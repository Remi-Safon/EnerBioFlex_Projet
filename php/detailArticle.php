<?php

	// On se connecte à MySQL
	include('connection_BDD.php');
	
	
	// Récupération de la photo de l'article
	try{
			// En cas d'erreur, on affiche un message et on arrête tout
		$requete = $bdd->query('select photo from article where id_article ='.$_GET['id_article']);
		$articles = $requete->fetch();
		$photo = $articles['photo'];
	} catch (PDOException $e){

		die('<p>Erreur requête : '.$e->getMessage()."</p>");
	}


	// Récupération du prix de l'article

	try{
		// En cas d'erreur, on affiche un message et on arrête tout
		$requete = $bdd->query('select prix from article where id_article ='.$_GET['id_article']);
		$articles = $requete->fetch();
		$prix = $articles['prix'];
	} catch (PDOException $e){

		die('<p>Erreur requête : '.$e->getMessage()."</p>");
	}


?>