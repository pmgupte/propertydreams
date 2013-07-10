<?php
include 'db.php';
include 'header.php';

//Table name
$tbl_name_Ad='ads';
$tbl_name_sites='sites';

function show_step_titles($step_number) {
?>
<div class="step-no">1</div>
<div class="step-<?php echo ($step_number==1?"dark":"light");?>-left"><a href="create_Ad.php">Basic Information</a></div>
<div class="step-dark-right">&nbsp;</div>
<div class="step-no-off">2</div>
<div class="step-<?php echo ($step_number==2?"dark":"light");?>-left"><a href="">Location</a></div>
<div class="step-light-right">&nbsp;</div>
<div class="step-no-off">3</div>
<div class="step-<?php echo ($step_number==3?"dark":"light");?>-left"><a href="">Extra Details</a></div>
<div class="step-light-round">&nbsp;</div>
<div class="clear"></div>
<?php
}// show_step_titles
?>




<?php
function create_ad_Basic_Details()
{?>
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
				<tr>
					<th valign="top">Type:</th>
					<!--<th><input type="radio" name="Type" value="sale" <?php // if(isset($_SESSION['type'])){?>selected="true"<?php //}?>> Sale</th>-->
					<th><input type="radio" name="Type" value="sale" id="type_sale">Sale</th>
					<th><input type="radio" name="Type" value="rent" id="type_rent"> Rent</th>
				</tr>
		
				<tr>
					<th valign="top">Property name:</th>
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
						
					<th valign="top">Property Type:</th>
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
					<th valign="top">Price($):</th>
					<td><input type="text"   name="price" class="inp-form" value="<?php if(isset($_SESSION['price'])){echo $_SESSION['price'];} ?>"/></td>
					<td></td>
				</tr>
		
				<tr>
					<th valign="top">Valuation Price($):</th>
					<td><input type="text"   name="valuation_price" class="inp-form" value="<?php if(isset($_SESSION['valuation_price'])){echo $_SESSION['valuation_price'];} ?>"/></td>
				</tr>
		
		
				<tr>
					<th valign="top">Land Area(sqft):</th>
					<td><input type="text"   name="area" class="inp-form" value="<?php if(isset($_SESSION['valuation_price'])){echo $_SESSION['valuation_price'];} ?>"/></td>
					<td>
					<div class="error-left"></div>
					<div id=area class="error-inner">Should be in sqft.</div>
					</td>
				</tr>
		
		
				<tr>
					<th valign="top">BuiltUp Area(sqft):</th>
					<td><input type="text"   name="builtup_Area" class="inp-form" value="<?php if(isset($_SESSION['valuation_price'])){echo $_SESSION['valuation_price'];} ?>"/></td>
					<td>
					<div class="error-left"></div>
					<div id=builtup_Area class="error-inner">Should be in sqft.</div>
					</td>
				</tr>
		

				<tr>
						<th valign="top">No of Rooms:</th>
						<td>
						 <select name="no_of_rooms" id="no_of_rooms" class="styledselect_form_1">

						<?php for($i=1;$i<10;$i++){ ?>
						<option value="<?php echo $i; ?>" <?php if(isset($_SESSION['no_of_rooms']) && ($_SESSION['no_of_rooms'] == $i)){ echo "selected";}?>><?php echo $i; ?></option>
						<?php }?>
						
						 </select>
						<!--<td><input type="text"   name="no_of_rooms" class="inp-form" /></td>-->
						<td></td>
						</td>
				</tr>
			
			
				<tr>
					<th valign="top">No of Bedrooms:</th>
					
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
					<th valign="top">No of Bathrooms:</th>
					
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
						<th valign="top">Description:</th>
						<td><textarea  rows="" cols="" name="description" class="form-textarea" value="<?php if(isset($_SESSION['description'])){echo $_SESSION['description'];} ?>"></textarea></td>
						<td></td>
				</tr>

				<tr>
					<th>&nbsp;</th>
					<td valign="top">
						<input type="submit" name="submit_Basic_Details" value="Next"/>
						<input type="reset" value="Reset" />
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
			<th valign="top">Street:</th>
			<td><input type="text"   name="street" class="inp-form" value="<?php if(isset($_SESSION['street'])){echo $_SESSION['street'];} ?>"/></td>
			
		</tr>
		
		
		<tr>
			<th valign="top">District:</th>
			<td>
				<?php $district= array(
						"01 Cecil, Marina, People’s Pk., Raffles Plc.",   
						"02 Anson Rd, Tg. Pagar",		
						"03 Alexandra, Queenstown, Tiong Bahru",       
						"04 Habourfront, Mt. Faber, Telok Blangah, WTC",  
						"05 Clementi, Dover, Pasir Panjang, West Coast",       
						"06 Beach Rd, High Street",       
						"07 Golden Mile, Middle Rd",       
						"08 Little India",      
						"09 Cairnhill, Orchard Road, River Valley",       
						"10 Ardmore, Bt. Timah, Farrer, Holland, Tanglin Rd",
						"11 Novena, Newton, Thomson, Watten Estate",
						"12 Balestier, Serangoon, Toa Payoh",
						"13 Macpherson, Braddell",
						"14 Geylang, Eunos, Sims, Paya Lebar",
						"15 Amber Rd, Joo Chiat, Katong, Marine Parade, Meyer, Tg. Rhu",
						"16 Bayshore, Bedok, Siglap, U. E. Coast Rd, Eastwood, Kew Dr",
						"17 Changi, Flora, Loyang",
						"18 Tampines, Pasir Ris, Simei",
						"19 Serangoon, Hougang, Punggol, Sengkang",
						"20 Ang Mo Kio, Bishan, Braddell, Mei Hwan, Thomson",
						"21 Upper Bt. Timah, Ulu Pandan",
						"22 Boon Lay, Lakeside, Jurong",
						"23 Bt. Panjang, Choa Chu Kang, Bt. Batok, Dairy Farm, Hillview",
						"25 Kranji, Woodgroove, Woodlands",
						"26 Springleaf, Upper Thomson",
						"27 Sembawang, Yishun",
						);
				
				$district_HDB=array(
						"Ang Mo Kio",
						"Bedok",
						"Bishan",
						"Bukit Batok",
						"Bukit Merah",
						"Bukit Panjang",
						"Bukit Timah",
						"Central Area",
						"Choa Chu Kang",
						"Clementi",
						"Geylang",
						"Hougang",
						"Jurong East"
						"Jurong West"
						"Kallang or Whampoa",
						"Lim Chu Kang",
						"Marine Parade",
						"Pasir Ris",
						"Punggol",
						"Queenstown",
						"Sembawang",
						"Sengkang",
						"Serangoon",
						"Tampines",
						"Toa Payoh",
						"Woodlands",
						"Yio Chu Kang"
				);
				
				
				?>
						
				   <select name="district" id="district" class="inp-form">
						<?php
						if($_SESSION['property_type_group']=="HDB Apartment")
						{
									$district_temp=$district_HDB;
						}
						else{
									$district_temp=$district;
						}
						foreach($district_temp as $d) {?>
								<option value="<?php echo $d;?>" <?php if(isset($_SESSION['district']) && ($_SESSION['district'] == $d)){ echo "selected";}?>> <?php echo $d; ?></option>
						
						<?php }?>
						
					</select>
			</td>
                      
		</tr>
		
		
		
		<tr>
		<th valign="top">EState:</th>
		<td>
		<select name="estate" id="estate">
				<?php
				$estate=array(
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
						"Kaki Bukit",
						"Kallang / Whampoa",
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
						"Yishun",
						"Jurong West",
						"Teban Gdr. / Pandan Gdr."
				);
				?>


						<?php 
						foreach($estate as $s) {?>
								<option value="<?php echo $s;?>" <?php if(isset($_SESSION['$estate']) && ($_SESSION['$estate'] == $s)){ echo "selected";}?>><?php  echo $s; ?></option>
						
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
				<input type="reset" value="Reset" />
			        
			</td>
			<td></td>
		</tr>
	</table>



<?php
 } 

//Function for Extra details-->

function create_ad_Extra_Details() {?>
	
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		
		
		
		
		
		<tr>
			
			
			<th valign="top">Tenure:</th>
			<td>
					<select name="tenure" id="tenure">
                                       <option value="">---</option>
									   <option value="freehold">freehold</option>
									   <option value="15 Years">15 Years</option>
									   <option value="30 Years">30 Years</option>
									   <option value="60 Years">60 Years</option>
									   <option value="90 Years">90 Years</option>
									   <option value="99 Years">99 Years</option>
									   <option value="103 Years">103 Years</option>
									   <option value="929 Years">929 Years</option>
									   <option value="947 Years">947 Years</option>
									   <option value="956 Years">956 Years</option>
									   <option value="998 Years">998 Years</option>
									   <option value="999 Years">999 Years</option>
									   <option value="946 Years">946 Years</option>
						</select>
			</td>
			
			
		</tr>
		
		<tr>
			<th valign="top">No of storey:</th>
			<td><input type="text"   name="No_Of_Storey" class="inp-form" /></td>
			<td></td>
		</tr>
		
		
		
		<tr>
		<th valign="top">Seller Ethnicity:</th>
		<td>	
		<select  class="styledselect_form_1" name="ethnicity">
			<option value="Singapore" selected="true">Singapore</option>
			<option value="Indian">Indian</option>
			<option value="American">American</option>
			<option value="chinese">chinese</option>
			<option value="malay">malay</option>
			<option value="other" >other</option>
			
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
					echo "<option value=\" $i\">$i</option>";
				}
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
			<?php get_Extra_Details_aminities();?>
			
		</tr>
		
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<input type="button" value="Back" onClick="window.location.href='location.php'">
				<input type="submit" name="submit_Extra_Details" value="Submit"/>
				<input type="reset" value="Reset"/>
			</td>
			<td></td>
		</tr>
		
	</table>	
		
		<?php
} 



