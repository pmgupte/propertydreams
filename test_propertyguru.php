<?php
include 'modules/propertyguru/main.php';

$data = array (
	// login credentials
	'username'=>'justin.kong@ymail.com',
	'password'=>'zvbmckic',
	// property details
	'Type' => 'sale',
	'Property_Name'=> 'Merrys Villa', //date('\T\e\s\t Ymdhms'),
	'Discription' => 'Merrys Villa, phno 98765443',
	'Property_Type' => 'Landed House',
	'Estate' => 'Admiralty',
	'Valuation_Price' => '18000',
	'Nearest_MRT' =>  'Admiralty_NS10',
	'Nearest_LRT' =>  'Bakau',
	'District' =>  'Boat Quay or Raffles Place',
	'Price' =>  '20000',
	'Tenure' => 'freehold',
	'Location' =>  'test-nearby-landmark',
	'Block_No' =>  'D-12',
	'Street' => 'East Coast',
	'Postal_Code' => '123456',
	'construction_year' => '2011',
	'No_Of_Bedrooms' =>  2,
	'No_Of_Rooms' =>  2,
	'No_Of_Bathrooms' => 2, // is this column present in db?
	'No_Of_Storey' => '',
	'Area' =>  890,
	'Contact_No' =>  '123456789',
	'LandLord' =>  'None Selected',
	'Adventure_park'=>'1', 
	'Aerobic_pool'=>'1', 
	'Amphitheatre'=>'1', 
	'Badminton_hall'=>'1', 
	'Basketball_court'=>'1',
	'Bowling_alley'=>'1', 
	'Clubhouse'=>'1', 
	'Fitness_corner'=>'1', 
	'Fun_pool'=>'1', 
	'Game_room'=>'1', 
	'Gymnasium_room'=>'1', 
	'Jogging_track'=>'1',
	'Playground'=>'1', 
	'squash_court'=>'1', 
	'Swimming_pool'=>'1', 
	'Tennis_courts'=>'1',
	'is_Furnished'=>'UNFUR'
);

if(	isset($_REQUEST['action']) 
	&& "delete" == $_REQUEST['action']
	&& isset($_REQUEST['handle'])) {
	$object = new propertyguru();
	$data = array('username'=>'justin.kong@ymail.com', 'password'=>'zvbmckic', 'handle'=> $_REQUEST['handle']);
	$ret_val = $object->delete_ad($data);
	print_r($ret_val);
}
else {
	$object = new propertyguru();
	$ret_val = $object->post_ad($data);
	print_r($ret_val);
}

?>