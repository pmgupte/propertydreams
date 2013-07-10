<?php
@session_start();
ob_start();
$data=array();
if(!empty($_SESSION['username'])) { header('Location: dashboard.php'); }

include 'db.php';


$tbl_name_Ad='ads';
$tbl_name_sites='sites';
$tbl_name_AdSites='sites_ads';// $property_name=$_POST['property_name'];
// no_of_rooms


$_SESSION['ethnicity']=$_POST['ethnicity'];


//$_SESSION['age']=$_POST['age'];

$_SESSION['isFurnished']=$_POST['isFurnished'];
$_SESSION['year']=$_POST['year'];

//Details for site selection
//$_SESSION['propertyguru']=$_POST['propertyguru'];
//$_SESSION['Wordpress']=$_POST['Wordpress'];
//$_SESSION['iproperty']=$_POST['iproperty'];
//$_SESSION['rentinsingapore']=$_POST['rentinsingapore'];
//$_SESSION['propmatch']=$_POST['propmatch'];
//$_SESSION['sisvrealink']=$_POST['sisvrealink'];
//$_SESSION['cobrokehub']=$_POST['cobrokehub'];


// $_SESSION['builtup_Area']=$_POST['builtup_Area'];
// $_SESSION['builtup_Area']=$_POST['builtup_Area'];
// print_r($_POST);
$Squash_court=$_POST['Squash_court'];
//$Adventure_park=1;
//$Aerobic_pool=0;
// echo "Squash_court".$Squash_court;
//echo "$Aerobic_pool";
//Adventure_park,Aerobic_pool,Amphitheatre,Badminton_hall,,Bowling_alley,Clubhouse,Fitness_corner,Fun_pool,Game_room,Gymnasium_room,Jogging_track,Playground,squash_court,Swimming_pool,Tennis_courts,Wadding_pool,BBQ,GolfCourse,
if(isset($_POST['Adventure_park'])){ $data['Adventure_park']='1'; }
else{ $data['Adventure_park']='0';}

if(isset($_POST['Aerobic_pool'])){ $data['Aerobic_pool']='1'; }
else{ $data['Aerobic_pool']='0';}

if(isset($_POST['Amphitheatre'])){ $data['Amphitheatre']='1'; }
else{ $data['Amphitheatre']='0';}

if(isset($_POST['Badminton_hall'])){ $data['Badminton_hall']='1'; }
else{ $data['Badminton_hall']='0';}

if(isset($_POST['Basketball_court'])){ $data['Basketball_court']='1'; }
else{ $data['Basketball_court']='0';}

if(isset($_POST['Bowling_alley'])){ $data['Bowling_alley']='1'; }
else{ $data['Bowling_alley']='0';}

if(isset($_POST['Clubhouse'])){ $data['Clubhouse']='1'; }
else{ $data['Clubhouse']='0';}

if(isset($_POST['Fitness_corner'])){ $data['Fitness_corner']='1'; }
else{ $data['Fitness_corner']='0';}

if(isset($_POST['Fun_pool'])){ $data['Fun_pool']='1'; }
else{ $data['Fun_pool']='0';}

if(isset($_POST['Game_room'])){ $data['Game_room']='1'; }
else{ $data['Game_room']='0';}

if(isset($_POST['Gymnasium_room'])){ $data['Gymnasium_room']='1'; }
else{ $data['Gymnasium_room']='0';}

if(isset($_POST['Jogging_track'])){ $data['Jogging_track']='1'; }
else{ $data['Jogging_track']='0';}

if(isset($_POST['Playground'])){ $data['Playground']='1'; }
else{ $data['Playground']='0';}

if(isset($_POST['Squash_court'])){ $data['Squash_court']='1'; }
else{ $data['Squash_court']='0';}

if(isset($_POST['Swimming_pool'])){ $data['Swimming_pool']='1'; }
else{ $data['Swimming_pool']='0';}

if(isset($_POST['Tennis_courts'])){ $data['Tennis_courts']='1'; }
else{ $data['Tennis_courts']='0';}

if(isset($_POST['Wadding_pool'])){ $data['Wadding_pool']='1'; }
else{ $data['Wadding_pool']='0';}

