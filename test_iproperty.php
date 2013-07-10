<?php
include_once 'modules/iproperty/main.php';

$data = array (
	// login credentials
	'username'=>'ori0n',
	'password'=>'zvbmckic',
	// property details
	'Type' => 'sale',
	'Property_Name'=> date('\T\e\s\t Ymdhms'),
	'Discription' => 'Test Discription',
	'Property_Type' => 'HDB Apartment',
	'Estate' => 'Woodlands',
	'Valuation_Price' => '123456',
	'Nearest_MRT' =>  'Admiralty_NS10',
	'Nearest_LRT' =>  'Bakau',
	'District' =>  'Admiralty or Woodlands',
	'Price' =>  '123456',
	'Tenure' => 'freehold',
	'Location' =>  'test-nearby-landmark',
	'Block_No' =>  '1',
	'Street' => 'Marsiling Drive',
	'Postal_Code' => '123456',
	'construction_year' => '2000',
	'No_Of_Bedrooms' =>  3,
	'No_Of_Rooms' =>  3,
	'No_Of_Bathrooms' => 2, // is this column present in db?
	'No_Of_Storey' => 2,
	'Area' =>  1500,
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
	'is_Furnished'=>'UNFUR',
	'GolfCourse'=>'1', 
	'Market'=>'1', 
	'Food_Center'=>'1', 
	'School'=>'1', 
	'Expressway'=>'1', 
	'Temple'=>'1',
	'Mosque'=>'1'
);

if(isset($_REQUEST['delete'])) {
	$object = new iproperty();
	$data = array('username'=>'ori0n', 'password'=>'zvbmckic', 'handle'=> $_REQUEST['delete']);
	$ret_val = $object->delete_ad($data);
	print_r($ret_val);
}
else {
	$object = new iproperty();
	$ret_val = $object->post_ad($data);
	print_r($ret_val);
}

?>