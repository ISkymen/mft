<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 9]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
<!--	<meta name="viewport" content="width=device-width, initial-scale=1.0" />-->

<!--    <meta name="MobileOptimized" content="width">-->
<!--    <meta name="HandheldFriendly" content="true">-->
<!--      <meta id="myViewport" name="viewport" content="width=device-width">-->
<!--      <script>-->
<!--          window.onload = function () {-->
<!--              if(screen.width <= 650) {-->
<!--                  var mvp = document.getElementById('myViewport');-->
<!--                  mvp.setAttribute('content','width=650');-->
<!--              } if(screen.width <= 420) {-->
<!--                  var mvp = document.getElementById('myViewport');-->
<!--                  mvp.setAttribute('content','width=420');-->
<!--              }-->
<!--          }-->
<!--      </script>-->

  <meta http-equiv="cleartype" content="on">

  <?php print $styles; ?>
<script>

if (!window.console) {
    console = {};
    console.log = function(){};
}

</script>
  <?php print $scripts; ?>
  
<script type="text/javascript" src="/sites/all/themes/myfancy/js/jquery.visible.min.js"></script>

<script type="text/javascript">	
(function ($) {
Drupal.behaviors.myfancy = {
attach: function(context, settings) {

/*Add your js code here*/

  $( ".lt-ie9 .flexslider .slides img" ).css('min-width',$(window).width());
  $( ".lt-ie9 .view-slideronmain .views-field-title span" ).css('left',$(window).width()*0.5);
  $( ".lt-ie9 .view-slideronmain .views-field-nothing" ).css('left',$(window).width()*0.5);  

/*START Check position of view for fixing header*/
jQuery.expr.filters.offscreen = function(el) {
  return (
              (el.offsetLeft + el.offsetWidth) < 0 
              || (el.offsetTop + el.offsetHeight) < 0
              || (el.offsetLeft > window.innerWidth || el.offsetTop > window.innerHeight)
         );
};

  setInterval(function() {
				if (!$('.pointer').visible(true)){
					$( "body" ).addClass('nottop');		
					}
				if ($('.pointer').visible(true)){
					$( "body" ).removeClass('nottop');
					}
    }, 500) ;                              
/*END Check position of view for fixing header*/

/*START manual calculate shipping at cart */
var qty=0.0;
var shipprice=0.0;
var shipsum=0.0;
var shipsumall = 0.0;
$('.view-commerce-cart-form .views-table tbody tr').each(function(){
	//alert('start');
	if($(this).find('td.views-field-edit-quantity input[title="Quantity"]').html()!=null){
		qty=$(this).find('td.views-field-edit-quantity input[title="Quantity"]').val();
		shipprice=$.trim($(this).find('td.views-field.views-field-commerce-shipping-price').html()).substring(1, $(this).find('td.views-field.views-field-commerce-shipping-price').html().length);
		shipsum=qty*parseFloat(shipprice);
		//alert(shipsum.toFixed(2));
		shipsumall += shipsum;
		//alert(shipsumall);
		$(this).find('td.views-field.views-field-commerce-shipping-price').html('$'+shipsum.toFixed(2));
	}
});

if($('.view-commerce-cart-form .line-item-summary .line-item-total-raw').html()!=null){
	var sum1=shipsumall.toFixed(2);
	var sum2=$.trim($('.view-commerce-cart-form .line-item-summary .line-item-total-raw').html()).substring(1, $('.view-commerce-cart-form .line-item-summary .line-item-total-raw').html().length).replace(/,/g, '');
	var sum3=(parseFloat(sum1)+parseFloat(sum2)).toFixed(2);
	//alert(sum1);
	//alert(sum2);
	//alert(sum3);
	$('.view-commerce-cart-form .line-item-summary .line-item-total-raw').html('$'+sum3);
}

/*END manual calculate shipping at cart */


    /*START manual calculate shipping at dropdowncart */
    var dropqty=0.0;
    var dropshipprice=0.0;
    var dropshipsum=0.0;
    var dropshipsumall = 0.0;
    var dropsum1 = 0.0;
    var dropsum2 = 0.0;
    var dropsum3 = 0.0;
    var dropsum4 = 0.0;
    $('.view-commerce-cart-block .views-table>tbody>tr').each(function(){
        if($(this).find('td.views-field-quantity').html()!=null){
            dropqty=$(this).find('td.views-field-quantity').html();
            dropshipprice=$.trim($(this).find('td.views-field-commerce-shipping-price .amountshippingpricedropdowncart').html()).substring(1, $(this).find('td.views-field-commerce-shipping-price .amountshippingpricedropdowncart').html().length);

            dropshipsum=dropqty*parseFloat(dropshipprice);
            dropshipsumall += dropshipsum;

            $(this).find('td.views-field-commerce-shipping-price .amountshippingpricedropdowncart').html('$'+dropshipsum.toFixed(2));

            dropsum1=dropshipsum.toFixed(2);
            dropsum2=$.trim($(this).find('span.price-amount').filter(':last').html()).substring(1);
            dropsum3=parseFloat(dropsum2).toFixed(2);
            dropsum4 += +dropsum3;
            dropsum4 = parseFloat(dropsum4) + parseFloat(dropshipsum);
        }
    });
    if($('.view-commerce-cart-block .line-item-summary .line-item-total-raw').html()!=null) {
        var dropsum = dropsum4.toFixed(2)
        $('.view-commerce-cart-block .line-item-summary .line-item-total-raw').html('$' + dropsum);
        $('#block-block-5 .shopping-cart-money-total').html('$' + dropsum);
    }

/*END manual calculate shipping at dropdowncart */
}
};
})(jQuery);
</script>


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1176511892373304');
fbq('track', "PageView");
fbq('track', 'AddToCart');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1176511892373304&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


<!-- Start SiteHeart code -->
<script>
(function(){
var widget_id = 844390;
_shcp =[{widget_id : widget_id}];
var lang =(navigator.language || navigator.systemLanguage 
|| navigator.userLanguage ||"en")
.substr(0,2).toLowerCase();
var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
var hcc = document.createElement("script");
hcc.type ="text/javascript";
hcc.async =true;
hcc.src =("https:"== document.location.protocol ?"https":"http")
+"://"+ url;
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
</script>
<!-- End SiteHeart code -->

<script async defer src="//assets.pinterest.com/js/pinit.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=393115790753410";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style>@import url("//myfancycraft.com/sites/all/libraries/flexnav/css/flexnav.css");</style>
<style>@import url("//myfancycraft.com/sites/all/libraries/flexnav/css/font-awesome.css");</style>
<script type="text/javascript">
		jQuery(document).ready(function($) {	
			// initialize FlexNav
			$(".flexnav").flexNav();
		});
		
    </script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77648448-1', 'auto');
  ga('send', 'pageview');

</script>
<div class="pointer"></div>
  <?php if ($skip_link_text && $skip_link_anchor): ?>
    <p id="skip-link">
      <a href="#<?php print $skip_link_anchor; ?>" class="element-invisible element-focusable"><?php print $skip_link_text; ?></a>
    </p>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
