<?php
/**
 * Template Name: More Success Stories
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Fourteen 1.0
 */


get_header(); ?>
 <section class="success_stories details-success">
	 <div class="container">
   <?php
	while ( have_posts() ) : the_post();
	the_content();
	endwhile; // End of the loop. 
    wp_reset_query();
			?>
	
	 </div>
		 <section class="wrapper">
		 <div class="mobtab-li">
	 <ul class="tabs">
		<li>FASHION</li>
		<li class="active">BEAUTY</li>
		<li>MOTHERCARE</li>
		<li>LIFESTYLE</li>
		<li>FOOD</li>
	 </ul>
</div>
	 <ul class="tab__content">


   <li>
   <div class="content__wrapper">
		<div class="success_container"> 
   <ul>
   <?php  
 $fashion = array(
  'post_type'		=> 'success-story',
  'cat' => 7,
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$fashionres = new WP_Query( $fashion );
if( $fashionres->have_posts() ): 
while( $fashionres->have_posts() ) : $fashionres->the_post(); 
$faspost_id = get_the_ID() ;
$ftlogo=get_post_meta( $faspost_id, "wpcf-success-brand-logo", true );  
//$listimg=get_post_meta( $faspost_id, "wpcf-success-story-listing-image", true ); 
$featured_img_urlimp = get_the_post_thumbnail_url($faspost_id,'full'); 
?>
	 <li>
				 <a href="<?php //echo get_permalink($faspost_id);?>">
				 <div class="beauty-img" style="background-image:url('<?php echo $featured_img_urlimp;?>')"><?php //if(has_post_thumbnail()){ the_post_thumbnail('full');  } ?></div>
				 <div class="beauty_content">
				 <h3><?php the_title(); ?></h3>
				 <p><?php echo get_the_excerpt();?></p>
				 <span class="suces_brnd_lgo"><img src="<?php echo $ftlogo;?>"></span>
				 </div> 
				 </a> 	 
         </li>
         
         <?php endwhile;   wp_reset_query(); endif; ?> 

				
       
				 </ul>
				</div>
			</div>
    </li>
    



    <li class="active">
   <div class="content__wrapper">
		<div class="success_container"> 
   <ul>
   <?php  
 $beauty = array(
  'post_type'		=> 'success-story',
  'cat' => 8,
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$beautyres = new WP_Query( $beauty );
if( $beautyres->have_posts() ): 
while( $beautyres->have_posts() ) : $beautyres->the_post(); 
$btpost_id = get_the_ID() ;
$btlogo=get_post_meta( $btpost_id, "wpcf-success-brand-logo", true ); 
$featured_img_urlimp = get_the_post_thumbnail_url($btpost_id,'full'); 

  ?>

 <li>
				 <a href="<?php //echo get_permalink($btpost_id);?>">
				 <div class="beauty-img" style="background-image:url('<?php echo $featured_img_urlimp;?>')"></div>
				 <div class="beauty_content">
				 <h3><?php the_title(); ?></h3>
				 <p><?php echo get_the_excerpt();?></p>
				 <span class="suces_brnd_lgo"><img src="<?php echo $btlogo;?>"></span>
				 </div> 
				 </a> 	 
         </li>
         
         <?php endwhile;   wp_reset_query(); endif; ?> 

				     
				 </ul>
				</div>
			</div>
		</li>
    



    <li>
   <div class="content__wrapper">
		<div class="success_container"> 
   <ul>
   <?php  
 $mother = array(
  'post_type'		=> 'success-story',
  'cat' => 9,
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$motherres = new WP_Query( $mother );
if( $motherres->have_posts() ): 
while( $motherres->have_posts() ) : $motherres->the_post(); 
$mcpost_id = get_the_ID() ;
$mclogo=get_post_meta( $mcpost_id, "wpcf-success-brand-logo", true ); 
$featured_img_urlimp = get_the_post_thumbnail_url($mcpost_id,'full'); 

  ?>

	  
		  	
			
				 <li>
				 <a href="<?php //echo get_permalink($mcpost_id);?>">
				 <div class="beauty-img" style="background-image:url('<?php echo $featured_img_urlimp;?>')"></div>
				 <div class="beauty_content">
				 <h3><?php the_title(); ?></h3>
				 <p><?php echo get_the_excerpt();?></p>
				 <span class="suces_brnd_lgo"><img src="<?php echo $mclogo;?>"></span>
				 </div> 
				 </a> 	 
         </li>
         
         <?php endwhile;   wp_reset_query(); endif; ?> 

				
       
				 </ul>
				</div>
			</div>
    </li> 
	
    <li>
   <div class="content__wrapper">
		<div class="success_container"> 
   <ul>
   <?php  
 $life = array(
  'post_type'		=> 'success-story',
  'cat' => 10,
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$liferes = new WP_Query(  $life );
if( $liferes->have_posts() ): 
while( $liferes->have_posts() ) : $liferes->the_post(); 
$lipost_id = get_the_ID() ;
$lilogo=get_post_meta( $lipost_id, "wpcf-success-brand-logo", true ); 
$featured_img_urlimp = get_the_post_thumbnail_url($lipost_id,'full'); 


  ?>

	  
		  	
			
				 <li>
				 <a href="<?php //echo get_permalink($lipost_id);?>">
				 <div class="beauty-img" style="background-image:url('<?php echo $featured_img_urlimp;?>')"></div>
				 <div class="beauty_content">
				 <h3><?php the_title(); ?></h3>
				 <p><?php echo get_the_excerpt();?></p>
				 <span class="suces_brnd_lgo"><img src="<?php echo $lilogo;?>"></span>
				 </div> 
				 </a> 	 
         </li>
         
         <?php endwhile;   wp_reset_query(); endif; ?> 

				
       
				 </ul>
				</div>
			</div>
    </li> 

  
    


  
    <li>
   <div class="content__wrapper">
		<div class="success_container"> 
   <ul>
   <?php  
 $food = array(
  'post_type'		=> 'success-story',
  'cat' => 11,
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$foodres = new WP_Query( $food );
if( $foodres->have_posts() ): 
while( $foodres->have_posts() ) : $foodres->the_post(); 
$fdpost_id = get_the_ID() ;
$fdlogo=get_post_meta( $fdpost_id, "wpcf-success-brand-logo", true ); 
$featured_img_urlimp = get_the_post_thumbnail_url($fdpost_id ,'full'); 


  ?>
	  
		  	
			
				 <li>
				 <a href="<?php //echo get_permalink($fdpost_id);?>">
				 <div class="beauty-img" style="background-image:url('<?php echo $featured_img_urlimp;?>')"></div>
				 <div class="beauty_content">
				 <h3><?php the_title(); ?></h3>
				 <p><?php echo get_the_excerpt();?></p>
				 <span class="suces_brnd_lgo"><img src="<?php echo $fdlogo;?>"></span>
				 </div> 
				 </a> 	 
         </li>
         
         <?php endwhile;   wp_reset_query(); endif; ?> 

				
       
				 </ul>
				</div>
			</div>
    </li> 



	 </ul>
     </section>

  </section>






<?php get_footer();?>

<script>
$(document).ready(function(){
  $(".success_container li").mouseenter(function(){
    $(this).addClass("show").fadeIn("slow");
  });
$(".success_container li").mouseleave(function(){
    $(this).removeClass("show");
  });		
});
</script>
<script>
$(document).ready(function(){
	
	// Variables
	var clickedTab = $(".tabs > .active");
	var tabWrapper = $(".tab__content");
	var activeTab = tabWrapper.find(".active");
	var activeTabHeight = activeTab.outerHeight();
	
	// Show tab on page load
	activeTab.show();
	
	// Set height of wrapper on page load
	tabWrapper.height(activeTabHeight);
	
	$(".tabs > li").on("mouseover", function() {
		
		// Remove class from active tab
		$(".tabs > li").removeClass("active");
		
		// Add class active to clicked tab
		$(this).addClass("active");
		
		// Update clickedTab variable
		clickedTab = $(".tabs .active");
		
		// fade out active tab
		activeTab.fadeOut(function() {
			
			// Remove active class all tabs
			$(".tab__content > li").removeClass("active");
			
			// Get index of clicked tab
			var clickedTabIndex = clickedTab.index();

			// Add class active to corresponding tab
			$(".tab__content > li").eq(clickedTabIndex).addClass("active");
			
			// update new active tab
			activeTab = $(".tab__content > .active");
			
			// Update variable
			activeTabHeight = activeTab.outerHeight();
			
			// Animate height of wrapper to new tab height
			tabWrapper.stop().delay().animate({
				height: activeTabHeight
			}, 100, function() {
				
				// Fade in active tab
				activeTab.delay().fadeIn();
				
			});
		});
	});
	
	// Variables
	var colorButton = $(".colors li");
	
	colorButton.on("click", function(){
		
		// Remove class from currently active button
		$(".colors > li").removeClass("active-color");
		
		// Add class active to clicked button
		$(this).addClass("active-color");
		
		// Get background color of clicked
		var newColor = $(this).attr("data-color");
		
		// Change background of everything with class .bg-color
		$(".bg-color").css("background-color", newColor);
		
		// Change color of everything with class .text-color
		$(".text-color").css("color", newColor);
	});
});	
</script>	