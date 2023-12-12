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
    <title>Bonjour - Mon 1er thème Wordpress</title>
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<!-- CSS Perso -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>
	<header class="text-center">
		<!-- Affichage d'un lien avec l'URL du blog sur le titre du blog -->
		<h2><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h2>
	</header>