<?php
	// Affichage détail article si redirection via annonce
	if(isset($_GET['id_article'])){
	
	include('php/head.php');
	$icon = 'img/logo.png';
	$style = 'css/details.css';
	$today = date("m.d.y");
	head_html( 'Détails article : '.$_GET['id_article'],$icon, $style );
	
	include('php/detailArticle.php');

	echo "<body>
			<div id='presentation'>
			<h2 class='titre_annonce'> Titre de l'annonce</h2>
			<img src='".$photo."' title='1'height=456 width=420 /></br>
			<form method='' action='#'>
				<input type='submit' value='CONTACTER'></input>
			</form>
			
				<hr >";	

				echo "<p>Mise en ligne le ".$today.'</p>';
				echo "<p>par <a class ='user'href='#'>TOTO</a></p><hr >";
				echo "<h3>Prix : ".$prix." € </h3><hr>";
				echo "<h3>Ville:
						<iframe src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.261385460903!2d2.000164415516889!3d49.42287216874856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e7037895c05729%3A0x1fd975936af3e612!2s9+Rue+de+la+Prairie%2C+60650+Saint-Paul!5e0!3m2!1sfr!2sfr!4v1484676261914 width=600 height=450 frameborder=0 style=border:0 allowfullscreen></iframe></h3><hr>";
				echo "	<h3>Description:</h3>
						<p class='description'>
						Ex his quidam aeternitati se commendari posse per statuas aestimantes eas ardenter adfectant quasi plus praemii de figmentis aereis sensu carentibus adepturi, quam ex conscientia honeste recteque factorum, easque auro curant inbracteari, quod Acilio Glabrioni delatum est primo, cum consiliis armisque regem superasset Antiochum. quam autem sit pulchrum exigua haec spernentem et minima ad ascensus verae gloriae tendere longos et arduos, ut memorat vates Ascraeus, Censorius Cato monstravit. qui interrogatus quam ob rem inter multos... statuam non haberet malo inquit ambigere bonos quam ob rem id non meruerim, quam quod est gravius cur inpetraverim mussitare.
						Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis, amicitias esse expetendas; itaque, ut quisque minimum firmitatis haberet minimumque virium, ita amicitias appetere maxime; ex eo fieri ut mulierculae magis amicitiarum praesidia quaerant quam viri et inopes quam opulenti et calamitosi quam ii qui putentur beati.
						Vita est illis semper in fuga uxoresque mercenariae conductae ad tempus ex pacto atque, ut sit species matrimonii, dotis nomine futura coniunx hastam et tabernaculum offert marito, post statum diem si id elegerit discessura, et incredibile est quo ardore apud eos in venerem uterque solvitur sexus.
			</div>
		</body>";}



	else{

	//Affichage Error si page appelé sans parametre	
	echo "Error.";

	}
?>

	