if(isset($_POST['GolfCourse'])){ $data['GolfCourse']='1'; }
else{ $data['GolfCourse']='0';}

if(isset($_POST['BBQ'])){ $data['BBQ']='1'; }
else{ $data['BBQ']='0';}

if(isset($_POST['Jacuzzi'])){ $data['Jacuzzi']='1'; }
else{ $data['Jacuzzi']='0';}

if(isset($_POST['Sauna'])){ $data['Sauna']='1'; }
else{ $data['Sauna']='0';}

if(isset($_POST['Spa_pool'])){ $data['Spa_pool']='1'; }
else{ $data['Spa_pool']='0';}

if(isset($_POST['Pub_Included'])){ $data['Pub_Included']='1'; }
else{ $data['Pub_Included']='0';}

if(isset($_POST['Dishwasher'])){ $data['Dishwasher']='1'; }
else{ $data['Dishwasher']='0';}

if(isset($_POST['DVD_Player'])){ $data['DVD_Player']='1'; }
else{ $data['DVD_Player']='0';}

if(isset($_POST['Fridge'])){ $data['Fridge']='1'; }
else{ $data['Fridge=0'];}

if(isset($_POST['Internet_Connection'])){ $data['Internet_Connection']=1; }
else{ $data['Internet_Connection']='0';}

if(isset($_POST['Iron'])){ $data['Iron']=1; }
else{ $data['Iron']=0;}

if(isset($_POST['Kitchen_Utensils'])){ $data['Kitchen_Utensils']=1; }
else{ $data['Kitchen_Utensils']=0;}

if(isset($_POST['Living_Room_Furniture'])){ $data['Living_Room_Furniture']=1; }
else{ $data['Living_Room_Furniture']=0;}

if(isset($_POST['Microwave'])){ $data['Microwave']=1; }
else{ $data['Microwave']=0;}

if(isset($_POST['Washing_Machine'])){ $data['Washing_Machine']=1; }
else{ $data['Washing_Machine']=0;}

if(isset($_POST['Vacuum_Cleaner'])){ $data['Vacuum_Cleane']=1; }
else{ $data['Vacuum_Cleaner']=0;}

if(isset($_POST['Bathtub'])){ $data['Bathtub']=1; }
else{ $data['Bathtub']=0;}

if(isset($_POST['Hairdryer'])){ $data['Hairdryer']=1; }
else{ $data['Hairdryer']=0;}

if(isset($_POST['WaterHeater'])){ $data['WaterHeater']=1; }
else{ $data['WaterHeater']=0;}

if(isset($_POST['Cable_TV'])){ $data['Cable_TV']=1; }
else{ $data['Cable_TV']=0;}

if(isset($_POST['Free_WiFi'])){ $data['Free_WiFi']=1; }
else{ $data['Free_WiFi']=0;}

if(isset($_POST['Air_Conditioner'])){ $data['Air_Conditioner']=1; }
else{ $data['Air_Conditioner']=0;}

if(isset($_POST['Meeting_Rooms'])){ $data['Meeting_Rooms']=1; }
else{ $data['Meeting_Rooms']=0;}

if(isset($_POST['hours_security'])){ $data['hours_security']=1; }
else{ $data['hours_security']=0;}

if(isset($_POST['Walkable_to_MRT'])){ $data['Walkable_to_MRT']=1; }
else{ $data['Walkable_to_MRT']=0;}

if(isset($_POST['Market'])){ $data['Market']=1; }
else{ $data['Market']=0;}

if(isset($_POST['Food_Center'])){ $data['Food_Center']=1; }
else{ $data['Food_Center']=0;}

if(isset($_POST['School'])){ $data['School']=1; }
else{ $data['School']=0;}

if(isset($_POST['Library'])){ $data['Library']=1; }
else{ $data['Library']=0;}

if(isset($_POST['Expressway'])){ $data['Expressway']=1; }
else{ $data['Expressway']=0;}

if(isset($_POST['Temple'])){ $data['Temple']=1; }
else{ $data['Temple']=0;}

if(isset($_POST['Mosque'])){ $data['Mosque']=1; }
else{ $data['Mosque']=0;}

