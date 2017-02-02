<?php

	function head_html( $title, $icon, $css_files ){
		echo '<!DOCTYPE html>';
		echo '<html lang="fr" ng-app="bflex">';
			echo '<head>';
				echo '<title>'.$title.'</title>';
				echo '<link rel="shortcut icon" href="'.$icon.'">';
				
				$i = 0;
				if ( isset( $css_files )){
					if ( is_array($css_files) ){
						foreach ( $css_files as $css_file ){
							echo '<link rel="stylesheet" href="'.$css_file.'"/>';
						}
					}
					else{
						echo '<link rel="stylesheet" type="text/css" href="'.$css_files.'"/>';
					}
				}
				echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
				//echo '<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
			echo '</head>';
	}

?>