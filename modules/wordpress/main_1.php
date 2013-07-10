<?php
class wordpress {
	private $blog_url = 'http://labs.prabhasgupte.com/wp';
	private $login_page; 
	private $home_page;
	private $logout_page;
	private $new_post_page;
	private $new_post_ajax_page;
	private $submit_post_page;
	
	public function __construct() {
			$this->login_page = $this->blog_url . '/wp-login.php';
			$this->logout_page = $this->blog_url . '/wp-login.php?action=logout';
			$this->home_page = $this->blog_url . '/wp-admin/';
			$this->new_post_page = $this->blog_url . '/wp-admin/post-new.php';
			$this->new_post_ajax_page = $this->blog_url . '/wp-admin/admin-ajax.php';
			$this->submit_post_page = $this->blog_url . '/wp-admin/post.php';
	} // constructor
	
	public function post_ad($data) {
		$title = "For {$data['Type']}: {$data['Property_Name']}";
		$content = 'test contents';
		// prepare post contents
		
		
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

		$postfields = array();
		$postfields[] = "action=autosave";
		$postfields[] = "post_ID=" . $html->getElementById('post_ID')->value;
		$postfields[] = "autosavenonce=" . $html->getElementById('autosavenonce')->value;
		$postfields[] = "post_type=" . $html->getElementById('post_type')->value;
		$postfields[] = "autosave=1";
		$postfields[] = "post_title=" . $title;
		$postfields[] = "content=" . $content;
		$postfields[] = "catslist=";
		$postfields[] = "comment_status=open";
		$postfields[] = "ping_status=open";
		$postfields[] = "excerpt=";
		$postfields[] = "post_author=" . $html->getElementById('post_author')->value;
		$postfields[] = "user_ID=" . $html->getElementById('user-id')->value;
		$postfields[] = "auto_draft=1";

		$postfields = implode("&", $postfields);
		
		curl_setopt($ch, CURLOPT_URL, $this->new_post_ajax_page);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);

		$postfields = array();
		$postfields[] = "action=sample-permalink";
		$postfields[] = "post_id=" . $html->getElementById('post_ID')->value;
		$postfields[] = "new_title=" . $title;
		$postfields[] = "samplepermalinknonce=" . $html->getElementById('samplepermalinknonce')->value;
		
		$postfields = implode("&", $postfields);
		
		curl_setopt($ch, CURLOPT_URL, $this->new_post_ajax_page);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		
		$postfields = array();
		$postfields[] = "action=autosave";
		$postfields[] = "post_ID=" . $html->getElementById('post_ID')->value;
		$postfields[] = "autosavenonce=" . $html->getElementById('autosavenonce')->value;
		$postfields[] = "post_type=post";
		$postfields[] = "autosave=0";
		$postfields[] = "post_title=" . $title;
		$postfields[] = "content=" . $content;
		$postfields[] = "catslist=";
		$postfields[] = "comment_status=open";
		$postfields[] = "ping_status=open";
		$postfields[] = "excerpt=";
		$postfields[] = "post_author=" . $html->getElementById('post_author')->value;
		$postfields[] = "user_ID=" . $html->getElementById('user-id')->value;

		$postfields = implode("&", $postfields);
		
		curl_setopt($ch, CURLOPT_URL, $this->new_post_ajax_page);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		
		$postfields = array();
		$postfields['_wpnonce'] = $html->getElementById('_wpnonce')->value;
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
		$postfields['post_ID'] = $html->getElementById('post_ID')->value; 
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
		echo $postfields;
		
		curl_setopt($ch, CURLOPT_URL, $this->submit_post_page);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_REFERER, $this->submit_post_page . "?post=".$html->getElementById('post_ID')->value ."&action=edit&message=6");
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.24) Gecko/20111107 Ubuntu/10.04 (lucid) Firefox/3.6.24');
		curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/cookie.txt");	
		$response = curl_exec($ch);
		echo "[$response]"; 

		// logout
		curl_setopt($ch, CURLOPT_URL, $this->logout_page);
		$response = curl_exec($ch);
		curl_close($ch);
	}// post_ad
	
	public function delete_ad($data) {
		
	}// delete_ad
}
?>