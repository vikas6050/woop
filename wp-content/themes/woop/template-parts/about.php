<?php
/**
 * Template Name: About
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Fourteen 1.0
 */


get_header(); 

   if ( has_post_thumbnail() ) {

    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    }
    ?> 

    <section class="bnr">
	<img src="<?php echo $featured_img_url;?>" class="img-fluid">
    <!--<img src="<?php echo get_template_directory_uri();?>/images/woopabout.GIF" class="img-fluid">-->
    <div class="brnCnt">
      <h1>We aim to create a sustainable<br> source of funding for education<br> of the girl child</h1>
      <!--<h4 class="subbnr_hdr">Together we aim to create <span>50,00,000</span> school days.</h4>
      <a class="primary_btn" href="#"> <span><img src="<?php echo get_template_directory_uri();?>/images/play-button.svg" alt=""></span> DISCOVER HOW</a>
      <a class="fb_btn" href="#"> <span><img src="<?php echo get_template_directory_uri();?>/images/facebook.svg" alt=""></span> Join the movement</a>-->
    </div>
    <div class="scrl_dwn">
      <a href="#scroll_now"><img src="<?php echo get_template_directory_uri();?>/images/chevron.svg" alt=""></a>
    </div>
  </section>


	<section class="read_stories_sec" id="scroll_now">
    <div class="container">
      <div class="row">
      
      <?php
	while ( have_posts() ) : the_post();
	the_content();
	endwhile; // End of the loop. 
    wp_reset_query();
			?>	

        </div>
        </div>
		 <div class="story-slider">
    <?php  $strimgs =get_post_meta( get_the_ID(),'wpcf-inspires-gallery');
        if(!empty($strimgs[0])){   foreach ((array)$strimgs as $strimg) {?>

              <div>
              <div class="story-slider-img">
             <img src="<?php echo $strimg;?>">
              </div>
	
             </div>
            <?php } }?>



  </div>
