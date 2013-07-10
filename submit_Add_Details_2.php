<?php
$data=array();
if(!empty($_SESSION['username'])) { header('Location: dashboard.php'); }

include 'db.php';

$tbl_name_user='user';
$tbl_name_Ad='ads';
$tbl_name_sites='sites';
$tbl_name_AdSites='sites_ads';// $property_name=$_POST['property_name'];
$tbl_name_user_site='user_site';
// no_of_rooms

//print_r($_POST);

$_SESSION['ethnicity']=$_POST['ethnicity'];

$_SESSION['Tenure']=$_POST['tenure'];
//$_SESSION['age']=$_POST['age'];

$_SESSION['isFurnished']=$_POST['isFurnished'];
$_SESSION['year']=$_POST['year'];
$_SESSION['No_Of_Storey']=$_POST['No_Of_Storey'];




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
else{ $data['Fridge']='0';}

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

if(isset($_POST['Vacuum_Cleaner'])){ $data['Vacuum_Cleaner']=1; }
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

if(isset($_POST['LowFloor'])){ $data['LowFloor']=1; }
else{ $data['LowFloor']=0;}

if(isset($_POST['HighFloor'])){ $data['HighFloor']=1; }
else{ $data['HighFloor']=0;}

$App_ID=$_SESSION['User_ID'];
		$data['Property_Name']=$_SESSION['property_name'];
		$data['Type']=$_SESSION['Type'];
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
		$data['Tenure']=$_SESSION['Tenure'];
		$data['Block_No']=$_SESSION['block_No'];
		//$age=$_SESSION['age'];
		$data['is_Furnished']=$_SESSION['isFurnished'];
		$data['Valuation_Price']=$_SESSION['valuation_price'];
		$data['construction_year']=$_SESSION['year'];
                $data['No_Of_Storey']=$_SESSION['No_Of_Storey'];
		$data['Nearest_MRT']='Admiralty_NS10';
		$data['Nearest_LRT']='Bakau';
           
                $date=date("Y-m-d");

            
		$query="INSERT INTO $tbl_name_Ad(User_ID,Property_Name,Type,Property_Type,Price,Area,BuiltUp_Area,Block_No,Postal_Code,Street,District,Estate,Tenure,Location,Contact_No,No_Of_Rooms,No_Of_Bedrooms,No_Of_Bathrooms,LandLord,construction_year,Discription,is_Furnished,Valuation_Price,No_Of_Storey,date_Posted";
		 $query.=",Adventure_park,Aerobic_pool,Amphitheatre,Badminton_hall,Basketball_court,Bowling_alley,Clubhouse,Fitness_corner,Fun_pool,Game_room,Gymnasium_room,Jogging_track,Playground,squash_court,Swimming_pool,Tennis_courts,Wadding_pool,BBQ,GolfCourse";
		$query.=",Jacuzzi,Sauna,Spa_pool,Pub_Included,Dishwasher,DVD_Player,Fridge,Internet_Connection,Iron,Kitchen_Utensils,Living_Room_Furniture,Microwave,Washing_Machine,Vacuum_Cleaner,Bathtub,Hairdryer,WaterHeater,Cable_TV,Free_WiFi,Air_Conditioner,Meeting_Rooms";
		$query.=",hours_security,Walkable_to_MRT,Market,Food_Center,School,Library,Expressway,Temple,Mosque,Sea_View,City_View,Greenery_View,Dining_Room_Furniture,Balcony,Garage,Terrace,GroundFloor,LowFloor,HighFloor";
		$query.=")";


		$query.="VALUES('$App_ID','{$data['Property_Name']}','{$data['Type']}','{$data['Property_Type']}','{$data['Price']}','{$data['Area']}','{$data['BuiltUp_Area']}','{$data['Block_No']}','{$data['Postal_Code']}','{$data['Street']}','{$data['District']}','{$data['Estate']}','{$data['Tenure']}','{$data['Location']}','{$data['Contact_No']}','{$data['No_Of_Rooms']}','{$data['No_Of_Bedrooms']}','{$data['No_Of_Bathrooms']}','{$data['LandLord']}','{$data['construction_year']}','{$data['Discription']}','{$data['is_Furnished']}','{$data['Valuation_Price']}','{$data['No_Of_Storey']}','$date'";
		 $query.=",'{$data['Adventure_park']}','{$data['Aerobic_pool']}','{$data['Amphitheatre']}','{$data['Badminton_hall']}','{$data['Basketball_court']}','{$data['Bowling_alley']}','{$data['Clubhouse']}','{$data['Fitness_corner']}','{$data['Fun_pool']}','{$data['Game_room']}','{$data['Gymnasium_room']}','{$data['Jogging_track']}','{$data['Playground']}','{$data['Squash_court']}','{$data['Swimming_pool']}','{$data['Tennis_courts']}','{$data['Wadding_pool']}','{$data['BBQ']}','{$data['GolfCourse']}'";
		$query.=",'{$data['Jacuzzi']}','{$data['Sauna']}','{$data['Spa_pool']}','{$data['Pub_Included']}','{$data['Dishwasher']}','{$data['DVD_Player']}','{$data['Fridge']}','{$data['Internet_Connection']}','{$data['Iron']}','{$data['Kitchen_Utensils']}','{$data['Living_Room_Furniture']}','{$data['Microwave']}','{$data['Washing_Machine']}','{$data['Vacuum_Cleaner']}','{$data['Bathtub']}','{$data['Hairdryer']}','{$data['WaterHeater']}','{$data['Cable_TV']}','{$data['Free_WiFi']}','{$data['Air_Conditioner']}','{$data['Meeting_Rooms']}'";
		$query.=",'{$data['hours_security']}','{$data['Walkable_to_MRT']}','{$data['Market']}','{$data['Food_Center']}','{$data['School']}','{$data['Library']}','{$data['Expressway']}','{$data['Temple']}','{$data['Mosque']}','{$data['Sea_View']}','{$data['City_View']}','{$data['Greenery_View']}','{$data['Dining_Room_Furniture']}','{$data['Balcony']}','{$data['Garage']}','{$data['Terrace']}','{$data['GroundFloor']}','{$data['LowFloor']}','{$data['HighFloor']}'";
		$query.=")";
                
                //$query = mysql_escape_string($query);
                //echo $query;
