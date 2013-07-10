<?php
session_start();
if(!isset($_SESSION['User_ID'])) { header('Location: index.php'); }
error_reporting(0);
include 'db.php';
 
$tbl_name_user='user';
$tbl_name_Ad='ads';
$tbl_name_sites='sites';
$tbl_name_AdSites='sites_ads';// $property_name=$_POST['property_name'];
$tbl_name_user_site='user_site';
 
//$_SESSION['data'] = $data;
 
$App_ID = $_SESSION['User_ID'];
$repostad_id=$_SESSION['repostad_id'];
//echo "old ad id :$repostad_id";
 
// get ad data from session, so that we can insert it into db table
$data = $_SESSION['data'];
$date=date("Y-m-d");
 
$location = array_pop($_SESSION['selected_sites']);
if(empty($location)) {
    $_SESSION['is_successfull'] = false;
    $_SESSION['message'] = 'No site selected. Please select at least one.';
    echo "<meta http-equiv=\"refresh\" content=\"0; url='extra_Details.php'\">";
    exit;
}
else {
    $location .= '.php';
}

if(isset($repostad_id))
{
    $sql=mysql_query("DELETE FROM $tbl_name_Ad WHERE Ads_ID='$repostad_id'"); 
}
 
$_SESSION['operation']="";

 
/*$query="INSERT INTO $tbl_name_Ad(User_ID,Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Block_No,Postal_Code,Street,District,Estate,Tenure,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,construction_year,Discription,is_Furnished,Valuation_Price,No_Of_Storey,date_Posted";
$query.=",Adventure_park,Aerobic_pool,Amphitheatre,Badminton_hall,Basketball_court,Bowling_alley,Clubhouse,Fitness_corner,Fun_pool,Game_room,Gymnasium_room,Jogging_track,Playground,squash_court,Swimming_pool,Tennis_courts,Wadding_pool,BBQ,GolfCourse";
$query.=",Jacuzzi,Sauna,Spa_pool,Pub_Included,Dishwasher,DVD_Player,Fridge,Internet_Connection,Iron,Kitchen_Utensils,Living_Room_Furniture,Microwave,Washing_Machine,Vacuum_Cleaner,Bathtub,Hairdryer,WaterHeater,Cable_TV,Free_WiFi,Air_Conditioner,Meeting_Rooms";
$query.=",hours_security,Walkable_to_MRT,Market,Food_Center,School,Library,Expressway,Temple,Mosque,Sea_View,City_View,Greenery_View,Dining_Room_Furniture,Balcony,Garage,Terrace,GroundFloor,LowFloor,HighFloor";
$query.=")";
 
$query.=" VALUES('$App_ID','{$data['Property_Name']}','{$data['Type']}','{$data['Property_Type']}','{$data['Price']}','{$data['Area']}','{$data['BuiltUp_Area']}','{$data['Block_No']}','{$data['Postal_Code']}','{$data['Street']}','{$data['District']}','{$data['Estate']}','{$data['Tenure']}','{$data['Location']}','{$data['Contact_No']}','{$data['No_Of_Rooms']}','{$data['No_Of_Bedrooms']}','{$data['No_Of_Bathrooms']}','{$data['LandLord']}','{$data['construction_year']}','{$data['Discription']}','{$data['is_Furnished']}','{$data['Valuation_Price']}','{$data['No_Of_Storey']}','$date'";
$query.=",'{$data['Adventure_park']}','{$data['Aerobic_pool']}','{$data['Amphitheatre']}','{$data['Badminton_hall']}','{$data['Basketball_court']}','{$data['Bowling_alley']}','{$data['Clubhouse']}','{$data['Fitness_corner']}','{$data['Fun_pool']}','{$data['Game_room']}','{$data['Gymnasium_room']}','{$data['Jogging_track']}','{$data['Playground']}','{$data['Squash_court']}','{$data['Swimming_pool']}','{$data['Tennis_courts']}','{$data['Wadding_pool']}','{$data['BBQ']}','{$data['GolfCourse']}'";
$query.=",'{$data['Jacuzzi']}','{$data['Sauna']}','{$data['Spa_pool']}','{$data['Pub_Included']}','{$data['Dishwasher']}','{$data['DVD_Player']}','{$data['Fridge']}','{$data['Internet_Connection']}','{$data['Iron']}','{$data['Kitchen_Utensils']}','{$data['Living_Room_Furniture']}','{$data['Microwave']}','{$data['Washing_Machine']}','{$data['Vacuum_Cleaner']}','{$data['Bathtub']}','{$data['Hairdryer']}','{$data['WaterHeater']}','{$data['Cable_TV']}','{$data['Free_WiFi']}','{$data['Air_Conditioner']}','{$data['Meeting_Rooms']}'";
$query.=",'{$data['hours_security']}','{$data['Walkable_to_MRT']}','{$data['Market']}','{$data['Food_Center']}','{$data['School']}','{$data['Library']}','{$data['Expressway']}','{$data['Temple']}','{$data['Mosque']}','{$data['Sea_View']}','{$data['City_View']}','{$data['Greenery_View']}','{$data['Dining_Room_Furniture']}','{$data['Balcony']}','{$data['Garage']}','{$data['Terrace']}','{$data['GroundFloor']}','{$data['LowFloor']}','{$data['HighFloor']}'";
$query.=")";
 */
