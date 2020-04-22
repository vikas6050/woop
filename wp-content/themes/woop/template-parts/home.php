<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Fourteen 1.0
 */


get_header(); ?>

<section class="bnr">
<?php if ( has_post_thumbnail() ) {

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
}
?>
	<img src="<?php echo $featured_img_url;?>" class="img-fluid">
	

    <div class="brnCnt">

	<?php
	while ( have_posts() ) : the_post();
	the_content();
	endwhile; // End of the loop. 
    wp_reset_query();
			?>	
	<p><?php echo get_post_meta( get_the_ID(),'wpcf-page_excerpt',true);?></p>
    <h5><?php echo get_post_meta( get_the_ID(),'wpcf-page-sub-heading',true);?></h5>
	
	<!--desktop-->
	<div class="d-none d-sm-block">
		<div class="boxes frstbx">
        <h2 class="number counter1"><?php echo get_post_meta( get_the_ID(),'wpcf-banner-counter1',true);?></h2>
        <h6><?php echo get_post_meta( get_the_ID(),'wpcf-banner-title1',true);?></h6>
      </div>
      <div class="boxes scndbx">
        <h2 class="number counter2"><?php echo get_post_meta( get_the_ID(),'wpcf-banner-counter2',true);?></h2>
        <h6><?php echo get_post_meta( get_the_ID(),'wpcf-banner-title2',true);?></h6>
      </div>
      <div class="boxes thrdbx">
        <h2 class="number counter3"><?php echo get_post_meta( get_the_ID(),'wpcf-banner-counter3',true);?></h2>
        <h6><?php echo get_post_meta( get_the_ID(),'wpcf-banner-title3',true);?></h6>
      </div>
	</div>
		
	
	
      
      <div class="link">
        <a class="primary_btn" href="#" data-toggle="modal" data-target="#discoverModal"> <span><img
              src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/Shape.svg" alt=""></span> DISCOVER HOW</a>
        <!-- <a class="fb_btn" href="#"> <span><img src="images/facebook.svg" alt=""></span> Join the movement</a> -->
      </div>

      <div class="cntnt d-none d-sm-block">
        <p><?php echo get_post_meta( get_the_ID(),'wpcf-banner-notice',true);?></p>
      </div>

		
     
    </div>
    <div class="scrl_dwn">
      <a href="#scroll_now"><img src="<?php echo get_template_directory_uri();?>/images/chevron.svg" alt="woop - Scroll"></a>
    </div>
  </section>

<!--philosophy section starts here-->
<!--mobile-->
<div class="mbl_bnr_ft">
	

	<div class="d-sm-none d-block">
		<div class="boxes frstbx">
        <h2 class="number counter1"><?php echo get_post_meta( get_the_ID(),'wpcf-banner-counter1',true);?></h2>
        <h6><?php echo get_post_meta( get_the_ID(),'wpcf-banner-title1',true);?></h6>
      </div>
      <div class="boxes scndbx">
        <h2 class="number counter2"><?php echo get_post_meta( get_the_ID(),'wpcf-banner-counter2',true);?></h2>
        <h6><?php echo get_post_meta( get_the_ID(),'wpcf-banner-title2',true);?></h6>
      </div>
      <div class="boxes thrdbx">
        <h2 class="number counter3"><?php echo get_post_meta( get_the_ID(),'wpcf-banner-counter3',true);?></h2>
        <h6><?php echo get_post_meta( get_the_ID(),'wpcf-banner-title3',true);?></h6>
      </div>
	</div>
    
    <div class="cntnt d-sm-none d-block">
        <p><?php echo get_post_meta( get_the_ID(),'wpcf-banner-notice',true);?></p>
      </div>
</div>

<?php
$philosophy_slug = 'our-philosophy';
$philosophy_obj = get_post_type_object( $philosophy_slug );

$philosophy_args = array(
                  'post_type'   => $philosophy_slug,
                  'post_status' => 'publish',
                  'numberposts' => 3,
                  'orderby'     =>'date',
                  'order'       =>'ASC'
                );
$philosophy_results = get_posts( $philosophy_args );

