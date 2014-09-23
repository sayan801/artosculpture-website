
	<div class="footer_wrapper">
    	<div class="wrapper">
   	    <table width="100%" height="226" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top" style="padding-left:22px;" width="580">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="58" align="left" valign="middle" class="heading">Our Clients</td>
                      </tr>
                      <tr>
                        <td height="96" align="left" valign="top">
                        	<div class="client_slider">
                            	<div class="first">
                                    <div id="ticker-1">
                                    <?php
                                    $sql_logo = mysql_query("select * from `client_logo` where `status` = 'Y' order by `logo_id`");
                                    while($show_logo = mysql_fetch_array($sql_logo))
                                    {
                                    ?>
                                        <a href="<?php echo $show_logo['link_page'];?>" target="blank"><img src="<?php echo "admin/".$show_logo['logo_thumb'];?>" alt="<?php echo $show_logo['client_name'];?>" /></a>
                                    <?php
                                    }
                                    ?>
                                        
                                    </div>
                            	</div>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td height="40" align="left" valign="middle" class="copyright" style="padding-top:15px;">
                        &copy; 2013 Copyright Art O Sculpture  |  Powerd By <a href="#" target="_blank">Nextstep Creation</a></td>
                      </tr>
                    </table>

                </td>
                <td align="left" valign="top" width="398">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                       <tr>
                        <td height="58" align="left" valign="middle" class="heading">Testimonials</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" height="154">
                        	<ul id="mycarousel" class="jcarousel-skin-tango">
                            	<?php
								$sql_testi = mysql_query("select * from `testimonials` where `status` = 'Y' order by `testimonial_id`");
								while($show_testi = mysql_fetch_array($sql_testi))
								{
								?>
                                    <li>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="84" height="154" align="left" valign="top"  class="client_image"><img src="<?php echo "admin/".$show_testi['client_thumb'];?>" alt="<?php echo stripslashes($show_testi['client_name']);?>" /><br /></td>
                                            <td width="314" align="left" valign="top" style="background:url(images/testimonial_bg.png) no-repeat left top;">
                                                <div class="testimoanial">
                                                    <h2><?php echo stripslashes($show_testi['client_name']);?></h2>
                                                    <h3><?php echo stripslashes($show_testi['client_designation']);?></h3>
                                                    <?php echo stripslashes($show_testi['testimonial_desc']);?>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="2" height="35" align="right" valign="middle" style="padding-right:16px;"><a href="#" class="readmore">Read More</a></td>
                                          </tr>
                                        </table>
            
                                    </li>
                                <?php
								}
								?>
                                        
                             </ul>
                        </td>
                      </tr>
                    </table>

                </td>
              </tr>
            </table>

      </div>
    </div>
</body>
</html>