<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); 
$pageid= get_the_ID();

?>>
<?php //wp_body_open(); ?>
  <header>
				
				<?php
				if(is_page(array('home-page','press'))){
					$navbar_class = "";
				}
				else{
					$navbar_class = "faq-nav white-bg";
				}?>
				<nav class="navbar navbar-expand-lg navbar-light fixed-top <?php echo $navbar_class;?>">
     				<a class="navbar-brand" href="<?php echo get_site_url();?>"> 
     					<img class="logo-white" src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/WOOP_Logo_No_BG.png">
              			<img class="logo-dark" src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/WOOP_Logo_White_BG.png"> 
              		</a>


      				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        				<span class="navbar-toggler-icon">MENU</span>
      				</button>
    
      				<div class="collapse navbar-collapse" id="navbarSupportedContent">
        				<ul class="navbar-nav mr-auto"></ul>
        				<ul class="navbar-nav">
          
          					<li class="nav-item">
            					<a class="nav-link" href="<?php echo site_url();?>/press">Press</a>
          					</li>
       
          					<li class="nav-item">
            					<a class="nav-link" href="#partner-with_us">Contact Us</a>
          					</li>
        
          
        				</ul>
      				</div>
    			</nav>
</header>
