<?php
/**
 * Use this file to generate the map.json file. 
 * Set all mapping information here. format of mapping arrays is as shown below.
 * 'site-variable'=> array('app-variable-value'=>'site-specific-value')
 */
$mapping = array(
'lt'=> array('sale'=>'S', 'rent'=>'R'),

'pgt'=> array('Apartment or Condo'=>'P', 'Landed House'=>'L', 'HDB Apartment'=>'H', 
	'Retail'=>'C', 'Office'=>'C', 'Industrial'=>'C', 'Land'=>'L'),

'est'=> array(	'default_value'=>'',
						"Ang Mo Kio"=>'Ang Mo Kio',
						"Bedok"=>'Bedok',
						"Bishan"=>'Bishan',
						"Bukit Batok"=>'Bukit Batok',
						"Bukit Merah"=>'Bukit Merah',
						"Bukit Panjang"=>'Bukit Panjang',
						"Bukit Timah"=>'Bukit Timah',
						"Central Area"=>'Central Area',
						"Choa Chu Kang"=>'Choa Chu Kang',
						"Clementi"=>'Clementi',
						"Geylang"=>'Geylang',
						"Hougang"=>'Hougang',
						"Jurong East"=>'Jurong East',
						"Jurong West"=>'Jurong West',
						"Kallang or Whampoa" =>'Kallang/Whampoa',
						"Lim Chu Kang"=>'Choa Chu Kang',
						"Marine Parade"=>'Marine Parade',
						"Pasir Ris"=>'Pasir Ris',
						"Punggol"=>'Central Area',
						"Queenstown"=>'Queenstown',
						"Sembawang"=>'Sembawang',
						"Sengkang"=>'Sengkang',
						"Serangoon"=>'Serangoon',
						"Tampines"=>'Tampines',
						"Toa Payoh"=>'Toa Payoh',
						"Woodlands"=>'Woodlands',
						"Yishun"=>'Yishun'),

'pt_hdb' => array('default_value'=>'6R', '1'=>'2R', '2'=>'2R', '3'=>'3R', '4'=>'4R', '5'=>'5R', '6'=>'6R'),

'furnishing'=> array('default_value'=>'', 'UNFUR'=>'UNFUR', 'PART'=>'PART', 'FULL'=>'FULL'),

'floor_level' => array('default_value'=>'', 'ground'=>'GND', 'low'=>'LOW', 'high'=>'HIGH'),

'unit_features[]'=> array('default_value'=>'', 'Sea_View'=>'SEAV', 'City_View'=>'CITYV', 'Greenery_View'=>'GREEN', 
	'GroundFloor'=>'GFLO', 'LowFloor'=>'LFLO', 'HighFloor'=>'HFLO', 'Air_Conditioner'=>'AIRC', 'Bathtub'=>'BATH', 
	'Hairdryer'=>'HAIR', 'Jacuzzi'=>'JACZ', 'WaterHeater'=>'WHEAT', 'Garage'=>'GAR', 'Balcony'=>'BAL', 'Terrace'=>'TERR'),

'ame'=> array('GolfCourse'=>'Golf Course', 'Market'=>'Market', 'Food_Center'=>'Food Court', 'School'=>'School', 'Expressway'=>'Expressway', 
'Temple'=>'Temple', 'Mosque'=>'Mosque'),

'fc1' => array('Badminton_hall'=>'Badminton Lawn', 'Gymnasium_room'=>'Gymnasium', 'Jogging_track'=>'Jogging Track', 
'Playground'=>'Playground', 'squash_court'=>'Squash Court', 'Swimming_pool'=>'Swimming Pool', 
'Tennis_courts'=>'Tennis Court', 'Wadding_pool'=>'Wading Pool', 'BBQ'=>'BBQ', 'Jacuzzi'=>'Jacuzzi',
'Sauna'=>'Sauna', 'Meeting_Rooms'=>'Meeting Rooms', 'hours_security'=>'Security 24hr'),

'tnr'=> array('default_value'=>'', 'freehold'=>'1', '15 Years'=>'2', '30 Years'=>'3', '60 Years'=>'4', 
	'90 Years'=>'5', '99 Years'=>'6', '103 Years'=>'7', '929 Years'=>'8', '947 Years'=>'9', 
	'956 Years'=>'10', '998 Years'=>'11', '999 Years'=>'12', '946 Years'=>'13'),

'dt'=> array(		"default_value" => '',
						"Boat Quay or Raffles Place"=>'01',   
						"Chinatown or Tanjong Pagar"=>'02',
						"Alexandra or Commonwealth"=>'03',  
						"Harbourfrount or Telok Blangah"=>'04',  
						"Buona Vista or West Coast"=>'05',       
						"City Hall or Clarke Quay"=>'06',       
						"Beach Road or Bugis or Rochor"=>'07',       
						"Farrer Park or Serangoon"=>'08',      
						"Orchard or River Valley"=>'09',       
						"Tanglin or Holland"=>'10',
						"Newton or Novena"=>'11',
						"Balestier or Toa Payoh"=>'12',
						"Macpherson or Potong Pasir"=>'13',
						"Eunos or Geylang or Paya Lebar"=>'14',
						"East Coast or Marine Parade"=>'15',
						"Bedok or Upper East Coast"=>'16',
						"Changi Airport or Changi Village"=>'17',
						"Pasir Ris or Tampines"=>'18',
						"Hougang or Ponggol or Sengkang"=>'19',
						"Ang Mo Kio or Bishan or Thomson"=>'20',
						"Clementi or Upper Bukit Timah"=>'21',
						"Boon Lay or Jurong or Tuas"=>'22',
						"Bukit Batok or Bukit Panjang"=>'23',
						"Choa Chu Kang or Tengah"=>'24',
						"Admiralty or Woodlands"=>'25',
						"Mandai or Upper Thomson"=>'26',
						"Sembawang or Yishun"=>'27',
						"Seletar or Yio Chu Kang"=>'28')
);

file_put_contents('map.json',json_encode($mapping));
?>
