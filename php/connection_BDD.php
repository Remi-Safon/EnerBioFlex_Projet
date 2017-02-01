<?php

	// CONNECTION BDD
	
	$sgbd_type = 'mysql';
	$domain = 'localhost';
	$dbname = 'bdd_enerbioflex';
	$charset = 'utf8';
	$root = 'root';
	$password = '';

	try{
		$bdd = new PDO($sgbd_type.':host='.$domain.';dbname='.$dbname.';charset='.$charset,$root, $password);
		$bdd->query('SET NAMES utf8');
		$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e){
		die('<p>Erreur connection BDD: '.$e->getMessage().'</p>');
	}
	
?>