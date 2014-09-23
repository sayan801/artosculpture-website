<?php include("header.php");
if($_REQUEST['flag']=="1")
{	
	$to  = "subhodeeppal@gmail.com";
	$subject = "Email From Art O sculpture Feedback Section";
	$message = "<html>
	<head>
	<title>Email From Art O sculpture Feedback Section</title>
	</head>
	<body>
	<p><strong>Name:&nbsp;</strong> ". $_REQUEST['name']."</p>
	<p><strong>Email ID:&nbsp;</strong> ". $_REQUEST['email_id'] ."</p>
	<p><strong>Contact No.:&nbsp;</strong>". $_REQUEST['contact_no'] ."</p>
	<p><strong>Subject:&nbsp;</strong>". $_REQUEST['subject'] ."</p>
	<p><strong>Message:&nbsp;</strong>". $_REQUEST['message'] ."</p>

	<br /><br />
	-------------------------------------<br />
	This message was sent via Art O sculpture Feedback Section
	</p>
	</body>
	</html>
	";
	$headers  = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$headers .= "From: $_REQUEST[name] <$_REQUEST[email_id]>" . "\r\n";
	if(mail($to, $subject, $message, $headers))
	{
		echo "<script>location.href='contact.php?msg=1'</script>";
	}
	else
	{
		echo "<script>location.href='contact.php?msg=2'</script>";
	}
}
?>
<script type="text/ecmascript" language="javascript">
function field_check()
{
	if($('#name').val() == "")
	{
		alert("Please enter your Full Name");
		$('#name').focus();
		return false;
	}
	if($('#contact_no').val() == "")
	{
		alert("Please enter your Contact No.");
		$('#contact_no').focus();
		return false;
	}
	if($('#email_id').val() == "")
	{
		alert("Please enter your Email Address");
		$('#email_id').focus();
		return false;
	}
	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
	var returnval=emailfilter.test($('#email_id').val());
	if (returnval==false)
	{
		alert("Please enter a valid Email Address");
		$('#email_id').focus();
		return returnval;
	}
	
	if($('#message').val() == "")
	{
		alert("Please enter your Message.");
		$('#message').focus();
		return false;
	}
}
</script>
    
<!--slider section -->
    <div class="innerpage_body">
        <div class="wrapper">
            <div class="body_main">
       	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="65" align="left" class="heading">Contact Us</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="body_text">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="37%" align="left" valign="top" style="padding-top:10px;">
                            	<?php
								$cms1 = mysql_fetch_array(mysql_query("select * from `cms` where `page_id` = '3'"));
								echo str_replace('src="','src="admin/',stripslashes($cms1['page_desc']));
								?>
                            </td>
                            <td width="63%" align="left" valign="top" style="padding-top:10px;">
                            <form name="email" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onsubmit="return field_check();">
                                <input type="hidden" name="flag" value="1"/>
                                <?php
                                if($_REQUEST['msg'] == "1")
                                {
                                ?>
                                    <p><strong>Email has been successfully sent.</strong></p><br />
                        
                                <?php
                                }
                                else if($_REQUEST['msg'] == "2")
                                {
                                ?>
                                    <p><strong>Sorry !! Please Try again.</strong></p><br />
                        
                                <?php
                                }
                                ?>
                            	<p><input name="name" id="name" type="text" placeholder="Name*" class="text_box" /></p>
                                <p><input name="contact_no" id="contact_no" type="text" placeholder="Contact No.*" class="text_box" /></p>
                                <p><input name="email_id" id="email_id" type="text" placeholder="Email ID*" class="text_box" /></p>
                                <p><input name="subject" id="subject" type="text" placeholder="Subject" class="text_box" /></p>
                                <p><textarea name="message" id="message" cols=""  placeholder="Message*" class="text_area" rows=""></textarea></p>
                                <p><input name="" type="submit" class="submit" style="font-size:16px;" value="Submit" /></p>
                            </form>
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