//		if (!mysql_query($query))
//                {
//                die('Error: ' . mysql_error());
//                }
		if(mysql_query($query)) 
		{			
		$Ads_ID= mysql_insert_id();
                
                error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
                
                 if(isset($_POST['propertyguru']))
                {
                    echo "POST['propertyguru'] set";
                                $propertyguru=$_POST['propertyguru'];
                                $temp_query="SELECT Site_Username,Site_Password FROM user_site WHERE User_ID='$App_ID' AND Site_ID=$propertyguru";
                                //echo "$temp_query";
                                $res=mysql_query($temp_query);
                                while($row = mysql_fetch_array($res)) {
                                
                                $data['username']=$row['Site_Username'];
                                $data['password']=$row['Site_Password']; }
				
                               // include module for rentinsingapore
				if($data['username']== "" || $data['password']== "")
                                {
                                    $_SESSION['is_successfull']=false;
                                    $_SESSION['message']="Username & Password not matching";
                                    header("location:view_Ad.php");   
                                    
                                }
				include 'modules/propertyguru/main.php';//Commented by pranali
            
                                echo "calling post ad propertyguru";
				// create object
				 $object = new propertyguru();//Commented by pranali
                                 
				 // call post_ad function
				 $response = $object->post_ad($data);//Commented by pranali
                                 // $response=array( "handle" => "8185651" ,"link" => "http://www.propertyguru.com.sg/listing/8185651/for-sale-ganeshas" ,"code" => "1") ;
                                 print_r($response);
                                 
                                if($response['code'])
                                {
                                    echo "response['code'] set propertyguru";
                                   
                                    $_SESSION['is_successfull']=true;
                                    $_SESSION['message']="Ad Posted Successfully";
                                  
                                 $result=mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID, handle, Ad_Link) VALUES ('{$_POST['propertyguru']}','$Ads_ID','{$response['handle']}','{$response['link']}')");
                                if(!$result)
                                  {
                                     echo mysql_error();
                                     
                                  }
                                }
                                  unset($object);
                                  unset($response);
                               
                    
                    
                
                }
                
                /* Prabhas: integrating iproperty module */
                 if(isset($_POST['iproperty']))
                {
                	$ip_q = "SELECT Site_Username, Site_Password FROm user_site WHERE User_ID='$App_ID' AND Site_ID='{$_POST['iproperty']}'";
                 	$ip_r = mysql_query($ip_q);
                 	if(!$ip_r) {
                 		$_SESSION['is_successful'] = false;
                 		$_SESSION['message'] = mysql_error();
                 	}
                 	$row = mysql_fetch_assoc($ip_r); // ideally there would be only 1 row for this user & this site
                 	$data['username'] = $row['Site_Username'];
                 	$data['password'] = $row['Site_Password'];
                 	if(empty($data['username']) || empty($data['password'])) {
                 		$_SESSION['is_successful'] = false;
                 		$_SESSION['message'] = "Cannot post ad to this site as username/password for iproperty.com.sg are not set.";
                 		header("location:view_Ad.php");
                 	}
                 	include_once 'modules/iproperty/main.php';
                 	$iproperty_obj = new iproperty();
                 	$iproperty_response = $iproperty_obj->post_ad($data);
                 	if($iproperty_response['code']){
                        $_SESSION['is_successfull']=true;
						$_SESSION['message']="Ad Posted Successfully";
						$insert_query = "INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID, handle, Ad_Link) VALUES ('{$_POST['iproperty']}','$Ads_ID','{$iproperty_response['handle']}','{$iproperty_response['ad_link']}')";
                        $result=mysql_query($insert_query);
						if(!$result) {
							$_SESSION['is_successful'] = false;
							$_SESSION['message'] = mysql_error();
						}
                        unset($iproperty_obj);
                        unset($iproperty_response);
                 	}// if response code is set
                }// if iproperty 
                /* Prabhas: my code ends here */
                
                 if(isset($_POST['rentinsingapore']))
                {
                     $rentinsingapore=$_POST['rentinsingapore'];
                     echo "POST['rentinsingapore'] set";
                                $temp_query="SELECT Site_Username,Site_Password FROM user_site WHERE User_ID='$App_ID' AND Site_ID=$rentinsingapore";
                                //echo "$temp_query";
                                $res=mysql_query($temp_query);
                                while($row = mysql_fetch_array($res)) {
                                // echo "Data from user tab";
                               $data['username']=$row['Site_Username'];
                                $data['password']=$row['Site_Password']; }
				
                                 // include module for rentinsingapore
				if($data['username']== "" || $data['password']== "")
                                {
                                     $_SESSION['is_successfull']=false;
                                    $_SESSION['message']="Please Fillup credentials";
                                    header("location:view_Ad.php");   
                                    
                                }
				include 'modules/rentinsingapore/main.php';//Commented by pranali
            
				// create object
                                echo "calling post add singapore";
				 $object1 = new rent_in_singapore();//Commented by pranali
				 // call post_ad function
				 $response1 = $object1->post_ad($data);//Commented by pranali
                                 print_r($response1);
                              
                                if($response1['code']){
                                    echo "response code set";
                                    $_SESSION['is_successfull']=true;
                                    $_SESSION['message']="Ad Posted Successfully";
                                 $result=mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID, handle, Ad_Link) VALUES ('{$_POST['rentinsingapore']}','$Ads_ID','{$response1['handle']}','{$response1['ad_link']}')");
                                if(!$result)
                                  {
                                     echo mysql_error();
                                     
                                  }
                                   }
                                  unset($object1);
                                  unset($response1);
                }
                 if(isset($_POST['propmatch']))
                {
                    $propmatch=$_POST['propmatch'];
                    $temp_query="SELECT Site_Username,Site_Password FROM $tbl_name_user_site WHERE User_ID='$App_ID' AND Site_ID='$propmatch'";
				// echo "$temp_query";
				$res=mysql_query($temp_query);
				 while($row = mysql_fetch_array($res))
				 {
				// echo "Data from user tab";
				$data['username']=$row['Site_Username'];
				$data['password']=$row['Site_Password'];
				 }
                               if($data['username']== "" || $data['password']== "")
                                {
                                     $_SESSION['is_successfull']=false;
                                    $_SESSION['message']="Please Fillup credentials";
                                    header("location:view_Ad.php");   
                                    
                                }   	
                                 

                                 //print_r($data);
                    include 'modules/propmatch/main.php';
                    $object2 = new propmatch();
                    echo "calling propmatch post ad";
                   $response2 = $object2->post_ad($data);// $data is associative array containing login credentials and ad details
               print_r($response2);
                  if($response2['code']){
                    $_SESSION['is_successfull']=true;
		    $_SESSION['message']="Please Fillup credentials";
                $result=mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID, handle, Ad_Link) VALUES ('{$_POST['propmatch']}','$Ads_ID','{$response2['handle']}','{$response2['link']}')");
               if(!$result)
                 {
                    echo mysql_error();
                    
                 }
                }
                  unset($object2);
                  unset($response2);
                }
                 if(isset($_POST['sisvrealink']))
                {
                 mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['sisvrealink']}','$Ads_ID')");
                }
                 if(isset($_POST['cobrokehub']))
                {
                 mysql_query("INSERT INTO $tbl_name_AdSites(Site_ID,Ads_ID) VALUES ('{$_POST['cobrokehub']}','$Ads_ID')");
                }
				//print_r($data);
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
                            "estate",
                            "landmark",
                            "contact_no",
                            "block_No",
                            "ethnicity",
                            "Tenure",
                            "isFurnished",
                            "year",
                            "No_Of_Storey"
                            );
                        foreach($var_Arr as $sub_arr)
                        {
                           $_SESSION[$sub_arr]="";
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
            // echo "Not";
                    
        }
                
                

		



?>