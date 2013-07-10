<?php
include 'db.php';
include 'header.php';

//Table name
$App_ID=$_SESSION['User_ID'];
$tbl_name_AdSites='sites_ads';
$tbl_name_Ad='ads';
$tbl_name_sites='sites';

function show_step_titles($step_number) {
?>
<div class="step-no">1</div>
<div class="step-<?php echo ($step_number==1?"dark":"light");?>-left"><a href="site_panel.php">Site Selection</a></div>
<div class="step-no">2</div>
<div class="step-<?php echo ($step_number==2?"dark":"light");?>-left"><a href="#">Basic Information</a></div>
<div class="step-dark-right">&nbsp;</div>
<div class="step-no-off">3</div>
<div class="step-<?php echo ($step_number==3?"dark":"light");?>-left"><a href="#">Location</a></div>
<div class="step-light-right">&nbsp;</div>
<div class="step-no-off">4</div>
<div class="step-<?php echo ($step_number==4?"dark":"light");?>-left"><a href="#">Extra Details</a></div>
<div class="step-light-round">&nbsp;</div>
<div class="step-no-off">5</div>
<div class="step-<?php echo ($step_number==5?"dark":"light");?>-left"><a href="#">Summary</a></div>
<div class="step-light-round">&nbsp;</div>
<div class="clear"></div>
<?php
}// show_step_titles
?>




