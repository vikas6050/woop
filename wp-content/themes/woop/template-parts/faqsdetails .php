<?php
/**
 * Template Name: FAQ Details
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Fourteen 1.0
 */


get_header(); ?>
  <section class="individual-faq">
	 <div class="container">
	 <div class="faq-back_text"><a href="faqs"><span><img src="<?php echo get_template_directory_uri();?>/images/back-arrow.png"></span>Back to all FAQ’s</a></div>	 
     <h2>
    <?php 
     $cat_id=  $_GET['id'];
     echo  get_cat_name($cat_id);
     ?>
     </h2>
	 <div class="accordion" id="accordionExample">
<?php  
   
 $story  = array(
  'post_type'		=> 'faq',
  'cat' => $cat_id,
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$storyres = new WP_Query( $story );
$count = $storyres->found_posts;
if( $storyres->have_posts() ):  $cnt=0;
	while( $storyres->have_posts() ) : $storyres->the_post(); 
	$post_id = get_the_ID() ;
   
  	?>


<div class="card">
            <div class="card-header" id="heading<?php echo $cnt;?>">
                <h2 class="mb-0">
                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $cnt;?>">
				<div class="accordian-text"><?php echo $cnt+1;?>. <?php the_title(); ?></div> <i class="fa fa-plus"></i></button>	
                </h2>
            </div>
<div id="collapse<?php echo $cnt;?>" class="collapse <?php if($cnt==0){?>show <?php }?>" aria-labelledby="heading<?php echo $cnt;?>" data-parent="#accordionExample">
                <div class="card-body">
                <?php echo get_the_content(); ?>
                </div>
            </div>
        </div>

     

        <?php $cnt++;  
endwhile;   wp_reset_query(); endif; ?>

	
		
		
              </div>
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