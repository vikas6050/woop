(function ($) {
  $(function () {
    $(document).off('click.bs.tab.data-api', '[data-hover="tab"]');
    $(document).on('mouseenter.bs.tab.data-api', '[data-toggle="tab"], [data-hover="tab"]', function () {
      $(this).tab('show');
    });
  });
})(jQuery);


$('.spnsr_sldr').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  adaptiveHeight:true,	
  autoplay: false,
  autoplaySpeed: 2000,
});

$('.rwrd_sldr').slick({
  slidesToShow: 4,
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
  adaptiveHeight:true,
  autoplaySpeed: 2000,
     }
     },
     ]
     }); 
     
      $(window).scroll(function() {
      if ($(document).scrollTop() > 760) {
        $('.navbar').addClass('white-bg');
      } else {
        $('.navbar').removeClass('white-bg');
      }
    });

$("a[href^='#']").click(function(e) {
	e.preventDefault();
	
	var position = $($(this).attr("href")).offset().top;

	$("body, html").animate({
		scrollTop: position
	} /* speed */ );
});

$(document).ready(function(){
  $(".jnd_B_A").mouseenter(function(){
    $(this).addClass("hoverdiv");
  });
$(".jnd_B_A").mouseleave(function(){
    $(this).removeClass("hoverdiv");
  });		
});
$(document).ready(function(){
  $(".fb_grp").mouseenter(function(){
    $(this).addClass("hoverdiv");
  });
$(".fb_grp").mouseleave(function(){
    $(this).removeClass("hoverdiv");
  });
  $(".fb_f_grp").mouseenter(function(){
    $(this).addClass("hoverdiv");
  });
$(".fb_f_grp").mouseleave(function(){
    $(this).removeClass("hoverdiv");
  });	
});



$(document).ready(function(){
  $(".woop_en_roi ul li").mouseenter(function(){
    $(this).addClass("active");
  });
$(".woop_en_roi ul li").mouseleave(function(){
    $(this).removeClass("active");
  });		
});

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
} 

function numberWithCommas(x) {
 x=x.toString();
var lastThree = x.substring(x.length-3);
var otherNumbers = x.substring(0,x.length-3);
if(otherNumbers != '')
    lastThree = ',' + lastThree;
var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
return res;
}

