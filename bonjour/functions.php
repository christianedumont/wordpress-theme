<?php

// Ajout de la balise title à partir du contenu
add_theme_support( 'title-tag' );

// Filtrer le nombre de mots qui seront affichés dans le résumé d'un contenu
function bonjour_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'bonjour_custom_excerpt_length', 999 );

// Supprimer la balise meta generator
function wp_remove_version() {
	return '';
}
add_filter('the_generator', 'wp_remove_version');

// Supprimer toutes les indications de version des liens css et js
function bonjour_remove_wp_version ( $src ) {
	if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
    return $src;
}
add_filter( 'style_loader_src', 'bonjour_remove_wp_version', 9999 );
add_filter( 'script_loader_src', 'bonjour_remove_wp_version', 9999 );

// Charger les feuilles de style et les scripts JS
function bonjour_register_assets() {
	// Ajouter Font Awesome 6
	wp_enqueue_style( 'font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' );
	// Ajouter la typo Google Poppins
	wp_enqueue_style( 'Poppins', 'https://fonts.googleapis.com/css?family=Poppins' );
	// Ajouter la typo Google Oswald
	wp_enqueue_style( 'Oswald', 'https://fonts.googleapis.com/css?family=Oswald' );
	// Bootstrap
	wp_enqueue_style('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
	// Ajouter la feuille de style du thème
	wp_enqueue_style('perso', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'bonjour_register_assets' );

// Ajouter la possibilité de charger un logo
add_theme_support( 'custom-logo' );