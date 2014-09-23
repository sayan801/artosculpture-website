<?php include("include/header.php");
include("image.class.php");
if($_REQUEST['flag'] == "1")
{
	mysql_query("insert into `album_cat` set `category_name` = '".addslashes($_REQUEST['category_name'])."', `status` = '$_REQUEST[status]'");
	echo "<script>location.href='manage_gallery_cat.php?msg=1'</script>";
}
if($_REQUEST['flag'] == "2")
{
	mysql_query("update `album_cat` set `category_name` = '".addslashes($_REQUEST['category_name'])."', `status` = '$_REQUEST[status]' where `category_id` = '$_REQUEST[category_id]'");
	echo "<script>location.href='manage_gallery_cat.php?msg=2'</script>";
}
if($_REQUEST['flag'] == "delete")
{
	mysql_query("delete from `album_cat` where `category_id` = '$_REQUEST[del_id]'");
	echo "<script>location.href='manage_gallery_cat.php?msg=3'</script>";
}
?>

<div id="page">
	<div class="inner">   
        <!--Start Of Edit Section -->
   <?php
   if($_REQUEST['flag'] == "edit" || $_REQUEST['flag'] == "add")
   {
   		$show=mysql_fetch_array(mysql_query("select * from `album_cat` where `category_id` = '$_REQUEST[edit_id]'"));
   ?>
        <div class="section">
            <div class="title_wrapper">
                <h2>Manage Portfolio Category</h2>
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
                                    	<input type="hidden" name="category_id" value="<?php echo $show['category_id']; ?>"/>
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
                                                    <label>Portfolio Name:</label>
                                                  <div class="inputs"><span class="input_wrapper">
                                                    <input type="text" class="text" name="category_name" value="<?php echo $show['category_name'];?>"/>
                                                  </span></div>
                                              </div>
                                              <div class="row">
                                                	<label>Status:</label>
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
																	if($_REQUEST['flag'] == "add")
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
                                                        <li><span class="button send_form_btn"><span><span><?php if($_REQUEST['flag'] == "add"){ ?>SAVE<?php } else
														{ ?>UPDATE<?php } ?></span></span>
                                                        <input name="" type="submit" /></span></li>
                                                        <li><span class="button cancel_btn"><span><span>CANCEL</span></span>
                                                        <input name="" type="button" onclick="location.href='manage_gallery_cat.php'" /></span></li>
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
		$sql=mysql_query("select * from `album_cat` order by `category_id`");
  ?>                     
     	<div class="section">
    		<div class="title_wrapper">
        		<h2>Manage Portfolio Category</h2>
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
                                                <th><a href="#">Add Portfolio Images</a></th>
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
                                                <td><?php echo $show['category_name']; ?></td>
                                                <td><a href="manage_gallery.php?category_id=<?php echo $show['category_id']; ?>"><img src="images/upload.png" alt="add"/></a></td>
                                                <td><?php if($show['status'] == "Y"){echo "Active";}else{echo "Inactive";} ?></td>
                                                <td style="width: 96px;">
                                                    <div class="actions_menu">
                                                        <ul>
                                                            <li><a class="edit" href="manage_gallery_cat.php?flag=edit&edit_id=<?php echo $show['category_id']; ?>">Edit</a></li>
                                                            <li><a class="delete" href="manage_gallery_cat.php?flag=delete&del_id=<?php echo $show['category_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a></li>
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
                                            <li><a href="manage_gallery_cat.php?flag=add" class="button add_new"><span><span>ADD NEW</span></span></a></li>
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