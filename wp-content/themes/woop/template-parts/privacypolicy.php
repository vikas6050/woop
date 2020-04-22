<?php
/**
 * Template Name: Privacy Policy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Fourteen 1.0
 */


get_header(); ?>
   <section class="individual-faq">
	 <div class="container">	 


   <?php
	while ( have_posts() ) : the_post();
	the_content();
	endwhile; // End of the loop. 
    wp_reset_query();
			?>	


</div>
 </section>



  

 






<?php get_footer();?>

