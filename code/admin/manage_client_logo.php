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
			$max_x1 = 145;
			$max_y1 = 60;
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
	mysql_query("insert into `client_logo` set `client_name` = '".addslashes($_REQUEST['client_name'])."', `link_page` = '".addslashes($_REQUEST['link_page'])."', `logo_thumb` = '$picname1', `logo_big` = '$upname', `status` = '$_REQUEST[status]'");
	echo "<script>location.href='manage_client_logo.php?msg=1'</script>";
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
			$max_x1 = 145;
			$max_y1 = 60;
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
		mysql_query("update `client_logo` set `logo_thumb` = '$picname1', `logo_big` = '$upname' where `logo_id` = '$_REQUEST[logo_id]'");
	}
	mysql_query("update `client_logo` set `client_name` = '".addslashes($_REQUEST['client_name'])."', `link_page` = '".addslashes($_REQUEST['link_page'])."', `status` = '$_REQUEST[status]' where `logo_id` = '$_REQUEST[logo_id]'");
	echo "<script>location.href='manage_client_logo.php?msg=2'</script>";
}
if($_REQUEST['flag'] == "delete")
{
	mysql_query("delete from `client_logo` where `logo_id` = '$_REQUEST[del_id]'");
	echo "<script>location.href='manage_client_logo.php?msg=3'</script>";
}
?> 
<div id="page">
	<div class="inner">   
        <!--Start Of Edit Section -->
   <?php
   if($_REQUEST['flag'] == "edit" || $_REQUEST['flag'] == "add")
   {
   		$show=mysql_fetch_array(mysql_query("select * from `client_logo` where `logo_id` = '$_REQUEST[edit_id]'"));
   ?>
        <div class="section">
            <div class="title_wrapper">
                <h2>Manage Client Logos</h2>
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
                                    	<input type="hidden" name="logo_id" value="<?php echo $show['logo_id']; ?>"/>
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
                                                	<label style="width:120px;">Client Name:</label>
                                                	<div class="inputs">
                                                    	<span class="input_wrapper">
                                                        	<input class="text" name="client_name" type="text" value="<?php echo stripslashes($show['client_name']); ?>" />
                                                        </span>
                                                	</div>
                                            	</div>
                                                <div class="row">
                                                	<label style="width:120px;">Client Site URL:</label>
                                                	<div class="inputs">
                                                    	<span class="input_wrapper" style="width:300px;">
                                                        	<input class="text" name="link_page" type="text" value="<?php echo stripslashes($show['link_page']); ?>" />
                                                        </span>
                                                	</div>
                                            	</div>
                                                <div class="row">
                                                	<label style="width:130px;">Client Image:</label>
                                                	<div class="inputs">
                                                    	<span class="input_wrapper blank">
                                                        	<img src="<?php echo $show['logo_thumb'] ?>" width="145" alt="<?php echo $show['client_name'] ?>">&nbsp;<input class="text" name="banner_image" id="banner_image" type="file"/>
                                                        </span>
                                                	</div>
                                            	</div>
                                              
  												<div class="row">
                                                	<label style="width:120px;">Status:</label>
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
                                                        <li><span class="button send_form_btn"><span><span><?php if($_REQUEST['flag'] == "add"){ ?>SAVE<?php } 
														if($_REQUEST['flag'] == "edit")
														{ ?>UPDATE<?php } ?></span></span>
                                                        <input name="" type="submit" /></span></li>
                                                        <li><span class="button cancel_btn"><span><span>CANCEL</span></span>
                                                        <input name="" type="button" onclick="location.href='manage_client_logo.php'" /></span></li>
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
		$sql=mysql_query("select * from `client_logo` order by `logo_id`");
  ?>                     
     	<div class="section">
    		<div class="title_wrapper">
        		<h2>Manage Client Logos</h2>
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
                                                <th><a href="#">Client Name</a></th>
                                                <th><a href="#">Client Site URL</a></th>
                                                <th><a href="#">Client Image</a></th>
                                                <th><a href="#">Status</a></th>
                                                <th style="width: 96px;">Actions</th>
                                            </tr>
										<?php
                                        $i=1;
                                        while($show=mysql_fetch_array($sql))
                                        {
                                        ?>
                                            <tr class="first">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $show['client_name']; ?></td>
                                                <td><?php echo $show['link_page']; ?></td>
                                                <td><img src="<?php echo $show['logo_thumb']; ?>" width="145" alt="<?php echo $show['client_name']; ?>"/></td>
                                                <td><?php if($show['status'] == "Y"){echo "Active";}else{echo "Inactive";} ?></td>
                                                <td style="width: 96px;">
                                                    <div class="actions_menu">
                                                        <ul>
                                                            <li><a class="edit" href="manage_client_logo.php?flag=edit&edit_id=<?php echo $show['logo_id']; ?>">Edit</a></li>
                                                            <li><a class="delete" href="manage_client_logo.php?flag=delete&del_id=<?php echo $show['logo_id']; ?>">Delete</a></li>
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
                                           <li><a href="manage_client_logo.php?flag=add" class="button add_new"><span><span>ADD NEW</span></span></a></li>
                                        </ul>
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