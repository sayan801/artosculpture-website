<?php include("header.php");
$cms1 = mysql_fetch_array(mysql_query("select * from `cms` where `page_id` = '1'"));
$cms2 = mysql_fetch_array(mysql_query("select * from `cms` where `page_id` = '2'"));
?> 
    
<!--slider section -->
    <div class="innerpage_body">
        <div class="wrapper">
            <div class="body_main">
       	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="65" align="left" class="heading"><?php echo $cms1['page_title'];?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="body_text">
                    	<?php echo str_replace('src="','src="admin/',stripslashes($cms1['page_desc']));?>
                        
                        <h3 class="heading" style="font-weight:normal; padding-bottom:8px; margin-top:35px;"><?php echo $cms2['page_title'];?></h3>
                        
                        <?php echo str_replace('src="','src="admin/',stripslashes($cms2['page_desc']));?>
                    </td>
                  </tr>
                </table>

            
            </div>
            <div class="clear"></div>
            <div class="body_bottom"></div>
      </div>
    </div>
<!--slider section -->

<?php include("footer.php");?> 