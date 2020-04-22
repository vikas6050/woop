<?php
/**
 * Template Name: Impact Stories
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
    </div>
    <div class="scrl_dwn">
      <a href="#scroll_now"><img src="<?php echo get_template_directory_uri();?>/images/chevron.svg" alt=""></a>
    </div>
  </section>



  <section class="impact_story_sec" id="scroll_now">
	<div class="container">
      <div class="row">
		  <div class="col-md-12"><h2>Meet some of the Girls supported by your WOOP points</h2></div>
		  <div class="col-md-2 snd-align">
		  <span class="tried_img"><img src="<?php echo get_template_directory_uri();?>/images/nanhilogo.png"></span>	  
          </div> 
		  <div class="col-md-10 frst-align">
		  <p> Here are a few stories of our brilliant girls finally getting a chance on an education they have always deserved!</p>
		  </div>
		  <ul class="thrd-align">

          <?php  
 $story  = array(
  'post_type'		=> 'impact-story',
  'post_status' => 'publish',
  'posts_per_page' => 6,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$storyres = new WP_Query( $story );
$count = $storyres->found_posts;
if( $storyres->have_posts() ):  $cnt=0;
	while( $storyres->have_posts() ) : $storyres->the_post(); 
  $post_id = get_the_ID() ;
			  
if(wp_is_mobile()){
	 	
		$featured_img_urlimp = get_post_meta( $post_id, "wpcf-home-page-thumb-image", true ); 
 	}
 	else{
		$featured_img_urlimp =get_the_post_thumbnail_url($post_id,'full');  
 	}			  
			  
  //$featured_img_urlimp = get_the_post_thumbnail_url($post_id,'full');  
  
  	?>

		  <li>
      <span style="background-image:url('<?php echo $featured_img_urlimp;?>')">
      <?php //if(has_post_thumbnail()){ the_post_thumbnail('full');  } ?></span>
            <h5><?php the_title(); ?></h5>
         <p>  <?php echo wp_trim_words( get_the_content(),35); ?></p>
           <a class="theme_btn active_id" data-toggle="modal" data-target="#myModal" data-id="<?php echo $cnt;?>">READ HER STORY</a>
		  </li>
		  <?php  $cnt++;
          endwhile;   wp_reset_query(); endif; ?>  


<span class="story-row"></span>
</ul>

        <?php if($count>6) {?> <a class="loadmore_btn frth-align" href="javascript:"void(0) id="loadmorestory">LOAD MORE</a> <?php }?>
		</div>
		</div>
	 </section>

 <!-- The Modal -->
 <div class="modal" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" data-dismiss="modal"><span><img src="<?php echo get_template_directory_uri();?>/images/back-arrow.png"></span> All Impact stories</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body impact-popup">
		<div class="impact-slider">

        <?php  
 $storydet  = array(
  'post_type'		=> 'impact-story',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'DESC'
);
$storydetres = new WP_Query( $storydet );
if( $storydetres->have_posts() ): $cnt2=0;
	while( $storydetres->have_posts() ) : $storydetres->the_post(); 
	$post_id = get_the_ID() ;
    
  	?>

              <div>
              <div class="story-slider-img">
              <h5><?php the_title(); ?></h5>
			  <div class="story-profile"> <?php if(has_post_thumbnail()){
                  the_post_thumbnail('full');  } ?></div>
				  
            <div class="story-content"><?php echo get_the_content(); ?></div>  

<?php $next_post = get_adjacent_post(false,'',false); 
$previous_post = get_adjacent_post(false,'',true);?>   
 <?php if($next_post->ID != ''): ?>
 <span class="slide-lft"><?php echo $next_post->post_title;?> </span> 
      
    <?php endif; ?>
       <?php if($previous_post->ID != ''): ?>
       <span class="slide-rght"><?php echo $previous_post->post_title;?> </span>
    <?php endif; ?>
				  
              </div>
              </div>

              <?php  $cnt2++;  
             endwhile;   wp_reset_query(); endif; ?>  
           			
             </div>
             </div>

    

    </div>
  </div>
</div>
	<!-- The Modal -->






<?php get_footer();?>

<script type="text/javascript">
	  $('#myModal').on('shown.bs.modal', function (e) {
        $('.impact-slider').slick("setPosition", 0); 
          });
    $('.impact-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
    });


 $("a.active_id").click(function(){
   var current_story = $(this).attr('data-id');
   $('.impact-slider').slick('slickGoTo', current_story, true);

 });



 $(document).ready(function(){
     var click = 0;
   
     localStorage.setItem('d-id', 5);
$("#loadmorestory").click(function(event){
  var click_count = ++click;
  var slickdataid=parseInt(localStorage.getItem('d-id'))+1;
 
 var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
 var ppp=6;

  var story = {
           'action': 'view_story_more_action',
           'ppp': ppp,
          'offset': (ppp * click_count),
          'slickdataid':slickdataid
          

  };

 $.post(ajaxurl, story, function(view_response) {
        
             $('.story-row').append(view_response.view_data);
             localStorage.setItem('d-id', view_response.dat_id); 

             $("a.active_id").click(function(){
                    //  alert($(this).attr('data-id'));
   var current_story = $(this).attr('data-id');

   $('.impact-slider').slick('slickGoTo', current_story, true);

 });
               if(view_response.view_status == "false"){
                    $('#loadmorestory').hide();
                }
           
         //console.log(response);
       },'json');


});

});


</script>


<?php
$startday = new DateTime('2020-01-23');
$today = new DateTime();
$days  = $today->diff($startday)->format('%a');
$homefirst = 238131 + $days*171;
?>

<script>
	var hmefirstcnt=<?php echo $homefirst;?>;

  $({
      countNum: $('.counter1').text()
  }).animate({
      countNum: hmefirstcnt 
  }, {
      duration: 2000,
      easing: 'linear',
      step: function () {
          $('.counter1').text(Math.ceil(this.countNum));
      },
      complete: function () {
         // $('.counter1').text("3,03,854");
          var finamt= addCommas(hmefirstcnt);
        //  var finamt= numberWithCommas(hmefirstcnt); 
          $('.counter1').text(finamt);
      }
  });
  
</script>
