<?php 
session_start();
if(!isset($_SESSION['User_ID'])) { header('Location: index.php'); }


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php //This is Header file
include 'helper_functions.php';
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
$validation_str[]="step2_".$site."(this)";
}
$validation_calls="return (" . implode(' && ',$validation_str) . ");";
?>


<?php 
// include 'header.php';
include 'db.php';


if(isset($_POST['property_name'])){
$_SESSION['property_name']=$_POST['property_name'];
}
if(isset($_POST['Type'])){
$_SESSION['Type']=$_POST['Type'];
}
if(isset($_POST['price'])){
$_SESSION['price']=$_POST['price'];}
if(isset($_POST['area'])){
$_SESSION['area']=$_POST['area'];}
if(isset($_POST['builtup_Area'])){
$_SESSION['builtup_Area']=$_POST['builtup_Area'];}
//$_SESSION['units']=$_POST['units'];
if(isset($_POST['property_type_group'])){
$_SESSION['property_type_group']=$_POST['property_type_group'];}
if(isset($_POST['valuation_price'])){
$_SESSION['valuation_price']=$_POST['valuation_price'];}
if(isset($_POST['no_of_rooms'])){
$_SESSION['no_of_rooms']=$_POST['no_of_rooms'];}
if(isset($_POST['no_of_bedrooms'])){ $_SESSION['no_of_bedrooms']=$_POST['no_of_bedrooms'];}
if(isset($_POST['no_of_bathrooms'])){
$_SESSION['no_of_bathrooms']=$_POST['no_of_bathrooms'];}
if(isset($_POST['description'])){
$_SESSION['description']=$_POST['description'];}
if(isset($_POST['Minimum_Term'])){
$_SESSION['Minimum_Term']=$_POST['Minimum_Term'];}



echo "<br>";
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
			<?php show_step_titles(3); // highlight 2nd tab ?>
		</div>		<!--  end step-holder -->
		<!-- start id-form -->
		<FORM name="step2" action="extra_Details.php" onSubmit="<?php echo $validation_calls;?>" method="post" >
		<?php  create_ad_Location_Details();?>
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