function view_Ad_Access_Details()
{?>
<script language="JavaScript">
function MM_openBrWindow(theURL,winName,features,Ads_ID) { //v2.0
window.open(theURL,winName,features).focus();
}
</script><?php
				$App_ID=$_SESSION['App_ID'];
				$tbl_name_Ad='ads';
				$tbl_name_sites='sites';
				$tbl_name_AdSites='sites_ads';
				//$sql="SELECT * FROM $tbl_name_Ad";
				//$query = "SELECT $tbl_name_Ad.* , $tbl_name_sites.Site_Name FROM $tbl_name_Ad, $tbl_name_sites, $tbl_name_AdSites WHERE $tbl_name_Ad.Ads_ID = $tbl_name_AdSites.Ads_ID AND $tbl_name_Ad.Site_ID = $tbl_name_sites.Site_ID AND $tbl_name_Ad.Ads_ID=7";
				$query= "SELECT Property_Name,Location,Ads_ID,Type,Price,date_Posted FROM $tbl_name_Ad WHERE status='0'";
				if(0==$_SESSION['Is_Admin'])
				{
				$query.= "AND App_ID='$App_ID'";
				}
				//$query="SELECT $tbl_name_Ad.Property_Name,$tbl_name_Ad.Location,$tbl_name_Ad.Ads_ID,$tbl_name_Ad.Type,$tbl_name_Ad.Price,$tbl_name_Ad.date_Posted,$tbl_name_sites.Site_Name
				//FROM $tbl_name_sites, $tbl_name_Ad, $tbl_name_AdSites
				//WHERE $tbl_name_Ad.Ads_ID = $tbl_name_AdSites.Ads_ID
				//AND $tbl_name_AdSites.Site_ID = $tbl_name_sites.Site_ID
				//AND status='0'";
				
				 //echo $App_ID;
				if(0==$_SESSION['Is_Admin'])
				{
				 //echo "Inside check for admin";
				//	$query.=" AND $tbl_name_Ad.User_ID='$App_ID'";
				}
				 
				$result=mysql_query($query) or die('Cannot Execute:'. mysql_error());
				
			        $num_rows = mysql_num_rows($result);
				if($num_rows>0){?>
				<tr>
										
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Ad Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Website</a></th>
					<th class="table-header-repeat line-left"><a href="">Type</a></th>
					<th class="table-header-repeat line-left"><a href="">Price</a></th>
					<th class="table-header-repeat line-left"><a href="">Posted Date</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
					
				</tr>

				<?php
				$list = array();
				// $cnt=1;
				while($row = mysql_fetch_array($result))
				{
						
				// echo "$cnt++";
						
					  $Property_Name=$row['Property_Name'];
					 // $Site_ID=$row['Site_ID'];
					  $Location=$row['Location'];
					  $Type=$row['Type'];
					  $Price=$row['Price'];
					  //$Site_Name=$row['Site_Name'];
					  $date_Posted=$row['date_Posted'];
					  $Ads_ID=$row['Ads_ID'];
					   $sites_array=array();
					  $query2="SELECT Site_Name,handle,Ad_Link FROM sites_ads, sites WHERE sites_ads.Site_ID=sites.Site_ID AND sites_ads.Ads_ID='$Ads_ID'";
					 
					  $sub_result=mysql_query($query2) or die('Cannot Execute:'. mysql_error());
					// print_r($sites_array);
					  $ad_name = $Property_Name ."-". $Location;
					   ?>
					  <tr>
					<td><input  type="checkbox"/></td>
					<td><?php echo $ad_name;?></td>
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
					<!--<a href="" title="Edit" class="icon-1 info-tooltip"></a>-->
					<a href="#" title="Delete" class="icon-2 info-tooltip" onclick="javascript:MM_openBrWindow('view_site_panel.php?Ads_ID=<?php echo $Ads_ID?>','pop', 'scrollbars=no,width=350,height=210')"></a>
					<a href="repost.php" title="Repost" class="icon-3 info-tooltip"></a>
					<!--<a href="" title="Edit" class="icon-4 info-tooltip"></a>-->
					<!--<a href="" title="Edit" class="icon-5 info-tooltip"></a>-->
					</td>
				          </tr><?php
					 
				}
				}
				else{
				echo "Record not found";		
				}
}

				


