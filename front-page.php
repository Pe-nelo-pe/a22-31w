
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

        <!-- condition pour ajouter une classe et changer le contenu si l'article contient la catégorie "galerie" -->
                    <?php 
                       $myArray = get_the_category();
                       $boolGalerie = false;
                       foreach($myArray as $key){
                           if($key->slug == "galerie"){
                               $boolGalerie = true;
                           };
                       }
                       if($boolGalerie == true) : ?>

                    <article class="article_front article_galerie">
                        <a href="<?php the_permalink()?>">
                        <?php  the_title('<h2>','</h2>'); ?>
                        <div class="resume">
                            <?php if (has_post_thumbnail()){ the_post_thumbnail("thumbnail");}; ?>
                            <p><?php the_content(); ?></p>

                    <?php else : ?>
                                
                    <article class="article_front">
                        <a href="<?php the_permalink()?>">
                        <h2><?php  $title = the_title('','',FALSE); echo substr($title, 8, -6); ?></h2>
                        <div class="resume"><?php if (has_post_thumbnail()){the_post_thumbnail("thumbnail");}; ?>
                            <p><?php echo wp_trim_words( get_the_excerpt(), 35, '...' ); ?></p>
                    
                    <?php endif;?>

                        </div>
                        </a>
                    </article>
               <?php endwhile;
            endif;
        ?>
    </section>
    </main>

<?php get_footer(); ?>
</html>