if( $philosophy_results ){
	?>
	<section class="Philosophy" id="scroll_now">
		<div class="container">
		  <div class="row">
			<div class="col-lg-12">
			  <h2><?php echo get_post_meta( 79, 'wpcf-philosophy-and-vision-title',true);?></h2>
			  <p class="frst"> <?php echo get_post_meta( 79, 'wpcf-philosophy-and-vision-content',true);?>
			  </p>
			</div>
		  </div>
		  <div class="row catogry">
			  <?php foreach( $philosophy_results as $philosophy_result ){
			        $philosophy_featured = get_the_post_thumbnail_url( $philosophy_result->ID );?>
					<div class="col-md-4">
						  <div class="wdth">
							<img src="<?php echo $philosophy_featured;?>" class="img-fluid" alt="<?php echo  $philosophy_result->post_title;?>">
						  </div>

			  			<h3><?php echo  $philosophy_result->post_title;?></h3>
			  			<p><?php echo  wp_trim_words(  $philosophy_result->post_content, 30,'...');?></p>
					</div>
	          <?php }?>
			
			
			

		  </div>
		</div>
	  </section>
<?php } ?>
<!--philosophy section ends here-->

<!--marketing roi section starts here-->
<section class="woop_en_roi home_woop">
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
    		endwhile;   
			wp_reset_query(); 
		endif; ?>
	 	</ul>
<!-- 		<div class="reqst-sec">
			<a href="<?php //echo get_site_url();?>/brand/#partner-with_us">Request a demo</a>
		 </div> -->
	 </div>
</section>
<!--marketing roi section ends here-->

<!--leading brand section starts here-->
<section class="brd home_brd">
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
						  'orderby' => 'date',
						  'order' => 'ASC',

						);
					$brandres = new WP_Query( $brand );?>
					<div class="logos_desk-sec">
						<ul>
 							<?php $brandres->found_posts;
							
							if( $brandres->have_posts() ):  $bcnt=1;
			
								while( $brandres->have_posts() ) : $brandres->the_post(); 
									$brdpost_id = get_the_ID() ;?>

         
          							<li> <?php if(has_post_thumbnail()){ the_post_thumbnail('full');  } ?> </li>
								<?php $bcnt++;  endwhile;   wp_reset_query(); 
							endif; ?>
							
          				</ul>
	
									
        			</div>
					<div class="logos_mobile-sec">
							<?php 
							if( $brandres->have_posts() ):  $bcnt=1;

								while( $brandres->have_posts() ) : $brandres->the_post(); 
									$brdpost_id = get_the_ID() ;

									if($bcnt%6==1){ echo '<div><ul>'; } ?>


									<li> <?php if(has_post_thumbnail()){ the_post_thumbnail('full');  } ?> </li>
									<?php if($bcnt%6==0){ echo '</ul></div>'; }?>
									<?php $bcnt++;  
								 endwhile; if($bcnt%6 != 1) echo "</ul></div>"; 
								 wp_reset_query(); 
							endif; ?>
			        	</div>
      			</div>
	 		</div>
		</div>
    </div>
</section>
<!--leading brands section ends here-->

<!--clients section starts here-->
<section class="client_sec home_client_sec">
    <div class="container">
      <div class="row">
        <div class="rwrd_wrp">
          <h2>Hear from our clients</h2>
          <div class="rwrd_sld">
            <div class="rwrd_slder">

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
					<!--single client starts here-->
					  <div class="rwrd_crd">

						 
						  <div class="rwrd_crd_bd">
							 <div class="row">
                               <div class="col-4 col-md-12">
							      <div class="crd_hd_prf">
							        <?php if(has_post_thumbnail()){ the_post_thumbnail('full');  } ?> 
						          </div>
							   </div>
							   <div class="col-8 col-md-12">
                                 <div class="mobile_view_client">
							       <h4><?php the_title(); ?></h4>
							   <span class="small_descr"><?php echo get_the_excerpt();?></span>
							  <!--gettingsponsor logo and country logo -->
							  <?php
							  $sponsor_logo = get_post_meta( get_the_ID(),'wpcf-sponsor-logo',true);
							  $country_logo = get_post_meta( get_the_ID(),'wpcf-country-logo',true);
							  
							   if( $sponsor_logo || $country_logo ) {?>
							  
								   <div class="small_pic">
										<img src="<?php echo $sponsor_logo;?>" alt="<?php echo get_the_title();?> - Sponsor">
										<img src="<?php echo $country_logo;?>" alt="<?php echo get_the_title();?> - Country">
								   </div>
							  <?php } ?>
							 </div>
                          </div>
								<div class="col-md-12"> 
							   <?php echo get_the_content(); ?>
							   <?php if($videourl!=''){?>
									<a class="watch-video_btn" href="#" data-toggle="modal" data-target="#testiModal" data-paragraphs="<?php echo $videourl;?>"> 
									<span><img src="<?php echo get_template_directory_uri();?>/images/play-buttonpink.svg" alt=""></span> Watch Video</a>
								<?php }?>
						   </div>  
						 </div>
					  </div>
				</div>
					 <!--single client starts here-->

					  <?php $tcnt++;  
					endwhile;   
					wp_reset_query(); 
				endif; ?>
				
			
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
<!--clients section ends here-->
			