if(isset($_POST['Sea_View'])){ $data['Sea_View']=1; }
else{ $data['Sea_View']=0;}

if(isset($_POST['City_View'])){ $data['City_View']=1; }
else{ $data['City_View']=0;}

if(isset($_POST['Greenery_View'])){ $data['Greenery_View']=1; }
else{ $data['Greenery_View']=0;}

if(isset($_POST['Dining_Room_Furniture'])){ $data['Dining_Room_Furniture']=1; }
else{ $data['Dining_Room_Furniture']=0;}

if(isset($_POST['Balcony'])){ $data['Balcony']=1; }
else{ $data['Balcony']=0;}

if(isset($_POST['Garage'])){ $data['Garage']=1; }
else{ $data['Garage']=0;}

if(isset($_POST['Terrace'])){ $data['Terrace']=1; }
else{ $data['Terrace']=0;}


if(isset($_POST['GroundFloor'])){ $data['GroundFloor']=1; }
else{ $data['GroundFloor']=0;}


if(isset($_POST['LowFloor'])){ $data['LowFloor=1']; }
else{ $data['LowFloor']=0;}

if(isset($_POST['HighFloor'])){ $data['HighFloor']=1; }
else{ $data['HighFloor']=0;}

// echo "hours_security".$hours_security;

	 // $property_Type=$_POST['property_Type'];
	 // echo "Hi";
	 // echo $property_name;
	 // echo $property_Type;
		// $eadd2= $_POST['eadd2'];
		// $eedu2= $_POST['eedu2'];
		// $skills2=$_POST['skills2'];
		// print_r($_SESSION);
		$myFile = "log.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "New Stuff 1\n";
// fwrite($fh, $stringData);
 // fwrite($fh, );
 $stringData = "my file\n";
 // fwrite($fh, $stringData);
fclose($fh);
$App_ID=$_SESSION['App_ID'];
//ostal_Code,Street,District,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,Age,Discription,is_Furnished,Valuation_Price,date_Posted,Adventure_park,Aerobic_pool)
		$data['Property_Name']=$_SESSION['property_name'];
		$data['Type']=$_SESSION['type'];
		$data['Property_Type']=$_SESSION['property_type_group'];
		$data['Area']=$_SESSION['area'];
		$data['Price']=$_SESSION['price'];
		$data['BuiltUp_Area']=$_SESSION['builtup_Area'];
		$data['Postal_Code']=$_SESSION['postal_Code'];
		$data['Street']=$_SESSION['street'];
		$data['District']=$_SESSION['district'];
		$data['Estate']=$_SESSION['estate'];
		$data['Location']=$_SESSION['landmark'];
		$data['Contact_No']=$_SESSION['contact_no'];
		$data['No_Of_Rooms']=$_SESSION['no_of_rooms'];
		$data['No_Of_Bedrooms']=$_SESSION['no_of_bedrooms'];
		$data['No_Of_Bathrooms']=$_SESSION['no_of_bathrooms'];
		$data['LandLord']=$_SESSION['ethnicity'];
		$data['Discription']=$_SESSION['description'];
		
		$data['Block_No']=$_SESSION['block_No'];
		//$age=$_SESSION['age'];
		$data['is_Furnished']=$_SESSION['isFurnished'];
		$data['Valuation_Price']=$_SESSION['valuation_price'];
		$data['year']=$_SESSION['year'];
		$data['Nearest_MRT']='Admiralty_NS10';
		$data['Nearest_LRT']='Bakau';


		
		
			// $year=$_SESSION['year'];
			// $year=$_SESSION['year'];
			// $year=$_SESSION['year'];
			// $year=$_SESSION['year'];

		
		// echo "INSERT INTO $tbl_name_ad(Property_Name,Type)VALUES('$property_name','$property_Type')";
                //date ()
		//Running
		 //$result=mysql_query("INSERT INTO ads(Property_Name,Type,Price,Area,BuiltUp_Area)VALUES('$property_name','$property_Type','$price','$area','$builtup_Area')");
		$date=date("Y-m-d");
