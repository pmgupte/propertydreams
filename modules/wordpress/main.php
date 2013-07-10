<?php
class wordpress {
	private $blog_url = 'http://labs.prabhasgupte.com/wp';
	private $login_page; 
	private $home_page;
	private $logout_page;
	private $new_post_page;
	private $new_post_ajax_page;
	private $submit_post_page;
	private $post_list_page;
	private $edit_post_page;
	private $delete_post_page; 
	
	public function __construct() {
			$this->login_page = $this->blog_url . '/wp-login.php';
			$this->logout_page = $this->blog_url . '/wp-login.php?action=logout';
			$this->home_page = $this->blog_url . '/wp-admin/';
			$this->new_post_page = $this->blog_url . '/wp-admin/post-new.php';
			$this->new_post_ajax_page = $this->blog_url . '/wp-admin/admin-ajax.php';
			$this->submit_post_page = $this->blog_url . '/wp-admin/post.php';
			$this->post_list_page = $this->blog_url . '/wp-admin/edit.php';
			$this->edit_post_page = $this->blog_url . '/wp-admin/post.php';
			$this->delete_post_page = $this->blog_url . '/wp-admin/post.php';
	} // constructor
	
	public function post_ad($data) {
		$ret_val = array();
		
		$title = "For {$data['Type']}: {$data['Property_Name']}";
		$content = '';

		$amenities=array(
					'sports' => array(
								"1"=>"Adventure_park",
								"Aerobic pool",
								"Amphitheatre",
								"Badminton_hall",
								"Basketball_court",
								"Bowling_alley",
								"Clubhouse",
								"Fitness_corner",
								"Fun_pool",
								"Game_room",
								"Gymnasium_room",
								"Jogging_track",
								"Playground",
								"squash_court",
								"Swimming_pool",
								"Tennis_courts",
								"Wadding_pool",
								"BBQ",
								"GolfCourse",
								"Jacuzzi",
								"Sauna",
								"Spa_pool",
								"Pub_Included",
					 ),//array sports
				 'Fixtures' =>array(
								"1"=>"Dishwasher",
								"DVD_Player",
								"Fridge",
								"Internet_Connection",
								"Iron",
								"Kitchen_Utensils",
								"Living_Room_Furniture",
								"Microwave",
								"Washing_Machine",
								"Vacuum_Cleaner",
								"Bathtub",
								"Hairdryer",
								"WaterHeater",
								"Cable_TV",
								"Free_WiFi",
								"Air_Conditioner",		   
						    
						    ),//array fixtures
				
				 'special_Features' =>array(
					
								"1"=>"Meeting_Rooms",
								"hours_security",
								"Walkable_to_MRT",
								"Market",
								"Food_Center",
								"School",
								"Library",
								"Expressway",
								"Temple",
								"Mosque",
								"Sea_View",
								"City_View",
								"Greenery_View",
							       	"Dining_Room_Furniture",
					       			"Balcony",
								"Garage",
								"Terrace",
								"GroundFloor",
								"LowFloor",
								"HighFloor"
								)//array special_features
					); //array amenities
					
		
		//TODO: prepare post contents
		$content .= "<b>Name of Property:</b> {$data['Property_Name']}<br />";
		$content .= "<b>Property Type:</b> {$data['Property_Type']}<br />";
		$content .= "<b>Address:</b> Block No. {$data['Block_No']}, {$data['Street']}, {$data['District']} {$data['Postal_Code']}";
		$content .= "<b>Nearby Landmark:</b> {$data['Location']}";
		$content .= "<b>Description:</b> {$data['Discription']}<br />";
		$content .= "<b>Area:</b> Total {$data['Area']}, Built-up {$data['BuiltUp_Area']}<br />";
		$content .= "<b>Price:</b> Asking {$data['Price']}, Valuation {$data['Valuation_Price']}<br />";
		$content .= "<b>Construction Year:</b> {$data['construction_year']}<br />";
		$content .= "<b>Tenure:</b> {$data['Tenure']}<br />";
		$content .= "<b>No. of Rooms:</b> Total {$data['No_Of_Rooms']} ";
		if(!empty($data['No_Of_Bedrooms'])) {
			$content .= ", Bedrooms {$data['No_Of_Bedrooms']} ";
		}
		if(!empty($data['No_Of_Bathrooms'])) {
			$content .= ", Bathrooms {$data['No_Of_Bathrooms']}";
		}
		$content .= "<br />";
		foreach($amenities as $group=>$group_amenities) {
			$group = str_replace('_', ' ', $group);
			$content .= "<b>$group:</b>";
			$temp = array();
			foreach ($group_amenities as $amenity) {
				if(!empty($data[$amenity])) {
					$temp[] = str_replace('_', ' ', $amenity);
				}// if
			} // inner foreach
			$temp = implode(", ", $temp);
			$temp = empty($temp)?"N/A":$temp;
			$content .= "$temp <br />";
		}// foreach
		
		// login
		$postfields = "log={$data['username']}&pwd={$data['password']}&wp-submit=Log+In&redirect_to={$this->home_page}&testcookie=1";

		$ch = curl_init($this->login_page);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);