<!--reward section starts here-->
			
<section class="jnd home_jnd">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2><?php echo get_post_meta(15,'wpcf-social-impact-with-innovation-title',true);?></h2>
          <?php echo get_post_meta(15,'wpcf-social-impact-with-innovation-content',true);?>
        </div>
        <div class="col-md-8">
          <div class="spnsr">
            <div class="progress-responsive">
              <figure>
                <div class="progress-responsive__bar" style="width: 8%;"></div>
                <div class="progress-responsive__percent"></div>
              </figure>
              <span class="ach"> <span class="number counter2">470,000</span> out of 15 million <span
                  class="light">achieved</span> </span>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
 <section class="rwrd home_rwrd">
    <div class="container">
      <div class="row">
        <div class="rwrd_wrp">
          
          <div class="rwrd_sld">
            <div class="rwrd_sldr">
			<?php  
				 $reward  = array(
				  'post_type'		=> 'reward',
				  'post_status' => 'publish',
				  'posts_per_page' => -1,
				  'orderby' => 'ID',
				  'order' => 'DESC'
				);
				$rewardres = new WP_Query( $reward );
				if( $rewardres->have_posts() ):  $cnt5=1;
					while( $rewardres->have_posts() ) : $rewardres->the_post(); 
						$rewardres_id = get_the_ID() ;
						?>

						<div class="rwrd_crd">
                			<div class="jnd_B_A">
								<?php
								$get_sponsor_logo = get_post_meta( $rewardres_id ,'wpcf-sponsor-flag',true);
								$get_country_logo = get_post_meta( $rewardres_id ,'wpcf-country-flag',true);
								$get_country_name = get_post_meta( $rewardres_id ,'wpcf-country-name',true);
								if( $get_sponsor_logo ){
									?>
									<div class="jnd_logo">
										<img src="<?php echo $get_sponsor_logo;?>" alt="">
									</div>
								<?php } ?>
								<?php if( $get_country_logo && $get_country_name ){ ?>
									<div class="jnd_cntry">
										<span> <img src="<?php echo $get_country_logo;?>" alt=""><?php echo $get_country_name;?>  </span>
									</div>
								<?php } ?>
								<img src="<?php echo get_the_post_thumbnail_url($rewardres_id);?>" alt="">
								<div class="jnd_B_A_txt">
                    				<h4><span> <?php the_excerpt();?> </span><br>
                      				<?php the_title();?></h4>
                  				</div>
                  
							</div>
				 		</div>
               

			  		<?php $cnt5++;  
					endwhile;   wp_reset_query(); 
				endif; ?>

          </div>
        </div>
      </div>
    </div>
</section>
<!--reward section ends here-->
	 
	 
<!--clients testimonial starts here-->

