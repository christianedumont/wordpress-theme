<?php
// Y a t'il des contenus à afficher ?
if ( have_posts() ) {
	// Boucle sur les contenus
	while ( have_posts() ) {
		the_post(); ?>
		<article id="post-<?php the_ID() ?>">
			<!-- Titre de l'article -->
			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<!-- Résumé de l'article -->
			<?php the_excerpt(); ?>
			<footer class="postmetadata">
				<p>Publié le <?php the_time('l d M Y'); ?>  par <?php the_author() ?> dans la catégorie <?php the_category(', '); ?></p>
			</footer>
		</article>
	<?php }
}
else { ?>
	<h2>Aucun contenu</h2>
	<p>Désolé, mais aucun contenu n'a été trouvé ou publié.</p>
<?php } ?>
