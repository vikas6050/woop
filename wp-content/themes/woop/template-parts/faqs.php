<?php
/**
 * Template Name: FAQ Main
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Fourteen 1.0
 */


get_header(); ?>
  <section class="woop_en_roi faq-woop">
     <div class="container">
	 <h2>Frequently Asked Questions</h2>
	 <p>Can’t find your answer? Drop us an email via ask@woopworld.in and a member of our team would be happy to assist you. <br>Don’t forget to provide us your Username for quicker response.</p>
     <ul>
    <?php 
    $category = get_category_by_slug( 'faq' );

    $args = array(
        'type'                     => 'post',
        'child_of'                 => $category->term_id,
        'orderby'                  => 'name',
        'order'                    => 'ASC',
        'hide_empty'               => FALSE,
        'hierarchical'             => 1,
        'taxonomy'                 => 'category',
        ); 
        $child_categories = get_categories($args );
      
      //  print_r( $child_categories);
        $category_list = array();
        $category_list[] = $category->term_id;
        
        if ( !empty ( $child_categories ) ){
            foreach ( $child_categories as $child_category ){ 
                if (function_exists('get_wp_term_image'))
{
    $meta_image = get_wp_term_image($child_category->term_id); 
   }
 ?>
                <li>
                <a href="faq-details?id=<?php echo $child_category->term_id;?>"> 
                <span class="faq-lft"><img src="<?php echo  $meta_image;?>" alt="<?php echo $child_category->name;?>"></span>
                <div class="faq-rght"><h5><?php echo $child_category->name;?></h5>
               <!-- <p><?php //echo $child_category->description;?></p>-->
					
					<p>View all</p></div>
                </a>	 
                </li>
          <?php  }
        }
        

?>

		 
		 
	 </ul>
	 </div>
	 </section>



  

 






<?php get_footer();?>

<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
   </script>  