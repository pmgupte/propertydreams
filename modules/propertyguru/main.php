<?php
/**
 * module for http://www.propertyguru.com.sg
 */
class propertyguru {
	/**
	 * links to required pages
	 */
	private $login_page = 'http://agentnet.propertyguru.com.sg/ex_login?w=1&redirect=/ex_home';
	private $logout_page = 'http://agentnet.propertyguru.com.sg/ex_logout';
	private $home_page  = 'http://agentnet.propertyguru.com.sg/ex_home?';
	private $post_ad_page = 'http://agentnet.propertyguru.com.sg/ex_create_listing';
	private $ad_submit_page = '';
	private $ad_delete_page = 'http://agentnet.propertyguru.com.sg/ex_listings_active';
	private $ad_listing_page = 'http://agentnet.propertyguru.com.sg/ex_listings_active';
	private $map;
	private $map_file;
	private $defaults;
	private $cookies_file;
	
	/**
	 * zero-argument constructor
	 * this function will load value mappings into object
	 */
	public function __construct() {
		error_reporting(0); // don't report anything!
		$this->map_file = './modules/propertyguru/map.json';
		$this->map = json_decode(file_get_contents($this->map_file),true);
		$this->cookies_file = "/tmp/cookie.txt";
		$this->defaults = array(
		);
	} // __construct
	
	/**
	 * function to post ad
	 * @param associative array $data - containing login credentials and ad details.
 	 */
	public function post_ad($data) {
		$ret_val = array();
		
		// login
		$ch = curl_init($this->login_page);
		$options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_COOKIEFILE => "/tmp/cookie.txt",
			CURLOPT_COOKIEJAR => "/tmp/cookie.txt"
		);
		curl_setopt_array($ch, $options);
		$response = curl_exec($ch);
		
