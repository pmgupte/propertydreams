<?php
include 'modules/rentinsingapore/main.php';

$data = array (
	'username'=>'agent@prabhasgupte.com', 
	'password'=>'mh15al7167',
	// property details
	'Type' => 'sale',
	'Property_Name'=>'Test Title',
	'Discription' => 'Test Discription',
	'Property_Type' => 'Apartment or Condo',
	'District' =>  'Admiralty or Woodlands',
	'Estate' => 'Bukit Batok',
	'Valuation_Price' => 1000000,
	'Property_Name'=> 'test-title',
	'Nearest_MRT' =>  'Admiralty_NS10',
	'Nearest_LRT' =>  'Bakau',
	'Price' =>  1000000,
	'Tenure' => 'freehold',
	'Location' =>  'test-nearby-landmark',
	'Block_No' =>  'test block',
	'No_Of_Bedrooms' =>  3,
	'No_Of_Rooms' =>  3,
	'No_Of_Bathrooms' => 2, // is this column present in db?
	'Area' =>  1500,
	'Contact_No' =>  '123456789',
	'LandLord' =>  'other',
	'Walkable_to_MRT'=>1,
	'Fitness_corner'=>1,
	'Swimming_pool'=>0,
);

$object = new rent_in_singapore();
$ret_val = $object->post_ad($data);
print_r($ret_val);

/*$object = new rent_in_singapore();
$data = array('username'=>'gprabhas@gmail.com', 'password'=>'mh15al7167', 'handle'=> 65294);
$ret_val = $object->delete_ad($data);*/

?>