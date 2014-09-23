<?php include("header.php");
if($_REQUEST['type'] == "O")
{
	$project_type = "Ongoing Projects";
}
else
{
	$project_type = "Completed Projects";
}
?> 
    
<!--slider section -->
    <div class="innerpage_body">
        <div class="wrapper">
            <div class="body_main">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="65" align="left" class="heading"><?php echo $project_type;?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="body_text">
                     <?php
					 $sql_pro = mysql_query("select * from `projects` where 1 and `project_status` = '$_REQUEST[type]' order by `project_id`");
					 while($show_pro = mysql_fetch_array($sql_pro))
					 {
					 ?> 
                       <div class="projects">
                        <table width="890" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="29%" >
                            <div class="project_image"><img src="<?php echo "admin/".$show_pro['project_thumb'];?>" alt="<?php echo $show_pro['project_name'];?>" /></div>
                            </td>
                            <td width="71%" align="left" valign="top" class="body_text">
                                <h2 class="projects_heading"><?php echo $show_pro['project_name'];?></h2>
                                <?php echo stripslashes($show_pro['project_desc']);?>
    
                            </td>
                          </tr>
                        </table>
    
                       </div> 
                     <?php
					 }
					 ?>
                       
                      <!-- <div class="projects">
                        <table width="890" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="29%" >
                            <div class="project_image"><img src="images/project2.png" alt="projects" /></div>
                            </td>
                            <td width="71%" align="left" valign="top" class="body_text">
                                <h2 class="projects_heading">Projects Heading</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis pharetra justo sed semper. Praesent eu purus ipsum. Sed lacinia placerat congue. Phasellus velit massa, egestas blandit tristique in, imperdiet in libero. Ut porttitor nibh nisl, dictum egestas lacus fermentum ut. Duis nibh orci, sodales blandit neque et, pellentesque volutpat eros. Curabitur mattis pellentesque dui, quis consectetur urna ultricies vitae. Morbi scelerisque magna ante, id lobortis nisl condimentum non. Ut vestibulum convallis magna, non mollis elit vulputate a. Nam suscipit neque vel nunc cursus elementum. Aliquam sed gravida neque. Curabitur at sapien sit amet magna volutpat malesuada vitae at quam. Cras tincidunt lobortis semper. Sed faucibus ante vitae elementum malesuada.</p>
    
                            </td>
                          </tr>
                        </table>
    
                       </div>
                       
                       <div class="projects">
                        <table width="890" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="29%" >
                            <div class="project_image"><img src="images/project3.png" alt="projects" /></div>
                            </td>
                            <td width="71%" align="left" valign="top" class="body_text">
                                <h2 class="projects_heading">Projects Heading</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis pharetra justo sed semper. Praesent eu purus ipsum. Sed lacinia placerat congue. Phasellus velit massa, egestas blandit tristique in, imperdiet in libero. Ut porttitor nibh nisl, dictum egestas lacus fermentum ut. Duis nibh orci, sodales blandit neque et, pellentesque volutpat eros. Curabitur mattis pellentesque dui, quis consectetur urna ultricies vitae. Morbi scelerisque magna ante, id lobortis nisl condimentum non. Ut vestibulum convallis magna, non mollis elit vulputate a. Nam suscipit neque vel nunc cursus elementum. Aliquam sed gravida neque. Curabitur at sapien sit amet magna volutpat malesuada vitae at quam. Cras tincidunt lobortis semper. Sed faucibus ante vitae elementum malesuada.</p>
    
                            </td>
                          </tr>
                        </table>
    
                       </div>-->
                        
                        
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