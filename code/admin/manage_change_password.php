<?php 
include("include/header.php");
include("image.class.php");
?>
<?php
if($_REQUEST['flag'] == "2" && $_REQUEST['username'] != "" && $_REQUEST['fresh_password'] != "")
{
	mysql_query("update `admin` set `username` = '$_REQUEST[username]', `fresh_password` = '$_REQUEST[fresh_password]', `password` = '".md5($_REQUEST['fresh_password'])."' where `id` = '".$_SESSION['admin_id']."'");
	echo "<script>location.href='manage_change_password.php?msg=1'</script>";
}
else if($_REQUEST['flag'] == "2" && ($_REQUEST['username'] == "" || $_REQUEST['fresh_password'] == ""))
{
	echo "<script>location.href='manage_change_password.php?msg=2'</script>";
}
?>
<div id="page">
	<div class="inner">   
        <!--Start Of Edit Section -->
        <div class="section">
            <div class="title_wrapper">
                <h2>Change Password</h2>
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
                                    	<input type="hidden" name="flag" value="2"/>
                                        <?php
									  if($_REQUEST['msg'] == "1")
									  {
									  ?>
										<h3 style="color:#C7166A">Your admin password has been successfully changed.</h3>
									  <?php
									  }
									  if($_REQUEST['msg'] == "2")
									  {
									  ?>
										<h3 style="color:#C7166A">Sorry!!Please insert both usrname &amp; password.</h3>
									  <?php
									  }
									  ?>
                                        <fieldset>
                                            <div class="forms">
                                            <div class="row">
                                                	<label style="width:200px;">New Username:</label>
                                                	<div class="inputs">
                                                    	<span class="input_wrapper" style="width:300px;">
                                                        	<input class="text" name="username" type="text"/>
                                                        </span>
                                                	</div>
                                            	</div>
                                            	<!--<div class="row">
                                                	<label style="width:200px;">Old Password:</label>
                                                	<div class="inputs">
                                                    	<span class="input_wrapper" style="width:300px;">
                                                        	<input class="text" name="illustration_desc" type="password"/>
                                                        </span>
                                                	</div>
                                            	</div>-->
                                                <div class="row">
                                                	<label style="width:200px;">New password:</label>
                                                	<div class="inputs">
                                                    	<span class="input_wrapper" style="width:300px;">
                                                        	<input class="text" name="fresh_password" type="password"/>
                                                        </span>
                                                	</div>
                                            	</div>
                                               <!-- <div class="row">
                                                	<label style="width:200px;">Confirm New Password:</label>
                                                	<div class="inputs">
                                                    	<span class="input_wrapper" style="width:300px;">
                                                        	<input class="text" name="illustration_desc" type="password"/>
                                                        </span>
                                                	</div>
                                            	</div>-->
                                            	<div class="row">
                                                <div class="buttons"> 
                                                    <ul style="list-style-type:none;">
                                                        <li><span class="button send_form_btn"><span><span>UPDATE</span></span>
                                                        <input name="" type="submit" /></span></li>
                                                        <li><span class="button cancel_btn"><span><span>CANCEL</span></span>
                                                        <input name="" type="button" onclick="location.href='manage_change_password.php'" /></span></li>
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
 <?php /*?> <?php
		$sql=mysql_query("select * from `graphics_illustartion_gallery` where `gallery_type` = 'graphics' order by `illustration_id`");
  ?>                     
     	<div class="section">
    		<div class="title_wrapper">
        		<h2>Change Password</h2>
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
                                                <th><a href="#">Image Description</a></th>
                                                <th><a href="#">Graphics &amp; Illustration Image</a></th>
                                                <th>Status</th>
                                                <th style="width: 96px;">Actions</th>
                                            </tr>
										<?php
                                        $i=1;
                                        while($show=mysql_fetch_array($sql))
                                        {
                                        ?>
                                            <tr class="first">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $show['illustration_desc']; ?></td>
                                                <td><img src="<?php echo $show['illustration_img']; ?>" alt="" height="90" width=""/></td>
                                                <td><?php if($show['status']=="Y"){echo "Active";}else{echo "Inactive";}?></td>
                                                <td style="width: 96px;">
                                                    <div class="actions_menu">
                                                        <ul>
                                                            <li><a class="edit" href="manage_change_password.php?flag=edit&edit_id=<?php echo $show['illustration_id']; ?>">Edit</a></li>
                                                            <li><a class="delete" href="manage_change_password.php?flag=delete&del_id=<?php echo $show['illustration_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a></li>
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
                                       <!--<ul class="left">
                                            <li><a href="manage_change_password.php?flag=add" class="button add_new"><span><span>ADD NEW</span></span></a></li>
                                        </ul>-->
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
        </div><?php */?>
 
    </div>
</div>
<?php 
	include("include/left_sidebar.php");
	include("include/footer.php");
	?>