</section>



  <section class="woop_deliver" id="scroll_now">
	<?php $vidurl=get_post_meta( 264, 'wpcf-about-video-url', true ); // 13-03-2020	?>  
	    <div class="woop_bg">
		<div class="container">
        <h2>Hear our co-founder talk about the birth of a <br> platform that helps make Marketing a Force for Good</h2>
        <div class="woop_video">
		<iframe width="100%" height="474" src="<?php echo $vidurl;?>?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		</div>
		</div>
		
 </section>

   <!---<section class="womens-opinion_sec">
	<div class="container">
      <div class="row">
	  <div class="col-md-12"> 
		 <div class="row">
			 <div class="col-md-5"><h2>Thoughts from a few Women Of Opinion</h2></div>
			 <div class="col-md-7"><p>Brands seek your time and attention. Your time has value. WOOP turns your valuable time into rewards for yourself and money for educating young girls. </p></div>
		 </div> 
	  </div>
	  <div class="col-md-12"> 
		 <ul>

     <?php  
 $thought  = array(
  'post_type'		=> 'thought',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$thoughtres = new WP_Query($thought );


if( $thoughtres->have_posts() ): 
	while( $thoughtres->have_posts() ) : $thoughtres->the_post(); 
    $post_idth = get_the_ID() ;
    $dept = get_post_meta( $post_idth, 'wpcf-department', true);
    
?>

		      <li>
			  <p>“<?php echo get_the_content(); ?>”</p>
			  <div class="newsbrand_detail">
			  <span><?php if(has_post_thumbnail()){
                  the_post_thumbnail('full');  } ?></span>
			  <div class="rght_align">
			  <h5><?php the_title(); ?></h5>
			  <span><?php echo get_the_excerpt(); ?></span>
			  <p><?php echo $dept;?></p>  
			  </div>  
			  </div>  
		      </li>
          <?php 
            endwhile;   wp_reset_query(); endif; ?> 
			  
		
		  </ul>
		  </div>
		</div>
	 </div>
 </section>	-->
	
 <!--<section class="team_woop_sec" >
    <div class="container">
      <div class="row">
        <h2>The Team behind WOOP</h2>
		<div class="subtxt">Here’s to the people making this world a better place, one brand-conversation at a time.</div>
		
		<ul class="pd_15">
    <?php  
 /*$team  = array(
  'post_type'		=> 'team',
  'post_status' => 'publish',
  'posts_per_page' => 6,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$teamres = new WP_Query($team );

$countteam = $teamres->found_posts;
if( $teamres->have_posts() ): $cntt=0;
	while( $teamres->have_posts() ) : $teamres->the_post(); 
    $post_id = get_the_ID() ;
    $lnlink = get_post_meta( $post_id, 'wpcf-linkedin', true);
    */
?>


		<li>
    <span><?php if(has_post_thumbnail()){
                the_post_thumbnail('full');  } ?></span>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-10">
				<h5><?php the_title(); ?></h5>
				<p>	<?php the_content(); ?> </p>
				</div>
			
        <div class="col-md-2"><span class="team_wp_icon">
		          	<a href="<?php echo $lnlink;?>" target="_blank">
                <img src="<?php echo get_template_directory_uri();?>/images/linkdin-icon.svg" target="_blank"></a>
                </span></div>
			</div>	
		</div>
		</li> 

    <?php /* $cntt++;
            endwhile;   wp_reset_query(); endif; */?>  
			
		</ul>
 </div>
 </div>
  </section>-->



  <section class="team_woop_sec">
    <div class="container">
      <div class="row">
      <h2>The Team behind WOOP</h2>
		<div class="subtxt">Here’s to the people making this world a better place, one brand-conversation at a time.</div>
		
		<?php  
 $team  = array(
  'post_type'		=> 'team',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$teamres = new WP_Query($team );
$countteam = $teamres->found_posts;
if( $teamres->have_posts() ){ 
	$cntt=1;
	
	// displays slider for desktop and listing only for mobile
 	if(wp_is_mobile()){
	 	// any name 
		$slider_name = "team-slidermob";
 	}
 	else{
		$slider_name = "team-slider";
 	}
?>
	  <div class="<?php echo $slider_name;?>">	
		
       
<?php


	while( $teamres->have_posts() ) { $teamres->the_post(); 
    $post_id = get_the_ID() ;
    $lnlink = get_post_meta( $post_id, 'wpcf-linkedin', true);
    
?>
<?php if($cntt%6==1){ echo '<div>'; }?>
<?php if($cntt%3==1){ echo '<ul>'; }?>

		<li>
		<span><?php if(has_post_thumbnail()){
                the_post_thumbnail('full');  } ?></span>
			<div class="col-md-12">
			<div class="row">
				<div class="col-md-10 col-8">
				<h5><?php the_title(); ?></h5>
				<p>	<?php the_content(); ?> </p>
				</div>
                <div class="col-md-2 col-4"><span class="team_wp_icon">
					<?php if($lnlink!=''){?>
					<a href="<?php echo $lnlink;?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri();?>/images/linkdin-icon.svg" target="_blank">
				    </a>
					<?php }?>
                </span></div>
			</div>	
		</div>
		</li> 
		<?php if($cntt%3==0){ echo '</ul>'; }?>
		<?php if($cntt%6==0){ echo '</div>'; }?>
		
	

		<?php  $cntt++; }
		if($cntt%3 != 1) echo "</ul>"; 
		if($cntt%6 != 1) echo "</div>"; 
          	};  wp_reset_query();?>   
  
	

</div>

		  

      </div>
    </div>
  </section>









  <section class="join-team_sec">
    <div class="container">
      <div class="row">
		<h2>Join our team</h2>
		  <p>By 2020, WOOP hopes to generate 1 billion engagement points, which will create 2 million school days and educate over 10,000 young girls. So if you too, believe, that community-marketing is the future of marketing,  join us in our journey.</p>  
        <div class="rwrd_wrp">
          <div class="rwrd_sld">
			  <?php
			  if(wp_is_mobile()){
				  // any name
				  $join_slider_name = "rwrd_sldrabt1";
				  $join_slider_class = "join_slider_mobile";
			  }
			  else{
				   $join_slider_name = "rwrd_sldrabt";
				  $join_slider_class = "";
			  }
			  ?>
            <div class="rwrd_sldrabt <?php echo $join_slider_class;?>" id="<?php echo $join_slider_name;?>">

            <?php  
$careers  = array(
  'post_type'		=> 'career',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'date',
  'order' => 'DESC'
);
$careersres = new WP_Query($careers);

if( $careersres->have_posts() ):
  while( $careersres->have_posts() ) : $careersres->the_post(); 
  $career_id = get_the_ID() ;
  $joblocation=get_post_meta( $career_id, 'wpcf-job-location', true);
?>

              <div class="rwrd_crd slick-slide">
                <div class="rwrd_crd_bd">
                  <h4><?php the_title(); ?></h4>
                  <span>Location: <?php echo $joblocation;?></span>
				  <p>
          <?php echo get_the_excerpt(); ?>
				  </p>
				  <div class="apply-btn" data-toggle="modal" data-target="#careerModal-<?php echo $career_id;?>">Learn More</div>
                </div>
              </div>


				
          <?php  endwhile;   wp_reset_query(); endif; ?>  
				
            </div>
          </div>
        </div>
      </div>
    </div>


<!-- modal pop starts-->
<?php if( $careersres->have_posts() ):
  while( $careersres->have_posts() ) : $careersres->the_post(); 
  $career_id = get_the_ID() ;
  $joblocation=get_post_meta( $career_id, 'wpcf-job-location', true);
  $linkedurl=get_post_meta( $career_id, 'wpcf-job-linkedin-url', true);	  
?>
<div class="modal careermodal" id="careerModal-<?php echo $career_id;?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
   
      <!-- Modal Header -->
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
	  <div class="back-btn mob-only" data-dismiss="modal">Back</div>
      <h4><?php the_title(); ?></h4>
      <p>Posted on: <?php echo get_the_date( 'd M y' )?></p>
    <div class="locat-text location-icon">Location<br/><b><?php echo $joblocation;?></b></div>
    <div class="locat-text type-icon">Job Type<br/><b><?php echo get_post_meta( $career_id, 'wpcf-job-type', true);?></b></div>
    <div class="locat-text exp-icon">Experience<br/><b><?php echo get_post_meta( $career_id, 'wpcf-job-experience', true);?></b></div>

    <h5>Job Description</h5>
    <div class="jobdesc">  <?php
        
         echo get_the_content();
         
              ?>	
    </div>

<h5>Requirements</h5>
<div class="jobelig"><?php echo get_post_meta( $career_id, 'wpcf-job-eligibility', true);?></div>
		  <?php if($linkedurl!=''){?>
<div class="linkdin-btn"><a href="<?php echo $linkedurl;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/linkedin-white.svg"><span>Apply with LinkedIn</span></a></div>
<?php }?>
 </div>

    </div>
  </div>
</div>
<?php  endwhile;   wp_reset_query(); endif; ?>  
<!-- modal pop ends-->



  </section>



<?php get_footer();?>
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
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
         }
         },
         ]
         });  

    </script>

<script type="text/javascript">
    $('#rwrd_sldrabt').slick({
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


     
$(document).ready(function(){
  $(".team_woop_sec li").mouseenter(function(){
    $(this).addClass("active");
  });
$(".team_woop_sec li").mouseleave(function(){
    $(this).removeClass("active");
  });		
});

</script>  
<script>
   

   $(".team-slider").slick({
     infinite: true,
         slidesToShow: 1,
           arrows:false,
          dots: true,
           autoplay: true,
           slidesToScroll: 1,
       autoplaySpeed: 2000,
	 
     });
 
 
   </script>