<?php
function create_ad_Basic_Details()
{?>
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
				<!--<tr>
					<th valign="top">Type:<font color="red"> *</font></th>
					<th><input type="radio"  name="Type" value="sale" <?php if(isset($_SESSION['type'])){?>selected="true"<?php }?>> Sale
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="Type" value="rent"> Rent</th>
				</tr>-->
<tr><?php ?>
				<th valign="top">Type:<font color="red"> *</font></th>
					<th><input type="radio"  name="Type" value="sale" <?php  if(isset($_SESSION['Type'])){ if($_SESSION['Type']=="sale"){?>checked<?php }}?>> Sale
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="Type" value="rent"<?php if(isset($_SESSION['Type'])){ if($_SESSION['Type']=="rent"){?>checked<?php }}?>> Rent</th>
				</tr>
		
				<tr>
					<th valign="top">Property name:<font color="red"> *</font></th>
					<td><input type="text"   name="property_name" class="inp-form" value="<?php if(isset($_SESSION['property_name'])){echo $_SESSION['property_name'];} ?>"/></td>
					<td>
					<div class="error-left"></div>
					<div id=property_name_error class="error-inner"></div>
					</td>
				</tr>
		
				<tr>
						<?php $property_type= array(
									
									'Residential'=>array(
										       "Apartment or Condo",
											"Landed House",
											"HDB Apartment",
									                  ),
									'Commercial'=>array(
										"Retail",
										"Office",
										"Industrial",
										"Land"
											 )
						);?>
						
					<th valign="top">Property Type:<font color="red"> *</font></th>
					<td>
					<select class="inp-form" id="property_type_group" name="property_type_group" >
						<?php
						foreach($property_type as $key=>$sub_property_type)
						{
						?>
						<optgroup label="<?php echo $key;?>">
						<?php
									foreach($sub_property_type as $property_names)
									{
									?>
									<option value="<?php echo $property_names;?>" <?php if(isset($_SESSION['property_type_group']) && ($_SESSION['property_type_group'] == $property_names)){ echo "selected";}?> id="-0-0"><?php echo $property_names;?></option>			
									<?php
									}
						}
						?>				
						
					</select>
					</td>
				</tr>
		
		
				<tr>
					<th valign="top">Asking Price(S$):<font color="red"> *</font></th>
					<td><input type="text"   name="price" class="inp-form" value="<?php if(isset($_SESSION['price'])){echo $_SESSION['price'];} ?>"/></td>
					<td></td>
				</tr>
		
				<tr>
					<th valign="top">Valuation Price(S$):</th>
					<td><input type="text"   name="valuation_price" class="inp-form" value="<?php if(isset($_SESSION['valuation_price'])){echo $_SESSION['valuation_price'];} ?>"/></td>
				</tr>
		
		
				<tr>
					<th valign="top">Land Area(sqft): <font color="red"> *</font></th>
					<td><input type="text"   name="area" class="inp-form" value="<?php if(isset($_SESSION['area'])){echo $_SESSION['area'];} ?>"/></td>
					<td>
					<div class="error-left"></div>
					<div id=area class="error-inner">Should be in sqft.</div>
					</td>
				</tr>
		
		
				<tr>
					<th valign="top">BuiltUp Area(sqft):<font color="red"> *</font></th>
					<td><input type="text"   name="builtup_Area" class="inp-form" value="<?php if(isset($_SESSION['builtup_Area'])){echo $_SESSION['builtup_Area'];} ?>"/></td>
					<td>
					<div class="error-left"></div>
					<div id=builtup_Area class="error-inner">Should be in sqft.</div>
					</td>
				</tr>
		
				<tr>
					<th valign="top">Minimum Term: (Months)</th>
					<td><input type="text"   name="Minimum_Term" class="inp-form" value="<?php if(isset($_SESSION['Minimum_Term'])){echo $_SESSION['Minimum_Term'];} ?>"/></td>
					<td>
					<div class="error-left"></div>
					<div id=builtup_Area class="error-inner">Should be in sqft.</div>
					</td>
				</tr>
		
				<!--<tr>
						<th valign="top">No of Rooms:</th>
						<td>
						 <select name="no_of_rooms" id="no_of_rooms" class="styledselect_form_1">

						<?php //for($i=1;$i<10;$i++){ ?>
						<option value="<?php //echo $i; ?>" <?php //if(isset($_SESSION['no_of_rooms']) && ($_SESSION['no_of_rooms'] == $i)){ echo "selected";}?>><?php //echo $i; ?></option>
						<?php //}?>
						
						 </select>
						<!--<td><input type="text"   name="no_of_rooms" class="inp-form" /></td>-->
						<!--<td></td> 
						</td>
				</tr>-->
			
			
				<tr>
					<th valign="top">No of Bedrooms:<font color="red"> *</font></th>
					
					<td>
						 <select name="no_of_bedrooms" id="no_of_bedrooms" class="styledselect_form_1">

						<?php for($i=0;$i<10;$i++){ ?>
						<option value="<?php echo $i;?>" <?php if(isset($_SESSION['no_of_bedrooms']) && ($_SESSION['no_of_bedrooms'] == $i)){ echo "selected";}?>> <?php echo $i; ?></option>
						<?php }?>
						
						 </select>
						<!--<td><input type="text"   name="no_of_rooms" class="inp-form" /></td>-->
						<td></td>
					</td>
					<td></td>
				</tr>
				
				
				<tr>
					<th valign="top">No of Bathrooms:<font color="red"> *</font></th>
					
					<td>
						 <select name="no_of_bathrooms" id="no_of_bathrooms" class="styledselect_form_1">

						<?php for($i=0;$i<10;$i++){ ?>
						<option value="<?php echo $i;?>" <?php if(isset($_SESSION['no_of_bathrooms']) && ($_SESSION['no_of_bathrooms'] == $i)){ echo "selected";}?> ><?php  echo $i; ?></option>
						<?php }?>
						
						 </select>
						<!--<td><input type="text"   name="no_of_rooms" class="inp-form" /></td>-->
						<td></td>
					</td>
				</tr>
				
				
				<tr>
						<th valign="top">Description: <br>(<font color="red"> *</font> for rentinsingapore)</th>
						<td><textarea  rows="" cols="" name="description" class="form-textarea" value=""><?php if(isset($_SESSION['description'])){echo $_SESSION['description'];}?></textarea></td>
						<td></td>
				</tr>

				<tr>
					<th>&nbsp;</th>
					<td valign="top">
						<input type="button" value="Back" onClick="window.location.href='site_panel.php'">
						<input type="submit" name="submit_Basic_Details" value="Next"/>
						<!--<input type="reset" value="Reset" />-->
					</td>
					<td></td>
				</tr>
		</table>

<?php  } ?>



