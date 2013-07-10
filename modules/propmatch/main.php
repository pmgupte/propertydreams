<?php
/**
 * module for http://www.propmatch.com.sg
 */
class propmatch {
	/**
	 * links to required pages
	 */
	private $login_page = 'http://www.propmatch.com.sg/agents/plans';
	private $logout_page = 'http://www.propmatch.com.sg/logout';
	private $home_page  = 'http://www.propmatch.com.sg/dashboard';
	private $post_ad_page = 'http://www.propmatch.com.sg/dashboard/listings/add';
	private $ad_submit_page = 'http://www.propmatch.com.sg/dashboard/listings/add';
	private $ad_delete_page = 'http://www.propmatch.com.sg/dashboard/listings/delete/';
	private $ad_listing_page = 'http://www.propmatch.com.sg/dashboard/listings';
	private $map;
	private $map_file;
	private $defaults;
	
	/**
	 * zero-argument constructor
	 * this function will load value mappings into object
	 */
	public function __construct() {
		ini_set("max_execution_time", 900);
		// $this->map_file = 'http://'.$_SERVER['SERVER_NAME'].'/Integrated_cms/modules/propmatch/map.json';
		$this->map_file = './modules/propmatch/map.json';
		$this->map = json_decode(file_get_contents($this->map_file),true);
		
		$this->defaults = array(
			'directory-id' => '0',
			'directory-text' => ''
		);
	} // __construct
	
	/**
	 * function to post ad
	 * @param associative array $data - containing login credentials and ad details.
 	 */
	public function post_ad($data) {
		
		$ret_val = array();
		$residential_categories = array("Apartment or Condo","Landed House", "HDB Apartment");
		// $commercial_categories = array("Retail", "Office", "Industrial", "Land");
		
		$facilities = array('Adventure_park', 'Aerobic_pool', 'Amphitheatre', 'Badminton_hall', 'Basketball_court',
		'Bowling_alley', 'Clubhouse', 'Fitness_corner', 'Fun_pool', 'Game_room', 'Gymnasium_room', 'Jogging_track',
		'Playground', 'squash_court', 'Swimming_pool', 'Tennis_courts', 'Wadding_pool', 'BBQ', 'GolfCourse', 
		'Jacuzzi', 'Sauna', 'Spa_pool', 'Pub_Included', 'Meeting_Rooms', 'hours_security', 'Market', 'Library',
		'Greenery_View');
		
		$data['username'] = urlencode($data['username']);
		$postfields = "a-login-email={$data['username']}&a-login-password={$data['password']}&a-login-submit=Login";
		
		// login
		$ch = curl_init($this->login_page);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_exec($ch);
		
		// session set. go to home page. site 302 redirects us to home page.
		curl_setopt($ch, CURLOPT_URL, $this->home_page);
		curl_exec($ch);
		
		// go to 'Post New Ad' page
		curl_setopt($ch, CURLOPT_URL, $this->post_ad_page);
		curl_exec($ch);

		// post ad
		$postfields = array();
		$postfields = array_merge($postfields, $this->defaults);
		$postfields['name'] = $data['Property_Name'];
		$postfields['search'] = substr($data['Property_Name'], 0, 1);
		
		if(in_array($data['Property_Type'], $residential_categories)) {
			$postfields['category'] = $this->translate('residential', 'category');
			$postfields['res-category']=$this->translate($data['Property_Type'], 'res-category');
			$postfields['com-category']='4'; // when using 'residential', this defaults to first value i.e. 4
		}
		else if(!in_array($data['Property_Type'], $residential_categories)) {
			// not in residential_categories => property is commercial. valid assumption?
			$postfields['category'] = $this->translate('commercial', 'category');
			$postfields['com-category']=$this->translate($data['Property_Type'], 'com-category');
			$postfields['res-category']='1'; // when using 'commercial', this defaults to first value i.e. 1
		}
		$postfields['type'] = $this->translate($data['Type'], 'type');
		$postfields['price'] = urlencode($data['Price']);
		$postfields['valuation'] = $data['Valuation_Price'];
		$postfields['area'] = urlencode($data['BuiltUp_Area']);
		$postfields['land-area'] = $data['Area']; //TODO: find out when is this getting populated
		$postfields['min-term'] = $data['Minimum_Term']; 
		$postfields['min-term-unit']='months'; //TODO: I think this is fixed value. confirm
		$postfields['max-term'] = '';
		$postfields['max-term-unit']= 'months';
		$postfields['bedrooms'] = $data['No_Of_Bedrooms'];
		$postfields['bathrooms']= $data['No_Of_Bathrooms'];
		$postfields['description']= $data['Discription'];
		$postfields['tenure'] = $this->translate($data['Tenure'], 'tenure');
		$postfields['district']= $this->translate($data['District'], 'district');
		$postfields['estate'] = $this->translate($data['Estate'], 'estate');
		$postfields['address'] = urlencode($data['Block_No'] . " " . $data['Street'] . " " . $data['Postal_Code']);
		$postfields['post-code'] = $data['Postal_Code'];
		$postfields['year'] = $data['construction_year'];
		$postfields['units'] = ''; //TODO: are we getting this from GUI?
		$postfields['floors'] = $data['No_Of_Storey'];
		$postfields['listing-submit']='Add';
		
		$temp = array();
		foreach($postfields as $key=>$value) {
			$temp[] = "$key=$value";
		}
		
		foreach ($facilities as $facility) {
			if(!empty($data[$facility])) { 
				$temp[] = 'facilities[]='.$this->translate($facility, 'facilities[]');
			}
		}
		$poststring = implode("&", $temp);
		unset($temp);
		// $poststring = urlencode($poststring);
		
		curl_setopt($ch, CURLOPT_URL, $this->ad_submit_page);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $poststring);
		$response = curl_exec($ch);
		