<section class="why_cnlve_wp home_why_cnlve_wp">
	<div class="woop_bg">  
   		 <div class="container">
			 
      		<div class="row">
        		<div class="col-lg-12">
          			<h2><?php echo get_post_meta(get_the_ID(), 'wpcf-hear-why-consumers-title', true); ?> </h2>
                    <p><?php echo get_post_meta(get_the_ID(), 'wpcf-hear-why-consumers-content', true); ?> </p>
				</div>
			 </div>
			 
			 <!--slider desktop starts here-->
			 
			 <div class="testimonial-slider rvw">
				<div class="content-shrinkerhme rvw_tb">
					<!--slick slider-->
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

									    <!--single item starts here-->
  										<div>		
    										<div  id="rvw_aa">
      											<div class="rvw_tb_pn rvw_tb_pn_b">
          											<div class="rvw_str">
              											<?php for($j=1;$j<=$starcount;$j++){?>
			   												<img src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/star.svg" alt="">
              											<?php }?>
        												<div class="rvw_fb">
           													<a href="<?php echo $fburl;?>" target="_blank"> <img src="<?php echo $iconimg;?>" alt=""></a>
        												</div>
        												<?php the_content(); ?> 
        												<label><?php echo $post_date;?> on <?php echo $medname;?></label>
      												</div>
    											</div>
  											</div>
  										</div>
                                        <!--single item ends here-->
  								<?php $cnt++;  
  								endwhile;   wp_reset_query(); 
						endif; ?>
					</div>
					<!--slick slider-->
					
					<!--navigation slider starts here-->
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
										  	<img src="<?php echo $featured_img_url;?>" alt="<?php the_title();?>">
										</div>
										<a><h5><?php the_title(); ?></h5>
										<h6><?php echo get_post_meta( $post_id,'wpcf-testimonial-designation',true);?></h6>
										</a>
										
									</div>
								 </div>

  
  								<?php $cnt2++;  
								endwhile;   wp_reset_query(); 
							endif; ?>
						</div>
						<!--navigation slider ends here-->

					</div>
				</div>
			 	<!--slider desktop ends here-->
			    <!--slider mobile starts here-->
			    <?php if( $fbpostres->have_posts() ){  ?>
			    <div class="consumers-love">
					<!--single item starts here-->
					<?php
	                 while( $fbpostres->have_posts() ) { $fbpostres->the_post(); 
						$post_id = get_the_ID() ;
						$starcount=	get_post_meta( $post_id, "wpcf-star-count", true );    
						$post_date = get_the_date( 'd/m/Y' );
						$fburl=get_post_meta( $post_id, "wpcf-facebook-url", true ); 
						$medname=get_post_meta( $post_id, "wpcf-socialmedia-name", true ); 
						$iconimg=get_post_meta( $post_id, "wpcf-social-media-icon-url", true ); ?>
          				<div>
							<div id="rvw_aa">
								<div class="rvw_tb_pn">
									<div class="rvw_str">
										<?php for($j=1;$j<=$starcount;$j++){?>
			   												<img src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/star.svg" alt="">
              							<?php }?>
									</div>
									<div class="rvw_fb">
										<a href="<?php echo $fburl;?>" target="_blank"> <img src="<?php echo $iconimg;?>" alt=""></a>
									</div>
									<p><?php the_content(); ?>
									</p>
									<label><?php echo $post_date;?> on <?php echo $medname;?></label>
								</div>
							</div>
						</div>
					  <?php } wp_reset_query();?>
          			<!--single item ends here-->
					
        		</div>
			    
			    <?php if( $fbpostres2->have_posts() ): ?>
					<div class="consumers_images">
						<?php
						while( $fbpostres2->have_posts() ) : $fbpostres2->the_post(); 
								$post_id = get_the_ID() ;
								$featured_img_url = get_the_post_thumbnail_url($post_id,'full'); 
    							?>
						<div>
							<div class="rvw_tb_A">
								<div class="rvw_tb_img"> <img src="<?php echo $featured_img_url;?>" alt="<?php the_title();?>"> </div>
								<h5><?php the_title();?></h5>
								<h6><?php echo get_post_meta( $post_id,'wpcf-testimonial-designation',true);?></h6>
							</div>
						</div>
                       <?php endwhile;   wp_reset_query(); ?>

					</div>
			    <?php endif;?>
			   <?php } // ends if?>
			    <!--slider mobile ends here--->
			 
			   
        
           </div>
       </div>    
</section>
<!--clients testimonial ends here--> 
	 
<!--team behind woop section starts here-->
<?php
$team_slug = 'team';
$team_obj = get_post_type_object( $team_slug );


$team  = array(
		 'post_type'		=> $team_slug,
		 'post_status' => 'publish',
		 'posts_per_page' => -1,
		 'orderby' => 'ID',
		 'order' => 'DESC'
	 );