<?php
//Function for location details-->
function create_ad_Location_Details() {?>

         <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Block No:</th>
			<td><input type="text"   name="block_No" class="inp-form" value="<?php if(isset($_SESSION['block_No'])){echo $_SESSION['block_No'];} ?>"/></td>
			<td></td>
		</tr>
		
		
		<tr>
			<th valign="top">Postal Code:</th>
			<td><input type="text"   name="postal_Code" class="inp-form" value="<?php if(isset($_SESSION['postal_Code'])){echo $_SESSION['postal_Code'];} ?>"/></td>
			<td></td>
		</tr>
		
		
		<tr>
			<th valign="top">Street:<font color="red"> *</font></th>
			<td><input type="text"   name="street" class="inp-form" value="<?php if(isset($_SESSION['street'])){echo $_SESSION['street'];} ?>"/></td>
			
		</tr>
		
		
		<tr>
			<th valign="top">District:<font color="red"> *</font></th>
			<td>
				<?php $district= array(
						"(select)",
						"Boat Quay or Raffles Place",   
						"Chinatown or Tanjong Pagar",		
						"Alexandra or Commonwealth",       
						"Harbourfrount or Telok Blangah",  
						"Buona Vista or West Coast",       
						"City Hall or Clarke Quay",       
						"Beach Road or Bugis or Rochor",       
						"Farrer Park or Serangoon",      
						"Orchard or River Valley",       
						"Tanglin or Holland",
						"Newton or Novena",
						"Balestier or Toa Payoh",
						"Macpherson or Potong Pasir",
						"Eunos or Geylang or Paya Lebar",
						"East Coast or Marine Parade",
						"Bedok or Upper East Coast",
						"Changi Airport or Changi Village",
						"Pasir Ris or Tampines",
						"Hougang or Ponggol or Sengkang",
						"Ang Mo Kio or Bishan or Thomson",
						"Clementi or Upper Bukit Timah",
						"Boon Lay or Jurong or Tuas",
						"Bukit Batok or Bukit Panjang",
						"Choa Chu Kang or Tengah",
						"Admiralty or Woodlands",
						"Mandai or Upper Thomson",
						"Sembawang or Yishun",
						"Seletar or Yio Chu Kang"
						);?>
						
				   <select name="district" id="district" class="inp-form">
						<?php 
						foreach($district as $d) {?>
								<option value="<?php echo $d;?>" <?php if(isset($_SESSION['district']) && ($_SESSION['district'] == $d)){ echo "selected";}?>> <?php echo $d; ?></option>
						
						<?php }?>
						
					</select>
			</td>
                      
		</tr>
		
		
		
		<tr>
		<th valign="top">EState:<br>(for rentinsingapore<font color="red"> *</font>)</th>
		<td>
		<select name="estate" id="estate">
				<?php
				$estate=array(
						"(select)",
						"Admiralty",
						"Alexandra",
						"Aljunied",
						"Ang Mo Kio",
						"Ayer Rajah",
						"Balestier Road ",
						"Bedok",
						"Bedok Reservoir",
						"Benoi",
						"Bishan",
						"Boon Lay",
						"Buangkok",
						"Bugis",
						"Bukit Batok",
						"Bukit Chandu",
						"Bukit Gombak",
						"Bukit Ho Swee",
						"Bukit Merah",
						"Bukit Panjang",
						"Bukit Timah",
						"Buona Vista",
						"Caldecott Hill",
						"Central Area",
						"Central Catchment",
						"Chai Chee",
						"Changi",
						"changi Bay",
						"Changi Eas",
						"Changi Villag",
						"Chinatown",
						"Choa Chu Kang",
						"Chong Pang",
						"Clementi",
						"Commonwealth",
						"Defu",
						"Dhoby Ghaut",
						"Dover",
						"East Coast",
						"Emerald Hill",
						"Esplanade",
						"Eunos",
						"Farrer Park",
						"Geylang",
						"Gul",
						"HarbourFront",
						"Hillview",
						"Holland Village",
						"Hougang",
						"Jalan Besar",
						"Jalan Kayu",
						"Joo Chiat",
						"Joo Koon",
						"Jurong East",
						"Jurong West",
						"Kaki Bukit",
						"Kallang or Whampoa",
						"Kampong Glam",
						"Katong",
						"Kebun Baru",
						"Kembangan",
						"Kent Ridge",
						"Kim Seng",
						"Kolam Ayer",
						"Kranji",
						"Lim Chu Kang",
						"Little India",
						"Lorong Chuan",
						"Lorong Halus",
						"Loyang",
						"MacPherson",
						"Mandai",
						"Marina Bay",
						"Marina Centre",
						"Marina East",
						"Marina South",
						"Marine Parade",
						"Marsiling",
						"Marymount",
						"Mount Faber",
						"Mount Vernon",
						"Mountbatten",
						"Murai",
						"Museum",
						"Nanyang",
						"Neo Tiew",
						"Newton",
						"North Eastern Islands",
						"Novena",
						"One North",
						"Orchard Road",
						"Outram",
						"Pandan",
						"Pasir Laba",
						"Pasir Panjang",
						"Pasir Ris",
						"Paya Lebar",
						"Pioneer",
						"Potong Pasir",
						"Punggol",
						"Queenstown",
						"Radin Mas",
						"Raffles Place",
						"Rochor",
						"Sarimbun",
						"Seletar",
						"Sembawang",
						"Sengkang",
						"Senoko",
						"Serangoon",
						"Serangoon Gardens",
						"Serangoon North",
						"Shenton Way",
						"Siglap",
						"Simei",
						"Simpang",
						"Sin Ming",
						"Singapore River",
						"Southern Islands",
						"St Michaels",
						"Sungei Kadut",
						"Taman Jurong",
						"Tampines",
						"Tanah Merah",
						"Tanglin",
						"Tanjong Pagar",
						"Tanjong Rhu",
						"Teban Gardens",
						"Telok Ayer",
						"Telok Blangah",
						"Tengah",
						"Thomson",
						"Tiong Bahru",
						"Toa Payoh",
						"Toh Tuck",
						"Tuas",
						"Ubi",
						"West Coast",
						"Western Islands",
						"Western Water",
						"Whampoa",
						"Woodlands",
						"Yew Tee",
						"Yio Chu Kang",
						"Yishun"
											
				);
				?>


						<?php 
						foreach($estate as $d) {?>
								<option value="<?php echo $d;?>" <?php if(isset($_SESSION['estate']) && ($_SESSION['estate'] == $d)){ echo "selected";}?>> <?php echo $d; ?></option>
						
						<?php }?>
							
						</select>
						</td>
		</tr>
		
		
		<tr>
			<th valign="top">Land Mark(NearBy):</th>
			<td><input type="text"   name="landmark" class="inp-form" value="<?php if(isset($_SESSION['landmark'])){echo $_SESSION['landmark'];} ?>" /></td>
		</tr>
		<tr>
			<th valign="top">Contact No:</th>
			<td><input type="text" name="contact_no" class="inp-form" value="<?php if(isset($_SESSION['contact_no'])){echo $_SESSION['contact_no'];} ?>"/></td>
			<td></td>
		</tr>
		
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<input type="button" value="Back" onClick="window.location.href='create_Ad.php'">
				<input type="submit" name="submit_Location_Details" value="Next"/>
				<!--<input type="reset" value="Reset" />-->
			        
			</td>
			<td></td>
		</tr>
		<input type="hidden" name="property_type" value="<?php echo $_SESSION['property_type_group'];?>">
	</table>



<?php
 } 