$query="INSERT INTO $tbl_name_Ad(User_ID,Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Minimum_Term,Block_No,Postal_Code,Street,District,Estate,Tenure,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,construction_year,Discription,is_Furnished,Valuation_Price,No_Of_Storey,date_Posted";
$query.=",Adventure_park,Aerobic_pool,Amphitheatre,Badminton_hall,Basketball_court,Bowling_alley,Clubhouse,Fitness_corner,Fun_pool,Game_room,Gymnasium_room,Jogging_track,Playground,squash_court,Swimming_pool,Tennis_courts,Wadding_pool,BBQ,GolfCourse";
$query.=",Jacuzzi,Sauna,Spa_pool,Pub_Included,Dishwasher,DVD_Player,Fridge,Internet_Connection,Iron,Kitchen_Utensils,Living_Room_Furniture,Microwave,Washing_Machine,Vacuum_Cleaner,Bathtub,Hairdryer,WaterHeater,Cable_TV,Free_WiFi,Air_Conditioner,Meeting_Rooms";
$query.=",hours_security,Walkable_to_MRT,Market,Food_Center,School,Library,Expressway,Temple,Mosque,Sea_View,City_View,Greenery_View,Dining_Room_Furniture,Balcony,Garage,Terrace,GroundFloor,LowFloor,HighFloor";
$query.=")";

$query.=" VALUES('$App_ID','{$data['Property_Name']}','{$data['Type']}','{$data['Property_Type']}','{$data['Price']}','{$data['Area']}','{$data['BuiltUp_Area']}','{$data['Minimum_Term']}','{$data['Block_No']}','{$data['Postal_Code']}','{$data['Street']}','{$data['District']}','{$data['Estate']}','{$data['Tenure']}','{$data['Location']}','{$data['Contact_No']}','{$data['No_Of_Rooms']}','{$data['No_Of_Bedrooms']}','{$data['No_Of_Bathrooms']}','{$data['LandLord']}','{$data['construction_year']}','{$data['Discription']}','{$data['is_Furnished']}','{$data['Valuation_Price']}','{$data['No_Of_Storey']}','$date'";
$query.=",'{$data['Adventure_park']}','{$data['Aerobic_pool']}','{$data['Amphitheatre']}','{$data['Badminton_hall']}','{$data['Basketball_court']}','{$data['Bowling_alley']}','{$data['Clubhouse']}','{$data['Fitness_corner']}','{$data['Fun_pool']}','{$data['Game_room']}','{$data['Gymnasium_room']}','{$data['Jogging_track']}','{$data['Playground']}','{$data['Squash_court']}','{$data['Swimming_pool']}','{$data['Tennis_courts']}','{$data['Wadding_pool']}','{$data['BBQ']}','{$data['GolfCourse']}'";
$query.=",'{$data['Jacuzzi']}','{$data['Sauna']}','{$data['Spa_pool']}','{$data['Pub_Included']}','{$data['Dishwasher']}','{$data['DVD_Player']}','{$data['Fridge']}','{$data['Internet_Connection']}','{$data['Iron']}','{$data['Kitchen_Utensils']}','{$data['Living_Room_Furniture']}','{$data['Microwave']}','{$data['Washing_Machine']}','{$data['Vacuum_Cleaner']}','{$data['Bathtub']}','{$data['Hairdryer']}','{$data['WaterHeater']}','{$data['Cable_TV']}','{$data['Free_WiFi']}','{$data['Air_Conditioner']}','{$data['Meeting_Rooms']}'";
$query.=",'{$data['hours_security']}','{$data['Walkable_to_MRT']}','{$data['Market']}','{$data['Food_Center']}','{$data['School']}','{$data['Library']}','{$data['Expressway']}','{$data['Temple']}','{$data['Mosque']}','{$data['Sea_View']}','{$data['City_View']}','{$data['Greenery_View']}','{$data['Dining_Room_Furniture']}','{$data['Balcony']}','{$data['Garage']}','{$data['Terrace']}','{$data['GroundFloor']}','{$data['LowFloor']}','{$data['HighFloor']}'";
$query.=")";
// $query = mysql_escape_string($query);
//echo $query; 
 
if(mysql_query($query)) {             
    $Ads_ID= mysql_insert_id(); // gives you last inserted ID
    $_SESSION['ads_id'] = $Ads_ID;
                
    $_SESSION['processing_site'] = 0;
         
    //$location = array_pop($_SESSION['selected_sites']);
    //if(empty($location)) {
    //    $_SESSION['is_successfull'] = false;
    //    $_SESSION['message'] = 'No site selected. Please select at least one.';
    //    echo "<meta http-equiv=\"refresh\" content=\"10; url='extra_details.php'\">";
    //}
    //$location .= '.php';
    echo "navigating to $location"; 
    echo '<meta http-equiv="refresh" content="0; url='.$location.'">';
}
else {
    echo mysql_error();
    $_SESSION['is_successfull']=false;
    $_SESSION['message']="Sorry Error in posting";
}


?>