$teamres = new WP_Query($team );
$countteam = $teamres->found_posts;
?>
<section class="team_woop_sec home_team_woop">
    <div class="container">
      <div class="row">
        <h2><?php echo get_post_meta( 79, 'wpcf-team-tile',true );?></h2>
        <p><?php echo get_post_meta( 79, 'wpcf-team-content',true );?></p>
		  <?php
		  
		 if( $teamres->have_posts() ){ 
			 ?>
			  <!--desktop starts here-->
			<div class="team_woop_desk-sec">
			  <ul>
				  <?php
				  while( $teamres->have_posts() ) { $teamres->the_post(); 
						$post_id = get_the_ID() ;
						$lnlink = get_post_meta( $post_id, 'wpcf-linkedin', true);
						$team_featured_url = get_the_post_thumbnail_url( $post_id);
						?>

						<li>
							<span class="team_img"><img src="<?php echo $team_featured_url;?>" alt="<?php echo get_the_title();?>"></span>
							<div class="col-md-12 pdng_inn">
								<div class="row">
									<div class="col-md-10">
										<h5><?php the_title();?></h5>
										<p><?php the_content(); ?></p>
									</div>
									<div class="col-md-2">
										<span class="team_wp_icon">
											<a
							href="<?php echo $lnlink;?>" target="_blank"> <img
							  src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/linkdin-icon.svg"> </a>
										</span>
									</div>
								</div>
							</div>
						</li>

					<?php } wp_reset_query();?>

				</ul>
			</div>
			<!--desktop ends here-->
			
		  	<!--mobile starts here-->
        	<div class="team_woop_mobile-sec">
				
				<?php
			    $mob_team_cntr = 1;
			   
			     while( $teamres->have_posts() ) { $teamres->the_post(); 
						$post_id = get_the_ID() ;
						$lnlink = get_post_meta( $post_id, 'wpcf-linkedin', true);
						$team_featured_url = get_the_post_thumbnail_url( $post_id);
						?><?php
												  
						if( $mob_team_cntr == 1 ||  $mob_team_cntr %3 == 1){ ?>
							<div>
            				<ul class="ul_css">
						<?php }
						?>
				
          		
              			<li class="li_css">
                			<div class="row">
                  				<div class="col-5 pl_0"><span class="team_img"><img src="<?php echo $team_featured_url?>" alt="<?php echo get_the_title();?>"></span></div>
                  					<div class="col-7">
                    					<div class="pdng_inn">
                      						<div>
                        						<h5><?php the_title();?></h5>
												<?php the_content();?>
                      						</div>
                      						<div>
												<span class="team_wp_icon">
													<a
                            href="<?php echo $lnlink;?>" target="_blank">
                            <img src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/linkdin-icon.svg"></a>
												</span>
											</div>
                    					</div>
                  					</div>
                				</div>
              				</li>

            			<?php if( $mob_team_cntr %3 == 0 ||  $mob_team_cntr == $countteam ){ ?>
								
							</ul>
								</div>
						<?php }
						?>
					    
             <?php $mob_team_cntr++; } wp_reset_query();?>
          
           </div>
		<?php } // ends if?>

      </div>
    </div>
  </section>

<!--team behind woop section ends here-->
	 
<!--news section starts here-->
<section class="news_sec home_news_sec">
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
<!--news section ends here-->
	 
<!--tested section starts here-->
<section class="tried-tested_sec home_tried-tested_sec">
	<div class="container">
      <div class="row">
		  <div class="col-md-12"><h2><?php echo get_post_meta( 79,'wpcf-test-reports-title',true );?></h2></div>
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
<!-- <div id="partner-with_us">&nbsp;</div> -->
<!--tested section ends here-->
	 
<!--global sites section starts here-->
<?php
$global_site_slug = 'global-site';
$global_site_obj = get_post_type_object( $global_site_slug );

$global_site_args = array(
                  'post_type'   => $global_site_slug,
                  'post_status' => 'publish',
                  'numberposts' => -1,
                  'orderby'     =>'date',
                  'order'       =>'ASC'
                );
$global_site_results = get_posts( $global_site_args );
if( $global_site_results ){
	?>
	<section class="woop_global_sites">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><?php echo get_post_meta( 79,'wpcf-global-site-tile',true );?></h2>
					<p><?php echo get_post_meta( 79,'wpcf-global-site-content',true );?></p>
				</div>
				<div class="col-md-12">
					<ul>
						<?php foreach( $global_site_results as $global_site_result ){
						   $get_global_site_featured = get_the_post_thumbnail_url( $global_site_result->ID );?>
							<li onclick="window.open('<?php echo $global_site_result->post_excerpt;?>')">
								<div class="newsbrand_detail">
									<img src="<?php echo $get_global_site_featured;?>" alt="<?php echo $global_site_result->post_title;?>">
									<h6><?php echo $global_site_result->post_title;?> <a href="<?php echo $global_site_result->post_excerpt;?>" target="_blank"><img src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/ic_link.svg" alt=" Global site Link - Icon"></a></h6>
								</div>
							</li>
						<?php } ?>
					</ul>

			  <!-- <a class="viwall_btn" href="#">VIEW ALL</a> -->
			</div>
		  </div>
		</div>
	  </section>
<?php } ?>
<!--global sites section ends here-->
	 
