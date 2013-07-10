<?php
/**
 * Use this file to generate the map.json file. 
 * Set all mapping information here. format of mapping arrays is as shown below.
 * 'site-variable'=> array('app-variable-value'=>'site-specific-value')
 */
$mapping = array(
'listing_type'=> array('sale'=>'SALE', 'rent'=>'RENT'),

'property_type_group'=> array('Apartment or Condo'=>'N', 'Landed House'=>'L', 'HDB Apartment'=>'H', 
	'Retail'=>'R', 'Office'=>'O', 'Industrial'=>'I', 'Land'=>'D'),

'hdb_estate'=> array(	'default_value'=>'1',
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
						"Jurong West"=>'14',
						"Kallang or Whampoa" =>'15',
						"Lim Chu Kang"=>'16',
						"Marine Parade"=>'17',
						"Pasir Ris"=>'18',
						"Punggol"=>'19',
						"Queenstown"=>'20',
						"Sembawang"=>'21',
						"Sengkang"=>'22',
						"Serangoon"=>'23',
						"Tampines"=>'24',
						"Toa Payoh"=>'25',
						"Woodlands"=>'26',
						"Yishun"=>'27'),

'furnishing'=> array('default_value'=>'', 'UNFUR'=>'UNFUR', 'PART'=>'PART', 'FULL'=>'FULL'),

'floor_level' => array('default_value'=>'', 'ground'=>'GND', 'low'=>'LOW', 'high'=>'HIGH'),

'unit_features[]'=> array('default_value'=>'', 'Sea_View'=>'SEAV', 'City_View'=>'CITYV', 'Greenery_View'=>'GREEN', 
	'GroundFloor'=>'GFLO', 'LowFloor'=>'LFLO', 'HighFloor'=>'HFLO', 'Air_Conditioner'=>'AIRC', 'Bathtub'=>'BATH', 
	'Hairdryer'=>'HAIR', 'Jacuzzi'=>'JACZ', 'WaterHeater'=>'WHEAT', 'Garage'=>'GAR', 'Balcony'=>'BAL', 'Terrace'=>'TERR'),

'amenities[]'=> array('hours_security'=>'SEC', 'Adventure_park'=>'ADV', 'Aerobic_pool'=>'AER', 'Amphitheatre'=>'AMP', 
	'Badminton_hall'=>'BAD','Basketball_court'=>'BAS', 'BBQ'=>'BBQ', 'Bowling_alley'=>'BOWL', 'Clubhouse'=>'CLUB',
	'Fitness_corner'=>'FIT', 'Fun_pool'=>'FUN', 'Game_room'=>'GAME','Gymnasium_room'=>'GYM', '	Jacuzzi'=>'JAC', 
	'Jogging_track'=>'JOG', 'Library'=>'LIB', 'Meeting_Rooms'=>'MEET', 'GolfCourse'=>'MGOL', 'Market'=>'MMAR',
	'Playground'=>'PLAY', 'Sauna'=>'SAUNA', 'Spa_pool'=>'SPA', 'squash_court'=>'SQU', 'Swimming_pool'=>'SWI', 
	'Tennis_courts'=>'TEN', 'Wadding_pool'=>'WAD'),

'tenure'=> array('default_value'=>'', 'freehold'=>'F', '99 Years'=>'L99', '103 Years'=>'L103', '999 Years'=>'L999'),

'district'=> array(		"Boat Quay or Raffles Place"=>'D01',   
						"Chinatown or Tanjong Pagar"=>'D02',
						"Alexandra or Commonwealth"=>'D03',  
						"Harbourfrount or Telok Blangah"=>'D04',  
						"Buona Vista or West Coast"=>'D05',       
						"City Hall or Clarke Quay"=>'D06',       
						"Beach Road or Bugis or Rochor"=>'D07',       
						"Farrer Park or Serangoon"=>'D08',      
						"Orchard or River Valley"=>'D09',       
						"Tanglin or Holland"=>'D10',
						"Newton or Novena"=>'D11',
						"Balestier or Toa Payoh"=>'D12',
						"Macpherson or Potong Pasir"=>'D13',
						"Eunos or Geylang or Paya Lebar"=>'D14',
						"East Coast or Marine Parade"=>'D15',
						"Bedok or Upper East Coast"=>'D16',
						"Changi Airport or Changi Village"=>'D17',
						"Pasir Ris or Tampines"=>'D18',
						"Hougang or Ponggol or Sengkang"=>'D19',
						"Ang Mo Kio or Bishan or Thomson"=>'D20',
						"Clementi or Upper Bukit Timah"=>'D21',
						"Boon Lay or Jurong or Tuas"=>'D22',
						"Bukit Batok or Bukit Panjang"=>'D23',
						"Choa Chu Kang or Tengah"=>'D24',
						"Admiralty or Woodlands"=>'D25',
						"Mandai or Upper Thomson"=>'D26',
						"Sembawang or Yishun"=>'D27',
						"Seletar or Yio Chu Kang"=>'D28')
);

file_put_contents('map.json',json_encode($mapping));
?>
