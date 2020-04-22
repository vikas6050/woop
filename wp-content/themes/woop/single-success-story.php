<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<section class="individual_sec">
	  <div class="container">
	   <div class="back-text"><a href="<?php echo site_url();?>/more-success-stories"><span><img src="<?php echo get_template_directory_uri();?>/images/back-arrow.png"></span>Back to all case studies</a></div>
		<div class="col-md-12"> 
			<div class="row">
				<div class="col-md-6">
				<h2><?php the_title(); ?></h2>
				<p> <?php the_excerpt();?></p>
				</div>
				<div class="col-md-6">
				<h5>Objectives</h5>

				<?php
	while ( have_posts() ) : the_post();
	the_content();
	endwhile; // End of the loop. 
    wp_reset_query();
			?>
			
				</div>
			</div>
		  </div>
	  </div>
		<div class="individual-bnr"><?php if(has_post_thumbnail()){ the_post_thumbnail('full');  } ?></div>
	</section>

	<section class="strategy_sec">
	  <div class="container">
		 <div class="col-md-8">
	     <h2><?php echo get_post_meta( get_the_ID(), "wpcf-subtitle-head", true );?>  </h2>
		 <p><?php echo get_post_meta( get_the_ID(), "wpcf-subtitle-inro", true );?> </p>
		 </div>
		</div>
		<div class="strategy-details">
		 <ul>


		 <?php  

// getting child posts from meta table for currently created work
$parent_post_type = "success-story";
 $parent_post_id = get_the_ID();

global $wpdb;

			   $mobilizer_child_posts_results = $wpdb->get_results("
			   SELECT post_id  
			   FROM $wpdb->postmeta
			   WHERE $wpdb->postmeta.meta_key = '_wpcf_belongs_{$parent_post_type}_id'
			   AND $wpdb->postmeta.meta_value = '{$parent_post_id}'",
			   ARRAY_A);

$count_child_posts = count( $mobilizer_child_posts_results );

// looping for getting post details
$strategy_results = [];
$featured_results = [];
$testimo_results = [];
for( $child_post_counter = 0; $child_post_counter < $count_child_posts; $child_post_counter++ ){

	 $child_posts_id = $mobilizer_child_posts_results[$child_post_counter]['post_id'];

	 $prtnrpost = get_post($child_posts_id);

	 $get_post_status = $prtnrpost->post_status;
	 $get_post_type = $prtnrpost->post_type;

	
	
	 // seperates array for child post types

	 if( $get_post_type == "stories-strategy" &&  $get_post_status == "publish" ){

		$strategy_results[] = $child_posts_id;
		  
	 }
	 if( $get_post_type == "stories-feature" && $get_post_status == "publish" ){
		$featured_results[] = $child_posts_id;
		//  $count_child_posts = count( $mobilizer_child_posts_results );
	 }

	 if( $get_post_type == "story-testimonial" && $get_post_status == "publish" ){
		$testimo_results[] = $child_posts_id;
		//  $count_child_posts = count( $mobilizer_child_posts_results );
	 }
}

//print_r($strategy_results );
    
	 
      $count_child_posts1= count( $strategy_results );

	  for( $child_post_count = 0; $child_post_count < $count_child_posts1; $child_post_count++ ){
               
			   // getting post id
			 $child_post_id = $strategy_results[$child_post_count];
			  
		  $get_post_status = get_post_status ( $child_post_id );
			   $get_post_type = get_post_type( $child_post_id );
			   //echo $child_post_id;
			   // displys only published posts and updates of current update post type only
			  
				if($get_post_status=='publish'){
				$post_strategy = get_post($child_post_id); ?>
             <li>
			 <span>0<?php echo $child_post_count+1;?></span>
			 <h3><?php echo $post_strategy->post_title; ?></h3>
			 <p><?php echo $post_strategy->post_content; ?> </p>	
			</li>
            <?php  }} ?>

		 
		 </ul>
		</div>
	</section>

	<section class="wp_dliver_engagment">
	<div class="container">
      <div class="row">
	  <div class="col-md-12"> 
		 <h2>WOOP delivers deep engagement </h2>
		 </div> 
	 <div class="col-md-12"> 
		<ul>
<?php
		$count_child_posts2= count( $featured_results );

