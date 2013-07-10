<?php
/**
 * module for http://www.rentinsingapore.com
 */
class rentinsingapore {
	/**
	 * links to required pages
	 */
	private $login_page = 'http://www.rentinsingapore.com/userfunctions/signin';
	// private $login_page = 'http://www.rentinsingapore.com/loginnew';
	private $logout_page= 'http://www.rentinsingapore.com/logout';
	private $home_page  = 'http://rentinsingapore.com/controlpanel';
	private $post_ad_page = 'http://rentinsingapore.com/newad';
	private $ad_submit_page = 'http://www.rentinsingapore.com/userfunctions/adcreate';
	private $ad_delete_page = 'http://www.rentinsingapore.com/userfunctions/addestroy/';
	private $ad_listing_page = 'http://www.rentinsingapore.com/myads';
	
	private $map;
	private $map_file;
	
	private $variable_map;
	private $defaults;
	
	/**
	 * zero-argument constructor
	 * this function will load value mappings into object
	 */
	public function __construct() {
		ini_set("max_execution_time", 900);
		// $this->map_file = 'http://'.$_SERVER['SERVER_NAME'].'/Integrated_cms/modules/rentinsingapore/map.json';
		$this->map_file = './modules/rentinsingapore/map.json';
		$this->map = json_decode(file_get_contents($this->map_file),true);
		
		$this->defaults = array(
			'ad[when_available]' => '',  //TODO: freeze this
			'ad[deposit]' =>  '',
			'ad[myarea_id]' =>  3, // sq. ft.
			'ad[renttype_id]' =>  4, // none - for rent/sale
			'ad[nosmk]' =>  0,
			'ad[corner]' =>  0,
			'ad[noagt]' =>  0,
			'ad[pets]' =>  0,
			'ad[nobrokers]' => 0,
			'ad[cook]' =>  0,
			'ad[cobroke]' =>  0,
			'ad[mycountry_id]' => 0,
			'ad[for_men]' =>  0,
			'ad[for_women]' =>  0,
			'ad[for_couples]' =>  0,
			'ad[school1_id]' =>  0,
			'ad[school2_id]' =>  0,
			'ad[school3_id]' =>  0,
			'ad[image1_temp]' =>  '',
			'ad[image1]"; filename="' => '',
			'ad[image2_temp' =>  '',
			'ad[image2]"; filename=' => '',
			'ad[image3_temp]' =>  '',
			'ad[image3]"; filename=' => '', 
			'commit' => 'Post My Ad'
		);
	} // __construct
	
