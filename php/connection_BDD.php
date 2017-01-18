<?php 

function connect_database($domain, $dbname, $charset, $root, $password){

	// CONNECTION BDD
	
	try{
		$bdd = new PDO('mysql:host='.$domain.';dbname='.$dbname.';charset='.$charset,$root, $password);
		return $bdd;
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());		
	}
}
?>	