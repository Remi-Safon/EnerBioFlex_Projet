/*
Plugin Name: France regions map
Plugin URI: http://blog.comersis.com/articles/SVG-Raphael-map/
Description: France departements map.
Version: fr-reg-1.0215
Author: S.Marmion ©2015
Author URI: http://www.cmap.comersis.com
License: non-comercial
*/
		var mapfill = "#BCDF60";		// Couleur de remplissage des régions
		var maphover_fill = "#469A38";	// Couleur de survol au passage de la souris
		var mapstroke = "#4D4D4D";		// Couleur des lignes de séparation des régions
		var mapstroke_width = 1.2;		// Epaisseur des lignes de séparation des régions (en points)
		var mapWidth=600;				// Largeur de la carte en pixels
		var mapHeight=600;				// Hauteur de la carte en pixels (facultatif)
		

/*
Modifiez ci-dessous les 2 variables pour chaque région :
	
	title:	" Texte associé à la région ";
	
	url:	" Lien vers la page ou le site souhaité ";

*/		
var paths = {
Z1: {
title: "Alsace-Champagne-Ardenne-Lorraine",
url: "#Alsace-Champagne-Ardenne-Lorraine"
},
Z2: {
title: "Aquitaine-Limousin-Poitou-Charentes",
url: "#Aquitaine-Limousin-Poitou-Charentes"
},
Z3: {
title: "Auvergne-Rhône-Alpes",
url: "#Auvergne-Rhone-Alpes"
},
Z4: {
title: "Bourgogne-Franche-Comté",
url: "#Bourgogne-Franche-Comte"
},
Z5: {
title: "Bretagne",
url: "#Bretagne"
},
Z6: {
title: "Centre",
url: "#Centre"
},
Z7: {
title: "Corse",
url: "#Corse"
},
Z8: {
title: "Languedoc-Roussillon-Midi-Pyrénées",
url: "#Languedoc-Roussillon-Midi-Pyrenees"
},
Z9: {
title: "Ile-de-France",
url: "#Ile-de-France"
},
Z10: {
title: "Nord-Pas-de-Calais-Picardie",
url: "#Nord-Pas-de-Calais-Picardie"
},
Z11: {
title: "Normandie",
url: "#Normandie"
},
Z12: {
title: "Pays-de-la-Loire",
url: "#Pays-de-la-Loire"
},
Z13: {
title: "Provence-Alpes-Côte-d-Azur",
url: "#Provence-Alpes-Cote-d-Azur"
}
}