//print_r($_SESSION);
               //if(mysql_query("INSERT INTO $tbl_name_Ad(Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Postal_Code,Street,District,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,Age,Discription,is_Furnished,Valuation_Price,date_Posted,Adventure_park,Aerobic_pool,Amphitheatre,Badminton_hall,Basketball_court,Bowling_alley,Clubhouse,Fitness_corner,Fun_pool,Game_room,Gymnasium_room,Jogging_track) VALUES ('$property_name','$type','$property_type_group','$price','$area','$builtup_Area','$postal_Code','$street','$district','$landmark','$contact_no','$no_of_rooms','$no_of_bedrooms','$no_of_bathrooms','$ethnicity','$age','$description','$isFurnished','$valuation_price','$date','$Adventure_park','$Aerobic_pool','$Amphitheatre','$Badminton_hall','$Basketball_court','$Bowling_alley','$Clubhouse','$Fitness_corner','$Fun_pool','$Game_room','$Gymnasium_room','$Jogging_track')"))
                  //if(mysql_query("INSERT INTO $tbl_name_Ad(Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Postal_Code,Street,District,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,Age,Discription,is_Furnished,Valuation_Price,date_Posted,Adventure_park,Aerobic_pool) VALUES ('$property_name','$type','$property_type_group','$price','$area','$builtup_Area','$postal_Code','$street','$district','$landmark','$contact_no','$no_of_rooms','$no_of_bedrooms','$no_of_bathrooms','$ethnicity','$age','$description','$isFurnished','$valuation_price','$date','1','1')"))
		//if(mysql_query("INSERT INTO $tbl_name_Ad(Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Postal_Code,Street,District,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,Age,Discription,is_Furnished,Valuation_Price,date_Posted,Adventure_park,Aerobic_pool,Amphitheatre,Badminton_hall,Basketball_court,Bowling_alley,Clubhouse,Fitness_corner,Fun_pool,Game_room,Gymnasium_room,Jogging_track) VALUES ('$property_name','$type','$property_type_group','$price','$area','$builtup_Area','$postal_Code','$street','$district','$landmark','$contact_no','$no_of_rooms','$no_of_bedrooms','$no_of_bathrooms','$ethnicity','$age','$description','$isFurnished','$valuation_price','$date','0','1','1','1','1','0','0','0','0','1','1','1')"))
		
		//if(mysql_query("INSERT INTO ads(Property_Name,TYPE ,Property_Type,Price,Area,BuiltUp_Area,Postal_Code,Street,District,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,Age,Discription,is_Furnished,Valuation_Price,date_Posted,Adventure_park,Aerobic_pool)VALUES ('$property_name','$type','$property_type_group','$price','$area','$builtup_Area','$postal_Code','$street','$district','$landmark','$contact_no','$no_of_rooms','$no_of_bedrooms','$no_of_bathrooms','$ethnicity','$age','$description','$isFurnished','$valuation_price','$date','1','0')"))
		//Original Executed query
		//if(mysql_query("INSERT INTO ads(App_ID,Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Postal_Code,Street,District,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,Age,Discription,is_Furnished,Valuation_Price,date_Posted,Adventure_park,Aerobic_pool,Amphitheatre,Badminton_hall,Basketball_court,Bowling_alley,Clubhouse,Fitness_corner,Fun_pool,Game_room,Gymnasium_room,Jogging_track,Playground,squash_court,Swimming_pool,Tennis_courts,Wadding_pool,BBQ,GolfCourse,Jacuzzi,Sauna,Spa_pool,Pub_Included,Dishwasher,DVD_Player,Fridge,Internet_Connection,Iron,Kitchen_Utensils,Living_Room_Furniture,Microwave,Washing_Machine,Vacuum_Cleaner,Bathtub,Hairdryer,WaterHeater,Cable_TV,Free_WiFi,Air_Conditioner,Meeting_Rooms,hours_security,Walkable_to_MRT,Market,Food_Center,School,Library,Expressway,Temple,Mosque,Sea_View,City_View,Greenery_View,Dining_Room_Furniture,Balcony,Garage,Terrace,GroundFloor,LowFloor,HighFloor) VALUES ('$App_ID','$property_name','$type','$property_type_group','$price','$area','$builtup_Area','$postal_Code','$street','$district','$landmark','$contact_no','$no_of_rooms','$no_of_bedrooms','$no_of_bathrooms','$ethnicity','$age','$description','$isFurnished','$valuation_price','$date','$Adventure_park','$Aerobic_pool','$Amphitheatre','$Badminton_hall','$Basketball_court','$Bowling_alley','$Clubhouse','$Fitness_corner','$Fun_pool','$Game_room','$Gymnasium_room','$Jogging_track','$Playground','$Squash_court','$Swimming_pool','$Tennis_courts','$Wadding_pool','$BBQ','$GolfCourse','$Jacuzzi','$Sauna','$Spa_pool','$Pub_Included','$Dishwasher','$DVD_Player','$Fridge','$Internet_Connection','$Iron','$Kitchen_Utensils','$Living_Room_Furniture','$Microwave','$Washing_Machine','$Vacuum_Cleaner','$Bathtub','$Hairdryer','$WaterHeater','$Cable_TV','$Free_WiFi','$Air_Conditioner','$Meeting_Rooms','$hours_security','$Walkable_to_MRT','$Market','$Food_Center','$School','$Library','$Expressway','$Temple','$Mosque','$Sea_View','$City_View','$Greenery_View','$Dining_Room_Furniture','$Balcony','$Garage','$Terrace','$GroundFloor','$LowFloor','$HighFloor')"))
		$query="INSERT INTO ads(App_ID,Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Block_No,Postal_Code,Street,District,Estate,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,construction_year,Discription,is_Furnished,Valuation_Price,date_Posted";
		 $query.=",Adventure_park,Aerobic_pool,Amphitheatre,Badminton_hall,Basketball_court,Bowling_alley,Clubhouse,Fitness_corner,Fun_pool,Game_room,Gymnasium_room,Jogging_track,Playground,squash_court,Swimming_pool,Tennis_courts,Wadding_pool,BBQ,GolfCourse";
		$query.=",Jacuzzi,Sauna,Spa_pool,Pub_Included,Dishwasher,DVD_Player,Fridge,Internet_Connection,Iron,Kitchen_Utensils,Living_Room_Furniture,Microwave,Washing_Machine,Vacuum_Cleaner,Bathtub,Hairdryer,WaterHeater,Cable_TV,Free_WiFi,Air_Conditioner,Meeting_Rooms";
		$query.=",hours_security,Walkable_to_MRT,Market,Food_Center,School,Library,Expressway,Temple,Mosque,Sea_View,City_View,Greenery_View,Dining_Room_Furniture,Balcony,Garage,Terrace,GroundFloor,LowFloor,HighFloor";
		$query.=")";
