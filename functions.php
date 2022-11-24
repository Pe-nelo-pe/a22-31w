<?php
/**
 * underscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package underscore
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**Inclusion du customizer de background-color */
require_once("options/apparence.php");

function underscore_setup() {


    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	
	add_theme_support( 'custom-logo', array(
		'height' => 150,
		'width' => 150,
		) );
		
	add_theme_support( 'post-thumbnails' );

    /*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}

add_action( 'after_setup_theme', 'underscore_setup' );


/**
 * Enqueue scripts and styles.
 */
function underscore_scripts() {
	//wp_enqueue_style('underscore-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('underscore-style', 
					get_template_directory_uri() . '/style.css',
					array(), 
					filemtime(get_template_directory() . '/style.css'), false);

}
add_action( 'wp_enqueue_scripts', 'underscore_scripts' );


/*---------- Init fonction menu */

function mon_31w_register_nav_menu(){
	register_nav_menus( array(
		'menu_primaire' => __( 'Menu Primaire', 'text_domain' )
	) );
}
add_action( 'after_setup_theme', 'mon_31w_register_nav_menu', 0 );



/*-------------------------Filtre des éléments du menu aside*/

function igc31w_filtre_choix_menu($obj_menu, $arg){
    //var_dump($obj_menu);
	//die;
	if($arg->menu == "aside"){
		foreach($obj_menu as $cle => $value)
		{
		$value->title = substr($value->title,7);
		$value->title = wp_trim_words($value->title,3,"...");
		$arrTitle = explode("(", $value->title);
		$value->title = $arrTitle[0];
		}
	}

	
    return $obj_menu;
}
add_filter("wp_nav_menu_objects","igc31w_filtre_choix_menu", 10,2);


/* ----------------------------------------------------------- Ajout de la description dans menu */
/* Filtre du menu evenement
* @arg string $item_output -- represente élément du menu	
* @arg object $item
*/
function prefix_nav_description( $item_output, $item) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( '</a>',
        '<hr><span class="menu-item-description">' . $item->description . '</span><div class="menu__item__icone">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

		
		<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
			<path d="M 73.534 58.799 L 31.201 16.466 c -1.059 -1.059 -1.059 -2.776 0 -3.835 L 43.038 0.794 c 1.059 -1.059 2.776 -1.059 3.835 0 l 42.333 42.333 c 1.059 1.059 1.059 2.776 0 3.835 L 77.369 58.799 C 76.31 59.858 74.593 59.858 73.534 58.799 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0);  opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
			<path d="M 73.534 31.201 L 31.201 73.534 c -1.059 1.059 -1.059 2.776 0 3.835 l 11.837 11.837 c 1.059 1.059 2.776 1.059 3.835 0 l 42.333 -42.333 c 1.059 -1.059 1.059 -2.776 0 -3.835 L 77.369 31.201 C 76.31 30.142 74.593 30.142 73.534 31.201 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
			<path d="M 62.579 56.082 l -59.868 0 C 1.214 56.082 0 54.867 0 53.37 L 0 36.63 c 0 -1.498 1.214 -2.712 2.712 -2.712 l 59.868 0 c 1.498 0 2.712 1.214 2.712 2.712 l 0 16.739 C 65.291 54.867 64.077 56.082 62.579 56.082 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
		</g>
		</svg>
		</div></a>',
              $item_output );
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 2 );
// l'argument 10 : niveau de privilège
// l'argument 2 : le nombre d'argument dans la fonction de rappel: «prefix_nav_description»



/*-------------------------Widget du sidebar */
add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	/* Register the 'footer-1' sidebar. */

	register_sidebar(
		array(
			'id'            => 'header-1',
			'name'          => __( 'Sidebar header-1' ),
			'description'   => __( 'Premier sidebar du header-recherche' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'header-2',
			'name'          => __( 'Sidebar header-2' ),
			'description'   => __( 'Premier sidebar du header-logo medias' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'footer-1',
			'name'          => __( 'Sidebar footer-1' ),
			'description'   => __( 'Premier sidebar du footer' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-2',
			'name'          => __( 'Sidebar footer-2' ),
			'description'   => __( 'Deuxième sidebar du footer' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'footer-3',
			'name'          => __( 'Sidebar footer-3' ),
			'description'   => __( 'Troisième sidebar du footer' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'aside-1',
			'name'          => __( 'Sidebar aside-1' ),
			'description'   => __( 'Premier sidebar du aside' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
		
	);
	register_sidebar(
		array(
			'id'            => 'aside-2',
			'name'          => __( 'Sidebar aside-2' ),
			'description'   => __( 'Deuxième sidebar du aside' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}


/**
 * Fonction qui modifie la requete principale de WP "main query"
 * Articles affichés sur page principale 
 */
function exclude_category($query) {
	if ( $query->is_home() && $query->is_main_query() && ! is_admin()) {
		$query->set('category_name', 'accueil');
	}

} add_action('pre_get_posts', 'exclude_category');



