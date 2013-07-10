<?php
session_start();
//if(!empty($_SESSION['username'])) { header('Location: dashboard.php'); }
if(!isset($_SESSION['User_ID'])) { header('Location: index.php'); }

include 'helper_functions.php';

print_r($_SESSION);
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>property site</title>

<script type="text/javascript">

function checkCheckBoxes() {
	
	var checked=false;
for(i=1;i<=4;i++)
{
	var id = "check_"+i;
	
        if(document.getElementById(id)){
	if(document.getElementById(id).checked == true)
	{
           
		checked=true;
		return true;
	}}
        	
}

if(false==checked)
	{
                
		alert ('Please select at least one site to post this advertisement.');
		return false;
	}
}</script>
</head>
<body>
  
<div id="page-heading"><h1>Site panel</h1></div>


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
			<?php show_step_titles(1); // highlight 2nd tab ?>
		</div>		<!--  end step-holder -->
		<!-- start id-form -->

			<form name="create_Ad"  onSubmit="return checkCheckBoxes();" action="create_Ad.php" method="post">
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		   <!--<font color='red'>  All the fields are required</font>-->
                    <?php //create_ad_Basic_Details();?>
                     <?php  //$cnt++;
        include 'db.php';
	 $tbl_name_sites='sites';
	 $tbl_name_user_site='user_site';
	  $App_ID=$_SESSION['User_ID'];
        $sql="SELECT * FROM $tbl_name_sites";
        $result=mysql_query($sql) or die('Cannot Execute:'. mysql_error());
         $cnt=1;
        while($row = mysql_fetch_array($result))
        {           
        $Site_ID=$row['Site_ID'];
        $Site_Name=$row['Site_Name'];?>
	
	
	<?php $sub_query="SELECT Site_Username,Site_Password FROM $tbl_name_user_site WHERE User_ID='$App_ID' AND Site_ID=$Site_ID";
                                //echo "$temp_query";
                                $res=mysql_query($sub_query);
                if(mysql_num_rows($res)>0)
		while($row = mysql_fetch_array($res))
                {
                        $Site_Username=$row['Site_Username'];
                        $Site_Password=$row['Site_Password'];
                      echo "<br>";
                   
                      
                      
                      
                       echo "<tr>";?><input id="check_<?php echo $cnt; ?>" type="checkbox" name="<?php echo $Site_Name;?>" value="<?php echo $Site_ID;?>" <?php  if(isset($_SESSION['selected_sites'])){  if(in_array($Site_Name, $_SESSION['selected_sites'])){  echo "checked=\"true\""; }}?> <?php if($Site_Username == "" || $Site_Password == ""){?>DISABLED <?php }?>/><?php echo "  ",$Site_Name;?><br /><?php echo "</tr>";?>
                        
                <?php
                }
                ?>
      
         <?php  $cnt++;
	 
        }?></tr><br><input type="submit" name="submit_Sites_Details" value="Next"/>
	
		
		</form>



		
	</td>
	</tr>
	</table>
</div>
	</td>
</tr>
</table>
</body>
</html>

	





		
 













































	