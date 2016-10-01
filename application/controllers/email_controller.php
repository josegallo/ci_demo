<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email_controller extends CI_Controller {

	function __construct () //construct is run first no matter what, will do  some housekeeping for us
	{
		parent::__construct(); //first the constructor does is call the parent's constructor
		//$this->load->model('model_users'); //test if here or on public funtion home3()
	}
	
	public function index()
	{
		$this->home4();
	}
	
	public function home4()
	{
		//load models and helpers
		$this->load->helper('email');
		//$this->load->model('model_users');
		
		$data['title'] = 'Email Helper test'; //It will be accessible in the view as $title
		$data['page_header'] = 'Email Helper trial';//It will be accessible in the view as $page_header
		//$data['firstnames'] = $this->model_users->getFirstNames();
		
		$this->load->view('email_view', $data);//This load $data object (associative array) into 
		//welcome_message page view
	}

}
