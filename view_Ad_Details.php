<?php
session_start();
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}
include 'db.php'; //include 'header.php';
include 'helper_functions.php';
?>
<div id="content-outer">
<!-- start content -->
<div id="content">
    <table  width="100%" cellpadding="0" cellspacing="0" id="content-table">
	
  
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
			<!--  start table-content  -->
			<div id="table-content">
	
<table border="1" width="100%" cellpadding="0" cellspacing="0" id="product-to-table">

<?php
if(isset($_GET['Ads_ID'])){
$Ads_ID=$_GET['Ads_ID'];}
//session_start();

$tbl_name_user="user";
$tbl_name_Ad='ads';
$tbl_name_sites='sites';
$tbl_name_AdSites='sites_ads';

$query_select_ads="SELECT Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Block_No,Postal_Code,Street,District,Estate,Tenure,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,construction_year,Discription,is_Furnished,Valuation_Price,No_Of_Storey,date_Posted";
$query_select_ads.=",Adventure_park,Aerobic_pool,Amphitheatre,Badminton_hall,Basketball_court,Bowling_alley,Clubhouse,Fitness_corner,Fun_pool,Game_room,Gymnasium_room,Jogging_track,Playground,squash_court,Swimming_pool,Tennis_courts,Wadding_pool,BBQ,GolfCourse";
$query_select_ads.=",Jacuzzi,Sauna,Spa_pool,Pub_Included,Dishwasher,DVD_Player,Fridge,Internet_Connection,Iron,Kitchen_Utensils,Living_Room_Furniture,Microwave,Washing_Machine,Vacuum_Cleaner,Bathtub,Hairdryer,WaterHeater,Cable_TV,Free_WiFi,Air_Conditioner,Meeting_Rooms";
$query_select_ads.=",hours_security,Walkable_to_MRT,Market,Food_Center,School,Library,Expressway,Temple,Mosque,Sea_View,City_View,Greenery_View,Dining_Room_Furniture,Balcony,Garage,Terrace,GroundFloor,LowFloor,HighFloor";
$query_select_ads.=" FROM $tbl_name_Ad WHERE Ads_ID='$Ads_ID'";
$view_Details=array(
                    "Description"=>"Discription",
                    "Details"=>array("Property_Name","Type","Price","Property_Type","Area"),
                    "Adress"=>array("Block_No","Street","District","Estate","Postal_Code","construction_year","Tenure"),
                    "Amenities"=>array(
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
			)
                  
                    
                    
                    
                    
                    
                    
                    );
$result=mysql_query($query_select_ads);
$cnt=1;
while($row= mysql_fetch_array($result))
{
foreach($view_Details as $key=>$value){ ?>
<fieldset   style="text-align:left"; >
<legend><b><?php echo $key;?>:</b></legend>
<br>
<?php if(is_array($value)){
      foreach($value as $subkey=>$subvalue)
{ $cnt++; ?>

  <?php  if($key=="Amenities"){ if($row[$subvalue]==1){ echo "&nbsp;&nbsp;"; echo str_replace("_"," ",$subvalue); echo ",";}}else{ echo "&nbsp;&nbsp;<b>$subvalue</b>";?>
  <?php  echo " : ",$row[$subvalue]; if($cnt>2){echo "<br>"; $cnt=1;}else{ for($i=0;$i<10;$i++){echo "&nbsp; &nbsp; &nbsp; &nbsp;";}}}?>


  <?php }}
  else{?><?php  ?>
  <?php echo "&nbsp;&nbsp;$row[$value]";echo "<br>";?>
 <?php 
    
  }?><br><br></fieldset><br>
<?php }}?>

      
                                
</table>
<input type="button" value="OK" onClick="window.location.href='view_Ad.php'"/>
                        </div></div></td></tr>
</div>

</div>
</body>

</html>