		// then go to page which lists your ads
		curl_setopt($ch, CURLOPT_URL, $this->ad_listing_page);
		$response = curl_exec($ch);
		
		
	  	// get link to this ad.
		$temp = str_replace(" ", "-", $data['Property_Name']);
		include "libs/simplehtmldom_1_5/simple_html_dom.php";
		$html = str_get_html($response);
		// echo $html;
		if(!$html) { return array('code'=>false, 'message'=>'Made POST call, but could not get HTML properly.'); }		
		$link = $html->find("a[href*=$temp]", 0);
		if(!$link) { return array('code'=>false, 'message'=>'Could not get link.'); }		
		unset($temp);
		$handle = $link->parent()->parent()->parent()->id;
		if(!$handle) { return array('code'=>false, 'message'=>'Could not get link handle.'); }
//		if(!is_numeric($handle)) { return array('code'=>false, 'message'=>'Invalid handle found.'); }	

		$ret_val['handle']  = $handle;
		$ret_val['link'] = $link->href;
		$ret_val['code'] = true;
		
		// logout
		curl_setopt($ch, CURLOPT_URL, $this->logout_page);
		curl_exec($ch);
		curl_close($ch);
		
		return $ret_val;
	}// post_ad
	
	public function delete_ad($data) {
		$ret_val = array();
		print_r($data);
		$data['username'] = urlencode($data['username']);
		
		$postfields = "a-login-email={$data['username']}&a-login-password={$data['password']}&a-login-submit=Login";
		
		// login
		$ch = curl_init($this->login_page);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
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
		curl_exec($ch);
		
		// go to 'Delete Ad' page, passing Ad ID through URL 
		$delete_link = $this->ad_delete_page . $data['handle'];
		echo $delete_link;
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_URL, $delete_link);
		curl_exec($ch); 
		
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_URL, $delete_link);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "delete-yes=yes");
		$response = curl_exec($ch);

		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_URL, $this->ad_listing_page);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		// echo $response;
		
		include_once "libs/simplehtmldom_1_5/simple_html_dom.php";
		$html = str_get_html($response);
		if(!$html) { return array('code'=>false, 'message'=>'Something went wrong. Could not delete ad.'); }
		$handle = $data['handle'];
		$link = $html->find("a[href*=$handle]",0);
		// if link containing given handle still found, that implies ad is not deleted. 
		if($link) {
			return array('code'=>false, 'message'=>'Something went wrong. Could not delete ad.');
		}

		// everything is fine. return true
		$ret_val['code'] = true;
		
		return $ret_val;
	}// delete_ad
	
	private function translate($value, $target) {
		if(!isset($this->map[$target][$value])) {
			
			return $this->map[$target]['default_value'];
		}
		else {
			return $this->map[$target][$value];
		}
	}// translate
}// class rentInSingapore
?>