//Function for Extra details-->

function create_ad_Extra_Details() {?>
	
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		
		
		
		
		<?php $tenure=array("freehold",
				    "15 Years",
				    "30 Years",
				    "60 Years",
				    "90 Years",
				    "99 Years",
				    "103 Years",
				    "929 Years",
				    "947 Years",
				    "956 Years",
				    "998 Years",
				    "999 Years",
				    "946 Years"
				    );?>
		<tr>
			
			
			<th valign="top">Tenure:</th>
			<td>
					<select name="tenure" id="tenure" class="styledselect_form_1" >
					<?php 
						foreach($tenure as $d) {?>
								<option value="<?php echo $d;?>" <?php if(isset($_SESSION['Tenure']) && ($_SESSION['Tenure'] == $d)){ echo "selected";}?>> <?php echo $d; ?></option>
						
						<?php }?>   
						</select>
			</td>
			
			
		</tr>
		<?php //echo $_SESSION['No_Of_Storey'];?>
		<tr>
			<th valign="top">No of storey:</th>
			<td><input type="text"   name="No_Of_Storey" class="inp-form" value="<?php if(isset($_SESSION['No_Of_Storey'])){echo $_SESSION['No_Of_Storey'];}?>"/></td>
			<td></td>
		</tr>
		
		
		<?php
		$ethnicity=array(
				 "Singapore",
				 "Indian",
				 "American",
				 "chinese",
				 "malay",
				 "other"
				 );
		?>
		<tr>
		<th valign="top">Seller Ethnicity:</th>
		<td>	
		<select  class="styledselect_form_1" name="ethnicity">
			<?php 
						foreach($ethnicity as $d) {?>
								<option value="<?php echo $d;?>" <?php if(isset($_SESSION['ethnicity']) && ($_SESSION['ethnicity'] == $d)){ echo "selected";}?>> <?php echo $d; ?></option>
						
						<?php }?> 
			<!--<option value="Singapore" selected="true">Singapore</option>-->
			<!--<option value="Indian">Indian</option>-->
			<!--<option value="American">American</option>-->
			<!--<option value="chinese">chinese</option>-->
			<!--<option value="malay">malay</option>-->
			<!--<option value="other" >other</option>-->
			
		</select>
		</td>
		<td></td>
		</tr>
		
		
		<tr>
			<th valign="top">Construction Year:</th>
			<td>	
				<select name="year" id="year">
				<?php
				$year=date('Y');
				for($i=$year;$i>=($year-111);$i--) {
					//echo "<option value=\" $i\">$i</option>";?>
					<option value="<?php echo $i;?>" <?php if(isset($_SESSION['year']) && ($_SESSION['year'] == $i)){ echo "selected";}?>><?php  echo $i; ?></option>
				<?php }
				?>
				</select>
			</td>
		
		<td></td>
		</tr>
		
		
		<tr>
		<th valign="top">Furnished:</th>
		<td>	
		<select  class="styledselect_form_1" name="isFurnished">
			<option value="UNFUR">Unfurnished</option>
			<option value="PART">Partially Furnished</option>
			<option value="FULL">Fully Furnished</option>
		</select>
		</td>
		
		<td></td>
		</tr>
		
		<tr>
		<th valign="top">Amenities:</th>
		
		<td>
			<?php get_Extra_Details_aminities();?>
		</td>
			
			
		</tr>
		
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<input type="button" value="Back" onClick="window.location.href='location.php'">
				<input type="submit" name="submit_Extra_Details" value="Next"/>
				<!--<input type="reset" value="Reset"/>-->
			</td>
			<td></td>
		</tr>
		
	</table>	
		
		<?php
} 

