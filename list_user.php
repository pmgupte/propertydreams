<?php
session_start();
ob_start();
include 'header.php';
include 'includeFiles.php';
ob_start();
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}


$tbl_name='user';
$is_admin=$_SESSION['Is_Admin'];
$user_Id=$_SESSION['User_ID'];

?>
<?php
		//if($_SESSION['Is_Admin']=="admin"||$_SESSION['Is_Admin']=="user"||$_SESSION['Is_Admin']=="expired")
		//if($_SESSION['Is_Admin']=="admin")
		//	{
		$sql="SELECT * FROM $tbl_name ";
		$result=mysql_query($sql) or die('Cannot Execute:'. mysql_error());
			//}
		//if($_SESSION['Is_Admin']=="user"||($_SESSION['Is_Admin']=="expired"))
		//{
		//	echo "<script>alert('You are not authorized user')</script>";
		//	echo "<script>navigate('index.php')</script>";
		//}
?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>List User</h1>
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
			
				<!--  start message-yellow -->
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
<!--					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
-->				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red -->
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
<!--					<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
-->				</tr>
				</table>
				</div>
				<!--  end message-red -->
				
				<!--  start message-blue -->
				<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
<!--					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="images/table/icon_close_blue.gif"   alt="" /></a></td>
-->				</tr>
				</table>
				</div>
				<!--  end message-blue -->
			
				<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
<!--					<td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
-->				</tr>
				</table>
				</div>
				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
<?php                                    
       if(isset($_GET['action']))
		{
                  if(trim($_GET['action']) == 'record_edited')
			{
		        
                        echo '<center><b>Record is updated .</b></center> ';
			echo "</br>";
                        }
		 if($_GET['action'] == 'email_exits')
		        {      
                        echo '<center><font color ="Red">Please try another Email as it is already in database.And Retry........to Submit.</font></center> ';
			echo "</br>";
                        }

            }
?>  						
					
				<tr>
			         
					<!--<th class="table-header-check"><a id="toggle-all" ></a> </th>-->
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">First Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">Last Name</a></th>
					<th class="table-header-repeat line-left"><a href="#nogo">Email</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">Status</a></th>
<!--					<th class="table-header-repeat line-left"><a href="">Due</a></th>
					<th class="table-header-repeat line-left"><a href="">Website</a></th>
-->					<th class="table-header-options line-left"><a href="#nogo">Options</a></th>
				</tr>
				
					
					<?php
				while($row = mysql_fetch_array($result))
				{
						$username_row = $row['App_UserName'];
						$password = $row['App_Password'];
						$email = $row['Email'];
						$fname = $row['FirstName'];
						$lname = $row['LastName'];
						$is_admin_row = $row['Is_Admin'];
						$user_Id_row= $row['User_ID'];
						
						//$_SESSION['App_ID']=$user_Id; //to $_get edit/delete url
						
						if(isset($row['Is_Admin']))
						{
						    if ($row['Is_Admin'] == '1')
						    {
							$is_admin_row='admin';
						    }
						    if($row['Is_Admin'] == '0')
						    {
							$is_admin_row='user';
						    }
						    if($row['Is_Admin'] == '-1')
						    {
							$is_admin_row='orphan';
						    }
						 
						}
						//echo"$is_admin_row"; 
			           
	
						
					?>
		
					
				<tr>
					<!--<td><input  type="checkbox"/></td>   -->
					<td><?php echo "$fname";?></td>  
					<td><?php echo "$lname";?></td>
					<td><?php echo "$email";?></td>
					
					<td><?php echo "$is_admin_row";?></td>
					<!--<td></td>-->
<!--					<td>R250</td>
					<td><a href="">www.mainevent.co.za</a></td>
-->					<td class="options-width">
                                   <?php  //if((isset($is_admin_row) == 1)|| (isset($is_admin_row) == 0))
				          if(($is_admin_row == 'admin')||($is_admin_row == 'user'))
				   {?>
					 <a href="edit_user.php?User_ID=<?php echo $user_Id_row; ?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="delete_user.php?User_ID=<?php echo $user_Id_row; ?>" title="Delete" class="icon-2 info-tooltip" onclick="return confirm('Are you sure you want to delete user?')"></a>
				<?php }else { }?>
<!--					<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
-->					</td>
				</tr>
				
				<?php
				}?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
<!--			<div id="actions-box">
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
<!--			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>-->
			<td>
<!--			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>-->
			</td>
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
    
<!-- start footer -->         <!--
<div id="footer">
	<!--  start footer-left -->
<!--	<div id="footer-left">
	
	Admin Skin &copy; Copyright Internet Dreams Ltd. <span id="spanYear"></span> <a href="">www.netdreams.co.uk</a>. All rights reserved.</div>
	<!--  end footer-left -->
<!--	<div class="clear">&nbsp;</div>
</div>-->-->
--><!-- end footer -->
 
</body>
</html>

<?php  ob_flush();?>