		// go to dashboard 
		curl_setopt($ch, CURLOPT_URL, $this->home_page);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		
		// go to 'post new ad' page
		curl_setopt($ch, CURLOPT_URL, $this->new_post_page);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		
		// get some hidden variables. we need to pass them while POSTing the blog post
		include_once 'libs/simplehtmldom_1_5/simple_html_dom.php';
		$html = str_get_html($response);
		if(!$html) { return array('code'=>false, 'message'=>'Could not get "New Post" page properly.'); }
		$post_id = $html->getElementById('post_ID')->value;
		$wpnonce = $html->getElementById('_wpnonce')->value;
		
		$postfields = array();
		$postfields['_wpnonce'] = $wpnonce; // we extracted this above
		$postfields['_wp_http_referer'] = $html->getElementByTagName('input[name=_wp_http_referer]',0)->value;
		$postfields['user_ID'] = $html->getElementById('user-id')->value;
		$postfields['action'] = $html->getElementById('hiddenaction')->value;
		$postfields['originalaction'] = $html->getElementById('originalaction')->value;
		$postfields['post_author'] = $html->getElementById('post_author')->value;
		$postfields['post_type'] = $html->getElementById('post_type')->value;
		$postfields['original_post_status'] = $html->getElementById('original_post_status')->value;
		$postfields['referredby'] = $this->submit_post_page . "?post=".$html->getElementById('post_ID')->value ."&action=edit&message=6";
		$postfields['_wp_original_http_referer'] = $this->submit_post_page . "?post=".$html->getElementById('post_ID')->value ."&action=edit&message=6";
		$postfields['auto_draft'] = '0'; //default value if post is not auto-saved as draft
		$postfields['post_ID'] = $post_id; // $html->getElementById('post_ID')->value; 
		$postfields['autosavenonce'] = $html->getElementById('autosavenonce')->value;
		$postfields['meta-box-order-nonce'] = $html->getElementById('meta-box-order-nonce')->value;
		$postfields['closedpostboxesnonce'] = $html->getElementById('closedpostboxesnonce')->value;
		$postfields['wp-preview'] = ''; //TODO: is this default?
		$postfields['hidden_post_status'] = $html->getElementById('hidden_post_status')->value;
		$postfields['post_status'] = 'publish'; //'draft'; //TODO: is this default for first time?
		$postfields['hidden_post_password'] = '';
		$postfields['hidden_post_visibility'] = 'public';
		$postfields['visibility'] = 'public';
		$postfields['post_password'] = '';
		$postfields['mm'] = $html->getElementById('cur_mm')->value; // date('m');
		$postfields['jj'] = $html->getElementById('cur_jj')->value; // date('j');
		$postfields['aa'] = $html->getElementById('cur_aa')->value; // date('Y');
		$postfields['hh'] =	$html->getElementById('cur_hh')->value; // date('G');
		$postfields['mn'] = $html->getElementById('cur_mn')->value; // date('i');
		$postfields['ss'] = date('s');
		$postfields['hidden_mm'] = $html->getElementById('hidden_mm')->value;
		$postfields['cur_mm'] = $html->getElementById('cur_mm')->value;
		$postfields['hidden_jj'] = $html->getElementById('hidden_jj')->value;
		$postfields['cur_jj'] = $html->getElementById('cur_jj')->value;
		$postfields['hidden_aa'] = $html->getElementById('hidden_aa')->value;
		$postfields['cur_aa'] = $html->getElementById('cur_aa')->value;
		$postfields['hidden_hh'] = $html->getElementById('hidden_hh')->value;
		$postfields['cur_hh'] = $html->getElementById('cur_hh')->value;
		$postfields['hidden_mn'] = $html->getElementById('hidden_mn')->value;
		$postfields['cur_mn'] = $html->getElementById('cur_mn')->value;
		$postfields['original_publish'] = 'Publish'; 
		$postfields['publish'] = 'Publish'; 
		$postfields['post_format'] = '0'; // standard format
		$postfields['post_category[]']= '0'; // default value?
		$postfields['newcategory']= 'New+Category+Name'; // default value?
		$postfields['newcategory_parent'] = '-1'; 
		$postfields['_ajax_nonce-add-category'] = $html->getElementById('_ajax_nonce-add-category')->value;
		$postfields['tax_input[post_tag]'] = $data['Type']; // for sale/rent
		$postfields['newtag[post_tag]'] = '';
		$postfields['post_title'] = $title;
		$postfields['samplepermalinknonce'] = $html->getElementById('samplepermalinknonce')->value;
		$postfields['content'] = $content; //TODO: combine all data and set it as post contents
		$postfields['excerpt'] = '';
		$postfields['trackback_url'] = '';
		$postfields['metakeyinput'] = '';
		$postfields['metavalue'] = '';
		$postfields['_ajax_nonce-add-meta'] = $html->getElementById('_ajax_nonce-add-meta')->value;
		$postfields['advanced_view'] = $html->getElementByTagName('input[name=advanced_view]',0)->value;
		$postfields['comment_status']='open';
		$postfields['ping_status'] = 'open';
		$postfields['post_name'] = '';
		$postfields['post_author_override'] = '1'; // default value?