//Helper Function

function count_records_for_view($is_active)
{
    $App_ID=$_SESSION['User_ID'];
    $tbl_name_Ad='ads';
    $tbl_name_sites='sites';
    $tbl_name_AdSites='sites_ads';
    if(1==$is_active){
$query = "SELECT count(*) FROM $tbl_name_Ad WHERE status='0'";}
    else{
$query = "SELECT count(*) FROM $tbl_name_Ad WHERE status='1'";}
if(0==$_SESSION['Is_Admin'])
                               {
                               $query.= " AND User_ID='$App_ID'";
                               }
$result = mysql_query($query);
$query_data = mysql_fetch_row($result);
$numrows = $query_data[0];       
return $numrows;           
}


function view_Ad_Access_Details($limit)
{?>
<script language="JavaScript">
function MM_openBrWindow(theURL,winName,features,Ads_ID) { //v2.0
window.open(theURL,winName,features).focus();
}
</script><?php
				$App_ID=$_SESSION['User_ID'];
				$tbl_name_Ad='ads';
				$tbl_name_sites='sites';
				$tbl_name_AdSites='sites_ads';
				//$sql="SELECT * FROM $tbl_name_Ad";
				//$query = "SELECT $tbl_name_Ad.* , $tbl_name_sites.Site_Name FROM $tbl_name_Ad, $tbl_name_sites, $tbl_name_AdSites WHERE $tbl_name_Ad.Ads_ID = $tbl_name_AdSites.Ads_ID AND $tbl_name_Ad.Site_ID = $tbl_name_sites.Site_ID AND $tbl_name_Ad.Ads_ID=7";
				$query= "SELECT Property_Name,Location,Ads_ID,Type,Price,date_Posted,District FROM $tbl_name_Ad WHERE status='0' ";
				if(0==$_SESSION['Is_Admin'])
				{
				$query.= " AND User_ID='$App_ID'";
				}
				$query.=" ORDER BY Ads_ID desc $limit";

				//$query="SELECT $tbl_name_Ad.Property_Name,$tbl_name_Ad.Location,$tbl_name_Ad.Ads_ID,$tbl_name_Ad.Type,$tbl_name_Ad.Price,$tbl_name_Ad.date_Posted,$tbl_name_sites.Site_Name
				//FROM $tbl_name_sites, $tbl_name_Ad, $tbl_name_AdSites
				//WHERE $tbl_name_Ad.Ads_ID = $tbl_name_AdSites.Ads_ID
				//AND $tbl_name_AdSites.Site_ID = $tbl_name_sites.Site_ID
				//AND status='0'";
				
				 //echo $App_ID;
				
				 
				$result=mysql_query($query) or die('Cannot Execute:'. mysql_error());
				
			        $num_rows = mysql_num_rows($result);
				if($num_rows>0){?>
				<tr>
										
					
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">Ad Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">Websites</a></th>
					<th class="table-header-repeat line-left"><a href="#nogo">Type</a></th>
					<th class="table-header-repeat line-left"><a href="#nogo">Price</a></th>
					<th class="table-header-repeat line-left"><a href="#nogo">Posted Date</a></th>
					<th class="table-header-options line-left"><a href="#nogo">Options</a></th>
					
				</tr>

				<?php
				$list = array();
				// $cnt=1;
				while($row = mysql_fetch_array($result))
				{
						
				// echo "$cnt++";
						
					  $Property_Name=$row['Property_Name'];
					 // $Site_ID=$row['Site_ID'];
					  $District=$row['District'];
					  $Type=$row['Type'];
					  $Price=$row['Price'];
					  //$Site_Name=$row['Site_Name'];
					  $date_Posted=$row['date_Posted'];
					  $Ads_ID=$row['Ads_ID'];
					   $sites_array=array();
					  $query2="SELECT Site_Name,handle,Ad_Link FROM sites_ads, sites WHERE sites_ads.Site_ID=sites.Site_ID AND sites_ads.Ads_ID='$Ads_ID' AND is_active='0'";
					 
					  $sub_result=mysql_query($query2) or die('Cannot Execute:'. mysql_error());
					// print_r($sites_array);
 //start......***rita***
                     $sql1="SELECT FirstName,LastName from sites_ads,user,ads WHERE  ads.User_ID=user.User_ID AND sites_ads.Ads_ID=ads.Ads_ID AND ads.Ads_ID='$Ads_ID'";
                      $result1=mysql_query($sql1) or die('Cannot Execute:'. mysql_error());
                     // $FirstName = array();
                      //$LastName = array();
                      while($row1 =  mysql_fetch_assoc($result1))
                      {
                        $FirstName=$row1['FirstName'];
                            $LastName=$row1['LastName'];   
                      }
                    //  echo"<font color=\"#42B988\"> $FirstName; </font>";
                      if(1==$_SESSION['Is_Admin'])
                      {
                      //$ad_name = $Property_Name ." - District :". $District ."-Posted By :".$FirstName." ".$LastName;
                      //$green = "#42B988";
                      //$green = echo "<font color = 'green'>";
                      //$greenend = echo "</font>";
                     
                             
                      $ad_name = $Property_Name ." - District :". $District;
                   
                      $postby = "Posted By :".$FirstName." ".$LastName;
                     // $ad_name = $ad_name." ".$postby;
                      }
                      else{
                     
                      $ad_name = $Property_Name ." - District :". $District;
                      }
//end ***rita   

					//   $ad_name = $Property_Name ." - District :". $District;                     //orginal
					   ?>
					  <tr>
					
					<td><a href='view_Ad_Details.php?Ads_ID=<?php echo $Ads_ID;?>'><?php echo $ad_name;?></a></br>
                                       
                                       <p style="text-align: left;">
                                       <!--<a href='#'>--><font color = "purple" size="1"><?php if(1==$_SESSION['Is_Admin']){echo $postby;}?></font><!--</a>--></p>
                                       </td>

					
					<td>
						
					<?php
					while($row =  mysql_fetch_assoc($sub_result)) {
						?>
			
						<a target="_blank" href="<?php echo $row['Ad_Link'];?>" title="<?php echo $row['Site_Name'];?>"><img src="images/<?php echo $row['Site_Name'];?>/image.jpeg" alt="<?php echo $row['Site_Name'];?>"/></a>&nbsp;
						<?php
					} // while
					
					/*
					foreach($sites_array as $key=>$value){
					//echo $key; echo "->"; echo $value;
					//echo "$value";
					?>
					<a href="<?php echo $sites_array[$key]['Ad_Link'];?>"><img src="images/<?php echo $sites_array[$key]['Site_Name'];?>/image.jpeg" alt=""/></a>
					<?php }
					*/
					?>
					
					</td>
					<td><?php echo $Type; ?></td>
					<td><?php echo $Price;?></td>
					<td><?php echo $date_Posted; ?></td>
					<td class="options-width">
					<!--<a href="view_Ad_Details.php?Ads_ID=<?php //echo $Ads_ID;?>" title="Edit" class="icon-1 info-tooltip"></a>-->
					<a href="#" title="Delete" class="icon-2 info-tooltip" onclick="javascript:MM_openBrWindow('view_site_panel.php?Ads_ID=<?php echo $Ads_ID?>','pop', 'scrollbars=no,width=350,height=210')"></a>
					<!--<a href="repost.php" title="Repost" class="icon-3 info-tooltip"></a>-->
					<!--<a href="" title="Edit" class="icon-4 info-tooltip"></a>-->
					<!--<a href="" title="Edit" class="icon-5 info-tooltip"></a>-->
					</td>
				          </tr><?php
					 
				}
				}
				else{
				echo "You don't have any ad posted. Would you like to <a href='site_panel.php'>post a new one</a>?";		
				}
}

				