/*
	$insert_str = "INSERT INTO ads(";
	$columns = array();
	$values = array();
	foreach($data as $key=>$value) {
		$columns[] = $key;
		$values[] = "'$value'";
	}
	$insert_str .= implode($columns, ",") . ") "; // join all elements of array by "," ins into t(a,b,c,d,f) values('a1','b1','c1','d1','f1')
	$insert_str .= "values(" . implode($values, ",") . ")";
	
*/$tbl_name_user='user';

		
		$query.="VALUES('$App_ID','{$data['Property_Name']}','{$data['Type']}','{$data['Property_Type']}','{$data['Price']}','{$data['Area']}','{$data['BuiltUp_Area']}','{$data['Block_No']}','{$data['Postal_Code']}','{$data['Street']}','{$data['District']}','{$data['Estate']}','{$data['Location']}','{$data['Contact_No']}','{$data['No_Of_Rooms']}','{$data['No_Of_Bedrooms']}','{$data['No_Of_Bathrooms']}','{$data['LandLord']}','{$data['year']}','{$data['Discription']}','{$data['is_Furnished']}','{$data['Valuation_Price']}','$date'";
		 $query.=",'{$data['Adventure_park']}','{$data['Aerobic_pool']}','{$data['Amphitheatre']}','{$data['Badminton_hall']}','{$data['Basketball_court']}','{$data['Bowling_alley']}','{$data['Clubhouse']}','{$data['Fitness_corner']}','{$data['Fun_pool']}','{$data['Game_room']}','{$data['Gymnasium_room']}','{$data['Jogging_track']}','{$data['Playground']}','{$data['Squash_court']}','{$data['Swimming_pool']}','{$data['Tennis_courts']}','{$data['Wadding_pool']}','{$data['BBQ']}','{$data['GolfCourse']}'";
		$query.=",'{$data['Jacuzzi']}','{$data['Sauna']}','{$data['Spa_pool']}','{$data['Pub_Included']}','{$data['Dishwasher']}','{$data['DVD_Player']}','{$data['Fridge']}','{$data['Internet_Connection']}','{$data['Iron']}','{$data['Kitchen_Utensils']}','{$data['Living_Room_Furniture']}','{$data['Microwave']}','{$data['Washing_Machine']}','{$data['Vacuum_Cleaner']}','{$data['Bathtub']}','{$data['Hairdryer']}','{$data['WaterHeater']}','{$data['Cable_TV']}','{$data['Free_WiFi']}','{$data['Air_Conditioner']}','{$data['Meeting_Rooms']}'";
		$query.=",'{$data['hours_security']}','{$data['Walkable_to_MRT']}','{$data['Market']}','{$data['Food_Center']}','{$data['School']}','{$data['Library']}','{$data['Expressway']}','{$data['Temple']}','{$data['Mosque']}','{$data['Sea_View']}','{$data['City_View']}','{$data['Greenery_View']}','{$data['Dining_Room_Furniture']}','{$data['Balcony']}','{$data['Garage']}','{$data['Terrace']}','{$data['GroundFloor']}','{$data['LowFloor']}','{$data['HighFloor']}'";
		$query.=")";
		
		// echo $query;
		//if(mysql_query("INSERT INTO ads(App_ID,Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Postal_Code,Street,District,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,Age,Discription,is_Furnished,Valuation_Price,date_Posted,Adventure_park,Aerobic_pool,Amphitheatre,Badminton_hall,Basketball_court,Bowling_alley,Clubhouse,Fitness_corner,Fun_pool,Game_room,Gymnasium_room,Jogging_track,Playground,squash_court,Swimming_pool,Tennis_courts,Wadding_pool,BBQ,GolfCourse,Jacuzzi,Sauna,Spa_pool,Pub_Included,Dishwasher,DVD_Player,Fridge,Internet_Connection,Iron,Kitchen_Utensils,Living_Room_Furniture,Microwave,Washing_Machine,Vacuum_Cleaner,Bathtub,Hairdryer,WaterHeater,Cable_TV,Free_WiFi,Air_Conditioner,Meeting_Rooms,hours_security,Walkable_to_MRT,Market,Food_Center,School,Library,Expressway,Temple,Mosque,Sea_View,City_View,Greenery_View,Dining_Room_Furniture,Balcony,Garage,Terrace,GroundFloor,LowFloor,HighFloor) VALUES ('$App_ID','$property_name','$type','$property_type_group','$price','$area','$builtup_Area','$postal_Code','$street','$district','$landmark','$contact_no','$no_of_rooms','$no_of_bedrooms','$no_of_bathrooms','$ethnicity','$age','$description','$isFurnished','$valuation_price','$date','$Adventure_park','$Aerobic_pool','$Amphitheatre','$Badminton_hall','$Basketball_court','$Bowling_alley','$Clubhouse','$Fitness_corner','$Fun_pool','$Game_room','$Gymnasium_room','$Jogging_track','$Playground','$Squash_court','$Swimming_pool','$Tennis_courts','$Wadding_pool','$BBQ','$GolfCourse','$Jacuzzi','$Sauna','$Spa_pool','$Pub_Included','$Dishwasher','$DVD_Player','$Fridge','$Internet_Connection','$Iron','$Kitchen_Utensils','$Living_Room_Furniture','$Microwave','$Washing_Machine','$Vacuum_Cleaner','$Bathtub','$Hairdryer','$WaterHeater','$Cable_TV','$Free_WiFi','$Air_Conditioner','$Meeting_Rooms','$hours_security','$Walkable_to_MRT','$Market','$Food_Center','$School','$Library','$Expressway','$Temple','$Mosque','$Sea_View','$City_View','$Greenery_View','$Dining_Room_Furniture','$Balcony','$Garage','$Terrace','$GroundFloor','$LowFloor','$HighFloor')"))
		//if(mysql_query($query))
		if(true)
		{
		
	
			$_SESSION['is_successfull']=true;
			$_SESSION['message']="Ad Posted Successfully";
			
			 $Ads_ID= mysql_insert_id();
                // echo "$Ads_ID";
              if(isset($_POST['propertyguru']))
                {
                // mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['propertyguru']}','$Ads_ID')");
                }
                 if(isset($_POST['Wordpress']))
                {
                 mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['Wordpress']}','$Ads_ID')");
                }
                 if(isset($_POST['iproperty']))
                {
                 mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['iproperty']}','$Ads_ID')");
                }
               //  if(isset($_POST['rentinsingapore']))
                {
				$temp_query="SELECT rentinsingapore_UserName,rentinsingapore_Password FROM $tbl_name_user WHERE App_ID='3'";
				echo "$temp_query";
				$res=mysql_query($temp_query);
				echo mysql_num_rows($res);
                while($row = mysql_fetch_array($res))
				 {
				 echo "Data from user tab";
				$data['username']=$row['rentinsingapore_UserName'];
				$data['password']=$row['rentinsingapore_Password'];
				 }
				 print_r($data);
				// mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['rentinsingapore']}','$Ads_ID')");
				 // $data['username'] = 'gprabhas@gmail.com';
				 // $data['password'] = 'mh15al7167';

				 // include module for rentinsingapore
				
//				include 'modules/rentinsingapore/main.php';//Commented by pranali
	
	// create object
			//	 $object = new rent_in_singapore();//Commented by pranali
				 // call post_ad function
				 // $response = $object->post_ad($data);//Commented by pranali
				 // $_SESSION['message'] = $response['handle'] . $response['ad_link'] . $response['code'];//Commented by pranali
                }
                 if(isset($_POST['propmatch']))
                {
                 //mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['propmatch']}','$Ads_ID')");
                }
                 if(isset($_POST['sisvrealink']))
                {
                 mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['sisvrealink']}','$Ads_ID')");
                }
                 if(isset($_POST['cobrokehub']))
                {
                 mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['cobrokehub']}','$Ads_ID')");
                }
			
			//header("location:view_Ad.php");   
            //Redirected to list ad page with Success
                    
        }
        else
		{
			$_SESSION['is_successfull']=false;
			$_SESSION['message']="Sorry Error in posting";
			//header("location:view_Ad.php");   
			//Redirected to list ad page with Error
            echo "Not";
                    
        }
                
                

		//$result = mysql_query("INSERT INTO ads(Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Postal_Code,Street,District,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,Age,Discription,is_Furnished,Valuation_Price) VALUES ('$property_name','$type','$property_type_group','$price','$area','$builtup_Area','$postal_Code','$street','$district','$landmark','$contact_no','$no_of_rooms','$no_of_bedrooms','$no_of_bathrooms','$ethnicity','$age','$description','$isFurnished','$valuation_price')");
		// $result = mysql_query("INSERT INTO $tbl_name_Ad(Property_Name,Type,Price,Area,BuiltUp_Area,Postal_Code,Street,District,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,LandLord) VALUES ($SESSION['property_name'],$SESSION['property_Type'],$SESSION['price'],$SESSION['area'],$SESSION['builtup_Area'],$SESSION['postal_Code'],$SESSION['street'],$SESSION['district'],$SESSION['landmark'],$SESSION['contact_no'],$SESSION['no_of_rooms'],$SESSION['no_of_bedrooms'],$SESSION['ethnicity'])");
		//$result = mysql_query("INSERT INTO  $tbl_name_Ad(Emp_Id,start_Date,end_Date,submitted_Date,activities_Executed,activities_Planned,planned_Vacation,dependency_CompleteTasks)
		 //VALUES ('$Emp_Id','$Start_Date','$End_Date','$submitted_Date','$activity_past','$activity_Plan','$note1','$note2')");



?>