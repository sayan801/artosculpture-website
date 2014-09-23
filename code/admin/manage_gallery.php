<?php 
include("include/header.php");
include("image.class.php");
?>
<?php
if($_REQUEST['flag'] == "1")
{
	if($_FILES['banner_image']['name'] != "")
	{
		$updir = "photo/";
		$upname1=str_replace(' ','',time().$_FILES['banner_image']['name']);
		$upname = $updir.$upname1;
		if(move_uploaded_file($_FILES[banner_image][tmp_name],$upname))
		{
			$save_to_file = true;
			$image_quality = 100;
			$image_type = -1;
			$max_x1 = 224;
			$max_y1 = 165;
			$cut_x1 = 0;
			$cut_y1 = 0;
			$images_folder = 'photo/';
			$from_name=$upname1;
			$thumbs_folder = 'photo/th1_';
			$to_name = str_replace(' ','',time().$_FILES['banner_image']['name']);
			$save_to_file = 1;
			ini_set('memory_limit', '-1');
			$img = new Zubrag_image;
			$img->max_x        = $max_x1;
			$img->max_y        = $max_y1;
			$img->cut_x        = $cut_x1;
			$img->cut_y        = $cut_y1;
			$img->quality      = $image_quality;
			$img->save_to_file = $save_to_file;
			$img->image_type   = $image_type;
			$img->GenerateThumbFile($images_folder . $from_name, $thumbs_folder . $to_name);
			$picname1=$thumbs_folder . $to_name;
		}
	}
	mysql_query("insert into `gallery_images` set `category_id` = '$_REQUEST[category_id]', `photo_name` ='$_REQUEST[photo_name]', `photo_thumb` = '$picname1', `photo_big` = '$upname', `status` = '$_REQUEST[status]'");
	echo "<script>location.href='manage_gallery.php?msg=1&category_id=$_REQUEST[category_id]'</script>";
}
if($_REQUEST['flag'] == "2")
{
	if($_FILES['banner_image']['name'] != "")
	{
		$updir = "photo/";
		$upname1=str_replace(' ','',time().$_FILES['banner_image']['name']);
		$upname = $updir.$upname1;
		if(move_uploaded_file($_FILES[banner_image][tmp_name],$upname))
		{
			$save_to_file = true;
			$image_quality = 100;
			$image_type = -1;
			$max_x1 = 224;
			$max_y1 = 165;
			$cut_x1 = 0;
			$cut_y1 = 0;
			$images_folder = 'photo/';
			$from_name=$upname1;
			$thumbs_folder = 'photo/th1_';
			$to_name = str_replace(' ','',time().$_FILES['banner_image']['name']);
			$save_to_file = 1;
			ini_set('memory_limit', '-1');
			$img = new Zubrag_image;
			$img->max_x        = $max_x1;
			$img->max_y        = $max_y1;
			$img->cut_x        = $cut_x1;
			$img->cut_y        = $cut_y1;
			$img->quality      = $image_quality;
			$img->save_to_file = $save_to_file;
			$img->image_type   = $image_type;
			$img->GenerateThumbFile($images_folder . $from_name, $thumbs_folder . $to_name);
			$picname1=$thumbs_folder . $to_name;

		}
		mysql_query("update `gallery_images` set `photo_thumb` = '$picname1', `photo_big` = '$upname' where `photo_id` = '$_REQUEST[photo_id]'");
	}
	mysql_query("update `gallery_images` set `category_id` = '$_REQUEST[category_id]', `photo_name` ='$_REQUEST[photo_name]', `status` = '$_REQUEST[status]' where `photo_id` = '$_REQUEST[photo_id]'");
	echo "<script>location.href='manage_gallery.php?msg=2&&category_id=$_REQUEST[category_id]'</script>";
}
if($_REQUEST['flag'] == "delete")
{
	mysql_query("delete from `gallery_images` where `photo_id` = '$_REQUEST[del_id]'");
	echo "<script>location.href='manage_gallery.php?msg=3&category_id=$_REQUEST[category_id]'</script>";
}
?>
<div id="page">
	<div class="inner">   
        <!--Start Of Edit Section -->
   <?php
   if($_REQUEST['flag'] == "edit" || $_REQUEST['flag'] == "add")
   {
   		$show=mysql_fetch_array(mysql_query("select * from `gallery_images` where photo_id = '$_REQUEST[edit_id]' and `category_id` = '$_REQUEST[category_id]'"));
   ?>
        <div class="section">
            <div class="title_wrapper">
                <h2>Manage <?php echo $show['photo_name']; ?></h2>
                <span class="title_wrapper_left"></span>
                <span class="title_wrapper_right"></span>
            </div>
            <div class="section_content">
                <!--[if !IE]>start section content top<![endif]-->
                <div class="sct">
                    <div class="sct_left">
                        <div class="sct_right">
                            <div class="sct_left">
                                <div class="sct_right">                                  
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="search_form general_form" method="post" enctype="multipart/form-data">
                                    	<input type="hidden" name="photo_id" value="<?php echo $show['photo_id']; ?>"/>
                                        <input type="hidden" name="category_id" value="<?php echo $_REQUEST['category_id']; ?>"/>
									<?php
                                    if($_REQUEST['flag'] =="add")
                                    {
                                    ?>
                                        <input type="hidden" name="flag" value="1"/>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    	<input type="hidden" name="flag" value="2"/>
                                    <?php
                                    }
                                    ?>
                                        <fieldset>
                                            <div class="forms">
                                            	<div class="row">
                                                	<label>Photo Name:</label>
                                                	<div class="inputs">
                                                    	<span class="input_wrapper" style="width:300px;">
                                                        	<input class="text" name="photo_name" type="text" value="<?php echo $show['photo_name']; ?>" />
                                                        </span>
                                                	</div>
                                            	</div>
                                                <div class="row">
                                                	<label>Select Image:</label>
                                                	<div class="inputs">
                                                    	<span class="input_wrapper blank">
                                                        	<img src="<?php echo $show['photo_thumb'] ?>" width="100" alt="<?php echo $show['photo_name'] ?>">&nbsp;<input class="text" name="banner_image" id="banner_image" type="file"/>
                                                        </span>
                                                	</div>
                                            	</div>                                        
  												<div class="row">
                                                	<label style="width:150px;">Status:</label>
                                                	<div class="inputs">
                                                    	<span class="input_wrapper_blank">
                                                        	<input name="status" type="radio" value="Y"
															<?php if($_REQUEST['flag'] == "edit")
																	{
																		if($show['status'] == "Y")
																		{
																			echo "checked";
																		}
																	}
																	if($_REQUEST['flag'] == "add") //by default checked...
																	{
																		echo "checked";
																	}
															   ?> />&nbsp;Yes&nbsp;&nbsp;
                                                            
                                                            
                                                            <input name="status" type="radio" value="N"
															<?php if($show['status'] == "N")
															{
																echo "checked";
															}	  
																?> />&nbsp;No
                                                        </span>
                                                	</div>
                                            	</div>
                                            	<div class="row">
                                                <div class="buttons"> 
                                                    <ul style="list-style-type:none;">
                                                        <li><span class="button send_form_btn"><span><span>UPDATE</span></span>
                                                        <input name="" type="submit" /></span></li>
                                                        <li><span class="button cancel_btn"><span><span>CANCEL</span></span>
                                                        <input name="" type="button" onclick="location.href='manage_gallery.php?category_id=<?php echo $_REQUEST['category_id']; ?>'" /></span></li>
                                                    </ul>     
                                                           
                                                </div>
                                            </div>
                                           </div>
                                        </fieldset>  
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
  
            </div>
		</div>     
  <?php
  	}
	/*  End Of Edit Section */ 
	else
	{
		//$sql=mysql_query("select * from `gallery_images` where `category_id` = '$_REQUEST[category_id]' order by `photo_id`");
  ?>                     
     	<div class="section">
    		<div class="title_wrapper">
        		<h2>Manage Portfolio Photos</h2>
       			<span class="title_wrapper_left"></span>
        		<span class="title_wrapper_right"></span>
    		</div>
			<div class="section_content">
                <div class="sct">
                    <div class="sct_left">
                        <div class="sct_right">
                            <div class="sct_left">
                                <div class="sct_right">
							  <?php
                                if($_REQUEST['msg'] == "1")
                                {
                              ?>
                                    <ul class="system_messages">
                                        <li class="green"><span class="ico"></span><strong class="system_title">Successfully Added !</strong></li>
                                    </ul>
							  <?php
                                }
								if($_REQUEST['msg'] == "2")
                                {
                              ?>
                                    <ul class="system_messages">
                                        <li class="green"><span class="ico"></span><strong class="system_title">Successfully Updated !</strong></li>
                                    </ul>
							  <?php
                                }
								if($_REQUEST['msg'] == "3")
                                {
                              ?>
                                    <ul class="system_messages">
                                        <li class="green"><span class="ico"></span><strong class="system_title">Successfully Deleted !</strong></li>
                                    </ul>
							  <?php
                                }
								
                              ?>       
                                    <form action="#">
                                    <fieldset>
                                    <!--[if !IE]>start table_wrapper<![endif]-->
                                    <div class="table_wrapper">
                                        <div class="table_wrapper_inner">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                            <tr>
                                                <th>No.</th>
                                                <th><a href="#">Portfolio Name</a></th>
                                                <th><a href="#">Photo Name</a></th>
                                                <th><a href="#">Gallery Image</a></th>
                                                <th><a href="#">Status</a></th>
                                                <th style="width: 96px;">Actions</th>
                                            </tr>
										<?php
										$path = "manage_gallery.php?category_id=$_REQUEST[category_id]&";
										$query = "SELECT COUNT(*) as num FROM `gallery_images` where `category_id` = '$_REQUEST[category_id]'";
										$row = mysql_fetch_array(mysql_query($query));
										$total_pages = $row['num'];
								
										$adjacents = "2";
										$limit=10;
										$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
										$page = ($page == 0 ? 1 : $page);
									
										if($page)
										$start = ($page - 1) * $limit;
										else
										$start = 0;
									
										$sql = "select * from `gallery_images` where `category_id` = '$_REQUEST[category_id]' order by `photo_id` LIMIT $start, $limit";
										$result = mysql_query($sql);
										
											$prev = $page - 1;
											$next = $page + 1;
											$lastpage = ceil($total_pages/$limit);
											$lpm1 = $lastpage - 1;
										
											$pagination = "";
										if($lastpage > 1)
										{   
											$pagination .= "<div class='pagination'>";
										if ($page > 1)
											$pagination.= "<a href='".$path."page=$prev&search=$_REQUEST[search]'>« previous</a>";
										else
											$pagination.= "<span class='disabled'>« previous</span>";   
										
										if ($lastpage < 7 + ($adjacents * 2))
										{   
										for ($counter = 1; $counter <= $lastpage; $counter++)
										{
										if ($counter == $page)
											$pagination.= "<span class='current'>$counter</span>";
										else
											$pagination.= "<a href='".$path."page=$counter&search=$_REQUEST[search]'>$counter</a>";                   
										}
										}
										elseif($lastpage > 5 + ($adjacents * 2))
										{
										if($page < 1 + ($adjacents * 2))       
										{
										for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
										{
										if ($counter == $page)
											$pagination.= "<span class='current'>$counter</span>";
										else
											$pagination.= "<a href='".$path."page=$counter&search=$_REQUEST[search]'>$counter</a>";                   
										}
											$pagination.= "...";
											$pagination.= "<a href='".$path."page=$lpm1&search=$_REQUEST[search]'>$lpm1</a>";
											$pagination.= "<a href='".$path."page=$lastpage&search=$_REQUEST[search]'>$lastpage</a>";       
										}
										elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
										{
											$pagination.= "<a href='".$path."page=1&search=$_REQUEST[search]'>1</a>";
											$pagination.= "<a href='".$path."page=2&search=$_REQUEST[search]'>2</a>";
											$pagination.= "...";
										for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
										{
										if ($counter == $page)
											$pagination.= "<span class='current'>$counter</span>";
										else
											$pagination.= "<a href='".$path."page=$counter&search=$_REQUEST[search]'>$counter</a>";                   
										}
											$pagination.= "..";
											$pagination.= "<a href='".$path."page=$lpm1&search=$_REQUEST[search]'>$lpm1</a>";
											$pagination.= "<a href='".$path."page=$lastpage&search=$_REQUEST[search]'>$lastpage</a>";       
										}
										else
										{
											$pagination.= "<a href='".$path."page=1&search=$_REQUEST[search]'>1</a>";
											$pagination.= "<a href='".$path."page=2&search=$_REQUEST[search]'>2</a>";
											$pagination.= "..";
										for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
										{
										if ($counter == $page)
											$pagination.= "<span class='current'>$counter</span>";
										else
											$pagination.= "<a href='".$path."page=$counte&search=$_REQUEST[search]r'>$counter</a>";                   
										}
										}
										}
										
										if ($page < $counter - 1)
											$pagination.= "<a href='".$path."page=$next&search=$_REQUEST[search]'>next »</a>";
										else
											$pagination.= "<span class='disabled'>next »</span>";
											$pagination.= "</div>\n";       

										}
										
                                        $i=1;
                                        while($show=mysql_fetch_array($result))
                                        {
                                        ?>
                                            <tr class="first">
                                                <td><?php echo (($page-1)*10)+$i; ?></td>
                                                <?php
												$cat_name = mysql_fetch_array(mysql_query("select * from `album_cat` where `category_id` = '$show[category_id]'"));
												?>
                                                <td><?php if($show['category_id']> 0){ echo $cat_name['category_name'];}else{echo "No gallery is selected";} ?></td>
                                                <td><?php echo $show['photo_name']; ?></td>
                                                <td><img src="<?php echo $show['photo_thumb']; ?>" height="80" alt="<?php echo $show['photo_name']; ?>"/></td>
                                                <td><?php if($show['status'] == "Y"){echo "Active";}else{echo "Inactive";} ?></td>
                                                <td style="width: 96px;">
                                                    <div class="actions_menu">
                                                        <ul>
                                                            <li><a class="edit" href="manage_gallery.php?flag=edit&edit_id=<?php echo $show['photo_id']; ?>&category_id=<?php echo $_REQUEST['category_id']; ?>">Edit</a></li>
                                                            <li><a class="delete" href="manage_gallery.php?flag=delete&del_id=<?php echo $show['photo_id']; ?>&category_id=<?php echo $_REQUEST['category_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>	
										<?php
                                        $i++;
                                        }
                                        ?>
                                        </tbody></table>
                                        </div>
                                    </div>
                                    <div class="table_menu">
                                       <ul class="left">
                                            <li><a href="manage_gallery.php?flag=add&category_id=<?php echo $_REQUEST['category_id']; ?>" class="button add_new"><span><span>ADD NEW</span></span></a></li>
                                            <li><a href="manage_gallery_cat.php?category_id=<?php echo $_REQUEST['category_id']; ?>" class="button add_new"><span><span>Previous Page</span></span></a></li>
                                        </ul>
                                        <?php echo $pagination;?>
                                    </div>
                                    </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
			</div>
            <!--[if !IE]>end section content<![endif]-->
        </div>
  <?php
	}
  ?>  
    </div>
</div>
<?php 
	include("include/left_sidebar.php");
	include("include/footer.php");
	?>