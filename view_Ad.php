<?php //include 'header.php'
session_start();
if(!isset($_SESSION['User_ID'])) { header('Location: index.php'); }
include 'helper_functions.php';

//Obtain the required page number
if (isset($_GET['pageno'])) {
   $pageno = $_GET['pageno'];
} else {
   $pageno = 1;
} // if

//Identify how many database rows are available
		 if(isset($_GET['id']))
				{
				$id=$_GET['id'];
				if("Trash"==$id)
				{$is_active=0;}
				}
		else
				{
					$is_active=1;
				}
$numrows=count_records_for_view($is_active);
echo "$numrows no of rows";
//Calculate number of $lastpage
$rows_per_page = 10;
$lastpage      = ceil($numrows/$rows_per_page);

//Ensure that $pageno is within range
$pageno = (int)$pageno;
if ($pageno > $lastpage) {
   $pageno = $lastpage;
} // if
if ($pageno < 1) {
   $pageno = 1;
} // if

//Construct LIMIT clause
$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
$temp = (($pageno - 1) * $rows_per_page)+1;
$temp_last=(($pageno - 1) * $rows_per_page)+$rows_per_page;

if($temp_last>$numrows){
$display = 'showing '.$temp .' to '.$numrows.' of '.$numrows.'  ';}
else{
$display = 'showing '.$temp .' to '.$temp_last.' of '.$numrows.'  ';} 

