<?php
/**
 * The template for displaying the header
 * @package WordPress
 * @subpackage Bonjour
 * @since Bonjour 1.0
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head() ?>
</head>
<body class="custom-background">
<header class="text-center">
<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
if ( has_custom_logo() ) { ?>
<!-- Affichage du logo avec un lien avec l'URL du blog -->
<a href="<?php bloginfo('url'); ?>"><img src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>"></a>
<?php } else { ?>
<!-- Affichage d'un lien avec l'URL du blog sur le titre du blog -->
<h2><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h2>
<?php } ?>
<!-- Affichage de la navigation principale -->
<nav><?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?></nav>
</header>