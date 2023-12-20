<?php
// Y a t'il des contenus à afficher ?
if ( have_posts() ) {
	// Boucle sur les contenus
	while ( have_posts() ) {
		the_post(); ?>
		<article id="post-<?php the_ID() ?>">
			<!-- Titre de l'article -->
			<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			<!-- Résumé de l'article -->
			<?php the_excerpt() ?>
			<footer class="postmetadata">
				<p><?php _e('Published at', 'bonjour') ?> <?php the_time('l d M Y') ?> <?php _e('par', 'bonjour') ?> <?php the_author() ?> <?php _e('in category', 'bonjour')?> <?php the_category(', ') ?></p>
				<p>
					<?php comments_popup_link( 
					__( 'No comments', 'bonjour' ), 
					__( '1 comment', 'bonjour' ),
					__( '% comments', 'bonjour' ),
					'comments-link',
					__( 'Comments are closed', 'bonjour' )
				); ?>
				</p>
			</footer>
			<?php edit_post_link( __( 'Edit', 'bonjour' ), '<p>', '</p>', null, 'btn btn-primary btn-edit-post-link' ); ?>
		</article>
	<?php }
}
else { ?>
	<h2><?php _e('No content', 'bonjour') ?></h2>
	<p><?php _e('Sorry, but no content has been published.', 'bonjour') ?></p>
<?php } ?>