<!--partner with us section starts here-->
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
	 

<!--partner with us section ends here-->
 

<?php get_footer();?>
	 <div class="modal homemodal" id="discoverModal" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
 
      <!-- Modal Header -->
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
 
      <!-- Modal body -->
      <div class="modal-body urliframe">
		  
		<?php $vidurl=get_post_meta( 15, 'wpcf-home-page-video-url', true ); // 13-03-2020	?>  
	 
 <iframe width="100%" height="500" src="<?php echo $vidurl;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
</div>
</div>
</div>

<?php
$cntdate=get_post_meta( 701, 'home_startcounter_date', true );
$cntamt=get_post_meta( 701, 'home_homepage_counter', true );
$cntincramt=get_post_meta( 701, 'home_counter_increment', true );	 
	 
//$startday = new DateTime('2020-01-23');
 $startday = new DateTime($cntdate);
$today = new DateTime();
$days  = $today->diff($startday)->format('%a');
$homefirst = $cntamt + $days*$cntincramt;
	 
// getting banner auto counter limit values
$counter1_limit = get_post_meta( 15 ,'wpcf-banner-counter1',true);
$counter2_limit = get_post_meta( 15 ,'wpcf-banner-counter2',true);
$counter3_limit = get_post_meta( 15 ,'wpcf-banner-counter3',true);?>

	 



<script>
    $(window).on('beforeunload', function () {
      $(window).scrollTop(0);
    });
  </script>
<!-- 	   <script>
    $(' .consumers-love').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: "<img class='a-left prev slick-prev' src='images/arrow_left.svg'>",
      nextArrow: "<img class='a-right  next slick-next' src='images/arrow_right.svg'>",
      asNavFor: '.consumers_images',
      adaptiveHeight: true
    });

    $('.consumers_images').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: '.consumers-love',
      arrows: false,
      dots: true,

    });
  </script> -->
  <script type="text/javascript">
    $('.spnsr_sldr').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
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
	  <script type="text/javascript">
    $('section.home_team_woop .team_woop_mobile-sec').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      dots: true,
      autoplaySpeed: 2000,
    });
  </script>

  <script type="text/javascript">
    $('.rwrd_sldr').slick({
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
  <script type="text/javascript">
    $('.client_sec .rwrd_slder').slick({
      slidesToShow: 1,
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
			   dots:true,
            autoplaySpeed: 2000,
          }
        },
      ]
    });

  </script>
  <script>
    $(window).scroll(function () {
      if ($(document).scrollTop() > 760) {
        $('.navbar').addClass('white-bg');
      } else {
        $('.navbar').removeClass('white-bg');
      }
    });
  </script>
  <script>
    $("a[href^='#']").click(function (e) {
      e.preventDefault();

      var position = $($(this).attr("href")).offset().top;

      $("body, html").animate({
        scrollTop: position
      } /* speed */);
    });
  </script>
  <script>
    $(document).ready(function () {
      $(".team_woop_sec li").mouseenter(function () {
        $(this).addClass("active");
      });
      $(".team_woop_sec li").mouseleave(function () {
        $(this).removeClass("active");
      });
    });
  </script>
  <script>
    $(document).ready(function () {
      $(".news_sec li").mouseenter(function () {
        $(this).addClass("show");
      });
      $(".news_sec li").mouseleave(function () {
        $(this).removeClass("show");
      });
    });
  </script>
