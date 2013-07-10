<?php
/**
 * module for http://www.iproperty.com.sg
 */
class iproperty {
	/**
	 * links to required pages
	 */
	private $site_home = 'http://www.iproperty.com.sg';
	// private $login_page = 'http://www.iproperty.com.sg/advertiser/login.aspx';
	private $login_page_1 = 'http://irealtor.iproperty.com.sg/default.aspx?err=1&rd=http://irealtor.iproperty.com.sg/dashboard.aspx';
	private $login_page_2 = 'http://irealtor.iproperty.com.sg/ajax_server/authenticate/svr_authenticate.ashx';
	private $logout_page = '';
	private $home_page  = 'http://irealtor.iproperty.com.sg/dashboard.aspx';
	private $post_ad_page = 'http://irealtor.iproperty.com.sg/property/listing_add.aspx?t=add';
	private $post_ad_step1_page = 'http://irealtor.iproperty.com.sg/ajax_server/property/svr_listing.aspx';
	private $post_ad_step2_page = 'http://irealtor.iproperty.com.sg/property/listing_photos.aspx?t=add&pid=';
	private $post_ad_step3_page = 'http://irealtor.iproperty.com.sg/property/listing_preview_live.aspx?t=add&pid=';
	private $post_ad_step4_page = 'http://irealtor.iproperty.com.sg/property/listing_preview_live.aspx?t=add&pid=';
	private $ad_submit_page = 'http://irealtor.iproperty.com.sg/property/listing_advertise.aspx?pid=';
	private $ad_delete_page = 'http://irealtor.iproperty.com.sg/ajax_server/property/svr_listinglist.aspx';
	private $ad_listing_page = 'http://irealtor.iproperty.com.sg/property/listinglist_lw.aspx?t=Online';
	private $map;
	private $map_file;
	private $defaults;
	
	/**
	 * zero-argument constructor
	 * this function will load value mappings into object
	 */
	public function __construct() {
		error_reporting(0); // don't report anything!
		// $this->map_file = 'http://'.$_SERVER['SERVER_NAME'].'/adposting/modules/iproperty/map.json';
		$this->map_file = './modules/iproperty/map.json';
		$this->map = json_decode(file_get_contents($this->map_file),true);
		
		$this->defaults = array(
		);
	} // __construct
	
