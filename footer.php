<?php
/**
 * The template for displaying the footer
 * @package WordPress
 * @subpackage Bonjour
 * @since Bonjour 1.0
 */
?>
<footer id="footer" class="text-center">
	<!-- Affichage de la navigation -->
	<div class="container"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?></div>
	<p id="licence" class="container">&copy; <?= date('Y-m') ?> - Exercice pédagogique fourni par <a href="https://www.consultantweb.eu/" target="_blank">Christiane Dumont</a></p>
</footer>
<!-- La fonction wp_footer doit être appelée ici pour afficher la toolbar de Wordpress au-dessus -->
<?php wp_footer(); ?>
</body>
</html>