function view_Trash_Details($limit)
{
$App_ID=$_SESSION['User_ID'];
$tbl_name_AdSites='sites_ads';
$tbl_name_Ad='ads';
$tbl_name_sites='sites';
				
$query= "SELECT Property_Name,Location,Ads_ID,Type,Price,date_Posted,District FROM $tbl_name_Ad WHERE status ='1'";
				if(0==$_SESSION['Is_Admin'])
				{
				$query.= " AND User_ID='$App_ID'";
				}
				$query.=" ORDER BY Ads_ID desc $limit";
			 
				$result=mysql_query($query) or die('Cannot Execute:'. mysql_error());
				
			        $num_rows = mysql_num_rows($result);
				if($num_rows>0){?>
				<tr>
										
					
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">Ad Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">Website</a></th>
					<th class="table-header-repeat line-left"><a href="#nogo">Type</a></th>
					<th class="table-header-repeat line-left"><a href="#nogo">Price</a></th>
					<th class="table-header-repeat line-left"><a href="#nogo">Posted Date</a></th>
					<th class="table-header-options line-left"><a href="#nogo">Options</a></th>
					
				</tr>

				<?php
				$list = array();
				// $cnt=1;
				while($row = mysql_fetch_array($result))
				{
													
					  $Property_Name=$row['Property_Name'];
					  $District=$row['District'];
					  $Type=$row['Type'];
					  $Price=$row['Price'];
					  $date_Posted=$row['date_Posted'];
					  $Ads_ID=$row['Ads_ID'];
					  $sites_array=array();
					  $query2="SELECT Site_Name,handle,Ad_Link FROM sites_ads,sites WHERE sites_ads.Site_ID=sites.Site_ID AND sites_ads.Ads_ID='$Ads_ID' "; //and is_active = '1'
					 
					  $sub_result=mysql_query($query2) or die('Cannot Execute:'. mysql_error());
					
					  $ad_name = $Property_Name ." - District :". $District;
					    ?>
					  <tr>
					
					
					<td><a href='view_Ad_Details.php?Ads_ID=<?php echo $Ads_ID;?>'><?php echo $ad_name;?></a></td>
					<td>
						
						


					<?php
					while($row =  mysql_fetch_assoc($sub_result)) {
						// $is_active =$row['is_active'];
						?>
			
						<a target="_blank" href="<?php echo $row['Ad_Link'];?>" title="<?php echo $row['Site_Name'];?>"><img src="images/<?php echo $row['Site_Name'];?>/image.jpeg" alt="<?php echo $row['Site_Name'];?>"/></a>&nbsp;
						
					<?php }?>
					


					<td><?php echo $Type; ?></td>
					<td><?php echo $Price;?></td>
					<td><?php echo $date_Posted; ?></td>
					<td class="options-width">
					<!--<a href="view_Ad_Details.php?Ads_ID=<?php //echo $Ads_ID;?>" title="Edit" class="icon-1 info-tooltip"></a>-->
			              
					<a href="repost.php?Ads_ID=<?php echo $Ads_ID?>" title="Repost" class="icon-5 info-tooltip"></a>
					
					</td>
				          </tr><?php
					 
				}
				
						
}else{
			echo "No record found";
			
}
}


