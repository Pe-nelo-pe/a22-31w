<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscore
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
	<style>
		.site__header { background-color:<?= get_theme_mod("site__title__background"); ?>;}
		.site__footer { background-color:<?= get_theme_mod("site__footer__background"); ?>;}
	
	</style>
</head>

<body <?php body_class(); ?>>

<nav class="menu__principal">
	<?= get_custom_logo(); ?>
	
	<?php wp_nav_menu(array(
				"menu" => "principal",
				"container" => "",
				"container_class" => ""
			));?>

</nav>

<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site__header">
		
		<div class="site__branding">
			<div class="site__title-info">

				<h1 class="site__title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
				<?php	
			$underscore_description = get_bloginfo( 'description', 'display' );
			if ( $underscore_description || is_customize_preview() ) :
				?>
				<h4 class="site__description"><?php echo $underscore_description; ?></h4>
			<?php endif; ?>
			</div>
			<div class="site__header__widget">
				<?php get_sidebar( 'header-1' ); ?>
				<?php get_sidebar( 'header-2' ); ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<aside class="site__menu">
		
		<input type="checkbox" name="chk-burger" id="chk-burger" class="chk-burger">
		<label for="chk-burger" class="burger">&#127828;</label>
		<!-- <h2>Tous les cours</h2>  -->
		<?php wp_nav_menu(array(
			"menu" => "aside",
			"container" => "nav",
			"container_class" => "menu__aside"
		));
		?>
	</aside>

	<aside class="site__sidebar">
		<div><?php get_sidebar("aside-1");?></div>
		<div><?php get_sidebar("aside-2");?></div>
	</aside>

	