	/**
	 * function to post ad
	 * @param associative array $data - containing login credentials and ad details.
 	 */
	public function post_ad($data) {
		$ret_val = array();
		
		$postfields = array(
			"userid"=>$data['username'], 
			"passwd"=>$data['password']
		);

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
		
		// go to 'Post New Ad' page - not really required, but good to set referer
		curl_setopt($ch, CURLOPT_URL, $this->post_ad_page);
		curl_exec($ch);

		// post ad
		$postfields = array(
			// property details
			'ad[adtype_id]' => $this->translate($data['Type'], 'ad[adtype_id]'), // translate('for_sale','ad_type')
			'ad[propertytype_id]' => $this->translate($data['Property_Type'], 'ad[propertytype_id]'),
			'ad[adcity_id]' =>  $this->translate($data['Estate'], 'ad[adcity_id]'),
			'ad[title]'=> $data['Property_Name'],
			'ad[mrtstation_id]' =>  $this->translate($data['Nearest_MRT'], 'ad[mrtstation_id]'),
			'ad[lrt_id]' =>  $this->translate($data['Nearest_LRT'], 'ad[lrt_id]'),
			'ad[district_id]' =>  $this->translate($data['District'], 'ad[district_id]'),
			'ad[property_price]' =>  $data['Price'],
			'ad[neighbourhood]' =>  $data['Location'],
			'ad[blockno]' =>  $data['Block_No'],
			'ad[bedrooms]' =>  $data['No_Of_Bedrooms'],
			'ad[bathrooms]' =>  $data['No_Of_Bathrooms'],
			'ad[size]' =>  $data['Area'],
			'ad[cont_phone]' =>  $data['Contact_No'],
			'ad[mykeywords]' =>  $data['Discription'], //TODO: explode the words
			'ad[description]' =>  $data['Discription'],
			'ad[mycountry_id]' =>  $this->translate($data['LandLord'], 'ad[mycountry_id]'),
			'ad[train_station]' =>  empty($data['Walkable_to_MRT'])?0:$this->translate($data['Walkable_to_MRT'], 'ad[train_station]'),
			// 'ad[train_station]' =>  0, //TODO: fix this
			'ad[swimming_pool]' =>  empty($data['Swimming_pool'])?0:$this->translate($data['Swimming_pool'], 'ad[swimming_pool]'),
			'ad[lowfloor]' => empty($data['LowFloor'])?0:$this->translate($data['LowFloor'], 'ad[lowfloor]'),
			'ad[highfloor]' => empty($data['HighFloor'])?0:$this->translate($data['HighFloor'], 'ad[highfloor]'),
			'ad[excercise]' =>  empty($data['Fitness_corner'])?0:$this->translate($data['Fitness_corner'], 'ad[excercise]'),
			// 'ad[excercise]' =>  0,//TODO: fix this
			'ad[tennis]' =>  empty($data['Tennis_courts'])?0:$this->translate($data['Tennis_courts'], 'ad[tennis]'),
			'ad[spa]' =>  empty($data['Spa_pool'])?0:$this->translate($data['Spa_pool'], 'ad[spa]'),
			'ad[internet]' =>  empty($data['Free_WiFi'])?0:$this->translate($data['Free_WiFi'], 'ad[internet]'),
			'ad[aircon]' => empty($data['Air_Conditioner'])?0:$this->translate($data['Air_Conditioner'], 'ad[aircon]'),
			'ad[pub]' => empty($data['Pub_Included'])?0:$this->translate($data['Pub_Included'], 'ad[pub]')
		);
		
		if("HDB Apartment"==$data['Property_Type']) {
			switch($data['No_Of_Rooms']) {
				case '2':
				case 2:
					$postfields['ad[propertytype_id]'] = '42'; break;
				case '3':
				case 3:
					$postfields['ad[propertytype_id]'] = '43'; break;
				case '4':
				case 4:
					$postfields['ad[propertytype_id]'] = '44'; break;
				case '5':
				case 5:
					$postfields['ad[propertytype_id]'] = '45'; break;
				case '6':
				case 6:
					$postfields['ad[propertytype_id]'] = '46'; break;
				case '7':
				case 7:
					$postfields['ad[propertytype_id]'] = '47'; break;
				default:
					$postfields['ad[propertytype_id]'] = '48'; break;
			}	
		}// if
		
		$postfields = array_merge($postfields, $this->defaults);
	
		curl_setopt($ch, CURLOPT_URL, $this->ad_submit_page);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);
		
		
		// then go to Location: 
		curl_setopt($ch, CURLOPT_URL, $this->ad_listing_page);
		$response = curl_exec($ch);
		
		// get link to this ad.
		include_once "libs/simplehtmldom_1_5/simple_html_dom.php";
		$html = str_get_html($response);
		//echo $html;
		//$link = $html->find('a', 41); // link to add is 41st link on the page
		//echo "getting table...";
		$table = $html->find('table[id=table1]',0);
		if(!$table) { return array('code'=>false, 'message'=>'Could not find table containing ad details.'); }
		//echo "getting link...";
		$link = $table->find('tr',1)->find('td',0)->find('a',0);
		if(!$link) { return array('code'=>false, 'message'=>'Could not find link to this ad.'); }
		//echo "getting handle...";
		$handle = array_reverse(explode('/', $link->href));
		//echo "setting ret val";
		$ret_val['handle']  = $handle[0];
		$ret_val['link'] = $link->href;
		$ret_val['code'] 	= true;
		// logout
		curl_setopt($ch, CURLOPT_URL, $this->logout_page);
		curl_exec($ch);
		curl_close($ch);
	
		return $ret_val;
	}// post_ad
	
	public function delete_ad($data) {
		$ret_val = array();

		$postfields = array("userid"=>$data['username'], "passwd"=>$data['password']);
		
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
		
		// go to 'Delete Ad' page, passing Ad ID through URL
		$delete_link = $this->ad_delete_page . $data['handle'];
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_URL, $delete_link);
		$response = curl_exec($ch);
		echo $response; 
		include_once 'libs/simplehtmldom_1_5/simple_html_dom.php';
		$html = str_get_html($response);
		$handle = $data['handle']; // array messes up the find call, hence this var. 
		$link = $html->find("a[href*=$handle]",0);
		if(!$link) { $ret_val['code'] = true; } // link with this handle not found. => deleted!
		else { $ret_val['code'] = false; } // link found => not deleted :(
		
		return $ret_val;
	}// delete_ad
	
	private function translate($value, $target) {
		// echo "| translating [$value] into [$target]...";
		if(!isset($this->map[$target][$value])) {
			echo "translate $value to $target";
			// echo "retuning {$this->map[$target]['default_value']}";
			return $this->map[$target]['default_value'];
		}
		else {
			// echo "retuning {$this->map[$target][$value]}";
			return $this->map[$target][$value];
		}
	}// translate
}// class rentInSingapore
?>
