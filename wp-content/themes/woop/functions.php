<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'twentynineteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function twentynineteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'twentynineteen' ),
				'footer' => __( 'Footer Menu', 'twentynineteen' ),
				'social' => __( 'Social Links Menu', 'twentynineteen' ),
			)
		);

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
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'twentynineteen' ),
					'shortName' => __( 'S', 'twentynineteen' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'twentynineteen' ),
					'shortName' => __( 'M', 'twentynineteen' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'twentynineteen' ),
					'shortName' => __( 'L', 'twentynineteen' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'twentynineteen' ),
					'shortName' => __( 'XL', 'twentynineteen' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'twentynineteen' ),
					'slug'  => 'primary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'twentynineteen' ),
					'slug'  => 'secondary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'twentynineteen' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'twentynineteen' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'twentynineteen' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'twentynineteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function twentynineteen_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twentynineteen_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentynineteen_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function twentynineteen_scripts() {
	
// Example of loading a jQuery slideshow plugin just on the homepage
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css' );
wp_enqueue_style( 'slicktheme', get_template_directory_uri() . '/css/slick-theme.css' );
wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );



  wp_enqueue_script( 'jquery3.4', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', array (), 1.1, true);
  wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array (), 1.1, true); 
  if(is_page(array('home-page','press'))){
	 wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array (), 1.1, true);
  }	
   
	
  wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/js/slick.min.js', array (), 1.1, true); 
   

  
}
add_action( 'wp_enqueue_scripts', 'twentynineteen_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentynineteen_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twentynineteen_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function twentynineteen_editor_customizer_styles() {

	wp_enqueue_style( 'twentynineteen-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'twentynineteen-editor-customizer-styles', twentynineteen_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'twentynineteen_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function twentynineteen_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo twentynineteen_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'twentynineteen_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


add_action( 'wp_ajax_view_story_more_action', 'view_story_more_action' );
add_action( 'wp_ajax_nopriv_view_story_more_action', 'view_story_more_action' );
function view_story_more_action() {
  $offset = $_POST['offset'];
  $ppp = $_POST['ppp'];
  $offset_next = $offset+$ppp;
  $slickdataid=$_POST['slickdataid'];
  $story_articles_args1 = array(
					'post_type' => 'impact-story',
					'post_status' => 'publish',
					'posts_per_page' => $ppp,
					'orderby' => 'ID',
					'order' => 'DESC',
					'offset'      =>$offset_next
				); 




$storypostnext= new WP_Query($story_articles_args1 );
    
    
$story_next_results= $storypostnext->posts;
$story_articles_args2 = array(
	'post_type' => 'impact-story',
	'post_status' => 'publish',
	'posts_per_page' => $ppp,
	'orderby' => 'ID',
	'order' => 'DESC',
	'offset'      =>$offset
); 
$story = new WP_Query($story_articles_args2 );
//print_r($blogpost);exit;
$cnt=$slickdataid;
while ($story ->have_posts() ) : $story ->the_post();
	
if(wp_is_mobile()){
	 	
		$img_url = get_post_meta( get_the_ID(), "wpcf-home-page-thumb-image", true ); 
 	}
 	else{
		$img_url =get_the_post_thumbnail_url(get_the_ID(),'full'); 
 	}	
	
//$img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 

$rslt_nws_data.='<li>
<span style="background-image:url('.$img_url.'"></span>
<h5>'.get_the_title().'</h5>
<p>' .wp_trim_words( get_the_content(),35).'</p>
<a class="theme_btn active_id" data-toggle="modal" data-target="#myModal" data-id="'.$cnt.'">READ HER STORY</a>
</li>';



//$rslt_nws_data.='</div>';
$cnt++;
$dataid=$cnt-1;
endwhile;

 if(! $story_next_results){
	                    $view_less_status = "false";
	               }
	               else{
	                    $view_less_status = "true";
	               }



  
  print_r(json_encode(array("view_data"=>$rslt_nws_data,"view_status"=>$view_less_status,"dat_id"=>$dataid)));

  wp_die();
}



add_action( 'wp_ajax_view_news_more_action', 'view_news_more_action' );
add_action( 'wp_ajax_nopriv_view_news_more_action', 'view_news_more_action' );
function view_news_more_action() {

  $offset = $_POST['offset'];
  $ppp = $_POST['ppp'];
  $offset_next = $offset+$ppp;
   $news_articles_args1 = array(
					'post_type' => 'woop-news',
					'post_status' => 'publish',
					'posts_per_page' => $ppp,
					'orderby' => 'date',
					'order' => 'DESC',
					'offset'=>$offset_next
				); 




$newspostnext= new WP_Query($news_articles_args1 );
//print_r($newspostnext);
$news_next_results= $newspostnext->posts;
//$news_next_results = $newspostnext->found_posts;
$news_articles_args2 = array(
	'post_type' => 'woop-news',
	'post_status' => 'publish',
	'posts_per_page' => $ppp,
	'orderby' => 'date',
	'order' => 'DESC',
	'offset'      =>$offset
); 
$news = new WP_Query($news_articles_args2 );
//print_r($blogpost);exit;
$cnt=$offset;
while ($news ->have_posts() ) : $news ->the_post();
$post_id = get_the_ID() ;
$redlink = get_post_meta( $post_id, 'wpcf-news-redirect-url', true);
$img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 


if( $redlink!=''){
	$rslt_nws_data.='<a href="'. $redlink.'" target="_blank">  <li>
	  <p>'.get_the_title().'</p>
	  <div class="newsbrand_detail">
	  <span><img src="'.$img_url.'"></span>
	  </div>  
	  </li> </a>';
	  } else {
		$rslt_nws_data.='<li>
	  <p>'.get_the_title().'</p>
	  <div class="newsbrand_detail">
	  <span><img src="'.$img_url.'"></span>
	  </div>  
	  </li>';
	 }





$cnt++;
 endwhile;
//print_r($story_next_results);
 if(!$news_next_results){
	                    $view_less_status = "false";
	               }
	               else{
	                    $view_less_status = "true";
	               }



  
  print_r(json_encode(array("view_data"=>$rslt_nws_data,"view_status"=>$view_less_status)));

  wp_die();
}


//adding custom options in the general section of admin panel
add_action( 'admin_init', 'woop_api_init' );
function woop_api_init() {
   // Add the section to general settings so we can add our
    // fields to it
   
   add_settings_section(
         'twitter_link_setting_section',
         '',
         '',
         'general'
    );

    add_settings_section(
        'facebook_link_setting_section',
        '',
        '',
        'general'
   );

   add_settings_section(
    'youtube_link_setting_section',
    '',
    '',
    'general'
);

add_settings_section(
    'linkedin_link_setting_section',
    '',
    '',
    'general'
);


add_settings_field(
        'twitter_link',
        'Twitter Url',
        'twitter_link_setting_section_callback_function',
        'general',
       'twitter_link_setting_section'
    );

    add_settings_field(
        'facebook_link',
        'facebook Url',
        'facebook_link_setting_section_callback_function',
        'general',
       'facebook_link_setting_section'
    );

    add_settings_field(
        'youtube_link',
        'youtube Url',
        'youtube_link_setting_section_callback_function',
        'general',
       'youtube_link_setting_section'
    );

     add_settings_field(
        'linkedin_link',
        'LinkedIn Url',
        'linkedin_link_setting_section_callback_function',
        'general',
       'linkedin_link_setting_section'
    );
   
   // Register our setting so that $_POST handling is done for us and
   // our callback function just has to echo the <input>
   
   register_setting( 'general', 'twitter_link' );
   register_setting( 'general', 'facebook_link' );
   register_setting( 'general', 'youtube_link' );
   register_setting( 'general', 'linkedin_link');
   
   
   
}
/*callback functions*/

function twitter_link_setting_section_callback_function() {
    echo '<input type="url" name="twitter_link" id="twitter_link"  value="'. get_option( 'twitter_link' ).'" class="regular-text code">';
}

function facebook_link_setting_section_callback_function() {
    echo '<input type="url" name="facebook_link" id="facebook_link"  value="'. get_option( 'facebook_link' ).'" class="regular-text code">';
}

function youtube_link_setting_section_callback_function() {
    echo '<input type="url" name="youtube_link" id="youtube_link"  value="'. get_option( 'youtube_link' ).'" class="regular-text code">';
}

function linkedin_link_setting_section_callback_function() {
    echo '<input type="url" name="linkedin_link" id="linkedin_link"  value="'. get_option( 'linkedin_link' ).'" class="regular-text code">';
}




add_action( 'wp_ajax_single_nav_post_action', 'single_nav_post_action' );
add_action( 'wp_ajax_nopriv_single_nav_post_action', 'single_nav_post_action' );
function single_nav_post_action() {

     $post_id = $_POST['post_id'];
     $func = $_POST['func'];
     // $article_type = $_POST['article_type'];

    // starting the contents


         
               $get_prev_post_obj = get_post($post_id);
         

          $get_article_banner = get_the_post_thumbnail_url($get_prev_post_obj->ID);
          $article_title = get_the_title($get_prev_post_obj->ID);
          $article_slug = $get_prev_post_obj->post_name;
          $article_content = wpautop($get_prev_post_obj->post_content);
		  $article_author = get_post_meta($get_prev_post_obj->ID,'wpcf-author-name',true);
		  $article_desc = get_post_meta($get_prev_post_obj->ID,'wpcf-author-description',true);
          $article_date = get_the_date( 'F j', $get_prev_post_obj->ID );
          //$get_parent_type = news_get_post_type_slug($get_prev_post_obj->post_type);
          $parent_slug = $get_prev_post_obj->post_type;
          $article_permalink = get_the_permalink($get_prev_post_obj->ID);

		  $terms = get_the_terms($post_id, 'blog' ); if ( !empty( $terms ) ){ 
			$term = array_shift( $terms );  $term->term_id; }



          // founds the next and prev of future results
          $news_insights_args = array(
                                  'post_type'   => $parent_slug,
                                  'post_status' => 'publish',
                                  'numberposts' => -1,
                                  'orderby'     =>'date',
								  'order'       =>'DESC',
								  'tax_query' => array(
                                    array(
                                        'taxonomy'  => 'blog',
                                        'field'     => 'term_id',
                                        'terms'     => $term->term_id,
                                    ))
                         );
     $news_insights_results = get_posts( $news_insights_args );

     if( $news_insights_results ){

          // get IDs of posts retrieved from get_posts
          $article_ids = array();
         
          foreach ( $news_insights_results as $news_insights_result ) {
              $article_ids[] = $news_insights_result->ID;
             
          }

          // get and echo previous and next post in the same category
          $thisindex = array_search( (int)$post_id, $article_ids );
          //$thisindex = 1;
          $previd    = isset( $article_ids[ $thisindex - 1 ] ) ? $article_ids[ $thisindex - 1 ] : 0;
		  $nextid    = isset( $article_ids[ $thisindex + 1 ] ) ? $article_ids[ $thisindex + 1 ] : 0;
		  $nexttitle=get_the_title($nextid);
          $pretitle=get_the_title($previd);


          }
     
    
	 print_r(json_encode(array('article_title'=>$article_title,'article_banner'=>$get_article_banner,'article_content'=>$article_content,'article_author'=>$article_author,'article_date'=>$article_date,'article_permalink'=>$article_permalink,'author_desc'=>$article_desc,'parent_type_slug'=>$parent_slug,
	 'article_name'=>$article_slug,'prev_id'=>$previd,'next_id'=>$nextid,'next_title'=>$nexttitle,'prev_title'=>$pretitle)));

     wp_die();
}


function wpse_159462_login_form() {
    echo <<<html
<script>
    document.getElementById( "user_pass" ).autocomplete = "off";
</script>
html;
}

add_action( 'login_form', 'wpse_159462_login_form' );