for( $child_post_count = 0; $child_post_count < $count_child_posts2; $child_post_count++ ){
		 
		 // getting post id
	   $child_post_id = $featured_results[$child_post_count];
		
	     $get_post_status = get_post_status ( $child_post_id );
		 $get_post_type = get_post_type( $child_post_id );
		 //echo $child_post_id;
		 // displys only published posts and updates of current update post type only
		
		  if($get_post_status=='publish'){
		  $post_feat = get_post($child_post_id); ?>

		 <li>
		 <div class="wp_center">
		 <h5><?php echo $post_feat->post_content; ?> </h5>
         <p> <?php echo $post_feat->post_title; ?> </p>	 
		 </div>	 	
		 </li>
		 <?php  }} ?>	
		 </ul>
		  </div>  
	  </div>
		</div>
	
 </section>	

 <section class="read_stories_sec user-generate-content">
    <div class="container">
      <div class="row">
        <h2>User generated content</h2>
		<p>
		<?php echo get_post_meta( get_the_ID(),'wpcf-user-generated-text',true);?>
		
		 </p>

		      <div class="story-slider individual-slider">
			  <?php 
 $sliders =get_post_meta( get_the_ID(),'wpcf-user-generated-images');
$tot=count($sliders);
			  
foreach ((array)$sliders as $sliderimgs) {?>
              <div>
              <div class="story-slider-img">
             <img src="<?php echo $sliderimgs;?>">
              </div>
	       </div>
            
<?php }?>
              
		  
      </div>
    </div>
  </section>
  <section class="impact-campaign jnd" id="scroll_now">
    <div class="container">
      <div class="row">
        <div class="col-md-6 jnd_A">
          <h2>The impact of the campaign</h2>
        </div>
        <div class="col-md-6 jnd_A">
          <p><?php echo get_post_meta( get_the_ID(), "wpcf-the-impact-of-the-campaign", true );?> </p>
        </div>
        <div class="col-md-12">
          <div class="jnd_B">
            <div class="row">
              <div class="col-md-4">
                <div class="jnd_B_A">
                  <img src="<?php echo get_template_directory_uri();?>/images/engage-with-brands.jpg" alt="">
                  <div class="jnd_B_A_txt">
                    <h4> <span>2293</span> <br>
                    Brand content shared</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="jnd_B_A">
                  <img src="<?php echo get_template_directory_uri();?>/images/win-rewards.jpg" alt="">
                  <div class="jnd_B_A_txt">
                    <h4> <span>200</span> <br>Reviews written </h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="jnd_B_A">
                  <img src="<?php echo get_template_directory_uri();?>/images/help-educate.jpg" alt="">
                  <div class="jnd_B_A_txt">
                    <h4> <span>2,000</span> Appointments taken</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php 
			$count_child_posts3= count( $testimo_results ); if($count_child_posts3>0) { ?>
  <section class="client_sec">
    <div class="container">
      <div class="row">
        <div class="rwrd_wrp">
          <h2>Hear from our clients</h2>
          <div class="rwrd_sld">
            <div class="rwrd_sldrcli">

<?php
for( $child_post_count = 0; $child_post_count < $count_child_posts3; $child_post_count++ ){
		 
		 // getting post id
	   $child_post_id = $testimo_results[$child_post_count];
		
	     $get_post_status = get_post_status ( $child_post_id );
		 $get_post_type = get_post_type( $child_post_id );
		 //echo $child_post_id;
		 // displys only published posts and updates of current update post type only
		
		  if($get_post_status=='publish'){
		  $post_testi = get_post($child_post_id); 
		  $featured_img_url = get_the_post_thumbnail_url($child_post_id,'full');  
		//   print_r($post_testi);
		  
		  ?>
	       <div class="rwrd_crd">
                 <div class="crd_hd_prf"> <img src="<?php echo $featured_img_url;?>" alt=""> </div>
                <div class="rwrd_crd_bd">
                  <h4><?php echo  $post_testi->post_title; ?></h4>
                  <span><?php echo  $post_testi->post_excerpt; ?></span>
				  <p>
				  “ <?php echo  $post_testi->post_content; ?>”
				  </p>
				  <a class="watch-video_btn" href="#"> <span><img src="images/play-button.svg" alt=""></span> Watch Video</a>
                </div>
			  </div>
			  <?php  }} ?>

			
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

		  <?php } ?>

	

<?php
get_footer();?>

<script>
$(document).ready(function(){
  $(".jnd_B_A").mouseenter(function(){
    $(this).addClass("hoverdiv");
  });
$(".jnd_B_A").mouseleave(function(){
    $(this).removeClass("hoverdiv");
  });		
});
</script>
<script type="text/javascript">
     $('.story-slider').slick({
	  centerMode: true,
	  centerPadding: '60px',
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
           responsive: [
         {
         breakpoint: 767,
         settings: {
	  centerMode: true,
	  centerPadding: '60px',
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
         }
         },
         ]
         });  

	</script>
	
	<script type="text/javascript">
    $('.client_sec .rwrd_sldrcli').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
           responsive: [
         {
         breakpoint: 767,
         settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
         }
         },
         ]
         });  

  </script>
	