function view_Trash_Details()
{
				$App_ID=$_SESSION['App_ID'];
				$tbl_name_Ad='ads';
				$tbl_name_sites='sites';
				$tbl_name_AdSites='sites_ads';
				//$sql="SELECT * FROM $tbl_name_Ad";
				//$query = "SELECT $tbl_name_Ad.* , $tbl_name_sites.Site_Name FROM $tbl_name_Ad, $tbl_name_sites, $tbl_name_AdSites WHERE $tbl_name_Ad.Ads_ID = $tbl_name_AdSites.Ads_ID AND $tbl_name_Ad.Site_ID = $tbl_name_sites.Site_ID AND $tbl_name_Ad.Ads_ID=7";
				
				$query="SELECT $tbl_name_Ad.*,$tbl_name_sites.Site_Name
				FROM $tbl_name_sites, $tbl_name_Ad, $tbl_name_AdSites
				WHERE $tbl_name_Ad.Ads_ID = $tbl_name_AdSites.Ads_ID
				AND $tbl_name_AdSites.Site_ID = $tbl_name_sites.Site_ID
				AND status='1'";
				// echo $App_ID;
				if(0==$_SESSION['Is_Admin'])
				{
				// echo "Inside check for admin";
					$query.=" AND $tbl_name_Ad.App_ID='$App_ID'";
				}
				// echo $query;
				
				
				 //$query="SELECT $tbl_name_Ad.*, FROM $tbl_name_Ad";
				$result=mysql_query($query) or die('Cannot Execute:'. mysql_error());
				
$num_rows = mysql_num_rows($result);

// echo "$num_rows Rows\n";
if($num_rows>0){
				// $Fname;
				$list = array();
				// $cnt=1;
				while($row = mysql_fetch_array($result))
				{
				// echo "$cnt++";
						
					  $Property_Name=$row['Property_Name'];
					  $Site_ID=$row['Site_ID'];
					  $Location=$row['Location'];
					  $Type=$row['Type'];
					  $Price=$row['Price'];
					  $Site_Name=$row['Site_Name'];
					  $date_Posted=$row['date_Posted'];
					  $Ads_ID=$row['Ads_ID'];
					  
					  $ad_name = $Property_Name ."-". $Location;
					   ?>
					  <tr>
					<td><input  type="checkbox"/></td>
					<td><?php echo $ad_name;?></td>
					<td><a href="<?php echo $Site_Name;?>"><?php echo $Site_Name;?></a></td>
					<td><?php echo $Type; ?></td>
					<td><?php echo $Price;?></td>
					<td><?php echo $date_Posted; ?></td>
					<td class="options-width">
					<!--<a href="" title="Edit" class="icon-1 info-tooltip"></a>-->
					<a href="delete_Ad.php?ad_id=<?php echo $Ads_ID ; ?>" title="Delete" class="icon-2 info-tooltip"></a>
					<a href="repost.php" title="Repost" class="icon-3 info-tooltip"></a>
					<!--<a href="" title="Edit" class="icon-4 info-tooltip"></a>-->
					<!--<a href="" title="Edit" class="icon-5 info-tooltip"></a>-->
					</td>
				          </tr><?php
					 
				}
}
else{
			echo "Record not Found";
			
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

function delete_Adsites_deatils($Ads_ID,$is_all_sites)
{
			$tbl_name_AdSites='sites_ads';
			if($is_all_sites==1)
			{  
						$query="DELETE FROM $tbl_name_AdSites WHERE Ads_ID='$Ads_ID'";
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
			 else
			{
						$sites_array=$_POST['sites'];
						foreach($sites_array as $sub_arr)
						{
									
						$query="DELETE FROM $tbl_name_AdSites WHERE Ads_ID='$Ads_ID' AND Site_ID='$sub_arr'";
						$s=mysql_query($query);
						if(!$s)
						{
						  return -1;
						}
						else
						{
						 //return 1;
						}	
									
						}
						return 1;
						
			}
}






function get_Site_Details()
{
		$tbl_name_sites='sites';
		$sql="SELECT * FROM $tbl_name_sites";
		$result=mysql_query($sql) or die('Cannot Execute:'. mysql_error());

//print_r($_POST);
//if(isset($_POST['$Site_Name'])){?><?php //}
				 $cnt=1;
		while($row = mysql_fetch_array($result))
		{			
		$Site_ID=$row['Site_ID'];
		$Site_Name=$row['Site_Name'];?>
		<input id="check_<?php echo $cnt; ?>" type="checkbox" name="<?php echo $Site_Name;?>" value="<?php echo $Site_ID;?>" <?php if(isset($_POST[$Site_Name])){  echo "checked=\"true\""; }?>/><?php echo $Site_Name;?><br />
		 <?php  $cnt++;
		 }
	
}

function get_Extra_Details_aminities()
{
$amenities=array(
			'sports' => array(
						"1"=>"Adventure_park",
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
						"Squash_court",
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
		
		 'special_Features' =>array(
			
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
foreach($amenities as $key=>$amenity){ ?>
<fieldset>
<legend><?php echo $key;?>:</legend>
<?php foreach($amenity as $sub_key=>$sub_amenity)
{
?>

&nbsp;&nbsp;
<!--<input type="checkbox" name="<?php //echo $sub_amenity;?>" value="<?php //echo $sub_amenity;?>" /><?php //echo " ".$sub_amenity." ";?><!-- original-->
<input type="checkbox" name="<?php echo $sub_amenity;?>" value="<?php echo $sub_amenity;?>" /><?php echo " ".$sub_amenity." ";?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if(0==($sub_key%5)) { echo "<br />"; }

}//sub_amenity foreach?>
</fieldset><br>
<?php }//amenities foreach

}
?>





