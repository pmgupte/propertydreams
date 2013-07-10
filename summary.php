<?php
session_start();
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}
include 'helper_functions.php';

if(isset($_POST['ethnicity'])){
$_SESSION['ethnicity']=$_POST['ethnicity'];}
if(isset($_POST['ethnicity'])){
$_SESSION['Tenure']=$_POST['tenure'];}
//$_SESSION['age']=$_POST['age'];
if(isset($_POST['ethnicity'])){
$_SESSION['isFurnished']=$_POST['isFurnished'];}
if(isset($_POST['ethnicity'])){
$_SESSION['year']=$_POST['year'];}
if(isset($_POST['ethnicity'])){
$_SESSION['No_Of_Storey']=$_POST['No_Of_Storey'];}
$App_ID=$_SESSION['User_ID'];
$data=array();




      
       



$amenities=array(
			'sports' => array(
						"1"=>"Adventure_park",
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
			);
foreach($amenities as $key_amenity=>$amenity)
{
//echo $key_amenity;
foreach($amenity as $subkey=>$sub_amenity)
{
    if(isset($_POST[$sub_amenity])){
    $_SESSION[$sub_amenity]=$sub_amenity;    
    $data[$sub_amenity]=1;
    }else{$data[$sub_amenity]=0;}
}
    
}

$data_Array=array(
                "Property_Name"=>"property_name",
		"Type"=>"Type",
		"Property_Type"=>"property_type_group",
		"Area"=>"area",
		"Price"=>"price",
		"BuiltUp_Area"=>"builtup_Area",
		"Minimum_Term"=>"Minimum_Term",
		"Postal_Code"=>"postal_Code",
		"Street"=>"street",
		"District"=>"district",
		"Estate"=>"estate",
		"Location"=>"landmark",
		"Contact_No"=>"contact_no",
		"No_Of_Rooms"=>"no_of_rooms",
		"No_Of_Bedrooms"=>"no_of_bedrooms",
		"No_Of_Bathrooms"=>"no_of_bathrooms",
		"LandLord"=>"ethnicity",
		"Discription"=>"description",
		"Tenure"=>"Tenure",
		"Block_No"=>"block_No",
		"is_Furnished"=>"isFurnished",
		"Valuation_Price"=>"valuation_price",
		"construction_year"=>"year",
                "No_Of_Storey"=>"No_Of_Storey",
                );
$addetails_array=array(
                "Property Name"=>"property_name",
		"Type"=>"Type",
		"Property Type"=>array("property_type_group","No_Of_Storey"),
		"Area(sqft)"=>array("area","no_of_bedrooms"),
		"Price(S$)"=>"price",
		"Address"=>array("block_No","street","district","estate","postal_Code"),
		"Contact No"=>"contact_no",
                "construction year"=>"year",
		"Tenure"=>"Tenure",
		"Valuation Price(S$)"=>"valuation_price",
                "Discription"=>"description"
                );

foreach($data_Array as $key1=>$value1)
{
//if(0==$_SESSION[$value1]){ $data[$key1]=" "; $_SESSION[$value1]=" ";}
//else{
 if(isset($_SESSION[$value1])){
$data[$key1]=$_SESSION[$value1];}    
}//}//Details copied into data array
$data['Nearest_MRT']='Admiralty_NS10';
$data['Nearest_LRT']='Bakau';

$_SESSION['data']=$data;//Data array copied into SESSION

?>
<?php print_r($_SESSION);?>
<div id="content-outer">
<!-- start content -->
<div id="content">
    <table  width="100%" cellpadding="0" cellspacing="0" id="content-table">
	
  
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		<div id="step-holder">
			<?php show_step_titles(5); // highlight step 3 ?>
		</div>		<!--  end s
			<!--  start table-content  -->
			<div id="table-content">
	
<table border="1" width="100%" cellpadding="0" cellspacing="0" id="product-to-table">

<!--                                <tr>-->
<!--										-->
<!--					<th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>-->
<!--					<th class="table-header-repeat line-left minwidth-1"><a href="">details</a></th>-->
<!--					-->
<!--					-->
<!--				</tr>-->
                                
                                
                               
                              <FORM name="create_Ad" action="submit_Add_Details.php" method="post">
                                <!--<table border="0" cellpadding="0" cellspacing="0"  id="id-form">-->
                             <?php // print_r($data);
                             $array_value="";
                                    foreach($addetails_array as $key=>$value)
                                    {?>
                                        <tr>
                                        <td><?php echo $key;?></td>
                                        <?php if(is_array($value))
                                        {?><td>
                                        <?php foreach($value as $subkey=>$subvalue){
                                            ?><?php echo $_SESSION[$subvalue];?>
                                            <?php if($subvalue == "no_of_rooms"){ echo " Rooms ";}
                                                if($subvalue == "No_Of_Storey"){ echo " Storeyed ";}?>
                                            <?php echo ","; }?></td>
                                         
                                      <?php }
                                     else{
                                        ?> <td><?php  if(isset($_SESSION[$value])){echo $_SESSION[$value];}?></td><?php
                                        }?>
                                        
                                        </tr>
                                    <?php }
                                    $amenity_display="";
                                    foreach($amenities as $key_amenity=>$amenity)
                                    {
                                    foreach($amenity as $subkey=>$sub_amenity)
                                    {
                                        if($data[$sub_amenity]==1)
                                        {
                                          $amenity_display.=$_POST[$sub_amenity];
                                          $amenity_display.=" , ";
                                        }
                                        
                                    }
                                    }
                                      $amenity_display1=   str_replace("_", " ", $amenity_display);?>
                                    <tr>
                                        <td><?php echo "Amenities";?></td>
                                        <td><?php echo $amenity_display1;?></td>
                                    </tr>
                              
				<!--<input type="reset" value="Reset"/>-->
			<td valign="top" callspan=true>
                            <input type="button" value="Back" onClick="window.location.href='extra_Details.php'"/>
				<input type="submit" name="summary" value="Confirm"/>
                        </td>
			     </FORM>
		</tr>  <tr>
			
			
                                  </tr>
                                   
                         
                                
</table>
                        </div></div></td></tr>
</div>
</div>

