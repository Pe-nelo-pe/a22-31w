<?php
/**
 * Template pour affichage des résultats
 *
 * Code pris de @package underscore
 */

get_header();
?>

	<main id="primary" class="site__main ">

		<?php if ( have_posts() ) : ?>
        
			<header class="page__header">
                <h2>Résultats de la recherche</h2>
				<h5 class="page__title">

					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Élément de recherche: %s', 'a22-31w' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h5>
			</header>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

			
				get_template_part( 'template-parts/content', 'search' );



			endwhile;

			the_posts_navigation();
          

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
        <span>Nombre de résultats: 
        <?php
            global $wp_query;
            echo $wp_query->found_posts. '';
        ?>
        </span>
	</main><!-- #main -->

<?php

get_footer();
