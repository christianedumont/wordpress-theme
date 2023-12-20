<?php

// Ajout de la balise title à partir du contenu
add_theme_support( 'title-tag' );

// Filtrer le nombre de mots qui seront affichés dans le résumé d'un contenu
function bonjour_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'bonjour_custom_excerpt_length', 999 );

// Ajouter un hyperlien pour lire la suite d'un article
function bonjour_read_more_link($output) {
	$link = __('Read more&hellip;', 'bonjour');
	return $output . '<a class="btn btn-outline-primary" href="'. get_permalink($post->ID) . '"> ' . $link . '</a>';
}
add_filter('the_excerpt', 'bonjour_read_more_link');

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

// Ajouter la possibilité de modifier le fond du site (couleur et image)
$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => 'repeat',
	'default-position-x'     => 'left',
	'default-position-y'     => 'top',
	'default-size'           => 'auto',
	'default-attachment'     => 'scroll',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );

/**
 * Add multiple widgets areas
*/
function bonjour_widget_registration($name, $id, $description,$beforeWidget, $afterWidget, $beforeTitle, $afterTitle){
	register_sidebar( array(
		'name' => $name,
		'id' => $id,
		'description' => $description,
		'before_widget' => $beforeWidget,
		'after_widget' => $afterWidget,
		'before_title' => $beforeTitle,
		'after_title' => $afterTitle,
	));
}

function bonjour_widget_init() {
	// Définir les balises HTML à ajouter autour du titre du widget
	$beforeTitle = '<h2 class="widgettitle">';
	$afterTitle = '</h2>';
	// Définir les balises HTML à ajouter autour du contenu du widget
	$before_widget = '<div id="%1$s" class="widget %2$s">';
	$after_widget = '</div>';
	bonjour_widget_registration('Sidebar column', 'sidebar-1', 'Widgets in this area will appear on pages with sidebar', $before_widget, $after_widget, $beforeTitle, $afterTitle);
	bonjour_widget_registration('Footer widget 1', 'footer-widget-1', 'Widgets in this area will appear on 1st footer column', $before_widget, $after_widget, $beforeTitle, $afterTitle);
	bonjour_widget_registration('Footer widget 2', 'footer-widget-2', 'Widgets in this area will appear on 2nd footer column', $before_widget, $after_widget, $beforeTitle, $afterTitle);
	bonjour_widget_registration('Footer widget 3', 'footer-widget-3', 'Widgets in this area will appear on 3rd footer column', $before_widget, $after_widget, $beforeTitle, $afterTitle);
}

add_action('widgets_init', 'bonjour_widget_init');		

/* Register navigation */
function bonjour_register_nav() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'footer-menu' => __( 'Footer Menu' )
		)
	);
}
add_action( 'init', 'bonjour_register_nav' );