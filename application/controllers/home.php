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
		
		$this->form_validation->set_rules('email','E-mail','required|trim|valid_email'); //|xss_clean through error Unable to access an error message corresponding to your field name E-mail.(xss_clean)
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
	
}
