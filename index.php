<!-- Affichage de l'entête -->
<?php get_header(); ?>
<!-- Affichage du main -->
<main class="container">
	<div class="row">
		<section class="main-content col-md-8 col-lg-9">
			<?php get_template_part( 'template-parts/content' ); ?>
		</section>
		<?php get_sidebar() ?>
	</div>
</main>
<!-- Affichage du footer -->
<?php get_footer(); ?>