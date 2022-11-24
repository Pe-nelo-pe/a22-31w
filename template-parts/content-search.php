<?php
/**
 * Template part pour affichage des résultats
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * Code pris de @package underscore
 */

?>

<article id="post-<?php the_ID(); ?>"  class="search-result">
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<!-- <?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			
		</div>
		<?php endif; ?> -->
	</header>

	

	<div class="entry-summary">
	<?= wp_trim_words( get_the_excerpt(), 20, '...' ); ?><a href="<?php the_permalink()?>"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" color="#000"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
	</div>

	<hr>
	
</article>
