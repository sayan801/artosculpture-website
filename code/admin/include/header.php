<?php 
session_start();
include("lib/connection.php"); 
if($_SESSION[login]!="true")
{
	echo "<script>location.href='login.php?msg=1'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<title>Administration Panel</title>
<link media="screen" rel="stylesheet" type="text/css" href="css/admin.css"  />
<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="css/admin-ie.css" /><![endif]-->

<script type="text/javascript" src="js/behaviour.js"></script>
<style type="text/css">
.pagination {
font-family:Arial, Helvetica, sans-serif;
padding: 4px;
margin: 0px;
float:right;
width:auto;
}
.pagination a {
	padding:4px;
	margin:2px;
	border:1px solid #67DE76;
	text-decoration:none;
	color: #1A5601;
	font-weight:bold;
	background-color:#DDF8DC;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;
}
.pagination a:hover, .pagination a:active {
	border: 1px solid #999;
	color: #1E598E;
	text-decoration:none;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;

}
.pagination span.current {
	margin: 2px;
	padding:4px;
	border: 1px solid #060;
	font-weight: bold;
	background-color: #1EA22F;
	color: #FFF;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;

	}
	.pagination span.disabled {
	padding:4px;
	margin:2px;
	border:1px solid #060;
	color:#030;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;	
	background:#ffffff;
	}	
</style>
</head>

<body>
	<div id="wrapper">
		<div id="head">
			<div id="logo_user_details">
				<h1 id="logo"><a href="#">websitename Administration Panel</a></h1>
				<div id="user_details">
					<ul id="user_details_menu">
						<li>Welcome <strong>Administrator</strong></li>
						<li>
							<ul id="user_access">
								<li class="last"><a href="logout.php">Log out</a></li>
							</ul>
						</li>
						<!--<li><a class="new_messages" href="#">4 new messages</a></li>-->
					</ul>
					<div id="server_details">
						<dl>
							<dt>Server time :</dt>
							<dd>6:45 AM</dd>
						</dl>
						<dl>
							<dt>Last login ip :</dt>
							<dd>192.168.0.15</dd>
						</dl>
					</div>
					<!--[if !IE]>start search<![endif]-->
					<!--<div id="search_wrapper">
						<form action="#">
							<fieldset>
								<label>
									<input class="text" name="" type="text" />
								</label>
								<span class="go"><input name="" type="submit" /></span>
							</fieldset>
						</form>
						<ul id="search_wrapper_menu">
							<li class="first"><a href="#">Advanced Search</a></li>
							<li class="last"><a href="#">Admin Map</a></li>
						</ul>
					</div>-->
				<!--[if !IE]>end search<![endif]-->
				</div>
			</div>
			<div id="menus_wrapper">	
				<div id="main_menu">
					<ul>
						<li><a href="#" class="selected"><span><span>Main Controls</span></span></a></li>
						<!--<li><a href="#"><span><span>Server Settings</span></span></a></li>
						<li><a href="#"><span><span>Product Management</span></span></a></li>
						<li><a href="#"><span><span>User Accounts</span></span></a></li>
						<li><a href="#"><span><span>SEO</span></span></a></li>
						<li class="last"><a href="#"><span><span>Static Pages</span></span></a></li>-->
					</ul>
				</div>
				
				
				
				<div id="sec_menu">
					<ul>
                    	<li>&nbsp;</li>
						<!--<li><a href="#" class="sm1">Security Settings</a></li>
						<li><a href="#" class="sm2">Chat and PMs</a></li>
						<li><a href="#" class="sm3">Search Options</a></li>
						<li><a href="#" class="sm4">Moderators</a></li>
						<li><a href="#" class="sm5">Upload Options</a></li>
						<li><a href="#" class="sm6">Download Options</a></li>
						<li><a href="#" class="sm7">Emails</a></li>
						<li>
							<span class="drop"><span><span><a href="#" class="sm8">More</a></span></span></span>
							<ul>
								<li><a class="sm6" href="#">Download options</a></li>
								<li><a class="sm4" href="#">Menu item</a></li>
								<li><a class="sm6" href="#">Download options</a></li>
								<li><a class="sm6" href="#">Download options</a></li>
								<li><a class="sm6" href="#">Download options</a></li>
							</ul>
						</li>-->
					</ul>
				</div>
			</div>	
		</div>
        <div id="content">
