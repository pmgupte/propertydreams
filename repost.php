<?php
//session_start();
//if(!isset($_SESSION['User_ID'])) { header('Location: index.php'); }

include 'helper_functions.php';
include 'includeFiles.php';

$user_Id=$_SESSION['User_ID'];
// prabhas: table names should come from db.php only. no var should get repeated.
$tbl_name_AdSites='sites_ads';
$tbl_name_Ad='ads';
$tbl_name_sites='sites';


if(isset($_GET['Ads_ID']))
	    {
    $Ads_ID=$_GET['Ads_ID'];
    
            }
//echo "got trash id :$Ads_ID";

$sql1= "SELECT Site_Name FROM $tbl_name_sites,$tbl_name_AdSites where $tbl_name_sites.Site_ID = $tbl_name_AdSites.Site_ID and Ads_ID = '$Ads_ID' and is_active ='1'";
//SELECT Site_Name FROM sites,sites_ads where sites.Site_ID = sites_ads.Site_ID and Ads_ID = '3' and is_active ='1'
$result1 =mysql_query($sql1);
if(!$result1) {
	die("error in query: " . mysql_error());
}
$_SESSION['selected_sites'] = array();
while($row1 = mysql_fetch_array($result1))
	{
	  //$_SESSION['selected_sites']=
	  $_SESSION['selected_sites'][]=$row1['Site_Name'];
	  $is_active=$row1['is_active'];
	  $_SESSION['is_active']=$row1['is_active'];
	  
	  
	 // $_SESSION['selected_sites']=
	}

$sql= "SELECT * FROM $tbl_name_Ad where Ads_ID='$Ads_ID'";
$result =mysql_query($sql);
//echo "this is $sql";

$Amenities=array(
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

				while($row = mysql_fetch_array($result))
				{       
					//print_r($row);
					  $_SESSION['Type']=$row['Type'];			// starts basic session					
					  $_SESSION['property_name']=$row['Property_Name'];
					  $_SESSION['property_type_group']=$row['Property_Type'];
					  $_SESSION['price']=$row['Price'];
					  $_SESSION['valuation_price']=$row['Valuation_Price'];
					  $_SESSION['area']=$row['Area'];
					  $_SESSION['builtup_Area']=$row['BuiltUp_Area'];
					  $_SESSION['no_of_rooms']=$row['No_Of_Rooms'];
					  $_SESSION['no_of_bedrooms']=$row['No_Of_Bedrooms'];
					  $_SESSION['no_of_bathrooms']=$row['No_Of_Bathrooms'];
					  $_SESSION['description']=$row['Discription'];
					  $_SESSION['block_No']=$row['Block_No'];               // start location session
					  $_SESSION['postal_Code']=$row['Postal_Code'];
					  $_SESSION['street']=$row['Street'];
					  $_SESSION['district']=$row['District'];
					  $_SESSION['estate']=$row['Estate'];
					  $_SESSION['landmark']=$row['Location'];  //ask done
					  $_SESSION['contact_no']=$row['Contact_No'];
					  $_SESSION['Tenure']=$row['Tenure'];                 //start extra session
					  $_SESSION['No_Of_Storey']=$row['No_Of_Storey'];
					  $_SESSION['ethnicity']=$row['LandLord'];
					  $_SESSION['year']=$row['construction_year'];
					   foreach($Amenities as $amenity)
					          {
							$temp=$row[$amenity];    
							    if(1==$temp){
							 echo "session ",$amenity;
							$_SESSION[$amenity]=$amenity;}
							else{unset($_SESSION[$amenity]);}
							
						  }
					  //$_SESSION[$sub_amenity]=$row[''];
					  //$_SESSION[$sub_amenity];
					  //$_SESSION['selected_sites']=$row[''];
					 // $date_Posted=$row['date_Posted'];
					   $_SESSION['repostad_id']=$row['Ads_ID'];
					   //$Ads_ID=$row['Ads_ID'];
					 $Ads_ID=$_SESSION['repostad_id'];
					   $_SESSION['operation']="";
					  
					 
					  
                                }
				//echo "session array";
				//print_r($_SESSION);
//$notrash = "notrash"; 				
//  $query="UPDATE $tbl_name_Ad SET status=0 WHERE Ads_ID='$Ads_ID'";//  for delete repost
				
				//echo "repost id is : $_SESSION['ads_id']";
				//header("location:create_Ad.php?repost=$Ads_ID");
                              //  header("location:create_Ad.php?repost=$Ads_ID");
					//if(isset($_SESSION['repostad_id']))
				//{
				// header("location:site_panel.php");

//}

?>
<meta http-equiv="refresh" content="0; site_panel.php">
