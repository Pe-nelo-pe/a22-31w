
<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */

?>

<?php get_header(); ?>


    <main class="site__main">

    <h1>Liste des cours offerts</h1>

        <section class="liste">
        <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();?>
                    <article class="liste__cours">
                        <a href="<?php the_permalink()?>">
                            <h2>  <?php $title = the_title('','',FALSE); echo substr($title, 8, -6); ?></h2>

                            <h4>Durée du cours: <?php the_field('duree')?> heures</h4>
                            <h4>Nom du professeur: <?php the_field('professeur')?> </h4>
                            <h4>Période du cours: <?php the_field('periode')?> </h4>
                            <p><?= wp_trim_words( get_the_excerpt(), 35, '...' ); ?></p>
                        </a>
                    </article>
                  
               <?php endwhile;
            endif;?>
        </section>
    </main>

<?php get_footer(); ?>
</html>