?>

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?php if(isset($_GET['id']))
				{
				$id=$_GET['id'];
				if("Trash"==$id)
				{echo "Trash Ad";}}
				else{
				echo "View Ad";	
				}?></h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<!-- Prabhas: code to show messages -->
				<?php
				$successful_posts = array();
				$failed_posts = array();
				if(!empty($_SESSION['responses'])) {
					foreach($_SESSION['responses'] as $site=>$response) {
						if($response['code']) {
							$successful_posts[] = $site;
						}
						else {
							$failed_posts[] = $site;
						}// else
					}// foreach
				
					/*if (!empty($successful_posts)) {
						?>
						<div id="message-green">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td class="green-left">Successful : <?php echo implode(', ', $successful_posts); ?></td>
							<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
						</tr>
						</table>
						</div>
						<?php 					
					}
					if(!empty($failed_posts)) {
						?>
						<div id="message-red">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td class="red-left">Failed Postings: <?php  echo implode(', ', $failed_posts); ?></td>
							<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
						</tr>
						</table>
						</div>
						<?php 
					}*///Pranali updated code for proper messaging 
					if (!empty($successful_posts)) {
						?>
						<div id="message-green">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td class="green-left">Successful<?php if($_SESSION['operation']=="delete"){ echo " Deletion:"; $_SESSION['operation']="";}else{ echo " Posting:";}?> <?php echo implode(', ', $successful_posts); ?></td>
							<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
						</tr>
						</table>
						</div>
						<?php 					
					}
					if(!empty($failed_posts)) {
						?>
						<div id="message-red">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td class="red-left">Failed<?php if($_SESSION['operation']=="delete"){ echo " Deletion:";$_SESSION['operation']="";}else{ echo " Posting:";}?> <?php echo implode(', ', $failed_posts); ?></td>
							<!--<td class="red-left">Failed: <?php  //echo "<br>"; foreach($failed_posts as $key=>$value){ echo $key," => ",$value; /*echo implode(', ', $failed_posts);*/ }?></td>-->
							<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
						</tr>
						</table>
						</div>
						<?php 
					}
					unset($_SESSION['selected_sites']);
					unset($_SESSION['responses']);
					unset($_SESSION['data']);
					unset($_SESSION['credentials']);
					$var_Arr=array(
                            "property_name",
                            "type",         
                            "price",         
                            "area",         
                            "builtup_Area",          
                            "property_type_group",           
                            "valuation_price",           
                            "no_of_rooms",           
                            "no_of_bedrooms",           
                            "no_of_bathrooms",           
                            "description",           
                            "postal_Code",           
                            "street",           
                            "district", 
			     "Minimum_Term",         
                            "estate",
                            "landmark",
                            "contact_no",
                            "block_No",
                            "ethnicity",
                            "Tenure",
                            "isFurnished",
                            "year",
                            "No_Of_Storey",
			    "Adventure_park",
			"Aerobic_pool",
			"Amphitheatre",
			"Badminton_hall",
			"Basketball_court",
			"Bowling_alley",
			"Clubhouse",
			"Fitness_corner",
			"Fun_pool",
			"Game_room",
			"Gymnasium_room",
			"Jogging_track",
			"Playground",
			"squash_court",
			"Swimming_pool",
			"Tennis_courts",
			"Wadding_pool",
			"BBQ",
			"GolfCourse",
			"Jacuzzi",
			"Sauna",
			"Spa_pool",
			"Pub_Included",
			"Dishwasher",
			"DVD_Player",
			"Fridge",
			"Internet_Connection",
			"Iron",
			"Kitchen_Utensils",
			"Living_Room_Furniture",
			"Microwave",
			"Washing_Machine",
			"Vacuum_Cleaner",
			"Bathtub",
			"Hairdryer",
			"WaterHeater",
			"Cable_TV",
			"Free_WiFi",
			"Air_Conditioner",		   
			"Meeting_Rooms",
			"hours_security",
			"Walkable_to_MRT",
			"Market",
			"Food_Center",
			"School",
			"Library",
			"Expressway",
			"Temple",
			"Mosque",
			"Sea_View",
			"City_View",
			"Greenery_View",
			"Dining_Room_Furniture",
			"Balcony",
			"Garage",
			"Terrace",
			"GroundFloor",
			"LowFloor",
			"HighFloor"
						//array special_features
			);
					
                        foreach($var_Arr as $sub_arr)
                        {
                           unset($_SESSION[$sub_arr]);
                        }
					
				} // if responses !empty
				?>
				<!-- Prabhas: my code ends here -->
				
				<!--  start message-yellow -->
				<!--<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red -->
				<?php
				// echo "print_session";
				// print_r($_SESSION);
			    if(isset($_SESSION['is_successfull']))

				{
				if($_SESSION['is_successfull'] != '') {
					if($_SESSION['is_successfull']==false)
					{
						//echo "print_session";
				?>
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error:  <!--<a href="">--><?php  echo $_SESSION['message']; ?><!--</a>--></td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div><?php }else if($_SESSION['is_successfull']==true)
					{?>
				<!--  end message-red -->
				
				<!--  start message-blue -->
				<!--<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Successful.<!-- <a href="">-->
					<?php// echo $_SESSION['message']; ?>
					<!--</a></td>
					<td class="blue-right"><a class="close-blue"><img src="images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>-->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Success:  <?php echo $_SESSION['message']; ?></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div><?php }}}
				$_SESSION['is_successfull']="";
				$_SESSION['message']="";
				// print_r($_SESSION);?>
				<!--  end message-blue -->
				
			
				<!--  start message-green -->
				<!--<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
				<?php 
				if(isset($_GET['id']))
				{
				$id=$_GET['id'];
				if("Trash"==$id)
				{
					
				view_Trash_Details($limit);
				}
				}
				else
				{
				view_Ad_Access_Details($limit);
				}
				
				?>
				
				
				<!--
				<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="" title="Edit" class="icon-2 info-tooltip"></a>
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
					</td>
				</tr>
				<tr>
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="" title="Edit" class="icon-2 info-tooltip"></a>
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
					</td>
				</tr>
				<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="" title="Edit" class="icon-2 info-tooltip"></a>
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
					</td>
				</tr>
				<tr>
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="" title="Edit" class="icon-2 info-tooltip"></a>
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
					</td>
				</tr>
				<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td>Sabev</td>
					<td>George</td>
					<td><a href="">george@mainevent.co.za</a></td>
					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
					<td class="options-width">
					<a href="" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="" title="Edit" class="icon-2 info-tooltip"></a>
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
					</td>
				</tr>-->
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<!--<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>-->
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
				<td>
					<?php if($numrows>0){echo $display." ";} ?> 
				</td>
			<td><?php
			$firstURL=$_SERVER['PHP_SELF']."?pageno=1";
			 $prevpage = $pageno-1;
			  $nextpage = $pageno+1;
			$lastURL=$_SERVER['PHP_SELF']."?pageno=$lastpage";
			$prevURL=$_SERVER['PHP_SELF']."?pageno=$prevpage";
			$nextURL=$_SERVER['PHP_SELF']."?pageno=$nextpage";
			if(isset($_GET['id'])){
			if("Trash"==$_GET['id']){ $firstURL.="&&id=Trash";
			$lastURL.="&&id=Trash";
			$prevURL.="&&id=Trash";
			$nextURL.="&&id=Trash";
			}			
			}
				echo "<a href='$firstURL' class=\"page-far-left\"></a>";
				
				 
				echo "<a href='$prevURL' class=\"page-left\"></a>";?>
				<div id="page-info">Page <strong><?php if($numrows<=0) {echo "0";} else{echo $pageno;}?></strong> / <?php echo $lastpage;?></div>
				<?php
				
				echo "<a href='$nextURL' class=\"page-right\"></a>";
				echo "<a href='$lastURL' class=\"page-far-right\"></a>";
				/*echo "<a href='{$_SERVER['PHP_SELF']}?pageno=1' class=\"page-far-left\"></a>";
				 $prevpage = $pageno-1;
				echo "<a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage' class=\"page-left\"></a>";?>
				<div id="page-info">Page <strong><?php if($numrows<=0) {echo "0";} else{echo $pageno;}?></strong> / <?php echo $lastpage;?></div>
				<?php
				 $nextpage = $pageno+1;
				echo "<a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage' class=\"page-right\"></a>";
				echo "<a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage' class=\"page-far-right\"></a>";*/?>
			</td><!--
			<td>
			<select  class="styledselect_pages">
		 		<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>-->
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<!--<div id="footer-left">
	
	Admin Skin &copy; Copyright Internet Dreams Ltd. <span id="spanYear"></span> <a href="">www.netdreams.co.uk</a>. All rights reserved.</div>-->
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>