	/**
	 * function to post ad
	 * @param associative array $data - containing login credentials and ad details.
 	 */
	public function post_ad($data) {
		$ret_val = array();
		$amenities = array('GolfCourse', 'Market', 'Food_Center', 'School', 'Expressway', 'Temple',
			'Mosque');
		$facilities = array('Badminton_hall', 'Gymnasium_room', 'Jogging_track', 'Playground',
			'squash_court', 'Swimming_pool', 'Tennis_courts', 'Wadding_pool', 'BBQ', 'Jacuzzi',
			'Sauna', 'Meeting_Rooms', '	hours_security');
		
		$ch = curl_init($this->login_page_1);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		// print_r(curl_getinfo($ch)); exit;
				
		$data['username'] = urlencode($data['username']);
		$postfields = "Source=1&UserName={$data['username']}&PassWord={$data['password']}";
		curl_setopt($ch, CURLOPT_URL, $this->login_page_2);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		// print_r(curl_getinfo($ch));
		// echo $response; exit; 
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl for login.'); }
		
		// session should be set. go to home page. site 302 redirects us to home page.
		curl_setopt($ch, CURLOPT_URL, $this->home_page);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_REFERER, $this->login_page);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, false);
		$response = curl_exec($ch);
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl for home page.'); }
		// print_r(curl_getinfo($ch));
		// echo "[$response]"; exit;
		
		curl_setopt($ch, CURLOPT_URL, $this->post_ad_page);
		$response = curl_exec($ch);
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl at Step 3.'); }
		// echo $response; exit;
		
		$postfields = array();
		$postfields['pgt'] = $this->translate($data['Property_Type'], 'pgt'); //TODO: what this field is?

		if ("H" == $postfields['pgt']) {
			// HDB apartment
			$postfields['est'] = urlencode($data['Estate']); // $this->translate($data['Estate'], 'est');
			$postfields['blk'] = $data['Block_No']; 
			switch($data['No_Of_Rooms']) {
				case '1':
				case 1:
					$postfields['pt'] = $this->translate('1', 'pt_hdb'); 
					break;
				case '2':
				case 2:
					$postfields['pt'] = $this->translate('2', 'pt_hdb'); 
					break;
				case '3':
				case 3:
					$postfields['pt'] = $this->translate('3', 'pt_hdb'); 
					break;
				case '4':
				case 4:
					$postfields['pt'] = $this->translate('4', 'pt_hdb'); 
					break;
				case '5':
				case 5:
					$postfields['pt'] = $this->translate('5', 'pt_hdb'); 
					break;
				case '6':
				case 6:
					$postfields['pt'] = $this->translate('6', 'pt_hdb'); 
					break;
				default:
					$postfields['pt'] = $this->translate('6', 'pt_hdb'); 
					break;
			}// switch
		}// if pgt == H
		else {
			// other than HDB
			$postfields['est'] = $data['Property_Name'];
			$postfields['pt'] = 'CO'; //TODO: fix this. how do we get this from GUI?
			$temp = array();
			foreach($facilities as $facility) {
				if(isset($data[$facility])) {
					$temp[] = $this->translate($facility, 'fc1');
				}
			}
			$temp = implode(', ', $temp);
			$postfields['fc1'] = urlencode($temp);
			unset($temp);
		}// if pgt == P
		
		$postfields['st'] = urlencode($data['Street']);
		$postfields['dt'] = $this->translate($data['District'], 'dt');
		$postfields['tnr'] = $this->translate($data['Tenure'], 'tnr');
		$postfields['pc'] = $data['Postal_Code'];
		$postfields['age'] = $data['Age'];
		$postfields['lat'] = '';
		$postfields['lon'] = '';
		$postfields['fc2'] = ''; //TODO: fix this.
		$postfields['lt'] = $this->translate($data['Type'], 'lt');
		$postfields['ap'] = $data['Price'];
		$postfields['smc']= 'F'; // for sq.ft.
		$postfields['bu'] = $data['BuiltUp_Area'];
		$postfields['bd'] = $data['No_Of_Bedrooms'];
		$postfields['bt'] = $data['No_Of_Bathrooms'];
		$postfields['rmk']= urlencode($data['Discription']);
		$temp = array(); // temp array
		foreach($amenities as $amenity) {
			if(isset($data[$amenity])) {
				$temp[] = $this->translate($amenity, 'ame');
			}
		}
		$temp = implode(', ', $temp);
		$postfields['ame'] = urlencode($temp);
		unset($temp);
		
		$postfields['t'] = 'add';
		
		// convert array into url string
		$poststring = array();
		foreach($postfields as $key=>$value) {
			$poststring[] = "$key=$value";	
		}
		$poststring = implode("&", $poststring);
		
		// POST this data to first page in this process. (this is 1st POST)
		curl_setopt($ch, CURLOPT_URL, $this->post_ad_step1_page);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $poststring);
		$response = curl_exec($ch); // $response will have pid that we need in next step. 
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl at Step 4.'); }
		// echo $response;
		$pid = $response;
		//echo "pid = $pid";
		//echo "pid is_numeric? "; echo is_numeric($pid)?"true":"false";
		
		if(empty($pid)) {
			return array('code'=>false, 'message'=> 'Could not get pid for this ad.');
		}
		curl_setopt($ch, CURLOPT_URL, $this->post_ad_step2_page . $pid);
		$response = curl_exec($ch);
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl at Step 5.'); }
		
		curl_setopt($ch, CURLOPT_URL, $this->post_ad_step3_page . $pid);
		$response = curl_exec($ch);
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl at Step 6.'); }
		
		unset($html);
		$html = str_get_html($response);
		if(!$html) { return array('code'=>false, 'message'=>'Could not get VIEWSTATE to post this ad.'); }
		$viewstate = $html->getElementById('__VIEWSTATE')->value;
		$viewstate = urlencode($viewstate);
		$postfields = "__VIEWSTATE=$viewstate";
		
		curl_setopt($ch, CURLOPT_URL, $this->post_ad_step4_page . $pid);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl at Step 7.'); }
		
		curl_setopt($ch, CURLOPT_URL, $this->ad_submit_page . $pid);
		curl_setopt($ch, CURLOPT_POST, false);
		$response = curl_exec($ch);
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl at Step 8.'); }
		
		// get ad link, handle and return this info.
		curl_setopt($ch, CURLOPT_URL, $this->ad_listing_page);
		$response = curl_exec($ch);
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl at Step 9.'); }
		//echo $response;
		
		$link = "http://www.iproperty.com.sg/property/listing.aspx?lid=" . $pid;
		// logout
		curl_setopt($ch, CURLOPT_URL, $this->logout_page);
		curl_exec($ch);
		curl_close($ch);
		
		$ret_val['code'] = true;
		$ret_val['handle'] = $pid;
		$ret_val['link'] = $link;
		return $ret_val;
	}// post_ad
	
	public function delete_ad($data) {
		$ret_val = array();
		
		$data['username'] = urlencode($data['username']);
		
		$ch = curl_init($this->login_page);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		// curl_setopt($ch, CURLOPT_POST, true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		include_once 'libs/simplehtmldom_1_5/simple_html_dom.php';
		$html = str_get_html($response);
		$viewstate = $html->getElementById('__VIEWSTATE',0)->value;
		$eventvalidation = $html->getElementById('__EVENTVALIDATION',0)->value;
		$viewstate = urlencode($viewstate);
		$eventvalidation = urlencode($eventvalidation);
		
		$postfields = '__EVENTTARGET=ctl00%24cphRight%24LoginPanel1%24imgButLogin';
		$postfields .= '&__EVENTARGUMENT=';
		$postfields .= "&__VIEWSTATE=$viewstate";
		$postfields .= "&__EVENTVALIDATION=$eventvalidation";
		$postfields .= '&txtKeywordQuickSearch=Enter+keyword';
		$postfields .= "&ctl00%24cphRight%24LoginPanel1%24txtUsername={$data['username']}&ctl00%24cphRight%24LoginPanel1%24txtPassword={$data['password']}";
		
		// login
		$ch = curl_init($this->login_page);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_REFERER, $this->login_page);
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl at login.'); }
		
		// go to ad listing page
		curl_setopt($ch, CURLOPT_URL, $this->ad_listing_page);
		$response = curl_exec($ch);
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl at ad listing page.'); }
		
		// send POST request to delete page
		$postfields = "t=brm&newitem={$data['handle']}&transacted=0";
		curl_setopt($ch, CURLOPT_URL, $this->ad_delete_page);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		if(empty($response)) { return array('code'=>false, 'message'=>'Could not execute curl at ad delete page.'); }
		
		$ret_val['code'] = true;
		
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
}// class iproperty
?>