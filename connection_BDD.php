<?php 

// CONNECTION BDD
	try{
		$bdd=new PDO('mysql:host=localhost;dbname=db_enerbioflex;charset=utf8','root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());		
	}
?>	