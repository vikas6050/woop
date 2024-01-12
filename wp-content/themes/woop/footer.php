<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<div class="modal homemodal" id="lovewoopModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
	  <!--<video controls id="video1" style="width: 100%; height: auto; margin:0 auto; frameborder:0;">
          <source src="<?php echo get_template_directory_uri();?>/images/woop-alltogether.mp4" type="video/mp4">
        
        </video>-->
		  <iframe width="100%" height="474" src="https://www.youtube.com/embed/fkwV31A1oD0?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  
      </div>

      <!-- Modal footer -->
     

    </div>
  </div>
</div>
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

<section class="footer">
	<div class="row">
		<div class="col-md-12">  
			<div class="row">
	
				<div class="col-md-6 tab-5">


					<div class="foter-logo">
						<a href="<?php echo get_site_url();?>"><img src="<?php echo get_template_directory_uri();?>/images/footer-logo.png"></a> 
					</div>
		

				</div>



				<div class="col-md-5 offset-md-1 tab-7 tab-mrgin-0">
  <div class="mobile_pading_footer">

					<div class="row">
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
						$tol_global = count($global_site_results);
						$global_site_results_count = ($tol_global/2) + ($tol_global%2);
						$array_chunk1 = array_chunk($global_site_results,1);

						if( $array_chunk1 ){
							$array_chunk_counter = 1;
							foreach( $array_chunk1 as $array_chunk ){
								if( $array_chunk_counter == 1){
									   $div_class = "col-6 col-md-5";
									   $li_label = '<li> <span>Global Sites</span></li>';
								   }
						           else{
									   $div_class = "col-6 col-md-3 woopfor-cls";
									   $li_label = '<li> <span></span></li>';
								   }
								
								?><div class="<?php echo $div_class;?>"><ul><?php 
								
								echo $li_label;
								
								foreach( $array_chunk as $array_chunk_single ){ 
								   
						           ?>
						
						           <li><a href="<?php echo $array_chunk_single->post_excerpt;?>" target="_blank"><?php echo $array_chunk_single->post_title;?></a></li>
									   
						           
								    
							   <?php }?>
							 </ul></div> <?php $array_chunk_counter++;  }
						}
						?>
					
						<div class="col-md-4">
                			<ul>
                  				<li><span>Company</span></li>
              					<li><a href="#partner-with_us">Contact Us</a></li>
                  				<li><a href="<?php echo get_site_url();?>/press">Press</a></li>
                			</ul>
              			</div>
					</div>
					</div>
				</div>
	

				<div class="col-12 col-md-4 first_align">
					<div class="social_media-icons">
						<ul>
							
							<li><a href="<?php echo get_option( 'youtube_link' );?>" target="_blank"><img src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/ic-youtube.svg"></a></li>	
							<li><a href="<?php echo get_option( 'linkedin_link' );?>" target="_blank"><img src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/ic-linkedin.svg"></a></li>	
						</ul>
					</div>
				</div>
				<div class="col-12 col-md-8 third_align">
					<div class="row ft_btm-txt">
						<div class="col-md-6">
							<ul>
								<!-- <li><a href="<?php /*echo get_permalink(3);*/?>">Privacy Policy</a></li>
								<li><a href="<?php /*echo get_permalink(76);*/?>">Terms & Conditions</a></li> -->
							</ul>
						</div>
			    		<div class="col-12 col-md-6">
							<span>© Copyright Advocacy WOM Pte. Ltd. All Rights Reserved</span>
						</div>
					</div>
		  		</div>  
		  	</div>
	
	  	</div>
	</div>
</section>  
  


<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>

<script>
 $(document).ready(function () {
	$(".wpens_email").addClass("form-control"); 
   $(".wpens_email").attr("placeholder", "Email Address");
	 
	 
   $(".navbar-toggler-icon").click(function(){
   $(".navbar").addClass("mobheader-bg");
  });
	 
	 
 })
   </script> 
		<script>
 $(window).scroll(function() {
   if ($(document).scrollTop() > 0) {
     $('.navbar').addClass('mobheader-bg');
	 $('.navbar-collapse').removeClass('show');
   } else {
     $('.navbar').removeClass('mobheader-bg');
   }
 });
</script>
</body>
</html>
