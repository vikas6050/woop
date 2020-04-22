<?php
/**
 * Template Name: Press
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Fourteen 1.0
 */


get_header(); ?>
    

<?php
  
   $newsfeat  = array(
    'post_type'		=> 'woop-news',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_key' => '_is_ns_featured_post',
     'meta_value' => 'yes'
  );
  $newsfeatres = new WP_Query( $newsfeat );
  if( $newsfeatres->have_posts() ):
	  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
	  ?>
		<section class="bnr">

			<?php 
			while( $newsfeatres->have_posts() ) : $newsfeatres->the_post(); 
				$nws_id = get_the_ID() ;
			    
				// getting the external link and checks if it is a video url. if yes, changes the button text and popoups the video. otherwise redirects to external url

				$featredlink = get_post_meta( $nws_id, 'wpcf-news-redirect-url', true);

				$parse_ext_url = parse_url($featredlink);
				$parse_ext_url_host = trim($parse_ext_url['host']);
			    

				if( $parse_ext_url_host == "www.youtube.com"){
					//$featured_news_button_label = "READ ARTICLE";
					$video_status = "true";
				}
				else{
					//$featured_news_button_label = "WATCH VIDEO";
					$video_status = "false";
				}

                //echo $video_status;
				 ?>





			<img src="<?php echo $featured_img_url;?>" class="img-fluid">

			<div class="brnCnt">
				<div class="featured-text">FEATURED NEWS</div>
				<h1><?php the_title(); ?></h1>

				<?php if( $featredlink!=''){
				
				    if( $video_status == "true"){ ?>
				
				       <div class="press_video">
						<a href="#" class="watch-video_btn" data-toggle="modal" data-target="#featured_news_watch"> <span><img src="<?php echo get_site_url();?>/wp-content/uploads/2020/04/play-button.svg" alt=""></span> Watch
			Video</a>
				      </div>
					<?php } 
				    else{?>
						<a href="<?php echo $featredlink;?>" target="_blank"> 
							<span class="more_article-text">READ ARTICLE</span>
						</a>
					<?php } ?>

					

				<?php  } ?>

			</div>

			<?php endwhile;   wp_reset_query();?>

			<div class="scrl_dwn">
				<a href="#scroll_now"><img src="<?php echo get_template_directory_uri();?>/images/chevron.svg" alt="scroll down"></a>
			</div>


		</section>
<?php endif; ?>

<section class="press_sec" id="scroll_now">
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

$count = $newsres->found_posts;
if( $newsres->have_posts() ): $cnt=0;
	while( $newsres->have_posts() ) : $newsres->the_post(); 
    $post_id = get_the_ID() ;
    $redlink = get_post_meta( $post_id, 'wpcf-news-redirect-url', true);
    
?>
         <?php if( $redlink!=''){?>
		    <a href="<?php echo $redlink;?>" target="_blank">  <li>
			  <p><?php the_title(); ?></p>
			  <div class="newsbrand_detail">
			  <span><?php
                 $featured_img_url = get_the_post_thumbnail_url( $post_id,'full');?>
                 <img src="<?php echo $featured_img_url;?>" alt="<?php the_title(); ?>"> 
        
              </span>
			  </div>  
		      </li> </a>
              <?php } else {?>
                <li>
			  <p><?php the_title(); ?></p>
			  <div class="newsbrand_detail">
			  <span><?php 
                 $featured_img_url = get_the_post_thumbnail_url( $post_id,'full');
                 ?>
                 <img src="<?php echo $featured_img_url;?>" alt="<?php the_title(); ?>"> 
              </span>
			  </div>  
              </li>
              <?php }?>

            <?php  $cnt++;
            endwhile;   wp_reset_query(); endif; ?>  
  
  
  <span class="news-row"></span>
		   
		  </ul>
        <?php if($count>6) {?>  <a class="more_btn" href="javascript:void(0)" id="loadmorenews">Load More </a><?php }?>
		  </div>
		</div>
	 </div>
 </section>	

<!--popup for featured news if video url is listed -->
<div class="modal homemodal" id="featured_news_watch" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
 
      <!-- Modal Header -->
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
 
      <!-- Modal body -->
      <div class="modal-body urliframe">
		  
		<?php 
		  
		  if( $newsfeatres->have_posts() ):
		  
		     while( $newsfeatres->have_posts() ) : $newsfeatres->the_post(); 
				$nws_id = get_the_ID() ;
		       
		      
		        $vidurl=get_post_meta( $nws_id, 'wpcf-news-redirect-url', true ); ?>
		  
		  
		     <?php endwhile;  
		  
		endif;
		  
		   	?>  
	 
 		<iframe width="100%" height="500" src="<?php echo $vidurl;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
</div>
</div>
</div>



<?php get_footer();?>
<script>
$(document).ready(function(){
  $(".press_sec li").mouseenter(function(){
    $(this).addClass("show");
  });
$(".press_sec li").mouseleave(function(){
    $(this).removeClass("show");
  });		
});


$(document).ready(function(){
     var click = 0;
$("#loadmorenews").click(function(event){
  var click_count = ++click;
 // alert(click_count);
 var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
 var ppp=6;

  var news = {
           'action': 'view_news_more_action',
           'ppp': ppp,
          'offset': (ppp * click_count)
          

  };

 $.post(ajaxurl, news, function(view_response) {
      
             $('.news-row').append(view_response.view_data);
               if(view_response.view_status == "false"){
                    $('#loadmorenews').hide();
            }
           
         //console.log(response);
       },'json');


});

});



</script>
<script>
		$(window).scroll(function () {
			if ($(document).scrollTop() > 0) {
				$('.navbar').addClass('white-bg');
			} else {
				$('.navbar').removeClass('white-bg');
			}
		});
	</script>
