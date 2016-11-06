<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
		
	function __construct () //construct is run first no matter what, will do  some housekeeping for us
	{
		parent::__construct(); //first the constructor does its call to the parent's constructor
	}	
		
	public function index()
	{
		$this->home();
	}
	
	public function home()
	{
		
		$data['title'] = 'MVC Cool Title'; //It will be accessible in the view as $title
		$data['page_header'] = 'Intro to MVC Design';//It will be accessible in the view as $page_header
		$data['firstnames'] = $this->model_users->getFirstNames();
		//just stored the array of objects into $data['firstnames']. It will be accessible in 
		//the view as $firstnames
		$data['users'] = $this->model_users->getUsers();//It will be accessible in the view as $users
		
		$this->load->view('home_view.php', $data);//This load $data object (associative array) into 
		//welcome_message page view
	}
	
	public function array_helper()
	{
		$data['title'] = 'Array Helper test'; //It will be accessible in the view as $title
		$data['page_header'] = 'Array Helper trial';//It will be accessible in the view as $page_header
		$data['firstnames'] = $this->model_users->getFirstNames();
		//just stored the array of objects into $data['firstnames']. It will be accessible in 
		//the view as $firstnames
		//$data['users'] = $this->model_users->getUsers();//It will be accessible in the view as $users
		
		$this->load->view('array_view', $data);//This load $data object (associative array) into
	}
	
	public function email_helper()
	{
		$data['title'] = 'Email Helper test'; //It will be accessible in the view as $title
		$data['page_header'] = 'Email Helper trial';//It will be accessible in the view as $page_header
		//$data['firstnames'] = $this->model_users->getFirstNames();
		
		$this->load->view('email_view', $data);//This load $data object (associative array) into 
	}
		
	public function html_helper()
	{
		$data['title'] = 'html_helper Title'; //It will be accessible in the view as $title
		$data['page_header'] = 'html_helper Header';//It will be accessible in the view as $page_header
		
		$this->load->view('html_view', $data);//This load $data object (associative array) into 
	}
	
	public function url_helper()
	{
		$data['title'] = 'url_helper Title'; //It will be accessible in the view as $title
		$data['page_header'] = 'url_helper Header';//It will be accessible in the view as $page_header
		
		$this->load->view('url_view', $data);//This load $data object (associative array) into 	
	}
	
	public function text_helper()
	{
		//$this->load->helper('text'); here is where you can load helper or in autoload.php
		
		$data['title'] = 'text_helper Title'; //It will be accessible in the view as $title
		$data['page_header'] = 'text_helper Header';//It will be accessible in the view as $page_header
		
		$this->load->view('text_view', $data);//This load $data object (associative array) into 	
	}
	
	public function form_helper()
	{

		//$this->load->library('form_validation'); is allready defined on autoload libraries.
		$this->load->helper('security');
		
		$data['title'] = 'form_helper Title'; //It will be accessible in the view as $title
		$data['page_header'] = 'form_helper Header';//It will be accessible in the view as $page_header
		
		$this->form_validation->set_rules('email','E-mail','required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('url', 'URL', 'required');
		
		if ($this->form_validation->run() == FALSE) { //if the previous 3 lines runs and returns false some of them
			$this->load->view('form_view', $data);//This load $data object (associative array) into 	
		} else 
		{
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$data['pass_length'] = strlen($this->input->post('password'));
			$data['url'] = $this->input->post('url');
			$this->load->view('form_view', $data);
		}
		
	}
	
	public function form2_helper()
	{
		//helpers needed: url, form, form_validation allreayd load in autolad.
		$this->load->model('model_orders'); //it doesnt work if model_orders in autoload
		$this->load->helper('security');
		
		$this->form_validation->set_rules('email','E-mail','required|trim|valid_email'); //|	through error Unable to access an error message corresponding to your field name E-mail.(xss_clean)
		$this->form_validation->set_rules('shirt_size', 'Shrit Shize', 'required|alpha');
		$this->form_validation->set_rules('stripe_choice[]', 'Stripes', 'required'); //stripe_choice[] is an array
		$this->form_validation->set_rules('terms', 'Terms and Conditions', 'callback_accept_terms'); //callback_acept_terms calls accept_terms function (bellow) 
		$this->form_validation->set_rules('free_shipping', 'Shipping Choice', 'required|numeric|exact_length[1]');
		
		if ($this->form_validation->run() == FALSE) { //if the previous 3 lines runs and returns false some of them
					
			$data['title'] = 'form_helper_2'; //It will be accessible in the view as $title
			$data['page_header'] = 'form_helper_2 ';//It will be accessible in the view as $page_header
			$this->load->view('form2_view', $data);//This load $data object (associative array) into 	
		} else {
			$order_array  = array ( //all the things we want to put in our ddbb
				'id' 			=> NULL,
				'email' 			=> $this->input->post('email'),
				'order_time'		=> $this->input->post('order_time'),
				'shirt_size' 	=> $this->input->post('shirt_size'),
				'stripe_choice' => implode(',',$_POST['stripe_choice']), //join the elments of array stripe_choice
				'free_shipping' => $this->input->post('free_shipping')
		 	);
			$insert_order = $this->model_orders->insert_order($order_array);
			$data['title'] = '';
			$data['page_header'] = 'Order Success!';
			$data['success'] = $order_array;
			$this->load->view('form2_view', $data);
		}
	}

	public function accept_terms($value) //custom callback function of validation set rule terms and conditions
	{
		if($value == 'accept'){ return TRUE;} //$value parameter is the 'term' parameter on set_rules(term and conditions)
		else {return FALSE;}
	}
	
	public function string_helper()
	{
		//$this->load->helper('string'); here is where you can load helper or in autoload.php
		
		$data['title'] = 'string_helper Title'; //It will be accessible in the view as $title
		$data['page_header'] = 'string_helper Header';//It will be accessible in the view as $page_header
		
		$this->load->view('string_view', $data);//This load $data object (associative array) into 	
	}
	
	public function login()
	{
		$this->load->view('includes/header');
		$this->load->view('login_form');
		$this->load->view('includes/footer');
	}
	
	public function validate_credentials()
	{
		return TRUE;
	}
	
	public function signup()
	{
		$this->load->view('includes/header');
		$this->load->view('signup_form');
		$this->load->view('includes/footer');
	}
	
	public function create_menber()	
	{
		//$this->load->library('form_validation'); //already in autoload
		//validation rules
		$this->load->helper('security');
		
		$this->form_validation->set_rules('first_name','First Name','trim|required|max_length[40]'); //1st: first_name = exact name of the field name on signup form, 2nd: Name human name to be inserted on the error message, 3rd: validations rules for this form field 
		$this->form_validation->set_rules('last_name','Last Name','trim|required|max_length[50]');
		$this->form_validation->set_rules('email','Email Adress','trim|required|valid_email|max_length[50]|callback_check_if_email_exists');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[15]|callback_check_if_username_exists');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('password_confirm','Password Confirmation','trim|required|matches[password]');
		
		if ($this->form_validation->run() == FALSE ) //didn'validate
		{
			$this->load->view('includes/header');
			$this->load->view('signup_form');
			$this->load->view('includes/footer');
		} 
		else 
		{
			$this->load->model('model_membership');
			if($query = $this->model_membership->create_member())
			{
				$data['account_created'] = "Your account has been created!.<br/><br/> You may login now.";
				
				$this->load->view('includes/header');
				$this->load->view('login_form', $data);
				$this->load->view('includes/footer');
			} 
			else
			{
				$this->load->view('includes/header');
				$this->load->view('login_form');
				$this->load->view('includes/footer');
			}

		} //end of else
	}

	public function check_if_email_exists($requested_email)
	{
		$this->load->model('model_membership');
		$username_available = $this->model_membership->check_if_email_exists($requested_email);
		if($username_available) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function check_if_username_exists($requested_username) //custom callback function
	{
		$this->load->model('model_membership');
		$username_available = $this->model_membership->check_if_username_exists($requested_username);
		if($username_available) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}
