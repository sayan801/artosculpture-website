<?php include("header.php");?>    
<!--slider section -->
<div class="wrapper_slider">
    
    <div class="carousel-container">
      <div id="carousel">
      <?php
		$sql_ban = mysql_query("select * from `banner` where `status` = 'Y' order by `banner_id`");
		while($show_ban = mysql_fetch_array($sql_ban))
		{
		?>
            <div class="carousel-feature">
              <a href="architecture.php?cat_id=<?php echo $show_ban['category_id'];?>"><img class="carousel-image" alt="<?php echo $show_ban['banner_name'];?>" src="<?php echo "admin/".$show_ban['banner_thumb'];?>"></a>                          
            </div>
        <?php
		}
		?>
        
        
        
      </div>
    </div>
</div>
    
<!--slider section -->
<?php include("footer.php");?>