		$temp = array();
		foreach($postfields as $key=>$value) {	
			$temp[] = urlencode($key).'='.urlencode($value);
		}// foreach 
		
		$postfields = implode("&", $temp);
		// echo $postfields;
		
		curl_setopt($ch, CURLOPT_URL, $this->submit_post_page);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_REFERER, $this->submit_post_page . "?post=$post_id&action=edit&message=6");
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		/* 
		 * if this gets posted correctly, we get empty response here (because FOLLOWLOCATION is turned off).
		 * if response is non-empty, we might have encountered some error.
		 * check that.
		 */ 
		if(!empty($response)) { return array('code'=>false, 'message'=>'Something went wrong at Wordpress. Cannot proceed further.'); }

		/*
		 * if we are here, we got the contents posted successfully.
		 * get the link to this blog post, and then logout.
		 */
		// http://labs.prabhasgupte.com/wp/wp-admin/post.php?post=69&action=edit&message=6		
		curl_setopt($ch, CURLOPT_URL, $this->submit_post_page . "?post=$post_id&action=edit&message=6");
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_REFERER, $this->submit_post_page . "?post=".$html->getElementById('post_ID')->value ."&action=edit&message=6");
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		
		unset($html);
		$html = str_get_html($response);
		if(!$html) { return array('code'=>false, 'message'=>'Could not get HTML properly to extract link to this ad.'); }
		
		$link = $html->getElementById('message')->find('a',0);
		if(!$link) { return array('code'=>false, 'message'=>'Could not find link to this ad.'); }
		
		// prepare return value
		$ret_val['link'] = $link->href;
		$ret_val['handle'] = $post_id; // using post id as the handle
		$ret_val['code'] = true;
		
		// logout
		curl_setopt($ch, CURLOPT_URL, $this->logout_page);
		$response = curl_exec($ch);
		curl_close($ch);
		
		return $ret_val;
	}// post_ad
	
	public function delete_ad($data) {
		$ret_val = array();
		
		// login
		$postfields = "log={$data['username']}&pwd={$data['password']}&wp-submit=Log+In&redirect_to={$this->home_page}&testcookie=1";

		$ch = curl_init($this->login_page);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		$response = curl_exec($ch);

		// go to dashboard 
		curl_setopt($ch, CURLOPT_URL, $this->home_page);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		
		// go to list of blog posts
		curl_setopt($ch, CURLOPT_URL, $this->post_list_page);
		curl_setopt($ch, CURLOPT_REFERER, $this->home_page);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		
		// go to edit page for this post. we need to get 'trash' link with current nonce
		curl_setopt($ch, CURLOPT_URL, $this->edit_post_page . "?post={$data['handle']}&action=edit");
		curl_setopt($ch, CURLOPT_REFERER, $this->post_list_page);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		
		if(!$response) { return array('code'=>false, 'message'=>'Could not get page pointing to trash link.'); }
		
		include_once 'libs/simplehtmldom_1_5/simple_html_dom.php';
		$html = str_get_html($response);
		if(!$html) { return array('code'=>false, 'message'=>'Could not get HTML source to extract trash link.'); }
		
		$div = $html->find('div[id=delete-action]',0);
		if(!$div) { return array('code'=>false, 'message'=>'DIV containing trash link not found.'); }
		
		$trash_link = $div->find('a',0);
		if(!$trash_link) { return array('code'=>false, 'message'=>'Trash link not found.'); }

		$trash_link = $trash_link->href;
		preg_match_all('/_wpnonce=(.*)/', $trash_link, $matches);
		$wpnonce = trim($matches[1][0]);
		
		/* now that we have got the current wpnonce, make GET request to delete page, passing the post id and wpnonce */
		
		curl_setopt($ch, CURLOPT_URL, $this->delete_post_page . "?post={$data['handle']}&action=trash&_wpnonce=$wpnonce");
		curl_setopt($ch, CURLOPT_REFERER, $this->post_list_page);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		
		/* again, similar to creating the blog post, we get empty response if operation was successful.
		 * if it failed, we get some error message in response.
		 */
		if(!empty($response)) { return array('code'=>false, 'message'=>'Something went wrong at Wordpress. Could not delete.'); }
		
		$ret_val['code'] = true;
		
		return $ret_val;
	}// delete_ad
}
?>