		$data['username'] = urlencode($data['username']);
		$postfields = "userid={$data['username']}&password={$data['password']}&submit=";
		// echo "postfields: $postfields";
		
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_URL, "http://agentnet.propertyguru.com.sg/ex_login");
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_REFERER, $this->login_page);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		
		// session set. go to home page. site 302 redirects us to home page.
		curl_setopt($ch, CURLOPT_URL, $this->home_page);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		//echo "Home page:[$response]";
		
		// go to 'my listing' page 
		curl_setopt($ch, CURLOPT_URL, $this->ad_listing_page);
		curl_setopt($ch, CURLOPT_REFERER, $this->home_page);
		$response = curl_exec($ch);
		//echo "my listing page: $response";
		
		// go to 'Post New Ad' page
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_REFERER, $this->ad_listing_page);
		curl_setopt($ch, CURLOPT_URL, $this->post_ad_page);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, true); // we need to get the process Id
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");
		// echo curl_error($ch);
		// print_r(curl_getinfo($ch));
		$response = curl_exec($ch);
		// echo "post new ad page headers: [$response]";
		
		preg_match_all('/process=(.*)/', $response, $matches);
		//print_r($matches);
		//echo $matches[1][0]; 

		/*$process_id = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
		$process_id = explode("=", $process_id);
		$process_id = $process_id[1];*/
		
		$process_id = $matches[1][0]; // this will give us required process id
		$process_id = trim($process_id);
		// echo "process id is $process_id";
		
		// go to step 1 page
		$url = "{$this->post_ad_page}/basic?process=$process_id";
		// echo " going to url: [$url] ";
		curl_setopt($ch, CURLOPT_URL, $url);
		$response = curl_exec($ch);
		// echo "post new ad:basic:step (1): $response";
		 
				
		// POST first form to post_ad_page/basic?process=<some number>
		$postfields = array(); // it was string earlier. make it array now.
		$postfields['listing_type'] = $this->translate($data['Type'], 'listing_type');
		$postfields['property_id'] = ''; //TODO: move to defaults? 
		$postfields['property_name'] = $data['Property_Name'];
		$postfields['location_id'] = ''; //TODO: move to defaults?
		$postfields['postcode'] = $data['Postal_Code'];
		$postfields['property_type_group'] = $this->translate($data['Property_Type'], 'property_type_group');
		//echo "property_type_group = " . $postfields['property_type_group'];
		switch($postfields['property_type_group']) {
			case 'N':
				$postfields['property_type_code'] = 'CONDO';
				break;
			case 'L':
				$postfields['property_type_code'] = 'LBUNG';
				break;
			case 'H':
				$postfields['property_type_code'] = 'HDB';
				break;
			case 'R':
				$postfields['property_type_code'] = 'RET';
				break;
			case 'O':
				$postfields['property_type_code'] = 'BSPKS';
				break;
			case 'I':
				$postfields['property_type_code'] = 'FAC';
				break;
			case 'D':
				$postfields['property_type_code'] = 'CBLOC';
				break;
		}

		// estate is set only if property type is HDB
		if('H' == $postfields['property_type_group']) {
			$postfields['hdb_estate'] = $this->translate($data['Estate'],'hdb_estate');
		}
		else {
			$postfields['hdb_estate'] = '';
		}
		
		$postfields['hdb_type'] = '';
		$postfields['floorplan'] = ''; //TODO: move to defaults?
		$postfields['price'] = $data['Price'];
		$postfields['price_type'] = ''; //TODO: move to defaults?
		$postfields['price_description'] = ''; //TODO: move to defaults?
		$postfields['valuation_price'] = $data['Valuation_Price'];
		$postfields['bedrooms'] = $data['No_Of_Bedrooms'];
		$postfields['floorarea'] = $data['BuiltUp_Area'];
		$postfields['floorarea_unit'] = 'sqft'; //TODO: move to defaults?
		$postfields['landarea'] = $data['Area']; //TODO: move to defaults?
		$postfields['submit'] = 'Next >'; // for 1st step
		$postfields['hidden_listing_id'] = '';
		$postfields['process'] = $process_id; // we extracted this above.
		
		// print_r($postfields); 
		// echo " POSTing to URL $url ";
		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_REFERER, "{$this->post_ad_page}/basic?process=$process_id");
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		// print_r(curl_getinfo($ch));
		// echo "POST response header, after 1st step POST: [$response]"; exit;
		
		// post ad - step 2
		$url = "{$this->post_ad_page}/detail?process=$process_id";
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_URL, $url);
		$response = curl_exec($ch);
		// echo "GET's response (before step 2 POST): [$response]"; exit;
		
		$postfields = array(); // reset the postfields
		$postfields['listing_description'] = $data['Discription'];
		$postfields['furnishing'] = $this->translate($data['is_Furnished'], 'furnishing');
		if(isset($data['GroundFloor']) && ("1"==$data['GroundFloor'])) {
			$postfields['floor_level'] = $this->translate("ground", 'floor_level');
		}
		else if(isset($data['LowFloor']) && ("1"==$data['LowFloor'])) {
			$postfields['floor_level'] = $this->translate("low", 'floor_level');
		}
		else if(isset($data['HighFloor']) && ("1"==$data['HighFloor'])) {
			$postfields['floor_level'] = $this->translate("high", 'floor_level');
		}
		$postfields['bathrooms'] = $data['No_Of_Bathrooms'];
		
		$unit_features = array('Sea_View', 'City_View', 'Greenery_View', 'GroundFloor', 'LowFloor', 'HighFloor',
		'Air_Conditioner', 'Bathtub', 'Hairdryer', 'Jacuzzi', 'WaterHeater', 'Garage', 'Balcony', 'Terrace');
		$index = 0;
		foreach($unit_features as $unit_feature) {
			if(!empty($data[$unit_feature])) {
				$postfields["unit_features[$index]"] = $this->translate($unit_feature, 'unit_features[]');
				$index += 1;
			}
		}

		$amenities = array('hours_security', 'Adventure_park', 'Aerobic_pool', 'Amphitheatre', 'Badminton_hall',
		'Basketball_court', 'BBQ', 'Bowling_alley', 'Clubhouse', 'Fitness_corner', 'Fun_pool', 'Game_room',
		'Gymnasium_room', '	Jacuzzi', 'Jogging_track', 'Library', 'Meeting_Rooms', 'GolfCourse', 'Market',
		'Playground', 'Sauna', 'Spa_pool', 'squash_court', 'Swimming_pool', 'Tennis_courts', 'Wadding_pool');
		$index = 0;
		foreach($amenities as $amenity) {
			if(!empty($data[$amenity])) {
				$postfields["amenities[$index]"] = $this->translate($amenity, 'amenities[]');
				$index += 1;
			}
		}

		$postfields['property_name'] = $data['Property_Name'];
		$postfields['tenure']= $this->translate($data['Tenure'], 'tenure');
		$postfields['constructionyear'] = $data['construction_year'];
		$postfields['numberofunits'] = ''; //TODO: move to defaults?
		$postfields['numberoffloors'] = $data['No_Of_Storey'];
		$postfields['submit'] = "Next >"; // for step 2
		$postfields['hidden_listing_id'] = '';
		$postfields['process'] = $process_id;
		
		curl_setopt($ch, CURLOPT_URL, $url);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		// echo "Response after step 2 POST: [$response]"; exit;

		// step 3
		$url = "{$this->post_ad_page}/location?process=$process_id";
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_URL, $url);
		$response = curl_exec($ch);	
		// echo "response after GET of step 3: $response"; exit;
			
		$postfields = array();
		// reset again
		$postfields['district'] = $this->translate($data['District'], 'district');
		$postfields['streetnumber']= $data['Block_No'];
		$postfields['streetname'] = $data['Street'];
		$postfields['postcode'] = $data['Postal_Code'];
		$postfields['longitude'] = ''; //TODO: move to defaults?
		$postfields['latitude'] = ''; //TODO: move to defaults?
		$postfields['submit'] = 'Next >';
		$postfields['hidden_listing_id'] = '';
		$postfields['process'] = $process_id;
		
		curl_setopt($ch, CURLOPT_URL, "{$this->post_ad_page}/location?process=$process_id");
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		// echo $response;
				
		// step 4
		$url = "{$this->post_ad_page}/media?process=$process_id";
		// echo " media step link: $url ";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);	
		// echo "Page after GET for step 4: $response"; exit; 
		
		include_once 'libs/simplehtmldom_1_5/simple_html_dom.php';
		$html = str_get_html($response);
		if(!$html) {return array('code'=>false, 'message'=>'could not load html for step 4');}
		$postfields['owner_type'] = $html->getElementById('owner_type',0)->value;
		$postfields['owner_id'] = $html->find('input[name=owner_id]',0)->value;
		$postfields['user_id'] = $html->getElementById('user_id',0)->value;
		$postfields['media_class'] = $html->getElementById('media_class',0)->value;
		$postfields['selected_media_type'] = $html->getElementById('selected_media_type',0)->value;
		$postfields['media_upload'] = $html->find('input[name=media_upload]',0)->value;
		$postfields['upload_type'] = $html->getElementById('upload_type',0)->value;
		$postfields['with_watermark'] = 'CUSTOM'; //TODO: move to defaults?
		$postfields['watermark_text'] = $html->getElementById('watermark_text',0)->value;
		$postfields['watermark_font'] = 'bitsumishi'; //TODO: move to defaults?
		$postfields['watermark_color']= '0066CC'; 
		$postfields['noflash'] = $html->getElementById('noflash',0)->value;
		$postfields['photo1"; filename="'] = '';
		$postfields['photo2"; filename="'] = '';
		$postfields['photo3"; filename="'] = '';
		$postfields['is_it_floorplan_upload'] = $html->getElementById('is_it_floorplan_upload',0)->value;
		$postfields['selected_floorplan_id'] = $html->getElementById('selected_floorplan_id',0)->value;
		$postfields['noflash'] = $html->getElementById('noflash',0)->value;
		$postfields['name="floorplan_photo1"; filename="'] = '';
		$postfields['vt_embed_html'] = $html->getElementById('vt_embed_html',0)->innertext;
		$postfields['vt_primary"; filename="']= '';
		$postfields['vt_thumbnail"; filename="']= '';
		$postfields['form_type'] = $html->getElementById('embed_video',0)->value;
		$postfields['video_embed_html']= $html->getElementById('video_embed_html',0)->innertext;
		$postfields['video_primary"; filename="'] = '';
		$postfields['video_thumbnail"; filename="'] = '';
		$postfields['doc_primary"; filename="'] = '';
		$postfields['submit'] = 'Next >';
		$postfields['hidden_listing_id'] = '';
		$postfields['process']=$process_id;
		
		curl_setopt($ch, CURLOPT_URL, "{$this->post_ad_page}/media?process=$process_id");
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		
		// step 5 summary page
		$url = "{$this->post_ad_page}/summary?process=$process_id";
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_URL, $url);
		$response = curl_exec($ch);
		// echo "response at summary page: $response"; exit;
		
		$postfields = array();
		$postfields['cea_ad_reg_check1'] = 'on';
		$postfields['cea_ad_reg_check2'] = 'on'; 
		$postfields['submit'] = 'Activate >';
		$postfields['listing_notes'] = '';
		$postfields['hidden_listing_id'] = '';
		$postfields['process'] = $process_id;
		
		curl_setopt($ch, CURLOPT_URL, "{$this->post_ad_page}/summary?process=$process_id");
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		
		// go to ad listing page
		curl_setopt($ch, CURLOPT_URL, $this->ad_listing_page);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		// echo "response for ad listing page: $response"; exit;
		
		$temp = "for-" . strtolower($this->translate($data['Type'], 'listing_type')) . "-"; 
		$temp .= strtolower(str_replace(" ", "-", $data['Property_Name']));
		$temp = str_replace("@", "", $temp);
		$temp = str_replace("$", "", $temp);

		unset($html);
		$html = str_get_html($response); // load fresh response into $html

		if(!$html) { return array('code'=>false, 'message'=>'Could not get proper HTML to extract ad link.'); }

		$link = $html->find("a[href$=$temp]",0);
		if(!$link) {return array('code'=>false, 'message'=>'Could not fetch link to this ad.');}
		
		$handle = array_reverse(explode('/', $link->href));
		$handle = $handle[1];
		$link = $link->href;

		if(!empty($handle) && !empty($link)) {
			$ret_val['handle'] = $handle;
			$ret_val['link'] = $link;
			$ret_val['code'] = true;
		}
		
		// logout
		curl_setopt($ch, CURLOPT_URL, $this->logout_page);
		$response = curl_exec($ch);
		
		curl_close($ch);

		return $ret_val;
	}// post_ad
	
	public function delete_ad($data) {
		$ret_val = array();
		
		$data['username'] = urlencode($data['username']);
		$postfields = "userid={$data['username']}&password={$data['password']}&submit=";
		
		// login
		$ch = curl_init($this->login_page);
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_exec($ch);
		
		// session set. go to home page. site 302 redirects us to home page.
		curl_setopt($ch, CURLOPT_URL, $this->home_page);
		curl_exec($ch);
		
		curl_setopt($ch, CURLOPT_URL, $this->ad_listing_page);
		$response = curl_exec($ch);
		
		// some ground work to imitate human actions. 
		// POST request to delete given ad will also pass other ad IDs being shown on page.
		include_once 'libs/simplehtmldom_1_5/simple_html_dom.php'; 
		$html = str_get_html($response);
		
		$table = $html->find('table[class=table1]',0);
		if(!$table) { return array('code'=>false, 'message'=>'Could not find table listing ads while parsing web page.');}
		
		$postfields = array();
		$postfields[] = urlencode("listing_id[]")."={$data['handle']}";
		$postfields[] = "order_listing_id={$data['handle']}";
		$postfields[] = urlencode("order[{$data['handle']}]") . "=";
		
		$inputs = $table->find('input[name=order_listing_id]');
		if(!$inputs) {return array('code'=>false, 'message'=>'Could not find order listing ids while parsing web page.');}
		foreach($inputs as $input) {
			$order_listing_id = $input->value;
			if(($order_listing_id != $data['handle']) && 
				!empty($order_listing_id) && 
				!in_array($order_listing_id, $postfields)) {
				$postfields[] = "order_listing_id=$order_listing_id";
				$postfields[] = urlencode("order[$order_listing_id]") . "=";
			}
		}// foreach
		$postfields[] = "delist=" . urlencode("Take off selected");
		$postfields[] = "selecteds={$data['handle']}";
		
		$postfields = implode("&", $postfields);
		
		curl_setopt($ch, CURLOPT_URL, $this->ad_delete_page);
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_URL, $this->ad_listing_page);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		
		$html = str_get_html($response);
		$link = $html->find("a[href*={$data['handle']}");
		if(0 < count($link)) {
			$ret_val['code'] = false;
			$ret_val['message'] = 'Something went wrong. Link to this ad still exists on page.';
		}
		else {
			$ret_val['code'] = true;
		}
		
		return $ret_val;
	}// delete_ad
	
	private function translate($value, $target) {
		//echo "*** translating [$value] into [$target]...";
		if(!isset($this->map[$target][$value])) {
			//echo " using default_value for $target";
			return $this->map[$target]['default_value'];
		}
		else {
			return $this->map[$target][$value];			
		}
	}// translate
}// class rentInSingapore
?>
