<?php
/**
 * Use this file to generate the map.json file. 
 * Set all mapping information here. format of mapping arrays is as shown below.
 * 'site-variable'=> array('app-variable-value'=>'site-specific-value')
 */
$mapping = array(
'category'=> array('residential'=>'1', 'commercial'=>'2'),

'res-category'=> array('HDB Apartment'=>'1', 'Apartment or Condo'=>'2', 'Landed House'=>3),

'com-category'=> array('Office'=>'4', 'Retail'=>'5', 'Shophouse'=>'6', 'Medical'=>'7', 'Industrial'=>'8', 
	'Land'=>'9', 'Warehouse'=>'10', 'Workhouse'=>'11', 'Workshop'=>'12', 'Other Commercial'=>'13', 
	'Business Park Space'=>'15'),

'type'=> array('sale'=>'sale', 'rent'=>'rent'),

'tenure'=> array('default_value'=>'Freehold', '99 Years'=>'99 years', '999 Years'=>'999 years', 'freehold'=>'Freehold'),

'district'=> array('default_value'=>'', 'Boat Quay or Raffles Place'=>'1', 'Chinatown or Tanjong Pagar'=>'2', 
	'Alexandra or Commonwealth'=>'3', 'Harbourfrount or Telok Blangah'=>'4',
	'Buona Vista or West Coast'=>'5', 'City Hall or Clarke Quay'=>'6',
	'Beach Road or Bugis or Rochor'=>'7', 'Farrer Park or Serangoon'=>'8',
	'Orchard or River Valley'=>'9', 'Tanglin or Holland'=>'10', 
	'Newton or Novena'=>'11', 'Balestier or Toa Payoh'=>'12', 
	'Macpherson or Potong Pasir'=>'13','Eunos or Geylang or Paya Lebar'=>'14',
	'East Coast or Marine Parade'=>'15', 'Bedok or Upper East Coast'=>'16',
	'Changi Airport or Changi Village'=>'17','Pasir Ris or Tampines'=>'18',
	'Hougang or Ponggol or Sengkang'=>'19', 'Ang Mo Kio or Bishan or Thomson'=>'20',
	'Clementi or Upper Bukit Timah'=>'21', 'Boon Lay or Jurong or Tuas'=>'22',
	'Bukit Batok or Bukit Panjang'=>'23', 'Choa Chu Kang or Tengah'=>'24',
	'Admiralty or Woodlands'=>'25', 'Mandai or Upper Thomson'=>'26',
	'Sembawang or Yishun' => '27', 'Seletar or Yio Chu Kang'=>'28'),

'estate'=>array( 'default_value'=>'1', 
						"Ang Mo Kio"=>'1',
						"Bedok"=>'2',
						"Bishan"=>'3',
						"Bukit Batok"=>'4',
						"Bukit Merah"=>'5',
						"Bukit Panjang"=>'6',
						"Bukit Timah"=>'7',
						"Central Area"=>'8',
						"Choa Chu Kang"=>'9',
						"Clementi"=>'10',
						"Geylang"=>'11',
						"Hougang"=>'12',
						"Jurong East"=>'13',
						"Kallang or Whampoa"=>'14',
						"Lim Chu Kang"=>'15',
						"Marine Parade"=>'16',
						"Pasir Ris"=>'17',
						"Punggol"=>'18',
						"Queenstown"=>'19',
						"Sembawang"=>'20',
						"Sengkang"=>'21',
						"Serangoon"=>'22',
						"Tampines"=>'23',
						"Toa Payoh"=>'24',
						"Woodlands"=>'25',
						"Yishun"=>'26',
						"Jurong West"=>'27',
						"Teban Gdr. / Pandan Gdr."=>'28'),

'facilities[]' => array('Adventure_park'=>'15', 'Aerobic_pool'=>'28', 'Amphitheatre'=>'2', 'Badminton_hall'=>'16', 
	'Basketball_court'=>'3', 'Bowling_alley'=>'4', 'Clubhouse'=>'18', 'Fitness_corner'=>'19', 'Fun_pool'=>'32',
	'Game_room'=>'20', 'Gymnasium_room'=>'33', 'Jogging_track'=>'21', 'Playground'=>'11', 'squash_court'=>'39', 
	'Swimming_pool'=>'27', 'Tennis_courts'=>'40', 'Wadding_pool'=>'14', 'BBQ'=>'17', 'GolfCourse'=>'36', 
	'Jacuzzi'=>'7', 'Sauna'=>'12', 'Spa_pool'=>'26', 'Pub_Included'=>'34', 'Meeting_Rooms'=>'23', 
	'hours_security'=>'1', 'Market'=>'10', 'Library'=>'35', 'Greenery_View'=>'25' )
);

file_put_contents('map.json',json_encode($mapping));
?>