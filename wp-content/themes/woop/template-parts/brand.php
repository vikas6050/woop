<?php
/**
 * Template Name: Brand
 *
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
    <div class="brnCnt">
    <?php
	while ( have_posts() ) : the_post();
	the_content();
	endwhile; // End of the loop. 
    wp_reset_query();
			?>	
		<h2  class="number counter3">2,339,749</h2>
        <h5>user engagement actions and counting</h5><br><br>
	  <a class="primary_btn request-btn" href="<?php echo get_site_url();?>/brand/#partner-with_us">Request demo</a>
      <a class="primary_btn" href="#" data-toggle="modal" data-target="#discoverModal"> <span><img src="<?php echo get_template_directory_uri();?>/images/play-button.svg" alt="Play button"></span> DISCOVER HOW</a>
    </div>
    <div class="scrl_dwn">
      <a href="#scroll_now"><img src="<?php echo get_template_directory_uri();?>/images/chevron.svg" alt="Scroll down"></a>
    </div>
  </section>

 <section class="woop_en_roi"  id="scroll_now">
     <div class="container">
	 <?php $roiintro= get_post_meta( 79, 'wpcf-marketing-roi-intro', true);
	 echo $roiintro;
	 ?>     
     <ul>
     <?php  
 $roi = array(
  'post_type'		=> 'roi',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$roires = new WP_Query( $roi );


if( $roires->have_posts() ): 
	while( $roires->have_posts() ) : $roires->the_post(); 
    $post_id = get_the_ID() ;
   
    
?>
	 <li>
	 <span><?php if(has_post_thumbnail()){
                the_post_thumbnail('full');  } ?></span>
	 <h5><?php the_title(); ?></h5>
	 <p>	<?php echo get_the_content(); ?> </p>
	 </li>	 
     <?php
    endwhile;   wp_reset_query(); endif; ?>
	 </ul>
	<div class="reqst-sec">
		<a href="<?php echo get_site_url();?>/brand/#partner-with_us">Request a demo</a>
		 </div>
	 </div>
	 </section>

  <section class="woop_deliver">
	    <div class="woop_bg">
		<div class="container">
		
        <h2><?php echo get_post_meta(79, 'woopdeliverstxt', true); ?></h2>		
        <div class="woop_video">
		<iframe width="100%" height="474" src="<?php echo get_post_meta(79, 'woopdeliversiframeurl', true); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		</div>
		</div>
		
 </section>




     <section class="success_stories">
	 <div class="container">
	 <h2>Success Stories</h2>
	 </div>
		 <section class="wrapper">
			 <div class="mobsep">  
			  <div class="mobtab-li">
				
	 <ul class="tabs" id="viewContainer">
		 <li class="active" id="style_tab" click_val="0">APPLIANCES</li>
		 <li id="food_tab" click_val="0">HEALTH</li>
		 <li  id="beauty_tab" click_val="0">BEAUTY</li>
		 <li id="care_tab" click_val="0">MOTHERCARE</li>	
		<li id="fashion_tab" click_val="0">HOME</li>
		
			
		
	 </ul>
			 </div>
			 </div>

	 <ul class="tab__content">
	 <?php  
 $fashion = array(
  'post_type'		=> 'success-story',
  'cat' => 10,
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$fashionres = new WP_Query( $fashion );
?>
		<li  class="active">
		<?php	if( $fashionres->have_posts() ): 
while( $fashionres->have_posts() ) : $fashionres->the_post(); 
$faspost_id = get_the_ID() ;
$ftlogo=get_post_meta( $faspost_id, "wpcf-success-brand-logo", true ); 
$listimg=get_post_meta( $faspost_id, "wpcf-success-story-listing-image", true ); 
$videourl=get_post_meta( $faspost_id, "wpcf-vediourl", true ); 	
$keypoints=get_post_meta( $faspost_id, "wpcf-key-points", true ); 			

  ?>
			<div class="content__wrapper">
				<div class="success_container"> 
				<div class="row">
				<div class="col-md-4">
				<div class="beauty-img"><img src="<?php echo $listimg;?>" alt="<?php the_title(); ?>"></div>	
				</div>
				<div class="col-md-8">
					<div class="suces_cont">
					<span class="suces_brnd_lgo"><img src="<?php echo $ftlogo;?>" alt="logo"></span>	
					<h4>CASE STUDY</h4>
					<h3><?php the_title(); ?></h3>
					<p class="sm-text"> <?php echo get_the_excerpt();?></p>
					<br>	
					<h5>Objectives</h5>
					<?php echo get_the_content(); ?>
					<?php 
					if($keypoints!=''){
					echo $keypoints;
					}
					?>
				<?php if($videourl!=''){?>
					<a class="theme_btn" href="<?php //echo get_permalink($faspost_id);?>" data-toggle="modal" data-target="#sucModal" data-paragraphs="<?php echo $videourl;?>"> View Case Study</a>
					<?php }?>
					<!--<a class="case-study_btn" href="<?php echo site_url();?>/more-success-stories"> MORE CASE STUDIES IN BEAUTY </a>-->
					</div>
					
				</div>
				</div>
				</div>
			</div>
			<?php   endwhile;   wp_reset_query(); endif; ?>  
		</li>



<?php  
 $beauty = array(
  'post_type'		=> 'success-story',
  'cat' => 11,
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$beautyres = new WP_Query( $beauty );
?>


		<li>
			<?php 
			if( $beautyres->have_posts() ): 
while( $beautyres->have_posts() ) : $beautyres->the_post(); 
$btpost_id = get_the_ID() ;
$btlogo=get_post_meta( $btpost_id, "wpcf-success-brand-logo", true ); 
$listimg=get_post_meta( $btpost_id, "wpcf-success-story-listing-image", true ); 
$videourl=get_post_meta( $btpost_id, "wpcf-vediourl", true ); 
$keypoints=get_post_meta( $btpost_id, "wpcf-key-points", true ); 			
  ?>
			<div class="content__wrapper">
				<div class="success_container"> 
				<div class="row">
				<div class="col-md-4">
				<div class="beauty-img"><img src="<?php echo $listimg; ?>" alt="<?php the_title(); ?>"></div>	
				</div>
				<div class="col-md-8">
					<div class="suces_cont">
					<span class="suces_brnd_lgo"><img src="<?php echo $btlogo;?>" alt="logo"></span>
					<h4>CASE STUDY</h4>
					<h3><?php the_title(); ?></h3>
					<p class="sm-text"> <?php echo get_the_excerpt();?></p>
					<br>	
					<h5>Objectives</h5>
					<?php echo get_the_content(); ?>
					<?php 
					if($keypoints!=''){
					echo $keypoints;
					}
					?>
				<?php if($videourl!=''){?>
					<a class="theme_btn" href="<?php //echo get_permalink($faspost_id);?>" data-toggle="modal" data-target="#sucModal" data-paragraphs="<?php echo $videourl;?>"> View Case Study</a>
					<?php }?>
					<!--<a class="case-study_btn" href="<?php echo site_url();?>/more-success-stories"> MORE CASE STUDIES IN BEAUTY </a>	-->
					</div>
					
				</div>
				</div>
				</div>
			</div>
				<?php   endwhile;   wp_reset_query(); endif; ?>  
		</li>
	

		<?php  
 $mother = array(
  'post_type'		=> 'success-story',
  'cat' => 8,
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$motherres = new WP_Query( $mother );
?>


		<li>
			<?php if( $motherres->have_posts() ): 
while( $motherres->have_posts() ) : $motherres->the_post(); 
$mcpost_id = get_the_ID() ;
$mclogo=get_post_meta( $mcpost_id, "wpcf-success-brand-logo", true ); 
$listimg=get_post_meta( $mcpost_id, "wpcf-success-story-listing-image", true );
$videourl=get_post_meta( $mcpost_id, "wpcf-vediourl", true ); 
$keypoints=get_post_meta( $mcpost_id, "wpcf-key-points", true ); 			
  ?>
			<div class="content__wrapper">
				<div class="success_container"> 
				<div class="row">
				<div class="col-md-4">
				<div class="beauty-img"><img src="<?php echo $listimg; ?>" alt="<?php the_title(); ?>"></div>	
				</div>
				<div class="col-md-8">
					<div class="suces_cont">
					<span class="suces_brnd_lgo"><img src="<?php echo $mclogo;?>" alt="logo"></span>
					<h4>CASE STUDY</h4>
					<h3><?php the_title(); ?></h3>
					<p class="sm-text"> <?php echo get_the_excerpt();?></p>
					<br>	
					<h5>Objectives</h5>
					<?php echo get_the_content(); ?>
					<?php 
					if($keypoints!=''){
					echo $keypoints;
					}
					?>
				<?php if($videourl!=''){?>
					<a class="theme_btn" href="<?php //echo get_permalink($faspost_id);?>" data-toggle="modal" data-target="#sucModal" data-paragraphs="<?php echo $videourl;?>"> View Case Study</a>
					<?php }?>
					<!--<a class="case-study_btn" href="<?php echo site_url();?>/more-success-stories"> MORE CASE STUDIES IN BEAUTY </a>-->
					</div>
					
				</div>
				</div>
				</div>
			</div>
			<?php   endwhile;   wp_reset_query(); endif; ?>  
		</li>
		
		<?php  
 $life = array(
  'post_type'		=> 'success-story',
  'cat' => 9,
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$liferes = new WP_Query(  $life );
?>

		<li>
			<?php if( $liferes->have_posts() ): 
while( $liferes->have_posts() ) : $liferes->the_post(); 
$lipost_id = get_the_ID() ;
$lilogo=get_post_meta( $lipost_id, "wpcf-success-brand-logo", true ); 
$listimg=get_post_meta( $lipost_id, "wpcf-success-story-listing-image", true );
$videourl=get_post_meta( $lipost_id, "wpcf-vediourl", true ); 
$keypoints=get_post_meta( $lipost_id, "wpcf-key-points", true ); 			
  ?>
			<div class="content__wrapper">
				<div class="success_container"> 
				<div class="row">
				<div class="col-md-4">
				<div class="beauty-img"><img src="<?php echo $listimg; ?>" alt="<?php the_title(); ?>"></div>	
				</div>
				<div class="col-md-8">
					<div class="suces_cont">
					<span class="suces_brnd_lgo"><img src="<?php echo $lilogo;?>" alt="logo"></span>
					<h4>CASE STUDY</h4>
					<h3><?php the_title(); ?></h3>
					<p class="sm-text"> <?php echo get_the_excerpt();?></p>
					<br>	
					<h5>Objectives</h5>
					<?php echo get_the_content(); ?>
						<?php 
					if($keypoints!=''){
					echo $keypoints;
					}
					?>
				<?php if($videourl!=''){?>
					<a class="theme_btn" href="<?php //echo get_permalink($faspost_id);?>" data-toggle="modal" data-target="#sucModal" data-paragraphs="<?php echo $videourl;?>"> View Case Study</a>
					<?php }?>
					<!--<a class="case-study_btn" href="<?php echo site_url();?>/more-success-stories"> MORE CASE STUDIES IN BEAUTY </a>-->
					</div>
					
				</div>
				</div>
				</div>
			</div>
				<?php   endwhile;   wp_reset_query(); endif; ?>  
		</li>
	
		<?php  
 $food = array(
  'post_type'		=> 'success-story',
  'cat' => 7,
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$foodres = new WP_Query( $food );
?>

		<li>
			
		<?php	if( $foodres->have_posts() ): 
while( $foodres->have_posts() ) : $foodres->the_post(); 
$fdpost_id = get_the_ID() ;
$fdlogo=get_post_meta( $fdpost_id, "wpcf-success-brand-logo", true ); 
$listimg=get_post_meta( $fdpost_id, "wpcf-success-story-listing-image", true );
$videourl=get_post_meta($fdpost_id, "wpcf-vediourl", true ); 
	$keypoints=get_post_meta( $fdpost_id, "wpcf-key-points", true ); 			
  ?>
			<div class="content__wrapper">
				<div class="success_container"> 
				<div class="row">
				<div class="col-md-4">
				<div class="beauty-img"><img src="<?php echo $listimg; ?>"></div>	
				</div>
				<div class="col-md-8">
					<div class="suces_cont">
					<span class="suces_brnd_lgo"><img src="<?php echo $fdlogo;?>"></span>
					<h4>CASE STUDY</h4>
				
					<h3><?php the_title(); ?></h3>
					<p class="sm-text"> <?php echo get_the_excerpt();?></p>
					<br>	
					<h5>Objectives</h5>
					<?php echo get_the_content(); ?>
					<?php 
					if($keypoints!=''){
					echo $keypoints;
					}
					?>
					<?php if($videourl!=''){?>
					<a class="theme_btn" href="<?php //echo get_permalink($faspost_id);?>" data-toggle="modal" data-target="#sucModal" data-paragraphs="<?php echo $videourl;?>"> View Case Study</a>
					<?php }?>
					<!--<a class="case-study_btn" href="<?php echo site_url();?>/more-success-stories"> MORE CASE STUDIES IN BEAUTY </a>-->
					</div>
					
				</div>
				</div>
				</div>
			</div>
				<?php   endwhile;   wp_reset_query(); endif; ?>  
		</li>
	 </ul>
     </section>
		 	 <div class="modal homemodal" id="sucModal" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body urliframe">
	 
	  
      </div>
		 
	</section> 
   
     <section class="trustd_brand">
	<div class="brd_backbg"> 
    <div class="container">
      <div class="row">
        <div class="col-md-12">

        <?php echo get_post_meta( 79, 'wpcf-leading-brand-info', true); ?>
		  <?php  
 $brand  = array(
  'post_type'		=> 'woop-brand',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC',
  'tax_query' => array(
    array (
        'taxonomy' => 'post_tag',
        'field' => 'slug',
        'terms' => 'leading-brand',
    )
),
);
$brandres = new WP_Query( $brand );?>
<ul class="desktop-logos">
 <?php $brandres->found_posts;
if( $brandres->have_posts() ):  $bcnt=1;
			
	while( $brandres->have_posts() ) : $brandres->the_post(); 
	$brdpost_id = get_the_ID() ;
?>

         
          <li> <?php if(has_post_thumbnail()){ the_post_thumbnail('full');  } ?> </li>
			<?php $bcnt++;  endwhile;   wp_reset_query(); endif; ?>
          </ul>
	
<div class="logos_mobile-sec">
		 <?php 
if( $brandres->have_posts() ):  $bcnt=1;
			
	while( $brandres->have_posts() ) : $brandres->the_post(); 
	$brdpost_id = get_the_ID() ;
	
if($bcnt%6==1){ echo '<div><ul>'; }
?>

         
          <li> <?php if(has_post_thumbnail()){ the_post_thumbnail('full');  } ?> </li>
	<?php if($bcnt%6==0){ echo '</ul></div>'; }?>
	<?php $bcnt++;  endwhile; if($bcnt%6 != 1) echo "</ul></div>"; 
	wp_reset_query(); endif; ?>
			
			
  </div>			

        </div>
      </div>
	 </div>
    </div>
  </section>

  <section class="client_sec">
    <div class="container">
      <div class="row">
        <div class="rwrd_wrp">
          <h2>Hear from our clients</h2>
          <div class="rwrd_sld">
            <div class="rwrd_sldrcli">

            <?php  
 $clttest  = array(
  'post_type'		=> 'client-testimonial',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$clttestres  = new WP_Query( $clttest  );
if( $clttestres->have_posts() ):  $tcnt=1;
	while( $clttestres->have_posts() ) : $clttestres->the_post(); 
	$testpost_id = get_the_ID() ;
	$videourl=get_post_meta( $testpost_id, "wpcf-vediourl", true ); 
?>

              <div class="rwrd_crd">
				   <div class="row rwrd_crd_bd">
				   <div class="col-md-12 col-5"><div class="crd_hd_prf"><?php if(has_post_thumbnail()){ the_post_thumbnail('full');  } ?> </div></div>
				   <div class="col-md-12 col-7">
				   <h4><?php the_title(); ?></h4>
                   <span><?php the_excerpt();?></span>
				   </div>  
				   </div>
				  
                <div class="rwrd_crd_bd">
                  <?php echo get_the_content(); ?>
					 <?php if($videourl!=''){?>
				  <a class="watch-video_btn" href="#" data-toggle="modal" data-target="#testiModal" data-paragraphs="<?php echo $videourl;?>"> 
				  <span><img src="<?php echo get_template_directory_uri();?>/images/play-buttonpink.svg" alt=""></span> Watch Video</a>
				  <?php }?>
                </div>
              </div>
				
              <?php $tcnt++;  
endwhile;   wp_reset_query(); endif; ?>
				
			
            </div>
          </div>
        </div>
      </div>
    </div>
	  <div class="modal homemodal" id="testiModal" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body urliframe">
	 
	  
      </div>
  </section>


  <section class="why_cnlve_wp">
	<div class="woop_bg">
		<div class="container">
			<h2>Hear why Consumers love WOOP</h2>
			<div class="woop_video">
				<!-- 13-03-2020-->
	
				 <?php $vidurlluv=get_post_meta( 79, 'wpcf-why-consumers-video-url', true ); //13-03-2020	?>
				
			<iframe width="100%" height="474" src="<?php echo $vidurlluv;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
				
		   </div>

			<div class="testimonial-slider">

				<div class="content-shrinker">
	

				<div class="slider-for">

						<?php  
						$fbpost  = array(
						 'post_type'		=> 'fb-testimonial',
						 'post_status' => 'publish',
						 'posts_per_page' => -1,
						 'orderby' => 'ID',
						 'order' => 'DESC'
					   );
					   $fbpostres = new WP_Query( $fbpost );
					   $fbpostres2 = new WP_Query( $fbpost );
					   if( $fbpostres->have_posts() ):  $cnt=1;
						   while( $fbpostres->have_posts() ) : $fbpostres->the_post(); 
						   $post_id = get_the_ID() ;
						   $starcount=	get_post_meta( $post_id, "wpcf-star-count", true );    
						   $post_date = get_the_date( 'd/m/Y' );
						   $fburl=get_post_meta( $post_id, "wpcf-facebook-url", true ); 
					      $medname=get_post_meta( $post_id, "wpcf-socialmedia-name", true ); 
                          $iconimg=get_post_meta( $post_id, "wpcf-social-media-icon-url", true ); 
						   ?>	


					<div>		
						<div  id="rvw_aa">
							<div class="rvw_tb_pn">
									<div class="rvw_str">
											<?php for($j=1;$j<=$starcount;$j++){?>
										<img src="<?php echo get_template_directory_uri();?>/images/star.svg" alt="">
											<?php }?>
								<div class="rvw_fb">
									<a href="<?php echo $fburl;?>" target="_blank">  <img src="<?php echo $iconimg;?>" alt=""></a>
								</div>
								<?php the_content(); ?> 
								<label><?php echo $post_date;?> on <?php echo $medname;?></label>
							</div>
						</div>
					</div>
					</div>

					<?php $cnt++;  
					endwhile;   wp_reset_query(); endif; ?>


				</div>

				<div class="slider-nav">
						<?php if( $fbpostres2->have_posts() ): 

						$cnt2=1;
						while( $fbpostres2->have_posts() ) : $fbpostres2->the_post(); 
						$post_id = get_the_ID() ;
						$featured_img_url = get_the_post_thumbnail_url($post_id,'full'); 
						?>

					<div>			
						<div class="rvw_tb_A">
							<div class="rvw_tb_img">
									<img src="<?php echo $featured_img_url;?>" alt=""></div>
								<h5><?php the_title(); ?></h5>
						</div>
					</div>
				
					
					<?php $cnt2++;  
endwhile;   wp_reset_query(); endif; ?>
					
				</div>


			</div>

		</div>
		</div>
	</div>
</section>








  <section class="why_cnlve_wp" style="display:none;">
	    <div class="woop_bg">

	<div class="container">
		<h2>Hear why Consumers love WOOP</h2>
		<div class="woop_video">
	<!--	<video  controls style="width: 100%; height: auto; margin:0 auto; frameborder:0;" poster="<?php echo get_site_url();?>/wp-content/uploads/2020/01/woop_customers_love.png">
          <source src="<?php echo get_template_directory_uri();?>/images/woop-alltogether.mp4" type="video/mp4">
       </video>-->
			<iframe width="100%" height="474" src="https://www.youtube.com/embed/fkwV31A1oD0?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	   </div>

				
		<div class="slider-ts">	
			<!--repeatstart-->	

		<div class="rvw">
            <div class="rvw_A ">
              <div class="tab-content">
              <?php  
 $fbpost  = array(
  'post_type'		=> 'fb-testimonial',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$fbpostres = new WP_Query( $fbpost );
if( $fbpostres->have_posts() ):  $cnt=1;
	while( $fbpostres->have_posts() ) : $fbpostres->the_post(); 
	$post_id = get_the_ID() ;
	$starcount=	get_post_meta( $post_id, "wpcf-star-count", true );    
	$post_date = get_the_date( 'd/m/Y' );
    $fburl=get_post_meta( $post_id, "wpcf-facebook-url", true ); 
  
	?>

			  

<div class="tab-pane <?php if($cnt==1){?>active <?php }?>" id="rvw_<?php echo $cnt;?>">
                  <div class="rvw_tb_pn">
                    <div class="rvw_str">
<?php for($j=1;$j<=$starcount;$j++){?>
					  <img src="<?php echo get_template_directory_uri();?>/images/star.svg" alt="">
<?php }?>
                    </div>
                    <div class="rvw_fb">
                      <img src="<?php echo get_template_directory_uri();?>/images/facebook-blue.svg" alt="">
					</div>
					<?php the_content(); ?> 
                    <label><?php echo $post_date;?> on Facebook</label>
                  </div>
				</div>


				<?php $cnt++;  
 endwhile;   wp_reset_query(); endif; ?>
			
              </div>
            </div>
            <div class="rvw_tb">
              <ul class="nav nav-pills row">


			  <?php  
 $fbpost2  = array(
  'post_type'		=> 'fb-testimonial',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$fbpostres2 = new WP_Query( $fbpost2 );
if( $fbpostres2->have_posts() ): 

	$cnt2=1;
	while( $fbpostres2->have_posts() ) : $fbpostres2->the_post(); 
	$post_id = get_the_ID() ;
	$featured_img_url = get_the_post_thumbnail_url($post_id,'full'); 
	?>


                <li class="col-4 col-md-4 <?php if($cnt2==1){?>active <?php }?>">
                  <a class="<?php if($cnt2==1){?>active <?php }?>" href="#rvw_<?php echo $cnt2;?>" data-toggle="tab" >
                    <div class="rvw_tb_A">
                      <div class="rvw_tb_img"> <img src="<?php echo $featured_img_url;?>" alt=""> </div>
                      <h5><?php the_title(); ?></h5>
                    </div>
                  </a>
				</li>
				<?php $cnt2++;  
endwhile;   wp_reset_query(); endif; ?>
               
              </ul>
            </div>
			
		  </div>
			<!--repeat-->
		  </div>

		</div>
		
		
		
		</div>	
 </section>	
 <section class="read_stories_sec">
    <div class="container">
      <div class="row">
    <?php echo   get_post_meta( 79, "wpcf-story-section-intro", true );    ?>
      
		<a class="story_btn" href="<?php echo site_url();?>/impact-stories">Read their stories</a>
		  
		      <div class="story-slider" style="display:none;">

              <?php  
 $story  = array(
  'post_type'		=> 'impact-story',
  'post_status' => 'publish',
  'posts_per_page' => 3,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$storyres = new WP_Query( $story );

if( $storyres->have_posts() ):  $cnt3=1;
	while( $storyres->have_posts() ) : $storyres->the_post(); 
    $strpost_id = get_the_ID() ;
	//$thumbimg=get_post_meta( $strpost_id, "wpcf-listing-page-image", true ); 
	 $bgimg=get_the_post_thumbnail_url($strpost_id,'full'); 
	?>
             <div>
              <div class="story-slider-img" style="background-image:url('<?php echo $bgimg;?>')">
						 
			 <?php //if(has_post_thumbnail()){ the_post_thumbnail('full');  } ?>
              </div>
              </div>

	  
			  <?php $cnt3++;  
endwhile;   wp_reset_query(); endif; ?>
           
 </div>
		  
	<div class="story-slider">
    <?php  $strimgs =get_post_meta( 264,'wpcf-inspires-gallery');
        if(!empty($strimgs[0])){ 
			foreach ((array)$strimgs as $strimg) {?>

              <div>
              <div class="story-slider-img" style="background-image:url('<?php echo $strimg;?>')">
			  </div>
              </div> 
       <?php } }?>	  
		  
		     </div> 
      </div>
		
		
		
    </div>
  </section>

  <section class="news_sec">
	<div class="container">
      <div class="row">
	  <div class="col-md-12"> <h2>In the news</h2></div>
	  <div class="col-md-12"> 
      <ul>
         <?php  
  $news  = array(
  'post_type'		=> 'woop-news',
  'post_status' => 'publish',
  'posts_per_page' => 6,
  'orderby' => 'date',
  'order' => 'DESC'
);
$newsres = new WP_Query( $news );

$countn = $newsres->found_posts;
if( $newsres->have_posts() ): $cntn=0;
	while( $newsres->have_posts() ) : $newsres->the_post(); 
    $post_id = get_the_ID() ;
    $redlink = get_post_meta( $post_id, 'wpcf-news-redirect-url', true);
    
?>
         <?php if( $redlink!=''){?>
		    <a href="<?php echo $redlink;?>" target="_blank">  <li>
			  <p><?php the_title(); ?></p>
			  <div class="newsbrand_detail">
			  <span><?php if(has_post_thumbnail()){
                the_post_thumbnail('full');  } ?></span>
			  </div>  
		      </li> </a>
              <?php } else {?>
                <li>
			  <p><?php the_title(); ?></p>
			  <div class="newsbrand_detail">
			  <span><?php if(has_post_thumbnail()){
                the_post_thumbnail('full');  } ?></span>
			  </div>  
              </li>
              <?php }?>

            <?php  $cntn++;
            endwhile;   wp_reset_query(); endif; ?>  
  
  
  <span class="news-row"></span>
		   
		  </ul>
       <a class="viwall_btn" href="press" >VIEW ALL </a>
		  
		
		  </div>
		</div>
	 </div>
 </section>	
 <section class="tried-tested_sec">
	<div class="container">
      <div class="row">
		  <div class="col-md-12"><h2>Tried and tested since 2011</h2></div>
		  <div class="col-md-2">
		  <span class="tried_img"><img src="<?php echo get_template_directory_uri();?>/images/advocaci.svg"></span>	  
          </div> 
		  <div class="col-md-10">
        <p>  <?php echo   get_post_meta( 79, "wpcf-mapintro", true );    ?>  </p>

		  </div>
		  <div class="wld_map"><img src="<?php echo get_template_directory_uri();?>/images/world.svg"></div>
		</div>
		</div>
	</section>

	
    <section class="team_woop_sec">
    <div class="container">
      <div class="row">
        <h2>The Team behind WOOP</h2>
		<p class="pd_20">Here’s to the people making this world a better place, one brand-conversation at a time.</p>
		
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
		  
		  
// displays slider for desktop and listing only for mobile
 	if(wp_is_mobile()){
	 	// any name 
		$slider_name = "team-slidermob";
 	}
 	else{
		$slider_name = "team-slider";
 	}
?>		  
		  

  <div class="<?php echo $slider_name;?> desk-only">	
	  <?php
	  if( $teamres->have_posts() ){ 
	 $cntt=1;
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


<div class="<?php echo $slider_name;?> mob-only">	
	  <?php
	  if( $teamres->have_posts() ){ 
	 $cntt=1;
     while( $teamres->have_posts() ) { $teamres->the_post(); 
    $post_id = get_the_ID() ;
    $lnlink = get_post_meta( $post_id, 'wpcf-linkedin', true);
    
?>
<?php if($cntt%3==1){ echo '<div>'; }?>
<?php if($cntt%3==1){ echo '<ul>'; }?>

		<li>
		<div class="wp-image">
		<span><?php if(has_post_thumbnail()){
                the_post_thumbnail('full');  } ?></span>
		</div>	
		<div class="wp-content">
				<div class="team-left-algn">
				<h5><?php the_title(); ?></h5>
				<p>	<?php the_content(); ?> </p>
				</div>
                <div class="team-rgt-algn"><span class="team_wp_icon">
				<?php if($lnlink!=''){?>	<a href="<?php echo $lnlink;?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri();?>/images/linkdin-icon.svg" target="_blank">
				    </a>
					<?php }?>
                </span></div>
		</div>
		</li> 
		<?php if($cntt%3==0){ echo '</ul>'; }?>
		<?php if($cntt%3==0){ echo '</div>'; }?>
		
	

		<?php  $cntt++; }
		if($cntt%3 != 1) echo "</ul>"; 
		if($cntt%3 != 1) echo "</div>"; 
          	};  wp_reset_query();?>   
  
  

	

</div>
<div id="partner-with_us">&nbsp;</div>
		  


		  
<!-- <?php if($countteam>6){?> <a class="story_btn" href="javascript:void(0)">LOAD MORE</a> <?php }?> -->
      </div>
    </div>
  </section>


  <section class="partner-with_us" >
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			 <div class="partner_fild-box">
				<h4>Partner with us</h4>
<!-- 				<form action="">
				<input type="text" class="form-partner" id="name" placeholder="Full Name" name="name">
				<input type="text" class="form-partner" id="company" placeholder="Company Name" name="company">
				<input type="email" class="form-partner" id="email" placeholder="Email Address" name="email">
				<input type="number" class="form-partner" id="mobile" placeholder="Mobile Number" name="mobile">
				</form> 
				<a class="theme_btn" href="#">request demo</a> -->
				 	<?php echo do_shortcode( '[contact-form-7 id="286" title="Request a Demo"]' ); ?>
			 </div>
			</div>
		</div> 
	</div>
  </section>







<?php get_footer();?>
<?php //$startday = new DateTime('2019-11-08');
	  
$cntdate=get_post_meta( 701, 'brand_startcounter_date', true );
$cntincramt=get_post_meta( 701, 'brand_counter_increment', true );	
$startday = new DateTime($cntdate);  
$today = new DateTime();
$days  = $today->diff($startday)->format('%a');
//$brandcnt= 4512783 + $days*50;
$brandcnt=get_post_meta( 701, 'brand_counter', true );
$brandcnt= $brandcnt + $days*$cntincramt;	 
	  ?>

<div class="modal homemodal" id="discoverModal" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
 
      <!-- Modal Header -->
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
 
      <!-- Modal body -->
      <div class="modal-body urliframe">
	 <?php $vidurl=get_post_meta( 79, 'wpcf-discover-now-video-url', true ); //13-03-2020	?>
	 
	  <iframe width="100%" height="500" src="<?php echo $vidurl;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
</div>
</div>
</div>

	  
	  
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
			tabWrapper.stop().animate({
				height: activeTabHeight
			}, 100, function() {
				
				// Fade in active tab
				activeTab.fadeIn();
				
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




    $('.client_sec .rwrd_sldrcli').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000,
           responsive: [
         {
         breakpoint: 767,
         settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
	  dots:true,
      autoplaySpeed: 5000,
         }
         },
         ]
         });  


</script>

<script type="text/javascript">
     $('.story-slider').slick({
	//  centerMode: true,
	//  centerPadding: '60px',
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
	  adaptiveHeight: true,
      autoplaySpeed: 4000,
           responsive: [
         {
         breakpoint: 767,
         settings: {
	  centerMode: true,
	  centerPadding: '60px',
      slidesToShow: 1,
	  adaptiveHeight: false,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000,
         }
         },
         ]
         });  
    </script>


<script>
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
	var brandcnt=<?php echo $brandcnt;?>;
	$({
		countNum: $('.counter3').text()
	}).animate({
		countNum: brandcnt  
	}, {
		duration: 2000,
		easing: 'linear',
		step: function () {
			$('.counter3').text(Math.ceil(this.countNum));
		},
		complete: function () {
			//$('.counter3').text("4,512,783 ");
			  var finamt= addCommas(brandcnt);
			//var finamt= numberWithCommas(brandcnt);
			$('.counter3').text(finamt);
		}
	});
	
  </script>

   <script>

function isVisible( row, container ){
	  var elementTop = $(row).offset().top,
       elementHeight = $(row).height(),
       containerTop = container.scrollTop(),
       containerHeight = container.height();
      return ((((elementTop - containerTop) + elementHeight) > 0) && ((elementTop - containerTop) < containerHeight));
}



   $(document).ready(function(){
   if ($(window).height() < 767){
	   
	$(window).scroll(function() {

	if ($(document).scrollTop() > 900) {
	if(isVisible($('section.partner-with_us'), $(window))){
		$('.reqst-sec').removeClass('fxd');
        }
	   else{
		$('.reqst-sec').addClass('fxd');
	   } 

    } 

	else {
      $('.reqst-sec').removeClass('fxd');
    }

  });

   }
   else {
      $(window).scroll(function() {
    if ($(document).scrollTop() > 650) {
     // $('.reqst-sec').addClass('fxd');
      
		if(isVisible($('section.partner-with_us'), $(window))){
		$('.reqst-sec').removeClass('fxd');
     
       }
	   else{

		$('.reqst-sec').addClass('fxd');
	   } 


    } else {
      $('.reqst-sec').removeClass('fxd');
    }
  });
   }
   });   
   </script>

<script>
$(document).ready(function(){
  $(".news_sec li").mouseenter(function(){
    $(this).addClass("show");
  });
  $(".news_sec li").mouseleave(function(){
    $(this).removeClass("show");
  });		
});
</script>

 <script type="text/javascript">
    $('.logos_mobile-sec').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
 dots: true,
      autoplaySpeed: 2000,
    });
  </script>

  <script>
		$('.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: true,
			adaptiveHeight: true,
			focusOnSelect: true,
			pauseOnHover:false,
			
			//autoplay:true,
			asNavFor: '.slider-nav'
			
		});
		$('.slider-nav').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '.slider-for',
			dots: true,
			centerMode: true,
			focusOnSelect: true,
			pauseOnHover:false,
			//autoplay:true,
			
			 responsive: [
         {
         breakpoint: 767,
         settings: {
			slidesToShow: 1,
			slidesToScroll: 1,
			asNavFor: '.slider-for',
			arrows: true,
			dots: true,
			centerMode: true,
			adaptiveHeight: false,
			focusOnSelect: false,
			//autoplay:true,
			 pauseOnHover:true,
         }
         },
         ]
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
			autoplaySpeed: 5000,
		 responsive: [
         {
         breakpoint: 767,
         settings: {
			 dots: true,
			 autoplay: false,
         }
         },
         ]
		});


  </script>

<script>
if( $( window ).width() <=767 ){	
	
	$("#viewContainer li").on("click", function() {
		var id = jQuery(this).attr('id');
		var click_val = jQuery(this).attr('click_val');
		click_val++;
		jQuery(this).attr('click_val',click_val);
		//alert(click_val);
		  var activeWidth = jQuery(this).width() / 2; // get active width center
		  var pos = jQuery(this).position().left; //get left position of active li

		//alert(pos);
		//pos = pos + 40;
		if (click_val % 2 === 0) {
			$('.mobtab-li').animate({

				scrollLeft: pos - 200
			});
			
			
		}
		
		else{
			$('.mobtab-li').animate({

				scrollLeft: pos
			});
			
		}
		jQuery('html, body').animate({ scrollTop: 0+2342 }, '7000', function () {
       			//alert("reached top");
       		});


	});
	
		  $(window).scroll(function() {
          if ($(document).scrollTop() > 2350) {
            $('.mobsep').addClass('fixed-bg2');
}
           else {
            $('.mobsep').removeClass('fixed-bg2');
          }

          if ($(document).scrollTop() >=3135) {
           
            $('.mobsep').removeClass('fixed-bg2');
            }
});


}


</script>
<script>
$("#testiModal").on('show.bs.modal', function(e) {
       var urllink = $(e.relatedTarget).attr("data-paragraphs");
	   $(".urliframe").html('<iframe width="100%" height="474" src="'+urllink+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>');
});
</script>
	  
<script>
$("#sucModal").on('show.bs.modal', function(e) {
       var urllink = $(e.relatedTarget).attr("data-paragraphs");
	   $(".urliframe").html('<iframe width="100%" height="474" src="'+urllink+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>');
});
</script>
	  
<script>
	/*var $thumbs = $('.slider-for, .slider-nav');
$thumbs
  .on ('mouseover', function () {
    $thumbs.slick ('pause');
  })
  .on ('mouseout', function () {
    $thumbs.slick ('play');
  });*/
	
</script>	


<script>	  
$("#discoverModal").on('hidden.bs.modal', function (e) {
    $("#discoverModal iframe").attr("src", $("#discoverModal iframe").attr("src"));
});	  
</script>	

<script>	  
$("#testiModal").on('hidden.bs.modal', function (e) {
    $("#testiModal iframe").attr("src", $("#testiModal iframe").attr("src"));
});	  
</script>	
<script>	  
$("#sucModal").on('hidden.bs.modal', function (e) {
    $("#sucModal iframe").attr("src", $("#sucModal iframe").attr("src"));
});	  
</script>


	  
	  
	  