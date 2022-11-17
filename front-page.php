
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


 //$value->title = wp_trim_words($value->title,3,"...");
?>

<?php get_header(); ?>


    <main class="site__main">

    <nav class="menu__evenement">
        <h2>Évènements à venir</h2>
        <?php
            wp_nav_menu(array(
                "menu" => "evenement",
                "container" => "",
                "container_class" => ""
            ));
        ?>
    </nav>
        
    <section>
        <h1>Articles en vedette</h1>
    <?php

            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();?>
                    <article class="article_front">
                        <a href="<?php the_permalink()?>">
                        <h2><?php $title = the_title('','',FALSE); echo substr($title, 8, -6); ?></h2>
                        <div class="resume">
                            <?php if (has_post_thumbnail()){
                                the_post_thumbnail("thumbnail");
                            }; ?>
                        
                            <p><?php echo wp_trim_words( get_the_excerpt(), 35, '...' ); ?></p>
                        </div>
                        </a>
                    </article>
               <?php
                endwhile;
            endif;
        ?>
    </section>
    </main>

<?php get_footer(); ?>
</html>

