<?php
	include('functions.inc.php');
	
	// Entete
		head_html( 'Profil', "../img/logo.png", array( "../css/details.css",
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