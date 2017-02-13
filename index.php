<?php 
	require 'php/head.php';
	require 'php/bar.php';
	
	head_html( 'Accueil', "img/logo.png", array( "css/base.css",
	"media/FR_regnew_js/cmap/style.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css",
	"vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"
	) 
	);
?>

<body>

	
	
	<?php
	bar('ACCUEIL');
	?>

    <div class="container" >
        <main ng-view>

        </main>
    </div>

    <script src="vendor/jQuery/jquery-3.1.1.min.js"></script>
    <script src="vendor/angular-1.5.3/angular.min.js"></script>
    <script src="vendor/angular-1.5.3/angular-route.min.js"></script>
    <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="js/mainCtrl.js"></script>
    <script src="js/serviceCtrl.js"></script>
    <script src="js/app.js"></script>
    <script src="js/route.js"></script>
	
    </body>
</html>