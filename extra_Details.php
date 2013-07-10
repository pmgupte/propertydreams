<?php
session_start();
if(!isset($_SESSION['User_ID'])) { header('Location: index.php'); }

//include 'header.php';
include 'helper_functions.php';
//include 'db.php';
$directory=dirname($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>property site</title>
<?php foreach($_SESSION['selected_sites'] as $site){ echo "Including $site.js";?>
<script language="javascript" src="<?php echo $directory?>/js/site_validations/<?php echo $site?>.js">
</script>
<?php }?>
</head>

<body>
  
<?php
$validation_str=array();
foreach($_SESSION['selected_sites'] as $site){
$validation_str[]="step3_".$site."(this)";
}
$validation_calls="return (" . implode(' && ',$validation_str) . ");";
?>

<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

</head>
<body>
<?php 

if(isset($_POST['postal_Code']))
{
$_SESSION['postal_Code']=$_POST['postal_Code'];
}

if(isset($_POST['street']))
{
$_SESSION['street']=$_POST['street'];
}

if(isset($_POST['district']))
{
$_SESSION['district']=$_POST['district'];
}

if(isset($_POST['estate']))
{
$_SESSION['estate']=$_POST['estate'];
}

if(isset($_POST['landmark'])){
$_SESSION['landmark']=$_POST['landmark'];
}

if(isset($_POST['contact_no'])){
$_SESSION['contact_no']=$_POST['contact_no'];
}

if(isset($_POST['block_No'])){
$_SESSION['block_No']=$_POST['block_No'];
}
?>


<div id="page-heading"><h1>Create New Ad</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<?php show_step_titles(4); // highlight step 4 ?>
		</div>		<!--  end step-holder -->
		<!-- start id-form -->
		<FORM name="step3" action="summary.php" onsubmit="<?php echo $validation_calls;?>" method="post">
			
		<?php  create_ad_Extra_Details();?>
		<?php ?>
		 <?php //get_Site_Details();?>
		 <!--Started the code for Right side panel-->
		 <td>
			

	<!--  start related-activities -->
	<div id="related-activities">
		
		<!--  start related-act-top -->
		<div id="related-act-top">
		<img src="images/forms/header_related_act.gif" width="271" height="43" alt="" />
		</div>
		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<div id="related-act-bottom">
		
			<!--  start related-act-inner -->
			<div id="related-act-inner">
			
				<div class="left"><a href=""><img src="images/forms/icon_plus.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h3>SITES</h3>
					
					<b>
                <?php view_rightcorner_site_panel();?>
                            
                </b>
					
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
						
				<div class="clear"></div>
				
			</div>
			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>
		<!-- end related-act-bottom -->
	
	</div>
	<!-- end related-activities -->

</td>
		 <tr>
		 <td>
		 
		
		</td>
		 </tr>
		 <!--End the code for Right side panel-->
		</FORM>
	</td>
	</tr>
	</table>
</div>
	</td>
</tr>
</table>
</body>
</html>
