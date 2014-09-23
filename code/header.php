<?php include("admin/lib/connection.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Art o Sculpture</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/skin.css" />
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen"  charset="utf-8" />

	<script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/technology.js"></script>
    <script src="js/jquery.featureCarousel.js" type="text/javascript"></script> 
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.js"></script>
	 <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'dark_rounded',slideshow:3000, autoplay_slideshow: false});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
	<script type="text/javascript">

function mycarousel_initCallback(carousel)
{


    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        auto: 2,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });

});

</script>
        
    <script type="text/javascript">
      $(document).ready(function() {
        $("#carousel").featureCarousel({
			autoPlay:3000,
			trackerIndividual:false,
			trackerSummation:false,
			topPadding:120,
			smallFeatureWidth:.7,
			smallFeatureHeight:.7,
			sidePadding:-75,
			smallFeatureOffset:50
		});
      });
    </script>
    
    <script>

		$(document).ready(function(){
			$("ul.navigation").superfish({
				animation: {height:'show'},
				animationOut: {height:'hide'},// slide-down effect without fade-in
				delay:500,
				speed:'normal'// 1.2 second delay on mouseout
			});
		});
	
		</script>
        
    <script type="text/javascript">
			$(function() {
				var _scroll = {
					delay: 1000,
					easing: 'linear',
					items:1,
					duration: 0.07,
					timeoutDuration: 0,
					pauseOnHover: 'immediate'
				};
				$('#ticker-1').carouFredSel({
					width: 990,
					align: false,
					items: {
						width: 'variable',
						height: 72,
						visible:1
					},
					scroll: _scroll
				});
				//	set carousels to be 100% wide
				$('.caroufredsel_wrapper').css('width', '94%','margin-left', '5px');

				//	set a large width on the last DD so the ticker won't show the first item at the end
				$('#ticker-2 dd:last').width(2000);
			});
		</script>    
</head>

<body>
<!--header section -->
	<div class="header">
    	<div class="wrapper">
        	<table width="100%" height="77" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="33%" align="left" valign="middle"><a href="index.php"><img src="images/logo.png" alt="logo" /></a></td>
                <td width="67%" align="right" valign="middle">
                	<ul class="navigation">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="about_us.php">ABOUT US</a></li>
                        <li><a href="#">PROJECTS</a>
                        	<ul>
                            	<li><a href="ongoing_projects.php?type=O">Ongoing Projects</a></li>
                                <li><a href="ongoing_projects.php?type=C">Completed Projects</a></li>
                            </ul>
                        </li>
                        <li><a href="#">GALLERY </a>
                        	<ul>
                            	<?php
								$sql_menu = mysql_query("select * from `album_cat` where 1 and `status` = 'Y' order by `category_id`");
								while($show_menu = mysql_fetch_array($sql_menu))
								{
								?>
                            		<li><a href="architecture.php?cat_id=<?php echo $show_menu['category_id'];?>"><?php echo $show_menu['category_name'];?></a></li>
                                <?php
								}
								?>
                               
                            </ul>
                        </li>
                       	<li><a href="contact.php">CONTACT US</a></li>
                    </ul>
                </td>
              </tr>
            </table>

      </div>
    </div>
    <!--header section -->