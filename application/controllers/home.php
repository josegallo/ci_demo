<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
		
	function __construct () //construct is run first no matter what, will do  some housekeeping for us
	{
		parent::__construct(); //first the constructor does is call the parent's constructor
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
	
}
