<?php include("header.php");?> 
    
<!--slider section -->
    <div class="innerpage_body">
        <div class="wrapper">
            <div class="body_main">
       	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
            	<?php
				$cat_name = mysql_fetch_array(mysql_query("select `category_name` from `album_cat` where `category_id` = '$_REQUEST[cat_id]'"));
				?>
                  <tr>
                    <td height="65" align="left" class="heading"><?php echo $cat_name['category_name'];?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="body_text">
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="21%" align="left" valign="top" class="left_link">
								<?php
                                $sql_cat = mysql_query("select * from `album_cat` where 1 and `status` = 'Y'");
                                while($show_cat = mysql_fetch_array($sql_cat))
                                {
                                ?>
                                    <a href="architecture.php?cat_id=<?php echo $show_cat['category_id'];?>" <?php if($show_cat['category_id']==$_REQUEST['cat_id']){?>class="active"<?php }?>><?php echo $show_cat['category_name'];?></a>
                                <?php
                                }
                                ?>   
                            </td>
                            <td width="79%" valign="top" align="left" style="padding-left:10px;">
                          		<ul class="gallery clearfix">
                            		<?php
									$sql_post = mysql_query("select * from `gallery_images` where 1 and `category_id` = '$_REQUEST[cat_id]' order by `photo_id`");
									while($show_post = mysql_fetch_array($sql_post))
									{
									?>
                                		<li><a href="<?php echo "admin/".$show_post['photo_big'];?>" title="<?php echo $show_post['photo_name'];?>" rel="prettyPhoto[gallery2]"><img src="<?php echo "admin/".$show_post['photo_thumb'];?>" width="178"  height="130" alt="<?php echo $show_post['photo_name'];?>" /></a></li>
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
            <div class="clear"></div>
            <div class="body_bottom"></div>
      </div>
    </div>
<!--slider section -->
<?php include("footer.php");?> 