<!--   <script>
    $(document).ready(function () {
      $(".rwrd_crd").mouseenter(function () {
        $(this).addClass("hoverdiv");
      });
      $(".rwrd_crd").mouseleave(function () {
        $(this).removeClass("hoverdiv");
      });
    });
  </script> -->
  <script>
    $(document).ready(function () {
      $(".fb_grp").mouseenter(function () {
        $(this).addClass("hoverdiv");
      });
      $(".fb_grp").mouseleave(function () {
        $(this).removeClass("hoverdiv");
      });
      $(".fb_f_grp").mouseenter(function () {
        $(this).addClass("hoverdiv");
      });
      $(".fb_f_grp").mouseleave(function () {
        $(this).removeClass("hoverdiv");
      });
    });
  </script>
	 <script>
		  // You might also include + if you want them to be able to type it

		 var counter1_limit = '<?php echo $counter1_limit;?>'; 
		 var counter1_without_comma = counter1_limit.replace(/[^\d\.\-]/g, "");
		 
		 var counter2_limit = '<?php echo $counter2_limit;?>'; 
		 var counter2_without_comma = counter2_limit.replace(/[^\d\.\-]/g, "");
		 
		 var counter3_limit = '<?php echo $counter3_limit;?>';
		 var counter3_without_comma = counter3_limit.replace(/[^\d\.\-]/g, "");
    $({
      countNum: $('.counter1').text()
    }).animate({
      countNum: parseFloat(counter1_without_comma)
    }, {
      duration: 2000,
      easing: 'linear',
      step: function () {
        $('.counter1').text(Math.ceil(this.countNum));
      },
      complete: function () {
        $('.counter1').text(counter1_limit);
      }
    });
    $({
      countNum: $('.counter2').text()
    }).animate({
      countNum: parseFloat(counter2_without_comma)
    }, {
      duration: 2000,
      easing: 'linear',
      step: function () {
        $('.counter2').text(Math.ceil(this.countNum));
      },
      complete: function () {
        $('.counter2').text(counter2_limit);
      }
    });
    $({
      countNum: $('.counter3').text()
    }).animate({
      countNum: parseFloat(counter3_without_comma)
    }, {
      duration: 2000,
      easing: 'linear',
      step: function () {
        $('.counter3').text(Math.ceil(this.countNum));
      },
      complete: function () {
        $('.counter3').text(counter3_limit);
      }
    });

  </script>
  <script>

    // Counter To Count Number Visit
    var a = 0;
    $(window).scroll(function () {

      var oTop = $('.progress-responsive').offset().top - window.innerHeight;
      // Md.Asaduzzaman Muhid
      if (a == 0 && $(window).scrollTop() >= oTop) {
        var BG = {}; // BAR GRAPH window object

        // FIXED
        BG.fixed = function (percentage, duration) {
          var pixels = Math.floor(percentage * 2.5); // Percent as a whole number times 2.5 for 250 max pixels
          // Animate bar graph
          var count1 = 0,
            bar = $('.progress-fixed__bar'),
            interval1 = Math.floor(duration / pixels),
            incrementer1 = setInterval(function () {
              (count1 <= pixels) ? (bar.width(count1), count1++) : clearInterval(incrementer1);
            }, interval1);
          // Animate percent number
          var count2 = 0,
            percent = $('.progress-fixed__percent'),
            interval2 = Math.floor(duration / percentage),
            incrementer2 = setInterval(function () {
              (count2 <= percentage) ? (percent.text(count2 + "%"), count2++) : clearInterval(incrementer2);
            }, interval2);
        };

        $({
          countNum: $('.counter2').text()
        }).animate({
          countNum: 303854
        }, {
          duration: 2100,
          easing: 'linear',
          step: function () {
            $('.counter2').text(Math.ceil(this.countNum));
          },
          complete: function () {
            $('.counter2').text("470,000");
          }
        });

        a = 1;// Md.Asaduzzaman Muhid

        // RESPONSIVE
        BG.responsive = function (percentage, duration) {
          // Animate bar graph
          var count1 = 0,
            bar = $('.progress-responsive__bar'),
            interval1 = (Math.floor(duration / percentage) / 2),
            incrementer1 = setInterval(function () {
              (count1 <= percentage) ? (bar.width(count1 + "%"), count1 += 0.5) : clearInterval(incrementer1);
            }, interval1);
          // Animate percent number
          var count2 = 0,
            percent = $('.progress-responsive__percent'),
            interval2 = Math.floor(duration / percentage),
            incrementer2 = setInterval(function () {
              (count2 <= percentage) ? (percent.text(count2 + "%"), count2++) : clearInterval(incrementer2);
            }, interval2);
        };

        BG.init = function () {
          BG.fixed(10, 2000);  // Percentage, duration
          BG.responsive(25, 2000);  // Percentage, duration
        };

        $(function () {
          BG.init();
        })();

      }
    });
  </script>
  <script>

    var b = 0;
    $(window).scroll(function () {

      var oTop = $('.progress-responsive-two').offset().top - window.innerHeight;
      // Md.Asaduzzaman Muhid
      if (b == 0 && $(window).scrollTop() >= oTop) {

        var BG = {}; // BAR GRAPH window object

        // FIXED
        BG.fixed = function (percentage, duration) {
          var pixels = Math.floor(percentage * 2.5); // Percent as a whole number times 2.5 for 250 max pixels
          // Animate bar graph
          var count1 = 0,
            bar = $('.progress-fixed__bar_two'),
            interval1 = Math.floor(duration / pixels),
            incrementer1 = setInterval(function () {
              (count1 <= pixels) ? (bar.width(count1), count1++) : clearInterval(incrementer1);
            }, interval1);
          // Animate percent number
          var count2 = 0,
            percent = $('.progress-fixed__percent_two'),
            interval2 = Math.floor(duration / percentage),
            incrementer2 = setInterval(function () {
              (count2 <= percentage) ? (percent.text(count2 + "%"), count2++) : clearInterval(incrementer2);
            }, interval2);
        };

        b = 1;// Md.Asaduzzaman Muhid

        setTimeout(function () {
          odometer.innerHTML = 303854;//ending number
        }, 1000);//last argument is for time in milliseconds or seconds depending on the need

        // RESPONSIVE
        BG.responsive = function (percentage, duration) {
          // Animate bar graph
          var count1 = 0,
            bar = $('.progress-responsive__bar_two'),
            interval1 = (Math.floor(duration / percentage) / 2),
            incrementer1 = setInterval(function () {
              (count1 <= percentage) ? (bar.width(count1 + "%"), count1 += 0.5) : clearInterval(incrementer1);
            }, interval1);
          // Animate percent number
          var count2 = 0,
            percent = $('.progress-responsive__percent_two'),
            interval2 = Math.floor(duration / percentage),
            incrementer2 = setInterval(function () {
              (count2 <= percentage) ? (percent.text(count2 + "%"), count2++) : clearInterval(incrementer2);
            }, interval2);
        };

        BG.init = function () {
          BG.fixed(25, 2000);  // Percentage, duration
          BG.responsive(25, 2000);  // Percentage, duration
        };

        $(function () {
          BG.init();
        })();
      }
    });
  </script>
  <script src="https://github.hubspot.com/odometer/odometer.js"></script>
	 
 
	 
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
jQuery('.small_descr p:empty').remove();
$("#discoverModal").on('hidden.bs.modal', function (e) {
    $("#discoverModal iframe").attr("src", $("#discoverModal iframe").attr("src"));
});	  
$("#testiModal").on('show.bs.modal', function(e) {
       var urllink = $(e.relatedTarget).attr("data-paragraphs");
	   $(".urliframe").html('<iframe width="100%" height="474" src="'+urllink+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>');
});
</script>
		
<script>
		$('.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			//autoplay:true,
			asNavFor: '.slider-nav',
			
			infinite: true,
						  responsive: [
     {
     breakpoint: 767,
     settings: {
		 arrows: true,
		 adaptiveHeight: true
     }
     },
     ]
	
		});
		$('.slider-nav').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '.slider-for',
			dots: false,
			centerMode: true,
			focusOnSelect: true,
			//autoplay:true,
			infinite: true,
			
			
			  responsive: [
     {
     breakpoint: 767,
     settings: {
      slidesToShow: 1,
  slidesToScroll: 1,
 // autoplay: true,
  //autoplaySpeed: 2000,
	adaptiveHeight: true
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
	  <script type="text/javascript">
    $('section.home_team_woop .team_woop_mobile-sec').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      dots: true,
      autoplaySpeed: 2000,
    });
  </script>
<script>
	var get_site_url = '<?php echo get_site_url();?>';
    $(' .consumers-love').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: "<img class='a-left prev slick-prev' src="+get_site_url+"/wp-content/uploads/2020/04/arrow_left.svg'>",
      nextArrow: "<img class='a-right  next slick-next' src="+get_site_url+"/wp-content/uploads/2020/04/arrow_right.svg'>",
      asNavFor: '.consumers_images',
      adaptiveHeight: true
    });

    $('.consumers_images').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: '.consumers-love',
      arrows: false,
      dots:false,
      
    });
  </script>
