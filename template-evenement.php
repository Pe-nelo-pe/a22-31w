
<?php
/**
* Template Name: Evenement
*
* @package WordPress
* @subpackage igc_31w
*/
?>
 
<?php get_header() ?>
<main>
 
    
   <?php if (have_posts()): the_post(); ?>
       <h2 class="evenement__title"> <?php the_title();?></h2>
        <?php the_content() ?>        
        <h4> Venez nous joindre au <?php the_field('adresse')?> </h4> 
        <h5>Date de l'évènement: <?php the_field('date-heure');?></h5>      
   <?php endif ?>
</main>
<?php get_footer() ?>