function delete_Ad_Details($Ads_ID,$permanant_Del)
{
$tbl_name_Ad='ads';
$tbl_name_sites='sites';
$tbl_name_AdSites='sites_ads';
		if(1==$permanant_Del)
		{
		 $r=mysql_query("DELETE FROM $tbl_name_Ad WHERE Ads_ID='$Ads_ID'"); 	
			if(!$r)
			{
			  return -1;
			}
			else
			{
			 return 1;
			}			

		}
		else if(0==$permanant_Del)
		{	
			$r = mysql_query("UPDATE $tbl_name_Ad SET status='1' WHERE Ads_ID='$Ads_ID'");
			if(!$r)
			{
			  return -1;
			}
			else {
			 return 1;
			}
		}
}

function delete_Adsites_deatils($Ads_ID,$Site_ID)
{
			$tbl_name_AdSites='sites_ads';
			
						$query="DELETE FROM $tbl_name_AdSites WHERE Ads_ID='$Ads_ID' AND Site_ID='$Site_ID'";
						$s=mysql_query($query);
						if(!$s)
						{
						return -1;
						}
						else
						{
						return 1;
						}
			
			
						
						
						
			
}



function view_rightcorner_site_panel()
{
for($i=0;$i<count($_SESSION['selected_sites']);$i++){
	?><br><?php echo $_SESSION['selected_sites'][$i];		
}
  //  $_SESSION['selected_sites'] as $key=>$site){ echo $key," ",$site;}			
}


