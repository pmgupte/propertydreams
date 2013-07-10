<?php
session_start();
//if(!empty($_SESSION['username'])) { header('Location: dashboard.php'); }
if(!isset($_SESSION['User_ID'])) { header('Location: index.php'); }

include 'helper_functions.php';
echo "dir";
$directory=dirname($_SERVER['PHP_SELF']);
//echo (_FILE_);

get_Site_Details();


print_r($_SESSION);
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
$validation_str[]="step1_".$site."(this)";
}
$validation_calls="return (" . implode(' && ',$validation_str) . ");";
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

	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
		<td>	
	
		<!--  start step-holder -->
				<div id="step-holder">
					<?php show_step_titles(2); // highlight step 1 ?>
				</div>		<!--  end step-holder -->
		
		<form name="step1"  onSubmit="<?php echo $validation_calls;?>;" action="location.php" method="post">
		
                    <!--<font color='red'>  All the fields are required</font>-->
                    <?php create_ad_Basic_Details();?>
		                
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
					<h3>SELECTED SITES</h3>
					
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
		
		</form>
		</td>
	</tr>
					<tr>
					<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
					<td></td>
					</tr>
	</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
	
	
	
	
<td id="tbl-border-right"></td>

<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr> 
</table>
</body>
</html>