function get_Site_Details()
{
echo " Accessing site details";
$App_ID=$_SESSION['User_ID'];
$tbl_name_Ad='ads';
$tbl_name_sites='sites';
$tbl_name_AdSites='sites_ads';
$tbl_name_user_site='user_site';
//Site Selected store in session
/* Prabhas: code to get site credentials for currently logged-in user */
	$q_creds = "SELECT Site_Name, Site_Username, Site_Password FROM $tbl_name_sites, $tbl_name_user_site WHERE sites.Site_ID = user_site.Site_ID AND User_ID=$App_ID";
	$r_creds = mysql_query($q_creds);
	if(!$r_creds) {
		$_SESSION['is_successfull'] = false;
		$_SESSION['message'] = mysql_error();
	}
	$credentials = array();
	while($row = mysql_fetch_assoc($r_creds)) {
		$credentials[$row['Site_Name']] = array('username'=>$row['Site_Username'], 'password'=>$row['Site_Password']);
	}
	// store these creds into session
	$_SESSION['credentials'] = $credentials;
        
    /* Prabhas: code to loop through sites and make post calls */
    $referer = pathinfo(parse_url($_SERVER['HTTP_REFERER'],PHP_URL_PATH), PATHINFO_FILENAME);
     // echo "referer: $referer.";
    if("site_panel" == $referer) {
			$_SESSION['selected_sites'] = array();
			// clean 'selected_sites' and rebuild it
			foreach(array_keys($credentials) as $site) {
    	// if given site is selected (check-marked) and its creds are non-empty,
    	// add it to list of sites to post this ad to.
        if(isset($_POST[$site])) {
        	$_SESSION['selected_sites'][] = $site;
        }// if isset site
	
	}// foreach
    }
    else {
			// do nothing :)
    }
   
    $_SESSION['responses'] = array();
	
}

function get_Extra_Details_aminities()
{
$amenities=array(
			'Sports' => array(
						"1"=>"Adventure_park", // "1"=>"Adventure_park",
						"Aerobic pool",
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
			 ),//array sports
		 'Fixtures' =>array(
						"1"=>"Dishwasher",
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
				    
				    ),//array fixtures
		
		 'Special_Features' =>array(
			
						"1"=>"Meeting_Rooms",
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
						)//array special_features
			)//array amenities
		 
?>
<?php 
//echo "<br>";
foreach($amenities as $key=>$amenity){ $cnt=1;?>
<fieldset>
<legend><?php if(isset($key)){ $key1 = str_replace("_", " ",$key); echo "$key1";}?>:</legend>
<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
<?php foreach($amenity as $sub_key=>$sub_amenity)
{?>

			
			<?php
			
			if(0==$cnt%7)
			{echo "<tr/>"; }
			else{?> 
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="<?php echo $sub_amenity;?>" value="<?php echo $sub_amenity;?>" <?php if(isset($_SESSION[$sub_amenity])){ echo "checked=\"true\""; }?>/>&nbsp;<?php if(isset($sub_amenity)){ $sub_amenity1 = str_replace("_", " ",$sub_amenity); echo "&nbsp;$sub_amenity1";}?>  		
			</td>
			<?php
			}$cnt++;}?>
			
			
	
</table>
		
</fieldset>
			
<?php
}
?>
<?php //print_r($_SESSION);
/*foreach($amenities as $key=>$amenity){ ?>
<fieldset>
<!--
<legend><?php //echo $key;?>:</legend>-->
<legend><?php if(isset($key)){ $key1 = str_replace("_", " ",$key); echo "$key1";}?>:</legend>

<?php foreach($amenity as $sub_key=>$sub_amenity)
{

?>

&nbsp;&nbsp;
<!--<input type="checkbox" name="<?php //echo $sub_amenity;?>" value="<?php //echo $sub_amenity;?>" /><?php //echo " ".$sub_amenity." ";?><!-- original-->
<input type="checkbox" name="<?php echo $sub_amenity;?>" value="<?php echo $sub_amenity;?>" <?php if(isset($_SESSION[$sub_amenity])){ echo "checked=\"true\""; }?>/><?php if(isset($sub_amenity)){ $sub_amenity1 = str_replace("_", " ",$sub_amenity); echo "$sub_amenity1";}?>  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if(0==($sub_key%5)) { echo "<br />"; }

}//sub_amenity foreach?>
</fieldset><br>
<?php }//amenities foreach*/

}
?>





